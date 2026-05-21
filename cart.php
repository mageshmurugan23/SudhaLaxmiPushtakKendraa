<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Cart Page</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#f5f5f5;
}

/* ================= NAVBAR ================= */

.navbar{

width:100%;
background:#041c44;
padding:20px 60px;
display:flex;
justify-content:space-between;
align-items:center;

}

.logo{

color:white;
font-size:28px;
font-weight:bold;

}

.nav-links{

display:flex;
gap:30px;

}

.nav-links a{

color:white;
text-decoration:none;
font-size:18px;

}

.nav-links a:hover{

color:#f4c542;

}

/* ================= PAGE ================= */

.cart-page{

width:100%;
padding:40px;
display:flex;
gap:30px;
align-items:flex-start;

}

/* ================= LEFT ================= */

.cart-left{

flex:3;
background:white;
padding:30px;
border-radius:20px;
box-shadow:
0 5px 15px rgba(0,0,0,0.1);

}

.cart-title{

font-size:45px;
color:#041c44;
margin-bottom:30px;

}

/* ================= CART ITEM ================= */

.cart-item{

display:flex;
justify-content:space-between;
align-items:center;
padding:25px 0;
border-bottom:1px solid #ddd;

}

.item-left{

display:flex;
gap:20px;
align-items:center;

}

.item-left img{

width:120px;
height:120px;
border-radius:15px;
object-fit:cover;

}

.item-details h2{

font-size:32px;
color:#041c44;
margin-bottom:10px;

}

.item-details p{

font-size:18px;
color:gray;
margin-bottom:10px;

}

/* ================= QUANTITY ================= */

.quantity-box select{

padding:12px;
border-radius:10px;
border:1px solid #ccc;
font-size:16px;
cursor:pointer;

}

/* ================= REMOVE ================= */

.remove-btn{

background:red;
color:white;
border:none;
padding:12px 20px;
border-radius:10px;
cursor:pointer;
margin-top:15px;
font-size:16px;

}

/* ================= PRICE ================= */

.item-price{

font-size:28px;
font-weight:bold;
color:#041c44;
text-align:right;

}

/* ================= RIGHT ================= */

.cart-right{

flex:1;
background:white;
padding:30px;
border-radius:20px;
box-shadow:
0 5px 15px rgba(0,0,0,0.1);

position:sticky;
top:20px;

}

/* ================= BILL ================= */

.bill-title{

font-size:40px;
color:#041c44;
margin-bottom:30px;
text-align:center;

}

.bill-row{

display:flex;
justify-content:space-between;
margin-bottom:18px;
font-size:20px;

}

.bill-line{

border-top:1px solid #bbb;
margin:20px 0;

}

.bill-total{

font-size:32px;
font-weight:bold;
color:#041c44;

}

/* ================= GST ================= */

.gst{

color:gray;
font-size:17px;

}

/* ================= BUTTON ================= */

.checkout-btn{

width:100%;
padding:16px;
background:#041c44;
color:white;
border:none;
border-radius:12px;
font-size:20px;
cursor:pointer;
margin-top:30px;
transition:0.3s;

}

.checkout-btn:hover{

background:#f4c542;
color:black;

}

/* ================= EMPTY ================= */

.empty-cart{

text-align:center;
font-size:24px;
color:gray;
padding:50px;

}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

.cart-page{

flex-direction:column;

}

.cart-right,
.cart-left{

width:100%;

}

.cart-item{

flex-direction:column;
align-items:flex-start;

}

.item-price{

text-align:left;
margin-top:20px;

}

}

</style>

</head>

<body>

<!-- ================= NAVBAR ================= -->

<div class="navbar">

<div class="logo">

SudhaLaxmiKendra

</div>

<div class="nav-links">

<a href="index.php">

Home

</a>


<a href="cart.php">

Cart

</a>

<a href="orders.php">

Orders

</a>

<a href="#">

Profile

</a>

</div>

</div>

<!-- ================= PAGE ================= -->

<div class="cart-page">

<!-- ================= LEFT ================= -->

<div class="cart-left">

<h1 class="cart-title">

My Shopping Bag

</h1>

<div id="cartItems">

</div>

</div>

