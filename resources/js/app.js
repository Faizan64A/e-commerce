const CART_KEY = 'ruh_cart_items';
const FAV_KEY = 'ruh_favourites';
const USER_KEY = 'ruh_user';
const BUY_NOW_KEY = 'ruh_buy_now';
const PROFILE_KEY = 'ruh_profile';

function readJson(key, fallback) {
    try {
        const raw = localStorage.getItem(key);
        return raw ? JSON.parse(raw) : fallback;
    } catch {
        return fallback;
    }
}

function writeJson(key, value) {
    localStorage.setItem(key, JSON.stringify(value));
}

function money(value) {
    return `₨${Number(value).toLocaleString()}`;
}

function catalog() {
    return Array.isArray(window.RUH_CATALOG) ? window.RUH_CATALOG : [];
}

function findProduct(id) {
    return catalog().find((item) => Number(item.id) === Number(id)) || null;
}

function showToast(message) {
    let toast = document.querySelector('.toast');
    if (! toast) {
        toast = document.createElement('div');
        toast.className = 'toast';
        document.body.appendChild(toast);
    }

    toast.textContent = message;
    toast.classList.add('is-visible');
    clearTimeout(showToast.timer);
    showToast.timer = setTimeout(() => toast.classList.remove('is-visible'), 2200);
}

function cartItems() {
    const items = readJson(CART_KEY, []);
    return Array.isArray(items) ? items : [];
}

function favIds() {
    const ids = readJson(FAV_KEY, []);
    return Array.isArray(ids) ? ids.map(Number) : [];
}

function currentUser() {
    return readJson(USER_KEY, null);
}

function updateAuthLinks() {
    const loggedIn = Boolean(currentUser());
    document.querySelectorAll('[data-guest-only]').forEach((el) => {
        el.classList.toggle('is-hidden', loggedIn);
    });
    document.querySelectorAll('[data-user-only]').forEach((el) => {
        el.classList.toggle('is-hidden', ! loggedIn);
    });
}

function updateHeaderCounts() {
    const cartTotal = cartItems().reduce((sum, item) => sum + (item.quantity || 0), 0);
    const favTotal = favIds().length;

    document.querySelectorAll('[data-cart-count]').forEach((el) => {
        el.textContent = String(cartTotal);
        el.classList.toggle('hidden', cartTotal === 0);
        el.classList.toggle('flex', cartTotal > 0);
    });

    document.querySelectorAll('[data-fav-count]').forEach((el) => {
        el.textContent = String(favTotal);
        el.classList.toggle('hidden', favTotal === 0);
        el.classList.toggle('flex', favTotal > 0);
    });

    document.querySelectorAll('[data-toggle-fav]').forEach((button) => {
        const id = Number(button.dataset.productId);
        const active = favIds().includes(id);
        button.classList.toggle('bg-rose-500', active);
        button.classList.toggle('text-white', active);
        const icon = button.querySelector('[data-heart-icon]');
        if (icon) {
            icon.setAttribute('fill', active ? 'currentColor' : 'none');
        }
        if (button.id === 'wishlist-btn') {
            button.textContent = active ? 'Remove from Wishlist' : 'Add to Wishlist';
            button.classList.toggle('bg-rose-100', active);
        }
    });
}

function addToCart(product, quantity = 1) {
    const items = cartItems();
    const existing = items.find((item) => Number(item.id) === Number(product.id));

    if (existing) {
        existing.quantity += quantity;
    } else {
        items.push({ ...product, quantity });
    }

    writeJson(CART_KEY, items);
    updateHeaderCounts();
    showToast('Product added to cart');
}

function setCartQuantity(id, quantity) {
    const next = cartItems()
        .map((item) => Number(item.id) === Number(id) ? { ...item, quantity: Math.max(1, quantity) } : item)
        .filter((item) => item.quantity > 0);
    writeJson(CART_KEY, next);
    updateHeaderCounts();
    initCartPage();
    initCheckoutPage();
}

