<?php

session_start();

if(!isset($_SESSION['role'])){

header("Location: ../login.php");
exit();

}

if($_SESSION['role'] != "admin"){

header("Location: ../login.php");
exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Orders Panel</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#eef2f7;
padding:35px;
}

/* ================= TOP BAR ================= */

.top-bar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:35px;
flex-wrap:wrap;
gap:20px;
}

.left-top{
display:flex;
align-items:center;
gap:20px;
flex-wrap:wrap;
}

.title{
font-size:52px;
font-weight:800;
color:#041c44;
}

/* ================= BACK BUTTON ================= */

.back-btn{
background:#041c44;
color:white;
padding:14px 22px;
border-radius:14px;
text-decoration:none;
font-size:17px;
font-weight:700;
display:flex;
align-items:center;
gap:10px;
transition:0.3s;
}

.back-btn:hover{
background:#f4b400;
color:black;
}

/* ================= SEARCH ================= */

.search-box{
background:white;
padding:14px 18px;
border-radius:15px;
display:flex;
align-items:center;
gap:12px;
width:330px;
box-shadow:0 5px 18px rgba(0,0,0,0.08);
}

.search-box input{
border:none;
outline:none;
width:100%;
font-size:16px;
}

/* ================= FILTER BUTTONS ================= */

.filter-buttons{
display:flex;
gap:20px;
margin-bottom:35px;
flex-wrap:wrap;
}

.filter-btn{
padding:16px 28px;
border:none;
border-radius:16px;
font-size:17px;
font-weight:700;
cursor:pointer;
background:white;
color:#041c44;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
transition:0.3s;
}

.filter-btn:hover{
transform:translateY(-3px);
}

.delivery-btn{
background:#dbeafe;
color:#041c44;
}

.pickup-btn{
background:#d4f8d4;
color:green;
}

/* ================= STATS ================= */

.stats{
display:grid;
grid-template-columns:
repeat(auto-fit,minmax(220px,1fr));
gap:22px;
margin-bottom:35px;
}

.stat-card{
background:white;
padding:28px;
border-radius:25px;
box-shadow:0 8px 20px rgba(0,0,0,0.06);
transition:0.3s;
cursor:pointer;
}

.stat-card:hover{
transform:translateY(-5px);
background:#041c44;
}

.stat-card:hover h1,
.stat-card:hover h3,
.stat-card:hover i{
color:white;
}

.stat-card i{
font-size:32px;
margin-bottom:15px;
color:#041c44;
}

.stat-card h3{
font-size:18px;
color:#666;
margin-bottom:10px;
}

.stat-card h1{
font-size:42px;
color:#041c44;
}

/* ================= ORDERS ================= */

.orders-container{
display:flex;
flex-direction:column;
gap:30px;
}

/* ================= CARD ================= */

.order-card{
background:white;
padding:35px;
border-radius:30px;
box-shadow:0 8px 20px rgba(0,0,0,0.06);
transition:0.3s;
}

.order-card:hover{
transform:translateY(-4px);
}

/* ================= TOP ================= */

.order-top{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
flex-wrap:wrap;
gap:20px;
}

.order-id{
font-size:40px;
font-weight:800;
color:#041c44;
margin-bottom:10px;
}

.order-date{
font-size:16px;
color:#666;
}

/* ================= STATUS ================= */

.status-select{
padding:14px 18px;
border:none;
border-radius:14px;
background:#041c44;
color:white;
font-size:15px;
font-weight:700;
outline:none;
cursor:pointer;
}

/* ================= CUSTOMER ================= */

.customer-box{
background:#f8fbff;
padding:22px;
border-radius:22px;
margin-bottom:22px;
line-height:2;
}

.customer-box h2{
margin-bottom:12px;
color:#041c44;
}

/* ================= BADGES ================= */

.badges{
display:flex;
gap:15px;
flex-wrap:wrap;
margin-top:15px;
}

