document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('liveSearch');
    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');
    const priceRange = document.getElementById('priceRange');
    const categoryItems = document.querySelectorAll('#categoryList li');
    const products = document.querySelectorAll('.product-card');
    const cartCount = document.querySelector('.count');

    let currentCategory = 'all';

    function updateCartBadge() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (cartCount) {
            cartCount.innerText = cart.length;
        }
    }

    function applyAllFilters() {
        const query = searchInput ? searchInput.value.toLowerCase().trim() : "";
        const minV = parseInt(minPriceInput.value) || 0;
        const maxV = parseInt(maxPriceInput.value) || 5000;

        products.forEach(card => {
            const title = card.querySelector('h4').innerText.toLowerCase();
            const price = parseInt(card.getAttribute('data-price'));
            const cat = card.getAttribute('data-category');

            const matchesSearch = query === "" || title.includes(query);
            const matchesPrice = price >= minV && price <= maxV;
            const matchesCategory = (currentCategory === 'all' || cat == currentCategory);

            if (matchesSearch && matchesPrice && matchesCategory) {
                card.style.setProperty('display', 'block', 'important');
            } else {
                card.style.setProperty('display', 'none', 'important');
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', applyAllFilters);
    }

    [priceRange, minPriceInput, maxPriceInput].forEach(el => {
        if (el) {
            el.addEventListener('input', () => {
                if (el === priceRange) maxPriceInput.value = priceRange.value;
                if (el === maxPriceInput) priceRange.value = maxPriceInput.value;
                applyAllFilters();
            });
        }
    });

    categoryItems.forEach(item => {
        item.onclick = function() {
            categoryItems.forEach(i => i.classList.remove('active-cat'));
            this.classList.add('active-cat');
            currentCategory = this.getAttribute('data-cat');
            applyAllFilters();
        };
    });

    const buyButtons = document.querySelectorAll('.buy-btn');
    buyButtons.forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.product-card');
            const product = {
                name: card.querySelector('h4').innerText,
                price: card.querySelector('.price').innerText,
                image: card.querySelector('img').getAttribute('src')
            };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));
            
            updateCartBadge(); 

            const originalText = button.innerText;
            button.innerText = "Додано!";
            button.style.background = "#2d3436";
            button.style.color = "white";

            setTimeout(() => {
                button.innerText = originalText;
                button.style.background = "";
                button.style.color = "";
            }, 800);
        });
    });

    updateCartBadge(); 
    applyAllFilters();
});