function removeCartItem(id) {
    writeJson(CART_KEY, cartItems().filter((item) => Number(item.id) !== Number(id)));
    updateHeaderCounts();
    showToast('Item removed from cart');
    initCartPage();
    initCheckoutPage();
}

function toggleFavourite(id) {
    const ids = favIds();
    const next = ids.includes(id) ? ids.filter((value) => value !== id) : [...ids, id];
    writeJson(FAV_KEY, next);
    updateHeaderCounts();
    showToast(next.includes(id) ? 'Added to favorites' : 'Removed from favorites');
    initFavoritesPage();
}

function initMobileMenu() {
    const button = document.getElementById('mobile-menu-btn');
    const drawer = document.getElementById('mobile-drawer');
    const closeBtn = document.getElementById('mobile-menu-close');
    const backdrop = document.getElementById('mobile-drawer-backdrop');
    if (! button || ! drawer) {
        return;
    }

    const open = () => {
        drawer.classList.remove('hidden');
        document.body.classList.add('drawer-open');
        button.setAttribute('aria-expanded', 'true');
    };
    const close = () => {
        drawer.classList.add('hidden');
        document.body.classList.remove('drawer-open');
        button.setAttribute('aria-expanded', 'false');
    };

    button.addEventListener('click', open);
    closeBtn?.addEventListener('click', close);
    backdrop?.addEventListener('click', close);
}

function initCardGalleries() {
    document.querySelectorAll('[data-card-gallery]').forEach((gallery) => {
        const scroller = gallery.querySelector('[data-card-scroller]');
        if (! scroller) {
            return;
        }

        let timer = null;
        let index = 0;
        const slides = scroller.querySelectorAll('img');

        gallery.addEventListener('mouseenter', () => {
            if (slides.length < 2) {
                return;
            }
            clearInterval(timer);
            timer = setInterval(() => {
                index = (index + 1) % slides.length;
                scroller.scrollTo({ left: scroller.clientWidth * index, behavior: 'smooth' });
            }, 3000);
        });

        gallery.addEventListener('mouseleave', () => {
            clearInterval(timer);
            index = 0;
            scroller.scrollTo({ left: 0, behavior: 'smooth' });
        });
    });
}

function initProductDetail() {
    const page = document.querySelector('[data-product-detail]');
    if (! page) {
        return;
    }

    const images = [...document.querySelectorAll('[data-thumb]')].map((thumb) => thumb.dataset.src);
    const mainImage = document.getElementById('main-product-image');
    const thumbs = document.querySelectorAll('[data-thumb]');
    let selected = 0;
    const stock = Number(page.dataset.stock || 10);
    let quantity = 1;
    const qtyValue = document.getElementById('qty-value');
    const buyTotal = document.querySelector('[data-buy-total]');
    const addButton = page.querySelector('[data-add-to-cart]');
    const unitPrice = Number(addButton?.dataset.productPrice || 0);

    function renderImage() {
        if (! mainImage || images.length === 0) {
            return;
        }
        mainImage.src = images[selected];
        thumbs.forEach((thumb, index) => {
            const active = index === selected;
            thumb.classList.toggle('border-rose-500', active);
            thumb.classList.toggle('shadow-lg', active);
            thumb.classList.toggle('ring-2', active);
            thumb.classList.toggle('ring-rose-200', active);
            thumb.classList.toggle('border-gray-200', ! active);
        });
    }

    function renderQuantity() {
        if (qtyValue) {
            qtyValue.textContent = String(quantity);
        }
        if (buyTotal) {
            buyTotal.textContent = (unitPrice * quantity).toLocaleString();
        }
        if (addButton) {
            addButton.dataset.quantity = String(quantity);
        }
    }

    document.getElementById('prev-image')?.addEventListener('click', () => {
        selected = selected === 0 ? images.length - 1 : selected - 1;
        renderImage();
    });

    document.getElementById('next-image')?.addEventListener('click', () => {
        selected = selected === images.length - 1 ? 0 : selected + 1;
        renderImage();
    });

    thumbs.forEach((thumb) => {
        thumb.addEventListener('click', () => {
            selected = Number(thumb.dataset.index);
            renderImage();
        });
    });

    document.getElementById('qty-minus')?.addEventListener('click', () => {
        quantity = Math.max(1, quantity - 1);
        renderQuantity();
    });

    document.getElementById('qty-plus')?.addEventListener('click', () => {
        quantity = Math.min(stock, quantity + 1);
        renderQuantity();
    });

    document.getElementById('buy-now')?.addEventListener('click', () => {
        if (! addButton) {
            return;
        }
        writeJson(BUY_NOW_KEY, {
            id: Number(addButton.dataset.productId),
            name: addButton.dataset.productName,
            price: Number(addButton.dataset.productPrice),
            image: addButton.dataset.productImage,
            quantity,
        });
        showToast('Redirecting to checkout...');
        window.location.href = '/checkout?source=buy_now';
    });

    document.querySelectorAll('.tab-btn').forEach((button) => {
        button.addEventListener('click', () => {
            const tab = button.dataset.tab;
            document.querySelectorAll('.tab-btn').forEach((item) => {
                item.classList.remove('border-b-2', 'border-rose-500', 'bg-gradient-to-r', 'from-rose-50', 'to-purple-50', 'text-rose-600');
                item.classList.add('text-gray-600');
            });
            button.classList.add('border-b-2', 'border-rose-500', 'bg-gradient-to-r', 'from-rose-50', 'to-purple-50', 'text-rose-600');
            button.classList.remove('text-gray-600');
            document.querySelectorAll('.tab-panel').forEach((panel) => panel.classList.add('hidden'));
            document.getElementById(`tab-${tab}`)?.classList.remove('hidden');
        });
    });
}

