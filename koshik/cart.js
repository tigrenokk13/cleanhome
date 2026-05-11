document.addEventListener("DOMContentLoaded", () => {
    const cartItemsContainer = document.getElementById('cartItems');
    const emptyMessage = document.getElementById('emptyMessage');
    const cartContainer = document.getElementById('cartContainer');
    const totalPriceElement = document.getElementById('totalPrice');
    const totalItemsElement = document.getElementById('totalItems');
    const cartCount = document.getElementById('cartCount');

    function renderCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        if (cart.length === 0) {
            if (cartContainer) cartContainer.style.display = 'none';
            if (emptyMessage) emptyMessage.style.display = 'block';
            if (cartCount) cartCount.innerText = '0';
            return;
        }

        if (cartContainer) cartContainer.style.display = 'grid';
        if (emptyMessage) emptyMessage.style.display = 'none';
        cartItemsContainer.innerHTML = '';

        let total = 0;
        cart.forEach((item, index) => {
            const price = parseInt(item.price.replace(/\D/g, '')); 
            total += price;

            const itemElement = document.createElement('div');
            itemElement.className = 'cart-item';
            itemElement.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="item-details">
                    <h4>${item.name}</h4>
                    <p class="item-price">${item.price}</p>
                </div>
                <i class="fa-solid fa-trash-can remove-btn" onclick="removeItem(${index})"></i>
            `;
            cartItemsContainer.appendChild(itemElement);
        });

        if (totalPriceElement) totalPriceElement.innerText = total + ' ₴';
        if (totalItemsElement) totalItemsElement.innerText = cart.length;
        if (cartCount) cartCount.innerText = cart.length;
    }

    window.removeItem = (index) => {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    };

    const clearBtn = document.getElementById('clearCart');
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            localStorage.removeItem('cart');
            renderCart();
        });
    }

    renderCart();
});