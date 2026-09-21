/**
 * AURA | Alta Cocina & Brasa de Autor
 * JavaScript Interactivo (ES6+)
 */

// ==========================================
// 1. BASE DE DATOS DE PLATOS (MENÚ GOURMET)
// ==========================================
const MENU_DATA = [
    {
        id: "dish-1",
        title: "Lomo Madurado Dry-Aged (45 días)",
        category: "Brasas & Carnes",
        price: 34.00,
        image: "images/steak.jpg",
        shortDesc: "Asado a la brasa de sarmiento con mantequilla de romero silvestre, patatas ratte confitadas y flor de sal.",
        fullDesc: "Corte noble de lomo alto de vaca vieja con 45 días de maduración controlada. Sellado a fuego vivo en brasa de sarmiento y encina, logrando un exterior caramelizado y un corazón tierno de intenso sabor umami.",
        ingredients: ["Lomo alto de vaca madurada", "Mantequilla de romero", "Patata ratte", "Sal en escamas de manantial", "Pimienta negra de Kampot"],
        pairing: "Marqués de Murrieta Reserva 2019 (D.O. Rioja)",
        tags: [
            { text: "Especialidad Brasa", class: "chef" },
            { text: "Sin Gluten", class: "gluten-free" }
        ],
        allergens: ["Lácteos"]
    },
    {
        id: "dish-2",
        title: "Pulpo de Roca a la Brasa & Parmentier",
        category: "Del Mar",
        price: 26.50,
        image: "images/octopus.jpg",
        shortDesc: "Pata crujiente sobre parmentier cremosa trufada, pimentón de la Vera ahumado y brotes florales.",
        fullDesc: "Pulpo de roca de las costas levantinas cocido a baja temperatura y terminado al fuego de brasa. Se sirve sobre parmentier de patata emulsionada con aceite de trufa blanca y polvo de pimentón de la Vera.",
        ingredients: ["Pulpo de roca del Mediterráneo", "Patata Monalisa", "Aceite de trufa blanca", "Pimentón de la Vera D.O.P.", "Microvegetales"],
        pairing: "Albariño Do Ferreiro 2022 (Rías Baixas)",
        tags: [
            { text: "Icono del Chef", class: "chef" },
            { text: "Sin Gluten", class: "gluten-free" }
        ],
        allergens: ["Moluscos", "Lácteos"]
    },
    {
        id: "dish-3",
        title: "Risotto Meloso de Boletus & Trufa Negra",
        category: "Arroces & Risottos",
        price: 24.00,
        image: "images/risotto.jpg",
        shortDesc: "Arroz carnaroli con fondo de setas de bosque, láminas de trufa negra fresca y teja de Parmigiano Reggiano.",
        fullDesc: "Risotto mantecado con mantequilla francesa y Parmigiano Reggiano 36 meses. Coronado con láminas de trufa negra melanosporum fresca y una crujiente teja de queso.",
        ingredients: ["Arroz Carnaroli", "Boletus edulis silvestres", "Trufa negra Melanosporum", "Parmigiano Reggiano 36 meses", "Caldo reducido de ave y setas"],
        pairing: "Chivite Colección 125 Blanco Fermentado en Barrica",
        tags: [
            { text: "Temporada", class: "chef" },
            { text: "Vegetariano", class: "vegan" }
        ],
        allergens: ["Lácteos", "Sulfitos"]
    },
    {
        id: "dish-4",
        title: "Esfera de Cacao Puro, Oro & Frambuesa",
        category: "Dulce Final",
        price: 13.50,
        image: "images/dessert.jpg",
        shortDesc: "Esfera de chocolate amargo 72%, praliné crujiente de avellana, oro comestible 24k y coulis de frambuesa ácida.",
        fullDesc: "Obra de repostería de vanguardia. La esfera de chocolate fino se funde ante el comensal revelando una crema ligera de vainilla Bourbon, helado artesanal de frutos rojos y crujiente de avellanas tostadas de Reus.",
        ingredients: ["Chocolate Valrhona 72%", "Oro comestible de 24k", "Frambuesas silvestres", "Avellana de Reus", "Vainilla Bourbon de Madagascar"],
        pairing: "Pedro Ximénez Albalá Selección 1999",
        tags: [
            { text: "Postre de Autor", class: "chef" },
            { text: "Vegetariano", class: "vegan" }
        ],
        allergens: ["Lácteos", "Frutos de cáscara", "Soja"]
    },
    {
        id: "dish-5",
        title: "AURA Signature Smoked Cocktail",
        category: "Bodega & Coctelería",
        price: 15.00,
        image: "images/cocktail.jpg",
        shortDesc: "Bourbon envejecido macerado con piel de naranja amarga, bitters artesanos y cúpula de humo aromático de canela.",
        fullDesc: "Un trago sofisticado diseñado para abrir el apetito o prolongar la sobremesa. Servido en cristalería de tallado clásico y coronado con una pompa de humo infusionada con madera de manzano.",
        ingredients: ["Bourbon reserva", "Vermouth rosso artesanal", "Bitter aromático", "Esencia de naranja deshidratada", "Humo de madera de manzano"],
        pairing: "Ideal como aperitivo o maridaje de carnes maduradas",
        tags: [
            { text: "Mixología", class: "chef" }
        ],
        allergens: ["Sulfitos"]
    },
    {
        id: "dish-6",
        title: "Ostras Gillardeau Nº2 con Niebla Cítrica",
        category: "Entrantes de Autor",
        price: 28.00,
        image: "images/hero.jpg",
        shortDesc: "4 unidades de ostras francesas de crianza especial con perlas de lima kaffir y vinagreta de chalota.",
        fullDesc: "Ostras carnosas y de marcado sabor iodado y almendrado, abiertas al momento y presentadas sobre cama de hielo picado con una sutil emulsión de cítricos mediterráneos.",
        ingredients: ["Ostras Gillardeau Nº2", "Lima kaffir", "Chalota francesa", "Cava brut nature", "Flor de sal"],
        pairing: "Champagne Ruinart Blanc de Blancs",
        tags: [
            { text: "Sin Gluten", class: "gluten-free" }
        ],
        allergens: ["Moluscos", "Sulfitos"]
    },
    {
        id: "dish-7",
        title: "Tartar de Atún Rojo de Almadraba & Aguacate",
        category: "Entrantes de Autor",
        price: 22.00,
        image: "images/octopus.jpg",
        shortDesc: "Dados de atún Balfegó aliñados con aceite de sésamo tostado, emulsión de wasabi suave y crujiente de alga nori.",
        fullDesc: "Atún rojo sostenible de la más alta calidad cortado a cuchillo al instante. Armonizado con crema ligera de aguacate de la Axarquía y tostas crujientes de pan sardo.",
        ingredients: ["Atún rojo Balfegó", "Aguacate", "Aceite de sésamo", "Soja envejecida", "Alga nori"],
        pairing: "Fino Tradición En Rama (D.O. Jerez)",
        tags: [
            { text: "Recomendado", class: "chef" }
        ],
        allergens: ["Pescado", "Sésamo", "Soja", "Gluten"]
    },
    {
        id: "dish-8",
        title: "Arroz Meloso del Senyoret de Bogavante",
        category: "Arroces & Risottos",
        price: 29.50,
        image: "images/risotto.jpg",
        shortDesc: "Todo el marisco pelado en su jugo, bogavante azul entero, sepionet de playa y sofrito tradicional de ñoras.",
        fullDesc: "Cocinado en cazuela de hierro con caldo concentrado de roca de fondo marino. Un homenaje sublime a la tradición arrocera valenciana con la máxima nobleza de producto.",
        ingredients: ["Arroz bomba de la Albufera", "Bogavante azul vivo", "Sepionet de playa", "Caldo de roca", "Azafrán en hebra"],
        pairing: "Enate Chardonnay 234 (D.O. Somontano)",
        tags: [
            { text: "Tradición", class: "chef" },
            { text: "Sin Gluten", class: "gluten-free" }
        ],
        allergens: ["Crustáceos", "Pescado", "Moluscos"]
    },
    {
        id: "dish-9",
        title: "Tarta Fluida de Queso Idiazábal Ahumado",
        category: "Dulce Final",
        price: 11.50,
        image: "images/dessert.jpg",
        shortDesc: "Interior cremoso y fundente con notas de humo suave, helado de higos confitados y tierra de galleta de mantequilla.",
        fullDesc: "Horneada diariamente a fuego suave para conseguir un corazón líquido inigualable. El equilibrio idóneo entre el carácter del queso Idiazábal y el dulzor equilibrado.",
        ingredients: ["Queso Idiazábal D.O. ahumado", "Nata fresca 38%", "Huevos de corral camperos", "Higos al Pedro Ximénez", "Mantequilla"],
        pairing: "Sidra de Hielo Valverán 20 Manzanas",
        tags: [
            { text: "Favorito Clientes", class: "chef" }
        ],
        allergens: ["Lácteos", "Huevos", "Gluten"]
    }
];

