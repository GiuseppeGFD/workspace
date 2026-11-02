const API = 'api/backend.php';
let usr = JSON.parse(localStorage.getItem('fardel_user'));
let filtroActual = 'mes';
let chartGastos = null;
let gastosGlobal = [];

// Autenticación inicial
if (usr) {
    document.getElementById('authView').classList.add('hidden');
    document.getElementById('appView').classList.remove('hidden');
    document.getElementById('userName').innerText = usr.name;
    cargarDashboard('mes');
}

// Login
document.getElementById('formLogin').addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = new URLSearchParams();
    data.append('accion', 'login');
    data.append('email', document.getElementById('logEmail').value);
    data.append('password', document.getElementById('logPass').value);

    const res = await (await fetch(API, { method: 'POST', body: data })).json();
    if (res.status === 'ok') {
        localStorage.setItem('fardel_user', JSON.stringify(res.user));
        location.reload();
    } else {
        alert(res.msg);
    }
});

// Logout
async function cerrarSesion() {
    await fetch(`${API}?accion=logout`);
    localStorage.removeItem('fardel_user');
    location.reload();
}

// Cargar Interfaz
async function cargarDashboard(filtro) {
    filtroActual = filtro;

    // Estilos botones filtro
    ['semana', 'mes', 'año'].forEach(f => {
        const btn = document.getElementById(`btn-${f}`);
        if (f === filtro) {
            btn.classList.add('bg-white/10', 'font-bold');
            btn.classList.remove('hover:bg-white/10');
        } else {
            btn.classList.remove('bg-white/10', 'font-bold');
            btn.classList.add('hover:bg-white/10');
        }
    });

    const res = await (await fetch(`${API}?accion=obtener_datos&filtro=${filtro}`)).json();
    if (res.status === 'error') return cerrarSesion();

    gastosGlobal = res.gastos;

    // Selector Categorías
    if (document.getElementById('gastoCategoria').options.length === 0) {
        document.getElementById('gastoCategoria').innerHTML = res.categorias.map(c =>
            `<option value="${c.id}">${c.icon} ${c.name}</option>`
        ).join('');
    }

    // Calcular totales y pintar gastos
    let total = 0;
    const totalesChart = {};

    document.getElementById('listaGastos').innerHTML = res.gastos.map(g => {
        const importe = parseFloat(g.amount);
        total += importe;
        totalesChart[g.category_name] = (totalesChart[g.category_name] || 0) + importe;

        const btnBorrar = (usr.role === 'owner' || usr.role === 'admin' || usr.id === g.paid_by) ?
            `<button onclick="borrarGasto('${g.id}')" class="text-red-400/50 hover:text-red-400 transition-colors ml-3"><i class="fa-solid fa-trash"></i></button>` : '';

        return `
            <div class="flex items-center justify-between p-3 bg-white/5 rounded-xl border border-white/5 hover:bg-white/10 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-black/40 flex items-center justify-center text-lg">${g.icon}</div>
                    <div>
                        <p class="font-bold text-sm leading-tight">${g.description}</p>
                        <p class="text-xs text-gray-400 mt-0.5">${g.user_name} • ${new Date(g.expense_date).toLocaleDateString()}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="font-black">${importe.toFixed(2)} €</span>
                    ${btnBorrar}
                </div>
            </div>`;
    }).join('');

    document.getElementById('totalGastos').innerText = total.toFixed(2) + ' €';

    // Pintar Suscripciones
    document.getElementById('listaSuscripciones').innerHTML = res.suscripciones.map(s => `
        <div class="flex justify-between items-center p-3 rounded-xl bg-black/20 border border-white/5">
            <span class="text-sm font-medium"><i class="fa-solid fa-rotate-right text-gray-500 mr-2"></i>${s.service} (Día ${s.charge_day})</span>
            <span class="font-bold text-pink-400">${parseFloat(s.price).toFixed(2)} €</span>
        </div>
    `).join('');

    actualizarGrafico(totalesChart);
}

// Chart.js
function actualizarGrafico(datos) {
    const ctx = document.getElementById('graficoGastos').getContext('2d');
    if (chartGastos) chartGastos.destroy();

    chartGastos = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(datos),
            datasets: [{
                data: Object.values(datos),
                backgroundColor: ['#6366f1', '#ec4899', '#3b82f6', '#10b981', '#f59e0b'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { color: '#9ca3af', padding: 20, font: { family: "'Plus Jakarta Sans', sans-serif" } } }
            },
            cutout: '75%'
        }
    });
}

// Nuevo Gasto
document.getElementById('formGasto').addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = new URLSearchParams();
    data.append('accion', 'nuevo_gasto');
    data.append('description', document.getElementById('gastoConcepto').value);
    data.append('amount', document.getElementById('gastoCantidad').value);
    data.append('category_id', document.getElementById('gastoCategoria').value);

    await fetch(API, { method: 'POST', body: data });
    e.target.reset();
    cargarDashboard(filtroActual);
});

// Borrar Gasto
async function borrarGasto(id) {
    if (confirm("¿Estás seguro de eliminar este registro?")) {
        const data = new URLSearchParams();
        data.append('accion', 'eliminar_gasto');
        data.append('id_gasto', id);
        await fetch(API, { method: 'POST', body: data });
        cargarDashboard(filtroActual);
    }
}

// Exportar CSV
function exportarCSV() {
    let csv = 'Fecha,Concepto,Categoria,Usuario,Cantidad\n';
    gastosGlobal.forEach(g => {
        csv += `${g.expense_date},"${g.description}",${g.category_name},${g.user_name},${g.amount}\n`;
    });
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('href', url);
    a.setAttribute('download', `Fardel_Gastos_${filtroActual}.csv`);
    a.click();

    // ... código anterior de app.js ...

    document.getElementById('totalGastos').innerText = total.toFixed(2) + ' €';

    document.getElementById('listaSuscripciones').innerHTML = res.suscripciones.map(s => `
        <div class="flex justify-between items-center p-3 rounded-xl bg-white/5 border border-white/5">
            <span class="text-sm font-medium text-gray-200 flex items-center gap-2">
                <i data-lucide="refresh-cw" class="w-4 h-4 text-gray-500"></i> ${s.service}
            </span>
            <span class="font-bold text-pink-400">${parseFloat(s.price).toFixed(2)} €</span>
        </div>
    `).join('');

    actualizarGrafico(totalesChart);

    // IMPORTANTE: Recargar los iconos Lucide después de inyectar HTML nuevo
    lucide.createIcons();


    // ... resto del código ...
}