.badge{
padding:10px 18px;
border-radius:50px;
font-weight:700;
font-size:14px;
display:inline-block;
}

.pickup{
background:#d4f8d4;
color:green;
}

.delivery{
background:#dbeafe;
color:#041c44;
}

.upi{
background:#d4f8d4;
color:green;
}

.cod{
background:#ffe0e0;
color:#c10000;
}

/* ================= PRODUCTS ================= */

.book-item{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 0;
border-bottom:1px solid #eee;
gap:20px;
flex-wrap:wrap;
}

.book-left{
display:flex;
align-items:center;
gap:20px;
}

.book-left img{
width:90px;
height:90px;
object-fit:cover;
border-radius:15px;
background:#f5f5f5;
padding:5px;
}

.book-details h3{
font-size:24px;
margin-bottom:8px;
color:#041c44;
}

.book-details p{
font-size:16px;
color:#666;
margin-bottom:5px;
}

.price{
font-size:26px;
font-weight:800;
color:#041c44;
}

/* ================= TOTAL ================= */

.total{
margin-top:25px;
text-align:right;
font-size:38px;
font-weight:800;
color:#041c44;
}

/* ================= EMPTY ================= */

.empty{
background:white;
padding:80px;
border-radius:30px;
text-align:center;
font-size:35px;
font-weight:700;
color:#888;
}

/* ================= MOBILE ================= */

@media(max-width:900px){

body{
padding:18px;
}

.title{
font-size:36px;
}

.book-item{
flex-direction:column;
align-items:flex-start;
}

.book-left{
flex-direction:column;
align-items:flex-start;
}

.total{
text-align:left;
font-size:30px;
}

.search-box{
width:100%;
}

}

</style>

</head>

<body>

<!-- ================= TOP BAR ================= -->

<div class="top-bar">

<div class="left-top">

<a href="dashboard.php"
class="back-btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

<h1 class="title">
Admin Orders Panel
</h1>

</div>

<div class="search-box">

<i class="fa-solid fa-magnifying-glass"></i>

<input type="text"
id="searchInput"
placeholder="Search Order ID..."
onkeyup="searchOrders()">

</div>

</div>

<!-- ================= FILTER BUTTONS ================= -->

<div class="filter-buttons">

<button onclick="showAllOrders()"
class="filter-btn">

📦 All Orders

</button>

<button onclick="showHomeDelivery()"
class="filter-btn delivery-btn">

🚚 Home Delivery

</button>

<button onclick="showPickupOrders()"
class="filter-btn pickup-btn">

🏪 Pickup From Store

</button>

</div>

<!-- ================= STATS ================= -->

<div class="stats">

<div class="stat-card">

<i class="fa-solid fa-cart-shopping"></i>

<h3>Total Orders</h3>

<h1 id="totalOrders">0</h1>

</div>

<div class="stat-card">

<i class="fa-solid fa-clock"></i>

<h3>Pending</h3>

<h1 id="pendingOrders">0</h1>

</div>

<div class="stat-card">

<i class="fa-solid fa-truck"></i>

<h3>Shipped</h3>

<h1 id="shippedOrders">0</h1>

</div>

<div class="stat-card">

<i class="fa-solid fa-circle-check"></i>

<h3>Delivered</h3>

<h1 id="deliveredOrders">0</h1>

</div>

</div>

<!-- ================= ORDERS ================= -->

<div class="orders-container"
id="ordersContainer">

</div>

<script>

/* ================= GET ORDERS ================= */

let orders =
JSON.parse(
localStorage.getItem("orders")
) || [];

const container =
document.getElementById(
"ordersContainer"
);

/* ================= STATS ================= */

function updateStats(){

let pending = 0;
let shipped = 0;
let delivered = 0;

orders.forEach(order=>{

let status =
order.status || "Pending";

if(status == "Pending"){
pending++;
}
else if(status == "Shipped"){
shipped++;
}
else if(status == "Delivered"){
delivered++;
}

});

document.getElementById(
"totalOrders"
).innerHTML = orders.length;

document.getElementById(
"pendingOrders"
).innerHTML = pending;

document.getElementById(
"shippedOrders"
).innerHTML = shipped;

document.getElementById(
"deliveredOrders"
).innerHTML = delivered;

}