// ==========================================
// 2. ESTADO DE LA APLICACIÓN
// ==========================================
const AppState = {
    currentCategory: "Todos",
    searchQuery: "",
    cart: [],
    currentModalDish: null,
    modalQty: 1
};

// Cargar carrito desde localStorage
function loadCartFromStorage() {
    try {
        const saved = localStorage.getItem("aura_restaurant_cart");
        if (saved) {
            AppState.cart = JSON.parse(saved);
        }
    } catch (e) {
        console.warn("No se pudo cargar el carrito local", e);
        AppState.cart = [];
    }
}

// Guardar carrito en localStorage
function saveCartToStorage() {
    try {
        localStorage.setItem("aura_restaurant_cart", JSON.stringify(AppState.cart));
    } catch (e) {
        console.warn("No se pudo guardar el carrito", e);
    }
}

// ==========================================
// 3. INDICADOR EN VIVO (HORARIO DE APERTURA)
// ==========================================
function updateLiveStatus() {
    const statusDot = document.getElementById("liveStatusDot");
    const statusText = document.getElementById("liveStatusText");
    if (!statusDot || !statusText) return;

    const now = new Date();
    const day = now.getDay(); // 0 = Domingo, 1 = Lunes, ...
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const currentMinutes = hours * 60 + minutes;

    // Lunes cerrado
    if (day === 1) {
        statusDot.className = "status-dot closed";
        statusText.textContent = "Cerrado hoy por descanso del equipo (Martes a las 13:30h)";
        return;
    }

    // Turno almuerzo: 13:30 a 16:30 (810 a 990 min)
    // Turno cena: 20:30 a 23:30 (1230 a 1410 min)
    const lunchStart = 13 * 60 + 30;
    const lunchEnd = 16 * 60 + 30;
    const dinnerStart = 20 * 60 + 30;
    const dinnerEnd = 23 * 60 + 30;

    if (currentMinutes >= lunchStart && currentMinutes <= lunchEnd) {
        statusDot.className = "status-dot open";
        statusText.textContent = "Abierto ahora • Servicio de Almuerzos (hasta las 16:30h)";
    } else if (currentMinutes >= dinnerStart && currentMinutes <= dinnerEnd) {
        statusDot.className = "status-dot open";
        statusText.textContent = "Abierto ahora • Servicio de Cenas (hasta las 23:30h)";
    } else if (currentMinutes < lunchStart) {
        statusDot.className = "status-dot closed";
        statusText.textContent = "Cerrado ahora • Próximo servicio de almuerzo hoy a las 13:30h";
    } else if (currentMinutes > lunchEnd && currentMinutes < dinnerStart) {
        statusDot.className = "status-dot closed";
        statusText.textContent = "Cocina en descanso • Abrimos cena a las 20:30h";
    } else {
        statusDot.className = "status-dot closed";
        statusText.textContent = "Cerrado por la noche • Próximo servicio a las 13:30h";
    }
}