function checkoutItems() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('source') === 'buy_now') {
        const item = readJson(BUY_NOW_KEY, null);
        return item ? [item] : [];
    }
    return cartItems();
}

function initCartPage() {
    const empty = document.getElementById('cart-empty');
    const filled = document.getElementById('cart-filled');
    const list = document.getElementById('cart-items');
    const summary = document.getElementById('cart-summary');
    if (! empty || ! filled || ! list) {
        return;
    }

    const items = cartItems();
    if (items.length === 0) {
        empty.classList.remove('hidden');
        empty.classList.add('flex');
        filled.classList.add('hidden');
        filled.classList.remove('grid');
        return;
    }

    empty.classList.add('hidden');
    empty.classList.remove('flex');
    filled.classList.remove('hidden');
    filled.classList.add('grid');

    const shipping = 500;
    const subtotal = items.reduce((sum, item) => sum + item.price * item.quantity, 0);
    const tax = subtotal * 0.08;
    const total = subtotal + shipping + tax;

    list.innerHTML = items.map((item) => `
        <div class="flex items-start gap-3 border-b border-slate-100 py-3 sm:items-center sm:gap-4">
            <img src="${item.image}" alt="${item.name}" class="h-20 w-20 shrink-0 rounded-xl object-cover sm:h-24 sm:w-24">
            <div class="min-w-0 flex-1">
                <h4 class="truncate text-sm font-semibold text-slate-800 sm:text-lg">${item.name}</h4>
                <a href="/product/${item.id}" class="text-xs font-medium text-rose-600">View</a>
                <p class="mt-1 text-sm font-bold text-slate-800">${money(item.price)}</p>
                <div class="mt-2 flex items-center justify-between gap-3">
                    <div class="flex items-center overflow-hidden rounded-lg border border-slate-200">
                        <button type="button" class="h-8 w-8" data-qty-change="${item.id}" data-delta="-1">−</button>
                        <span class="w-8 text-center text-sm">${item.quantity}</span>
                        <button type="button" class="h-8 w-8" data-qty-change="${item.id}" data-delta="1">+</button>
                    </div>
                    <button type="button" class="text-sm font-semibold text-rose-500" data-remove-item="${item.id}">Remove</button>
                </div>
            </div>
        </div>
    `).join('');

    if (summary) {
        summary.innerHTML = items.map((item) => `
            <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                <span class="font-medium">${item.name} x ${item.quantity}</span>
                <span>${money(item.price * item.quantity)}</span>
            </div>
        `).join('') + `
            <div class="flex justify-between border-t border-gray-300 pt-4 text-xl font-bold text-gray-900">
                <span>Total</span><span>${money(total)}</span>
            </div>
        `;
    }
}

