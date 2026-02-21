let cart = JSON.parse(localStorage.getItem("cart")) || [];

function updateCartStorage() {
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartCounter();
}

function addToCart(name, price) {
    const existing = cart.find(item => item.name === name);

    if (existing) {
        existing.quantity += 1;
    } else {
        cart.push({ name, price: parseFloat(price), quantity: 1 });
    }

    updateCartStorage();
    alert(name + " added to cart!");
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartStorage();
    displayCart();
}

function changeQuantity(index, amount) {
    cart[index].quantity += amount;

    if (cart[index].quantity <= 0) {
        removeFromCart(index);
    } else {
        updateCartStorage();
        displayCart();
    }
}

function clearCart() {
    cart = [];
    localStorage.removeItem("cart");
    displayCart();
    updateCartCounter();
}

function updateCartCounter() {
    const counter = document.getElementById("cart-count");
    if (!counter) return;

    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    counter.innerText = totalItems;
}

function displayCart() {
    const container = document.getElementById("cart-items");
    const totalContainer = document.getElementById("total");

    if (!container) return;

    container.innerHTML = "";
    let total = 0;

    cart.forEach((item, index) => {
        total += item.price * item.quantity;

        container.innerHTML += `
            <div class="cart-item">
                <div>
                    <strong>${item.name}</strong>
                    <p>$${item.price.toFixed(2)}</p>
                </div>

                <div class="qty-controls">
                    <button onclick="changeQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="changeQuantity(${index}, 1)">+</button>
                </div>

                <button class="danger" onclick="removeFromCart(${index})">Remove</button>
            </div>
        `;
    });

    totalContainer.innerText = "Total: $" + total.toFixed(2);
}

document.addEventListener("DOMContentLoaded", () => {
    displayCart();
    updateCartCounter();
});