// ==========================================
// 4. RENDERIZADO DEL MENÚ Y FILTROS
// ==========================================
function initMenuFilters() {
    const filtersContainer = document.getElementById("categoryFilters");
    if (!filtersContainer) return;

    // Obtener categorías únicas
    const categories = ["Todos", ...new Set(MENU_DATA.map(d => d.category))];

    filtersContainer.innerHTML = categories.map(cat => `
        <button class="filter-btn ${cat === AppState.currentCategory ? 'active' : ''}" data-category="${cat}">
            ${cat}
        </button>
    `).join("");

    filtersContainer.addEventListener("click", (e) => {
        const btn = e.target.closest(".filter-btn");
        if (!btn) return;
        const category = btn.dataset.category;
        AppState.currentCategory = category;

        // Actualizar clase activa
        document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        renderMenu();
    });
}

function renderMenu() {
    const grid = document.getElementById("menuGrid");
    const emptyState = document.getElementById("menuEmptyState");
    if (!grid) return;

    // Filtrar por categoría y búsqueda
    const filtered = MENU_DATA.filter(dish => {
        const matchesCategory = AppState.currentCategory === "Todos" || dish.category === AppState.currentCategory;
        const query = AppState.searchQuery.toLowerCase().trim();
        const matchesSearch = !query || 
            dish.title.toLowerCase().includes(query) ||
            dish.shortDesc.toLowerCase().includes(query) ||
            dish.category.toLowerCase().includes(query) ||
            dish.ingredients.some(ing => ing.toLowerCase().includes(query));

        return matchesCategory && matchesSearch;
    });

    if (filtered.length === 0) {
        grid.innerHTML = "";
        if (emptyState) emptyState.style.display = "block";
        return;
    }

    if (emptyState) emptyState.style.display = "none";

    grid.innerHTML = filtered.map(dish => {
        const tagsHtml = dish.tags.map(t => `<span class="tag-pill ${t.class}">${t.text}</span>`).join("");
        const formattedPrice = dish.price.toFixed(2).replace(".", ",") + " €";

        return `
            <article class="dish-card" data-id="${dish.id}">
                <div class="dish-thumbnail" onclick="openDishModal('${dish.id}')">
                    <img src="${dish.image}" alt="${dish.title}" loading="lazy">
                    <span class="dish-badge">${dish.category}</span>
                </div>
                <div class="dish-content">
                    <div class="dish-header">
                        <h3 class="dish-title" onclick="openDishModal('${dish.id}')">${dish.title}</h3>
                        <span class="dish-price">${formattedPrice}</span>
                    </div>
                    <p class="dish-desc">${dish.shortDesc}</p>
                    <div class="dish-meta">${tagsHtml}</div>
                    <div class="dish-actions">
                        <button class="btn-details" onclick="openDishModal('${dish.id}')">
                            Ver Detalles
                        </button>
                        <button class="btn-add-cart" onclick="addToCart('${dish.id}', 1)">
                            <span>+ Añadir</span>
                        </button>
                    </div>
                </div>
            </article>
        `;
    }).join("");
}