function initCheckoutPage() {
    const list = document.getElementById('checkout-items');
    if (! list) {
        return;
    }

    const items = checkoutItems();
    const shipping = 500;
    const subtotal = items.reduce((sum, item) => sum + Number(item.price) * Number(item.quantity), 0);

    list.innerHTML = items.length === 0
        ? '<p class="text-center text-gray-600">No items in the cart.</p>'
        : items.map((item) => `
            <div class="flex items-center gap-3 rounded-2xl bg-slate-50 p-3 sm:gap-6 sm:p-4">
                <img src="${item.image}" alt="${item.name}" class="h-16 w-16 shrink-0 rounded-xl object-cover sm:h-20 sm:w-20">
                <div class="min-w-0 flex-1">
                    <h3 class="truncate text-sm font-bold text-slate-800 sm:text-lg">${item.name}</h3>
                    <p class="text-xs text-slate-600 sm:text-sm">Qty: <span class="font-semibold">${item.quantity}</span></p>
                </div>
                <p class="shrink-0 text-base font-bold text-rose-600 sm:text-2xl">${money(item.price * item.quantity)}</p>
            </div>
        `).join('');

    const subtotalEl = document.getElementById('checkout-subtotal');
    const totalEl = document.getElementById('checkout-total');
    if (subtotalEl) {
        subtotalEl.textContent = money(subtotal);
    }
    if (totalEl) {
        totalEl.textContent = money(subtotal + shipping);
    }

    const profile = readJson(PROFILE_KEY, currentUser() || {});
    const form = document.getElementById('checkout-form');
    if (form && profile) {
        Object.entries(profile).forEach(([key, value]) => {
            if (form.elements[key]) {
                form.elements[key].value = value;
            }
        });
    }

    document.getElementById('place-order')?.addEventListener('click', () => {
        if (! form?.reportValidity()) {
            showToast('Please fill in all required fields');
            return;
        }
        if (items.length === 0) {
            showToast('Your cart is empty');
            return;
        }
        const orderId = `RC-${Date.now().toString().slice(-8)}`;
        document.getElementById('order-id').textContent = orderId;
        document.getElementById('order-success').classList.remove('hidden');
        document.getElementById('order-success').classList.add('flex');
        localStorage.removeItem(CART_KEY);
        localStorage.removeItem(BUY_NOW_KEY);
        updateHeaderCounts();
    }, { once: true });
}

function productCardHtml(product) {
    return `
        <article class="w-full overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
            <a href="/product/${product.id}">
                <img src="${product.images[0]}" alt="${product.name}" class="h-44 w-full object-cover sm:h-56">
                <h3 class="line-clamp-2 p-2.5 text-sm font-bold text-slate-800 sm:p-4 sm:text-base">${product.name}</h3>
            </a>
            <div class="px-2.5 pb-2.5 sm:px-4 sm:pb-4">
                <p class="mb-2 text-base font-extrabold">${money(product.price)}</p>
                <div class="flex gap-1.5">
                    <button type="button" class="flex-1 rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 py-2 text-xs font-semibold text-white sm:text-sm" data-add-to-cart data-product-id="${product.id}" data-product-name="${product.name}" data-product-price="${product.price}" data-product-image="${product.images[0]}">Add</button>
                    <button type="button" class="rounded-xl border border-rose-200 px-2 text-xs font-semibold text-rose-600" data-toggle-fav data-product-id="${product.id}">Remove</button>
                </div>
            </div>
        </article>
    `;
}