<!-- ================= RIGHT ================= -->

<div class="cart-right">

<h2 class="bill-title">

Summary

</h2>

<div class="bill-row">

<span>

Items

</span>

<span id="totalItems">

0

</span>

</div>

<div class="bill-row">

<span>

Subtotal

</span>

<span id="subtotal">

₹0

</span>

</div>

<div class="bill-row gst">

<span>

CGST (2.5%)

</span>

<span id="cgst">

₹0

</span>

</div>

<div class="bill-row gst">

<span>

SGST (2.5%)

</span>

<span id="sgst">

₹0

</span>

</div>

<div class="bill-row">

<span>

Shipping

</span>

<span>

₹50

</span>

</div>

<div class="bill-line"></div>

<div class="bill-row bill-total">

<span>

Total

</span>

<span id="totalPrice">

₹0

</span>

</div>

<button class="checkout-btn"
onclick="window.location.href='checkout.php'">

Checkout

</button>

</div>

</div>

<!-- ================= JAVASCRIPT ================= -->

<script>

/* ================= GET CART ================= */

let cart =

JSON.parse(
localStorage.getItem("cart")
) || [];

/* ================= ELEMENTS ================= */

const cartItems =
document.getElementById("cartItems");

const totalItems =
document.getElementById("totalItems");

const subtotal =
document.getElementById("subtotal");

const cgst =
document.getElementById("cgst");

const sgst =
document.getElementById("sgst");

const totalPrice =
document.getElementById("totalPrice");

/* ================= DISPLAY CART ================= */

function displayCart(){

cartItems.innerHTML = "";

let total = 0;

/* ================= EMPTY ================= */

if(cart.length === 0){

cartItems.innerHTML = `

<div class="empty-cart">

Your Cart Is Empty

</div>

`;

totalItems.innerHTML = 0;

subtotal.innerHTML = "₹0";

cgst.innerHTML = "₹0";

sgst.innerHTML = "₹0";

totalPrice.innerHTML = "₹0";

return;

}

/* ================= SHOW ITEMS ================= */

cart.forEach((item,index)=>{

let itemTotal =

Number(item.price) *
Number(item.quantity);

total += itemTotal;

cartItems.innerHTML += `

<div class="cart-item">

<div class="item-left">

<img src="uploads/${item.image}">

<div class="item-details">

<h2>

${item.name}

</h2>

<p>

Publisher : ${item.publisher}

</p>

<div class="quantity-box">

<select onchange="updateQuantity(${index}, this.value)">

<option value="1"
${item.quantity == 1 ? "selected" : ""}>

Quantity : 1

</option>

<option value="2"
${item.quantity == 2 ? "selected" : ""}>

Quantity : 2

</option>

<option value="3"
${item.quantity == 3 ? "selected" : ""}>

Quantity : 3

</option>

</select>

</div>

<button class="remove-btn"
onclick="removeItem(${index})">

Remove

</button>

</div>

</div>

<div class="item-price">

₹${item.price}
×
${item.quantity}

<br><br>

= ₹${itemTotal}

</div>

</div>

`;

});

/* ================= CALCULATIONS ================= */

let cgstAmount =
(total * 2.5) / 100;

let sgstAmount =
(total * 2.5) / 100;

let shipping = 50;

let finalTotal =

total +
cgstAmount +
sgstAmount +
shipping;

/* ================= SUMMARY ================= */

totalItems.innerHTML =
cart.length;

subtotal.innerHTML =
"₹" + total.toFixed(2);

cgst.innerHTML =
"₹" + cgstAmount.toFixed(2);

sgst.innerHTML =
"₹" + sgstAmount.toFixed(2);

totalPrice.innerHTML =
"₹" + finalTotal.toFixed(2);

}

/* ================= UPDATE QUANTITY ================= */

function updateQuantity(index,qty){

cart[index].quantity = qty;

localStorage.setItem(

"cart",

JSON.stringify(cart)

);

displayCart();

}

/* ================= REMOVE ================= */

function removeItem(index){

cart.splice(index,1);

localStorage.setItem(

"cart",

JSON.stringify(cart)

);

displayCart();

}

/* ================= LOAD ================= */

displayCart();

</script>

</body>

</html>