// Búsqueda en tiempo real
function initMenuSearch() {
    const input = document.getElementById("menuSearchInput");
    const clearBtn = document.getElementById("clearSearchBtn");
    const resetBtn = document.getElementById("resetFiltersBtn");

    if (input) {
        input.addEventListener("input", (e) => {
            AppState.searchQuery = e.target.value;
            if (clearBtn) {
                clearBtn.style.display = AppState.searchQuery.length > 0 ? "block" : "none";
            }
            renderMenu();
        });
    }

    if (clearBtn) {
        clearBtn.addEventListener("click", () => {
            if (input) input.value = "";
            AppState.searchQuery = "";
            clearBtn.style.display = "none";
            renderMenu();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener("click", () => {
            if (input) input.value = "";
            AppState.searchQuery = "";
            AppState.currentCategory = "Todos";
            if (clearBtn) clearBtn.style.display = "none";

            document.querySelectorAll(".filter-btn").forEach(b => {
                b.classList.toggle("active", b.dataset.category === "Todos");
            });

            renderMenu();
        });
    }
}

// ==========================================
// 5. MODAL DE DETALLE DE PLATO
// ==========================================
function openDishModal(dishId) {
    const dish = MENU_DATA.find(d => d.id === dishId);
    if (!dish) return;

    AppState.currentModalDish = dish;
    AppState.modalQty = 1;

    document.getElementById("modalDishImg").src = dish.image;
    document.getElementById("modalDishImg").alt = dish.title;
    document.getElementById("modalDishCategory").textContent = dish.category;
    document.getElementById("modalDishTitle").textContent = dish.title;
    document.getElementById("modalDishPrice").textContent = dish.price.toFixed(2).replace(".", ",") + " €";
    document.getElementById("modalDishDesc").textContent = dish.fullDesc;
    document.getElementById("modalDishIngredients").textContent = dish.ingredients.join(", ") + ".";
    document.getElementById("modalDishPairing").textContent = dish.pairing;
    document.getElementById("modalQtyValue").textContent = AppState.modalQty;

    // Alérgenos
    const allergensContainer = document.getElementById("modalDishAllergens");
    if (allergensContainer) {
        allergensContainer.innerHTML = dish.allergens.length > 0
            ? dish.allergens.map(a => `<span class="tag-pill">${a}</span>`).join("")
            : `<span class="tag-pill">No contiene alérgenos principales</span>`;
    }

    const overlay = document.getElementById("dishModalOverlay");
    if (overlay) overlay.classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeDishModal() {
    const overlay = document.getElementById("dishModalOverlay");
    if (overlay) overlay.classList.remove("active");
    document.body.style.overflow = "";
    AppState.currentModalDish = null;
}

function initModalEvents() {
    const overlay = document.getElementById("dishModalOverlay");
    const closeBtn = document.getElementById("closeDishModalBtn");
    const minusBtn = document.getElementById("modalQtyMinus");
    const plusBtn = document.getElementById("modalQtyPlus");
    const addBtn = document.getElementById("modalAddToCartBtn");

    if (closeBtn) closeBtn.addEventListener("click", closeDishModal);

    if (overlay) {
        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) closeDishModal();
        });
    }

    if (minusBtn) {
        minusBtn.addEventListener("click", () => {
            if (AppState.modalQty > 1) {
                AppState.modalQty--;
                document.getElementById("modalQtyValue").textContent = AppState.modalQty;
            }
        });
    }

    if (plusBtn) {
        plusBtn.addEventListener("click", () => {
            if (AppState.modalQty < 20) {
                AppState.modalQty++;
                document.getElementById("modalQtyValue").textContent = AppState.modalQty;
            }
        });
    }

    if (addBtn) {
        addBtn.addEventListener("click", () => {
            if (AppState.currentModalDish) {
                addToCart(AppState.currentModalDish.id, AppState.modalQty);
                closeDishModal();
            }
        });
    }

    // Tecla Escape para cerrar modales
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeDishModal();
            closeCartDrawer();
            closeSuccessModals();
        }
    });
}

