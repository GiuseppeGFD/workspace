'use strict';
const $ = s => document.querySelector(s);
const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
const eur = n => new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(n);
const iso = d => `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
const COLORS = ['#6c5cff', '#ff6b8b', '#2bb3ff', '#18c48f', '#f5a524', '#b05cff', '#ff8a4c', '#8793b8'];
const S = { csrf: '', user: null, period: 'month', offset: 0, d: null, q: '', cat: '', charts: {}, register: false };

async function api(a, body, qs = '') {
  const o = { method: body ? 'POST' : 'GET', headers: { 'X-CSRF': S.csrf } };
  if (body) o.body = body instanceof FormData ? body : new URLSearchParams(body);
  let r, j;
  try { r = await fetch(`api/api.php?a=${a}${qs}`, o); j = await r.json(); } catch { throw new Error('No hay conexión con el servidor.'); }
  if (r.status === 401 && S.user) { S.user = null; showAuth(); }
  if (!r.ok) throw new Error(j.error || 'Algo ha salido mal.');
  return j;
}
function toast(m) { const t = $('#toast'); t.textContent = m; t.classList.add('show'); clearTimeout(toast.t); toast.t = setTimeout(() => t.classList.remove('show'), 2400); }
const icons = () => window.lucide && lucide.createIcons();

/* ---------- Sesión ---------- */
async function boot() {
  const r = await api('me').catch(() => ({ csrf: '', user: null }));
  S.csrf = r.csrf; S.user = r.user;
  S.user ? showApp() : showAuth();
}
function showAuth() { $('#app').classList.add('hidden'); $('#auth').classList.remove('hidden'); icons(); }
function showApp() {
  $('#auth').classList.add('hidden'); $('#app').classList.remove('hidden');
  $('#userName').textContent = S.user.name; load(); icons();
}
$('#authToggle').onclick = () => {
  S.register = !S.register;
  document.querySelectorAll('.reg').forEach(e => { e.classList.toggle('hidden', !S.register); e.required = S.register && e.name === 'name'; });
  $('#authBtn').textContent = S.register ? 'Crear cuenta' : 'Entrar';
  $('#authToggle').textContent = S.register ? 'Ya tengo cuenta' : '¿Primera vez? Crea tu cuenta';
  $('#authSub').textContent = S.register ? 'Se crean categorías básicas para empezar.' : 'Entra para ver cuánto gastas y en qué.';
  $('#authErr').textContent = '';
};
$('#authForm').onsubmit = async e => {
  e.preventDefault(); const f = new FormData(e.target); $('#authErr').textContent = '';
  try {
    if (S.register) { await api('register', f); }
    await api('login', f);
    const r = await api('me'); S.user = r.user; S.csrf = r.csrf; e.target.reset(); showApp();
  } catch (x) { $('#authErr').textContent = x.message; }
};

/* ---------- Periodo ---------- */
function range() {
  const n = new Date(); let f, t;
  if (S.period === 'week') { f = new Date(n); f.setDate(n.getDate() - ((n.getDay() + 6) % 7) + S.offset * 7); t = new Date(f); t.setDate(f.getDate() + 6); }
  else if (S.period === 'month') { f = new Date(n.getFullYear(), n.getMonth() + S.offset, 1); t = new Date(n.getFullYear(), n.getMonth() + S.offset + 1, 0); }
  else { f = new Date(n.getFullYear() + S.offset, 0, 1); t = new Date(n.getFullYear() + S.offset, 11, 31); }
  return [f, t];
}
async function load() {
  const [f, t] = range(), o = { day: 'numeric', month: 'short' };
  $('#rangeLabel').textContent = S.period === 'month' ? f.toLocaleDateString('es-ES', { month: 'long', year: 'numeric' })
    : S.period === 'year' ? f.getFullYear() : `${f.toLocaleDateString('es-ES', o)} – ${t.toLocaleDateString('es-ES', o)}`;
  document.querySelectorAll('#seg button').forEach(b => b.classList.toggle('on', b.dataset.p === S.period));
  try { S.d = await api('data', null, `&from=${iso(f)}&to=${iso(t)}`); render(); } catch (x) { toast(x.message); }
}

/* ---------- Pintado ---------- */
function render() {
  const { expenses: ex, categories: cats, subscriptions: subs } = S.d, [f, t] = range();
  const cat = Object.fromEntries(cats.map(c => [c.id, c]));
  const total = ex.reduce((s, g) => s + +g.amount, 0), by = {};
  ex.forEach(g => by[g.category_id] = (by[g.category_id] || 0) + +g.amount);
  const top = Object.entries(by).sort((a, b) => b[1] - a[1])[0];
  const days = Math.max(1, Math.round((Math.min(t, new Date()) - f) / 864e5) + 1);
  $('#total').textContent = eur(total); $('#sCount').textContent = ex.length;
  $('#sAvg').textContent = eur(total / days); $('#sTop').textContent = top ? `${cat[top[0]].icon} ${cat[top[0]].name}` : '—';
  $('#sSubs').textContent = eur(subs.reduce((s, x) => s + +x.price, 0));

  const factor = { month: 1, year: 12, week: 12 / 52 }[S.period];
  $('#budgets').innerHTML = cats.map(c => {
    const sp = by[c.id] || 0, bud = c.budget ? c.budget * factor : 0, p = bud ? sp / bud * 100 : 0;
    return `<button class="bud" data-act="editCat" data-id="${esc(c.id)}"><div class="line"><span>${esc(c.icon)} ${esc(c.name)}</span><span>${eur(sp)}${bud ? ' / ' + eur(bud) : ''}</span></div>${bud ? `<div class="bar"><i class="${p > 100 ? 'over' : p > 80 ? 'warn' : ''}" style="width:${Math.min(100, p)}%"></i></div>` : ''}</button>`;
  }).join('');

  $('#subs').innerHTML = subs.length ? subs.map(s => `<div class="item"><div class="ico">🔁</div><div class="info"><b>${esc(s.service)}</b><span class="muted small">Cada día ${s.charge_day}</span></div><span class="amt">${eur(+s.price)}</span><div class="tools"><button class="del" data-act="delSub" data-id="${esc(s.id)}" aria-label="Eliminar"><i data-lucide="trash-2" width="17"></i></button></div></div>`).join('')
    : '<div class="empty">Añade Netflix, internet… y verás cuánto suman al mes.</div>';

  const sel = $('#fCat'), cur = S.cat;
  sel.innerHTML = '<option value="">Todas</option>' + cats.map(c => `<option value="${esc(c.id)}">${esc(c.icon)} ${esc(c.name)}</option>`).join(''); sel.value = cur;
  drawHouse(); drawList(); drawCharts(cats, by); icons();
}
function drawHouse() {
  const { members, house, me, admin } = S.d, owner = members.find(m => m.id === me)?.role === 'owner';
  const lbl = { owner: 'Propietario', admin: 'Administrador', member: 'Miembro' };
  $('#houseName').textContent = house.name;
  $('#members').innerHTML = members.map(m => `<div class="item"><div class="ico">👤</div><div class="info"><b>${esc(m.name)}${m.id === me ? ' (tú)' : ''}</b><span class="muted small">${lbl[m.role]}</span></div>${owner && m.role !== 'owner' ? `<div class="tools"><button data-act="toggleRole" data-id="${esc(m.id)}" aria-label="Cambiar rol"><i data-lucide="shield" width="17"></i></button><button class="del" data-act="rmMember" data-id="${esc(m.id)}" aria-label="Quitar"><i data-lucide="user-minus" width="17"></i></button></div>` : ''}</div>`).join('');
  const inv = $('#invite'); inv.classList.toggle('hidden', !admin);
  if (admin) inv.innerHTML = `<div class="item"><div class="info"><span class="muted small">Código de invitación: quien se registre con él comparte este hogar</span><b style="letter-spacing:.15em">${esc(house.invite_code)}</b></div><div class="tools"><button data-act="copyCode" aria-label="Copiar"><i data-lucide="copy" width="17"></i></button><button data-act="regen" aria-label="Generar otro"><i data-lucide="refresh-cw" width="17"></i></button></div></div>`;
}
function drawList() {
  const { expenses: ex, categories: cats, me, admin } = S.d, cat = Object.fromEntries(cats.map(c => [c.id, c]));
  const q = S.q.toLowerCase(), rows = ex.filter(g => (!S.cat || g.category_id === S.cat) && (!q || (g.description + ' ' + (g.note || '')).toLowerCase().includes(q)));
  $('#list').innerHTML = rows.length ? rows.map(g => {
    const c = cat[g.category_id] || { icon: '🏷️', name: '' }, can = admin || g.paid_by === me;
    return `<div class="item"><div class="ico">${esc(c.icon)}</div><div class="info"><b>${esc(g.description)}</b><span class="muted small">${S.d.members.length > 1 ? esc(g.user_name) + ' · ' : ''}${esc(c.name)} · ${new Date(g.expense_date + 'T00:00').toLocaleDateString('es-ES', { day: 'numeric', month: 'short' })}${g.note ? ' · ' + esc(g.note) : ''}</span></div><span class="amt">${eur(+g.amount)}</span><div class="tools">${g.receipt ? `<a href="uploads/${esc(g.receipt)}" target="_blank" rel="noopener" aria-label="Ver ticket"><i data-lucide="receipt" width="17"></i></a>` : ''}${can ? `<button data-act="editExp" data-id="${esc(g.id)}" aria-label="Editar"><i data-lucide="pencil" width="17"></i></button><button class="del" data-act="delExp" data-id="${esc(g.id)}" aria-label="Eliminar"><i data-lucide="trash-2" width="17"></i></button>` : ''}</div></div>`;
  }).join('') : '<div class="empty">Sin movimientos en este periodo. Pulsa «Nuevo gasto» para empezar.</div>';
  icons();
}
function drawCharts(cats, by) {
  if (!window.Chart) return;
  const mu = getComputedStyle(document.body).getPropertyValue('--mu').trim() || '#888';
  Object.values(S.charts).forEach(c => c.destroy());
  const ids = Object.keys(by);
  S.charts.pie = new Chart($('#cPie'), { type: 'doughnut', data: { labels: ids.map(i => cats.find(c => c.id === i).name), datasets: [{ data: ids.map(i => by[i]), backgroundColor: COLORS, borderWidth: 0, hoverOffset: 6 }] },
    options: { maintainAspectRatio: false, cutout: '72%', plugins: { legend: { position: 'bottom', labels: { color: mu, usePointStyle: true } }, tooltip: { callbacks: { label: c => ` ${eur(c.parsed)}` } } } } });
  const tr = S.d.trend;
  S.charts.bar = new Chart($('#cBar'), { type: 'bar', data: { labels: tr.map(x => new Date(x.m + '-01T00:00').toLocaleDateString('es-ES', { month: 'short' })), datasets: [{ data: tr.map(x => +x.total), backgroundColor: '#6c5cff', borderRadius: 10, maxBarThickness: 38 }] },
    options: { maintainAspectRatio: false, plugins: { legend: { display: false }, tooltip: { callbacks: { label: c => ` ${eur(c.parsed.y)}` } } }, scales: { x: { ticks: { color: mu }, grid: { display: false } }, y: { ticks: { color: mu, callback: v => v + ' €' }, grid: { color: 'rgba(128,128,160,.15)' } } } } });
}

/* ---------- Formularios ---------- */
function openDlg(id, vals = {}) {
  const d = $(id), f = d.querySelector('form'); f.reset(); f.querySelector('.error').textContent = '';
  Object.entries(vals).forEach(([k, v]) => { if (f.elements[k]) f.elements[k].value = v ?? ''; });
  d.showModal(); return f;
}
const catOptions = () => S.d.categories.map(c => `<option value="${esc(c.id)}">${esc(c.icon)} ${esc(c.name)}</option>`).join('');
document.addEventListener('submit', async e => {
  const f = e.target, a = f.dataset.save; if (!a) return;
  e.preventDefault();
  try { await api(a, new FormData(f)); f.closest('dialog').close(); toast('Guardado'); load(); }
  catch (x) { f.querySelector('.error').textContent = x.message; }
});
$('#dExp').querySelector('[name=receipt]').onchange = e => $('#fileName').textContent = e.target.files[0]?.name || 'Adjuntar foto del ticket';
$('#catDel').onclick = async () => {
  const id = $('#dCat').querySelector('[name=id]').value;
  if (!confirm('¿Eliminar esta categoría?')) return;
  try { await api('cat_delete', { id }); $('#dCat').close(); toast('Categoría eliminada'); load(); }
  catch (x) { $('#dCat').querySelector('.error').textContent = x.message; }
};

const actions = {
  prev() { S.offset--; load(); }, next() { S.offset++; load(); },
  async logout() { await api('logout', {}); S.user = null; showAuth(); },
  newExp() { $('#dExpT').textContent = 'Nuevo gasto'; $('#dExp [name=category_id]').innerHTML = catOptions(); $('#fileName').textContent = 'Adjuntar foto del ticket'; openDlg('#dExp', { expense_date: iso(new Date()) }); },
  editExp(id) { const g = S.d.expenses.find(x => x.id === id); $('#dExpT').textContent = 'Editar gasto'; $('#dExp [name=category_id]').innerHTML = catOptions(); $('#fileName').textContent = g.receipt ? 'Cambiar ticket' : 'Adjuntar foto del ticket'; openDlg('#dExp', g); },
  async delExp(id) { if (confirm('¿Eliminar este gasto?')) { try { await api('expense_delete', { id }); toast('Gasto eliminado'); load(); } catch (x) { toast(x.message); } } },
  newCat() { $('#dCatT').textContent = 'Nueva categoría'; $('#catDel').classList.add('hidden'); openDlg('#dCat'); },
  editCat(id) { const c = S.d.categories.find(x => x.id === id); $('#dCatT').textContent = 'Editar categoría'; $('#catDel').classList.remove('hidden'); openDlg('#dCat', c); },
  newSub() { openDlg('#dSub'); },
  async copyCode() { await navigator.clipboard?.writeText(S.d.house.invite_code); toast('Código copiado'); },
  async regen() { if (confirm('El código anterior dejará de funcionar. ¿Continuar?')) { await api('invite_regen', {}); load(); } },
  async toggleRole(id) { const m = S.d.members.find(x => x.id === id); try { await api('member_role', { id, role: m.role === 'admin' ? 'member' : 'admin' }); load(); } catch (x) { toast(x.message); } },
  async rmMember(id) { if (confirm('¿Quitar a esta persona del hogar? Conservará su cuenta con un hogar nuevo.')) { try { await api('member_remove', { id }); load(); } catch (x) { toast(x.message); } } },
  async delSub(id) { if (confirm('¿Eliminar esta suscripción?')) { await api('sub_delete', { id }); load(); } },
  csv() {
    const cat = Object.fromEntries(S.d.categories.map(c => [c.id, c.name])), q = v => `"${String(v ?? '').replace(/"/g, '""')}"`;
    const rows = [['Fecha', 'Concepto', 'Categoría', 'Usuario', 'Importe', 'Nota'], ...S.d.expenses.map(g => [g.expense_date, g.description, cat[g.category_id], g.user_name, g.amount, g.note])];
    const a = Object.assign(document.createElement('a'), { href: URL.createObjectURL(new Blob(['\ufeff' + rows.map(r => r.map(q).join(';')).join('\n')], { type: 'text/csv' })), download: `fardel-${iso(range()[0])}.csv` });
    a.click(); URL.revokeObjectURL(a.href);
  }
};
document.addEventListener('click', e => {
  const seg = e.target.closest('#seg button'); if (seg) { S.period = seg.dataset.p; S.offset = 0; return load(); }
  if (e.target.closest('[data-close]')) return e.target.closest('dialog').close();
  const b = e.target.closest('[data-act]'); if (b) actions[b.dataset.act]?.(b.dataset.id);
});
$('#q').oninput = e => { S.q = e.target.value; drawList(); };
$('#fCat').onchange = e => { S.cat = e.target.value; drawList(); };
boot();