function initFavoritesPage() {
    const grid = document.getElementById('favorites-grid');
    const empty = document.getElementById('favorites-empty');
    const label = document.getElementById('fav-count-label');
    if (! grid || ! empty) {
        return;
    }

    const products = favIds().map(findProduct).filter(Boolean);
    if (label) {
        label.textContent = `${products.length} ${products.length === 1 ? 'item' : 'items'}`;
    }

    if (products.length === 0) {
        empty.classList.remove('hidden');
        grid.innerHTML = '';
        return;
    }

    empty.classList.add('hidden');
    grid.innerHTML = products.map(productCardHtml).join('');
}

function initAuthForm() {
    const form = document.getElementById('auth-form');
    if (form) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const data = Object.fromEntries(new FormData(form).entries());
            const users = readJson('ruh_users', []);
            const mode = form.dataset.authMode;

            if (mode === 'register') {
                if (users.some((user) => user.email === data.email)) {
                    showToast('Email may already exist');
                    return;
                }
                users.push({ name: data.name, email: data.email, password: data.password });
                writeJson('ruh_users', users);
                showToast('Sign Up successful!');
                setTimeout(() => { window.location.href = '/login'; }, 800);
                return;
            }

            const user = users.find((item) => item.email === data.email && item.password === data.password);
            if (! user) {
                showToast('Login failed! Check your credentials.');
                return;
            }
            writeJson(USER_KEY, { name: user.name, email: user.email });
            showToast('Login successful!');
            setTimeout(() => { window.location.href = '/'; }, 800);
        });
    }

    document.getElementById('forgot-form')?.addEventListener('submit', (event) => {
        event.preventDefault();
        showToast('Reset link sent (demo)');
    });

    document.querySelectorAll('[data-social]').forEach((button) => {
        button.addEventListener('click', () => showToast(`${button.dataset.social} login is not connected yet`));
    });
}

function initProfilePage() {
    const form = document.getElementById('profile-form');
    if (! form) {
        return;
    }

    const user = currentUser();
    if (! user) {
        window.location.href = '/login';
        return;
    }

    const profile = { name: user.name, email: user.email, ...readJson(PROFILE_KEY, {}) };
    Object.entries(profile).forEach(([key, value]) => {
        if (form.elements[key] && value) {
            form.elements[key].value = value;
        }
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const data = Object.fromEntries(new FormData(form).entries());
        writeJson(PROFILE_KEY, data);
        writeJson(USER_KEY, { name: data.name, email: data.email });
        showToast('Profile updated successfully!');
    });
}

function initContactForm() {
    document.getElementById('contact-form')?.addEventListener('submit', (event) => {
        event.preventDefault();
        event.target.reset();
        showToast('Message sent. We will reply soon.');
    });
}

document.addEventListener('click', (event) => {
    const addButton = event.target.closest('[data-add-to-cart]');
    if (addButton) {
        event.preventDefault();
        addToCart({
            id: Number(addButton.dataset.productId),
            name: addButton.dataset.productName,
            price: Number(addButton.dataset.productPrice),
            image: addButton.dataset.productImage,
        }, Number(addButton.dataset.quantity || 1));
    }

    const favButton = event.target.closest('[data-toggle-fav]');
    if (favButton) {
        event.preventDefault();
        toggleFavourite(Number(favButton.dataset.productId));
    }

    const qtyButton = event.target.closest('[data-qty-change]');
    if (qtyButton) {
        const id = Number(qtyButton.dataset.qtyChange);
        const item = cartItems().find((row) => Number(row.id) === id);
        if (item) {
            setCartQuantity(id, item.quantity + Number(qtyButton.dataset.delta));
        }
    }

    const removeButton = event.target.closest('[data-remove-item]');
    if (removeButton) {
        removeCartItem(Number(removeButton.dataset.removeItem));
    }

    if (event.target.closest('[data-logout]')) {
        localStorage.removeItem(USER_KEY);
        showToast('Logged out');
        updateAuthLinks();
        window.location.href = '/';
    }
});

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initCardGalleries();
    initProductDetail();
    initCartPage();
    initCheckoutPage();
    initFavoritesPage();
    initAuthForm();
    initProfilePage();
    initContactForm();
    updateAuthLinks();
    updateHeaderCounts();
});