// ==========================================
// 6. CARRITO & COMANDA (OFF-CANVAS DRAWER)
// ==========================================
function addToCart(dishId, qty = 1) {
    const dish = MENU_DATA.find(d => d.id === dishId);
    if (!dish) return;

    const existingIndex = AppState.cart.findIndex(item => item.id === dishId);
    if (existingIndex > -1) {
        AppState.cart[existingIndex].quantity += qty;
    } else {
        AppState.cart.push({
            id: dish.id,
            title: dish.title,
            price: dish.price,
            image: dish.image,
            quantity: qty
        });
    }

    saveCartToStorage();
    updateCartUI();
    showToast(`Añadido: ${dish.title} (x${qty})`, "🛍️");
}

function updateCartQuantity(dishId, delta) {
    const index = AppState.cart.findIndex(i => i.id === dishId);
    if (index === -1) return;

    AppState.cart[index].quantity += delta;
    if (AppState.cart[index].quantity <= 0) {
        AppState.cart.splice(index, 1);
    }

    saveCartToStorage();
    updateCartUI();
}

function removeFromCart(dishId) {
    AppState.cart = AppState.cart.filter(i => i.id !== dishId);
    saveCartToStorage();
    updateCartUI();
    showToast("Plato eliminado de la comanda", "🗑️");
}

