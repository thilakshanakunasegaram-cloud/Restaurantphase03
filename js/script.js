function increase(btn) {
    let qtySpan = btn.parentElement.querySelector("span");
    let value = parseInt(qtySpan.innerText);
    qtySpan.innerText = value + 1;
    handleCartChange(btn, value + 1);
}

function decrease(btn) {
    let qtySpan = btn.parentElement.querySelector("span");
    let value = parseInt(qtySpan.innerText);
    if (value > 0) {
        qtySpan.innerText = value - 1;
        handleCartChange(btn, value - 1);
    }
}

function handleCartChange(btn, qty) {
    let cartItemContainer = btn.closest('.cart-box');
    let foodCard = btn.closest('.food-card');

    let itemData = { name: '', price: 0, priceText: '', imgSrc: '' };

    // If clicked from menu
    if (foodCard) {
        itemData.name = foodCard.querySelector('h5').innerText;
        itemData.priceText = foodCard.querySelector('.price').innerText;
        itemData.imgSrc = foodCard.querySelector('img').src;
        // e.g. "Price 1"
        itemData.price = 100; // Default
        let match = itemData.priceText.match(/\d+/);
        if (match) {
            itemData.price = parseInt(match[0]);
        }
    } else if (cartItemContainer) {
        itemData.name = cartItemContainer.querySelector('h5').innerText;
    }

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let itemIndex = cart.findIndex(item => item.name === itemData.name);

    if (itemIndex > -1) {
        if (qty === 0) {
            cart.splice(itemIndex, 1);
        } else {
            cart[itemIndex].qty = qty;
        }
    } else if (qty > 0 && foodCard) {
        itemData.qty = qty;
        cart.push(itemData);
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    if (cartItemContainer) {
        renderCart();
    }
}

function renderCart() {
    let container = document.getElementById("cartItemsContainer");
    if (!container) return; // not on cart page

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    container.innerHTML = "";

    let total = 0;

    if (cart.length === 0) {
        container.innerHTML = "<p>Cart is empty</p>";
    }

    cart.forEach(item => {
        let itemTotal = item.price * item.qty;
        total += itemTotal;

        container.innerHTML += `
            <div class="cart-box">
                <img src="${item.imgSrc}">
                <div class="cart-info">
                    <h5>${item.name}</h5>
                    <p>${item.priceText}</p>
                    <div class="qty">
                        <button onclick="decrease(this)">-</button>
                        <span>${item.qty}</span>
                        <button onclick="increase(this)">+</button>
                    </div>
                </div>
                <div class="cart-right">
                    <p>${item.qty} x ${item.priceText}</p>
                    <p>${itemTotal.toFixed(2)} Rs/=</p>
                    <button class="remove" onclick="removeFromCart('${item.name}')">🗑 Remove</button>
                </div>
            </div>
        `;
    });

    let totalPriceEl = document.getElementById("totalPrice");
    let billAmountEl = document.getElementById("billAmount");
    if (totalPriceEl) totalPriceEl.innerText = total.toFixed(2);
    if (billAmountEl) billAmountEl.innerText = total.toFixed(2);
}

function removeFromCart(name) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.name !== name);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart(); // update display
}

function syncMenuQty() {
    let foods = document.querySelectorAll(".food-card");
    if (foods.length === 0) return;

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    foods.forEach(food => {
        let name = food.querySelector('h5').innerText;
        let item = cart.find(i => i.name === name);
        let qtySpan = food.querySelector('.qty span');
        if (item && qtySpan) {
            qtySpan.innerText = item.qty;
        } else if (qtySpan) {
            qtySpan.innerText = "0";
        }
    });
}

// Call functions on page load
document.addEventListener("DOMContentLoaded", () => {
    renderCart();
    syncMenuQty();
});



function filterFood() {
    let filter = document.getElementById("foodFilter").value;
    let foods = document.querySelectorAll(".food-card");

    foods.forEach(food => {
        // Initial state for animation
        food.style.transition = "opacity 0.4s ease, transform 0.4s ease";
        
        const isVisible = filter === "all" || food.dataset.type === filter;
        
        if (isVisible) {
            food.style.display = "block";
            // Small delay to allow display:block to register for the transition
            setTimeout(() => {
                food.style.opacity = "1";
                food.style.transform = "scale(1)";
            }, 10);
        } else {
            food.style.opacity = "0";
            food.style.transform = "scale(0.9)";
            setTimeout(() => {
                if (food.style.opacity === "0") {
                    food.style.display = "none";
                }
            }, 400); // Match transition duration
        }
    });
}


function openPayment() {
    const modal = document.getElementById("paymentModal");
    modal.classList.add("active");
    document.getElementById("paymentDetails").style.display = "block";
    document.getElementById("paymentSuccess").style.display = "none";
    document.getElementById("paymentMethod").value = "Choose";
    document.getElementById("receiveCashMsg").style.display = "none";
}

function closePayment() {
    const modal = document.getElementById("paymentModal");
    modal.classList.remove("active");
}


function checkPaymentMethod() {
    const method = document.getElementById("paymentMethod").value;
    if (method === "Cash") {
        document.getElementById("receiveCashMsg").style.display = "block";
    } else {
        document.getElementById("receiveCashMsg").style.display = "none";
    }
}

function processPayment() {
    const method = document.getElementById("paymentMethod").value;
    if (method === "Choose") {
        alert("Please select a valid payment method (Cash or Card).");
        return;
    }

    const amountText = document.getElementById("billAmount").innerText;
    document.getElementById("successAmount").innerText = amountText;

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    const orderData = {
        totalAmount: parseFloat(amountText),
        paymentMethod: method,
        cashier_id: localStorage.getItem('cashier_id') || 'Unknown',
        cartItems: cart
    };

    fetch('save_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            console.log("Order saved to database.");
            // Clear cart upon successful payment
            localStorage.removeItem('cart');
            renderCart(); // Refresh cart instantly underneath

            document.getElementById("paymentDetails").style.display = "none";
            document.getElementById("paymentSuccess").style.display = "block";
        } else {
            alert("Error saving order: " + result.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while saving the order.");
    });
}

function goHome() {
    window.location.href = "main.php";
}