/* ================= DISPLAY ================= */

function displayOrders(filteredOrders = orders){

container.innerHTML = "";

if(filteredOrders.length == 0){

container.innerHTML = `

<div class="empty">

No Orders Found

</div>

`;

return;

}

let reverseOrders =
[...filteredOrders].reverse();

reverseOrders.forEach(order=>{

let itemsHTML = "";

order.items.forEach(item=>{

itemsHTML += `

<div class="book-item">

<div class="book-left">

<img src="../uploads/${item.image}">

<div class="book-details">

<h3>
${item.name}
</h3>

<p>
Quantity : ${item.quantity}
</p>

<p>
Price : ₹${item.price}
</p>

</div>

</div>

<div class="price">

₹${item.price * item.quantity}

</div>

</div>

`;

});

/* DELIVERY */

let deliveryType =
order.deliveryType ||
"Home Delivery";

/* PAYMENT */

let paymentMethod =
order.paymentMethod ||
"Cash";

/* BADGES */

let deliveryBadge =
deliveryType == "Pickup From Store"
? `<span class="badge pickup">
🏪 Pickup From Store
</span>`
:
`<span class="badge delivery">
🚚 Home Delivery
</span>`;

let paymentBadge =
paymentMethod == "UPI"
? `<span class="badge upi">
✅ UPI Paid
</span>`
:
`<span class="badge cod">
💵 Cash On Pickup
</span>`;

container.innerHTML += `

<div class="order-card">

<div class="order-top">

<div>

<div class="order-id">

${order.id}

</div>

<div class="order-date">

${order.date}

</div>

</div>

<div>

<select class="status-select"
onchange="updateStatus('${order.id}', this.value)">

<option value="Pending"
${order.status == "Pending"
? "selected" : ""}>

Pending

</option>

<option value="Shipped"
${order.status == "Shipped"
? "selected" : ""}>

Shipped

</option>

<option value="Delivered"
${order.status == "Delivered"
? "selected" : ""}>

Delivered

</option>

</select>

</div>

</div>

<!-- CUSTOMER -->

<div class="customer-box">

<h2>
Customer Details
</h2>

<p>
<b>Name :</b>
${order.name || "No Name"}
</p>

<p>
<b>Phone :</b>
${order.phone || "No Phone"}
</p>

<p>
<b>Address :</b>
${order.address || "No Address"}
</p>

<div class="badges">

${deliveryBadge}

${paymentBadge}

</div>

</div>

${itemsHTML}

<div class="total">

Total :
₹${Number(order.total).toFixed(2)}

</div>

</div>

`;

});

}

/* ================= UPDATE STATUS ================= */

function updateStatus(orderId,status){

orders.forEach(order=>{

if(order.id == orderId){

order.status = status;

}

});

localStorage.setItem(
"orders",
JSON.stringify(orders)
);

updateStats();

displayOrders();

}

/* ================= SEARCH ================= */

function searchOrders(){

let value =
document.getElementById(
"searchInput"
).value.toLowerCase();

let filtered =
orders.filter(order=>{

return order.id
.toLowerCase()
.includes(value);

});

displayOrders(filtered);

}

/* ================= FILTER ================= */

function showAllOrders(){

displayOrders(orders);

}

function showHomeDelivery(){

let filtered = orders.filter(order=>{

return (
order.deliveryType == "Home Delivery"
||
!order.deliveryType
);

});

displayOrders(filtered);

}

function showPickupOrders(){

let filtered = orders.filter(order=>{

return order.deliveryType ==
"Pickup From Store";

});

displayOrders(filtered);

}

/* ================= LOAD ================= */

updateStats();

displayOrders();

</script>

</body>

</html>