function updateCartUI() {
    const badge = document.getElementById("cartBadge");
    const drawerCount = document.getElementById("cartDrawerCount");
    const cartBody = document.getElementById("cartBody");
    const subtotalEl = document.getElementById("cartSubtotal");
    const taxEl = document.getElementById("cartTax");
    const grandTotalEl = document.getElementById("cartGrandTotal");
    const checkoutBtn = document.getElementById("checkoutBtn");

    const totalCount = AppState.cart.reduce((sum, item) => sum + item.quantity, 0);

    if (badge) {
        badge.textContent = totalCount;
        badge.style.transform = "scale(1.3)";
        setTimeout(() => { badge.style.transform = "scale(1)"; }, 200);
    }

    if (drawerCount) {
        drawerCount.textContent = `${totalCount} ${totalCount === 1 ? 'plato' : 'platos'}`;
    }

    if (!cartBody) return;

    if (AppState.cart.length === 0) {
        cartBody.innerHTML = `
            <div class="cart-empty">
                <span>🍽️</span>
                <p>Tu comanda está vacía</p>
                <small>Explora nuestra carta y añade tus platos favoritos.</small>
            </div>
        `;
        if (subtotalEl) subtotalEl.textContent = "0,00 €";
        if (taxEl) taxEl.textContent = "0,00 €";
        if (grandTotalEl) grandTotalEl.textContent = "0,00 €";
        if (checkoutBtn) checkoutBtn.disabled = true;
        return;
    }

    if (checkoutBtn) checkoutBtn.disabled = false;

    // Renderizar items
    cartBody.innerHTML = AppState.cart.map(item => `
        <div class="cart-item">
            <img src="${item.image}" alt="${item.title}" class="cart-item-img">
            <div class="cart-item-info">
                <h4 class="cart-item-title">${item.title}</h4>
                <div class="cart-item-price">${(item.price * item.quantity).toFixed(2).replace(".", ",")} €</div>
            </div>
            <div class="cart-item-controls">
                <button class="cart-qty-btn" onclick="updateCartQuantity('${item.id}', -1)">-</button>
                <span class="cart-item-qty">${item.quantity}</span>
                <button class="cart-qty-btn" onclick="updateCartQuantity('${item.id}', 1)">+</button>
            </div>
            <button class="cart-item-remove" onclick="removeFromCart('${item.id}')" title="Eliminar plato">✕</button>
        </div>
    `).join("");

    // Totales (IVA 10% incluido en precio de hostelería)
    const grandTotal = AppState.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const subtotal = grandTotal / 1.10;
    const tax = grandTotal - subtotal;

    if (subtotalEl) subtotalEl.textContent = subtotal.toFixed(2).replace(".", ",") + " €";
    if (taxEl) taxEl.textContent = tax.toFixed(2).replace(".", ",") + " €";
    if (grandTotalEl) grandTotalEl.textContent = grandTotal.toFixed(2).replace(".", ",") + " €";
}

