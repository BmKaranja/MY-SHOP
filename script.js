// Cart functionality
let cart = [];
let user = [];
let loggedin =null

// Load cart from localStorage on page load
document.addEventListener('DOMContentLoaded', function() {
    loadCart();
    updateCartCount();
    userstatus();
});
const Lstatus = document.getElementById('status')
const nav = document.querySelector('.links')
const reset =document.getElementById('reset')
function userstatus(){
    let userdata =JSON.parse(sessionStorage.getItem(userstatus))
    if(userdata== null || userdata==false){
        console.log('Failed')
        Lstatus.textContent='Login'
    }
    else{
        console.log(userdata)
        Lstatus.innerHTML='LoggedIn'
        Lstatus.style.color=' rgb(61, 58, 58)'
    }
}
reset.addEventListener('click',()=>{
    sessionStorage.removeItem(userstatus)
})
const login =document.getElementById('loginbtn')
login.addEventListener('click',() =>{
    const username= document.getElementById('username').value.trim();
    const pass  = document.getElementById('password').value.trim();
    if (username!==''|| username===null && pass !=='' || pass===null){
        loggedin=true
        user.push({
            username :username,
            password : pass
        })
        sessionStorage.setItem(userstatus, JSON.stringify(loggedin))
    }else{
        console.log('Error')
    }
})
// Add item to cart
function addToCart(productName, price, imageSrc) {
    const existingItem = cart.find(item => item.name === productName);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            name: productName,
            price: parseFloat(price.replace('$', '')),
            image: imageSrc,
            quantity: 1
        });
    }

    saveCart();
    console.log('Cart after adding:', cart);
    updateCartCount();
    alert(`${productName} added to cart!`);
}

// Remove item from cart
function removeFromCart(index) {
    cart.splice(index, 1);
    saveCart();
    displayCart();
    updateCartCount();
}

// Update item quantity
function updateQuantity(index, newQuantity) {
    if (newQuantity <= 0) {
        removeFromCart(index);
    } else {
        cart[index].quantity = newQuantity;
        saveCart();
        displayCart();
    }
}

// Get total price
function getTotalPrice() {
    return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
}

// Save cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Load cart from localStorage
function loadCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
    }
}

// Update cart count in navigation
function updateCartCount() {
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        console.log('Total items in cart:', totalItems);
        cartCountElement.textContent = totalItems;
    }
}

// Display cart items (for cart.html)
function displayCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    if (!cartItemsContainer) return;

    cartItemsContainer.innerHTML = '';

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        if (totalPriceElement) totalPriceElement.textContent = '$0.00';
        return;
    }

    cart.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.className = 'cart-item';
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-details">
                <h3>${item.name}</h3>
                <p>Price: $${item.price.toFixed(2)}</p>
                <div class="quantity-controls">
                    <button onclick="updateQuantity(${index}, ${item.quantity - 1})">-</button>
                    <span>Quantity: ${item.quantity}</span>
                    <button onclick="updateQuantity(${index}, ${item.quantity + 1})">+</button>
                </div>
                <button onclick="removeFromCart(${index})" class="remove-btn">Remove</button>
            </div>
        `;
        cartItemsContainer.appendChild(itemElement);
    });

    if (totalPriceElement) {
        totalPriceElement.textContent = `$${getTotalPrice().toFixed(2)}`;
    }
}

// Checkout function (placeholder)
function checkout() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }else{
    alert('Checkout functionality would be implemented here. Total: $' + getTotalPrice().toFixed(2));
}
}