function openCartDrawer() {
    const drawer = document.getElementById("cartDrawer");
    const overlay = document.getElementById("cartOverlay");
    if (drawer) {
        drawer.classList.add("active");
        drawer.setAttribute("aria-hidden", "false");
    }
    if (overlay) overlay.classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeCartDrawer() {
    const drawer = document.getElementById("cartDrawer");
    const overlay = document.getElementById("cartOverlay");
    if (drawer) {
        drawer.classList.remove("active");
        drawer.setAttribute("aria-hidden", "true");
    }
    if (overlay) overlay.classList.remove("active");
    document.body.style.overflow = "";
}

function initCartEvents() {
    const openBtn = document.getElementById("openCartBtn");
    const closeBtn = document.getElementById("closeCartBtn");
    const overlay = document.getElementById("cartOverlay");
    const checkoutBtn = document.getElementById("checkoutBtn");

    if (openBtn) openBtn.addEventListener("click", openCartDrawer);
    if (closeBtn) closeBtn.addEventListener("click", closeCartDrawer);
    if (overlay) overlay.addEventListener("click", closeCartDrawer);

    if (checkoutBtn) {
        checkoutBtn.addEventListener("click", () => {
            if (AppState.cart.length === 0) {
                showToast("Tu comanda está vacía", "⚠️");
                return;
            }

            const notesInput = document.getElementById("orderNotes");
            const notes = notesInput ? notesInput.value.trim() : "";
            const totalCount = AppState.cart.reduce((sum, item) => sum + item.quantity, 0);
            const grandTotal = AppState.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const orderCode = "AUR-ORD-" + Math.floor(1000 + Math.random() * 9000);

            // Generar ticket resumen
            const orderSummaryEl = document.getElementById("orderTicketSummary");
            if (orderSummaryEl) {
                orderSummaryEl.innerHTML = `
                    <div class="ticket-line">
                        <span class="ticket-label">Nº de Comanda:</span>
                        <span class="ticket-value gold">${orderCode}</span>
                    </div>
                    <div class="ticket-line">
                        <span class="ticket-label">Platos solicitados:</span>
                        <span class="ticket-value">${totalCount} platos</span>
                    </div>
                    <div class="ticket-line">
                        <span class="ticket-label">Total Comanda:</span>
                        <span class="ticket-value gold">${grandTotal.toFixed(2).replace(".", ",")} €</span>
                    </div>
                    <div class="ticket-line">
                        <span class="ticket-label">Tiempo estimado de recogida:</span>
                        <span class="ticket-value">35 minutos</span>
                    </div>
                    ${notes ? `
                    <div class="ticket-line">
                        <span class="ticket-label">Notas cocina:</span>
                        <span class="ticket-value">"${notes}"</span>
                    </div>` : ""}
                `;
            }

            // Limpiar carrito y cerrar drawer
            AppState.cart = [];
            if (notesInput) notesInput.value = "";
            saveCartToStorage();
            updateCartUI();
            closeCartDrawer();

            // Abrir modal de éxito
            const successOverlay = document.getElementById("orderSuccessOverlay");
            if (successOverlay) {
                successOverlay.classList.add("active");
                document.body.style.overflow = "hidden";
            }
        });
    }

    const closeOrderSuccessBtn = document.getElementById("closeOrderSuccessBtn");
    if (closeOrderSuccessBtn) {
        closeOrderSuccessBtn.addEventListener("click", () => {
            const successOverlay = document.getElementById("orderSuccessOverlay");
            if (successOverlay) successOverlay.classList.remove("active");
            document.body.style.overflow = "";
        });
    }
}

// ==========================================
// 7. SISTEMA DE RESERVAS DE MESAS
// ==========================================
function initReservations() {
    const form = document.getElementById("reservationForm");
    const dateInput = document.getElementById("resDate");

    // Fecha mínima: hoy
    if (dateInput) {
        const today = new Date().toISOString().split("T")[0];
        dateInput.min = today;
        dateInput.value = today;
    }

    if (!form) return;

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        // Validaciones
        const nameInput = document.getElementById("resName");
        const phoneInput = document.getElementById("resPhone");
        const emailInput = document.getElementById("resEmail");
        const guestsInput = document.getElementById("resGuests");
        const timeInput = document.getElementById("resTime");
        const zoneInput = document.getElementById("resZone");
        const notesInput = document.getElementById("resNotes");

        let isValid = true;

        // Validar Nombre
        if (!nameInput.value.trim() || nameInput.value.trim().length < 3) {
            setFieldError(nameInput, "Introduce un nombre y apellidos válidos");
            isValid = false;
        } else {
            clearFieldError(nameInput);
        }

        // Validar Teléfono
        const phoneRegex = /^[+]?[0-9\s\-]{8,15}$/;
        if (!phoneRegex.test(phoneInput.value.trim())) {
            setFieldError(phoneInput, "Introduce un teléfono válido");
            isValid = false;
        } else {
            clearFieldError(phoneInput);
        }

        // Validar Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            setFieldError(emailInput, "Introduce un correo electrónico válido");
            isValid = false;
        } else {
            clearFieldError(emailInput);
        }

        // Validar Fecha
        if (!dateInput.value) {
            setFieldError(dateInput, "Selecciona una fecha válida");
            isValid = false;
        } else {
            clearFieldError(dateInput);
        }

        if (!isValid) return;

        // Crear Reserva Exitosa
        const resCode = "AUR-RES-" + Math.floor(1000 + Math.random() * 9000);
        const ticketSummary = document.getElementById("resTicketSummary");
        
        if (ticketSummary) {
            // Formatear fecha en formato legible español
            const dateParts = dateInput.value.split("-");
            const formattedDate = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;

            ticketSummary.innerHTML = `
                <div class="ticket-line">
                    <span class="ticket-label">Código de Reserva:</span>
                    <span class="ticket-value gold">${resCode}</span>
                </div>
                <div class="ticket-line">
                    <span class="ticket-label">Titular:</span>
                    <span class="ticket-value">${nameInput.value.trim()}</span>
                </div>
                <div class="ticket-line">
                    <span class="ticket-label">Fecha y Turno:</span>
                    <span class="ticket-value">${formattedDate} a las ${timeInput.value} h</span>
                </div>
                <div class="ticket-line">
                    <span class="ticket-label">Comensales:</span>
                    <span class="ticket-value">${guestsInput.value} personas</span>
                </div>
                <div class="ticket-line">
                    <span class="ticket-label">Espacio:</span>
                    <span class="ticket-value">${zoneInput.value}</span>
                </div>
                ${notesInput.value.trim() ? `
                <div class="ticket-line">
                    <span class="ticket-label">Observaciones:</span>
                    <span class="ticket-value">"${notesInput.value.trim()}"</span>
                </div>` : ""}
            `;
        }

        // Abrir Modal de Éxito
        const resSuccessModal = document.getElementById("resSuccessOverlay");
        if (resSuccessModal) {
            resSuccessModal.classList.add("active");
            document.body.style.overflow = "hidden";
        }

        // Limpiar formulario
        form.reset();
        if (dateInput) {
            dateInput.value = new Date().toISOString().split("T")[0];
        }
        showToast("¡Reserva completada con éxito!", "✨");
    });

    const closeResBtn = document.getElementById("closeResSuccessBtn");
    if (closeResBtn) {
        closeResBtn.addEventListener("click", () => {
            const resSuccessModal = document.getElementById("resSuccessOverlay");
            if (resSuccessModal) resSuccessModal.classList.remove("active");
            document.body.style.overflow = "";
        });
    }
}

function setFieldError(input, msg) {
    const group = input.closest(".form-group");
    if (!group) return;
    group.classList.add("has-error");
    const errorEl = group.querySelector(".error-msg");
    if (errorEl) errorEl.textContent = msg;
}

function clearFieldError(input) {
    const group = input.closest(".form-group");
    if (!group) return;
    group.classList.remove("has-error");
    const errorEl = group.querySelector(".error-msg");
    if (errorEl) errorEl.textContent = "";
}

function closeSuccessModals() {
    const resSuccessModal = document.getElementById("resSuccessOverlay");
    const orderSuccessModal = document.getElementById("orderSuccessOverlay");
    if (resSuccessModal) resSuccessModal.classList.remove("active");
    if (orderSuccessModal) orderSuccessModal.classList.remove("active");
    document.body.style.overflow = "";
}

// ==========================================
// 8. NOTIFICACIONES TOAST
// ==========================================
function showToast(message, icon = "✦") {
    const container = document.getElementById("toastContainer");
    if (!container) return;

    const toast = document.createElement("div");
    toast.className = "toast";
    toast.innerHTML = `
        <span class="toast-icon">${icon}</span>
        <span class="toast-text">${message}</span>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.add("toast-hiding");
        setTimeout(() => {
            if (toast.parentNode) toast.parentNode.removeChild(toast);
        }, 300);
    }, 3500);
}

// ==========================================
// 9. NAVEGACIÓN MÓVIL & SCROLL ACTIVO
// ==========================================
function initNavigation() {
    const toggle = document.getElementById("mobileToggle");
    const nav = document.getElementById("mainNav");
    const navLinks = document.querySelectorAll(".nav-link");

    if (toggle && nav) {
        toggle.addEventListener("click", () => {
            nav.classList.toggle("active");
        });
    }

    navLinks.forEach(link => {
        link.addEventListener("click", () => {
            if (nav) nav.classList.remove("active");
        });
    });

    // Resaltar enlace activo según la sección visible
    const sections = document.querySelectorAll("main section[id], main[id]");
    window.addEventListener("scroll", () => {
        let currentSection = "";
        const scrollPosition = window.scrollY + 120;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = section.getAttribute("id");
            }
        });

        navLinks.forEach(link => {
            link.classList.toggle("active", link.getAttribute("href") === `#${currentSection}`);
        });
    });
}

// ==========================================
// 10. INICIALIZACIÓN GLOBAL
// ==========================================
document.addEventListener("DOMContentLoaded", () => {
    updateLiveStatus();
    setInterval(updateLiveStatus, 60000); // Comprobar cada minuto

    loadCartFromStorage();
    initMenuFilters();
    initMenuSearch();
    renderMenu();
    updateCartUI();

    initModalEvents();
    initCartEvents();
    initReservations();
    initNavigation();

    // Mensaje de bienvenida sutil
    setTimeout(() => {
        showToast("Bienvenido a AURA. Disfruta de la experiencia.", "✦");
    }, 1200);
});
