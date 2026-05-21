<?php
session_start();

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Modern Checkout</title>

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
background:#eef3f9;
overflow-x:hidden;
}

/* MAIN */

.checkout-page{
display:flex;
min-height:100vh;
}

/* LEFT */

.left{
width:65%;
padding:40px 60px;
background:linear-gradient(to bottom,#ffffff,#f8fbff);
}

/* RIGHT */

.right{
width:35%;
background:#041c44;
padding:40px 30px;
color:white;
position:sticky;
top:0;
height:100vh;
overflow:auto;
}

/* LOGO */

.logo{
font-size:48px;
font-weight:800;
color:#041c44;
margin-bottom:35px;
}

/* STEPS */

.steps{
display:flex;
gap:15px;
flex-wrap:wrap;
margin-bottom:45px;
}

.step{
display:flex;
align-items:center;
gap:10px;
padding:12px 18px;
border-radius:50px;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
font-weight:600;
color:#555;
transition:0.3s;
}

.step.active{
background:#041c44;
color:white;
}

.circle{
width:34px;
height:34px;
border-radius:50%;
background:#e7ecf4;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
}

.step.active .circle{
background:white;
color:#041c44;
}

/* FORM */

.form-step{
display:none;
animation:fade 0.4s ease;
}

.form-step.active{
display:block;
}

@keyframes fade{

from{
opacity:0;
transform:translateY(15px);
}

to{
opacity:1;
transform:translateY(0);
}

}

.form-title{
font-size:34px;
font-weight:700;
margin-bottom:30px;
color:#041c44;
}

.input-box{
margin-bottom:22px;
}

.input-box label{
display:block;
margin-bottom:8px;
font-weight:600;
color:#041c44;
}

.input-box input,
.input-box textarea{
width:100%;
padding:16px;
border-radius:14px;
border:1px solid #d8dce3;
font-size:15px;
outline:none;
transition:0.3s;
}

.input-box input:focus,
.input-box textarea:focus{
border-color:#041c44;
box-shadow:0 0 10px rgba(4,28,68,0.1);
}

/* BUTTONS */

.btn-box{
display:flex;
justify-content:space-between;
margin-top:30px;
}

.btn{
padding:15px 30px;
border:none;
border-radius:14px;
font-size:16px;
font-weight:600;
cursor:pointer;
transition:0.3s;
}

.next-btn{
background:#041c44;
color:white;
}

.next-btn:hover{
background:#072b63;
}

.back-btn{
background:#dce1ea;
}

.back-btn:hover{
background:#cbd2dd;
}

/* PAYMENT */

.payment-option{
display:flex;
align-items:center;
gap:18px;
padding:20px;
background:white;
border-radius:20px;
margin-bottom:18px;
cursor:pointer;
border:2px solid transparent;
transition:0.3s;
box-shadow:0 6px 18px rgba(0,0,0,0.06);
}

.payment-option:hover{
border-color:#041c44;
transform:translateY(-2px);
}

.payment-option input{
transform:scale(1.2);
}

.payment-icon{
font-size:28px;
color:#041c44;
}

/* QR */

.qr-card{
max-width:450px;
margin:auto;
background:white;
padding:35px;
border-radius:25px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.qr-image{
width:260px;
height:260px;
object-fit:contain;
margin:25px auto;
display:block;
padding:10px;
background:#f5f7fb;
border-radius:20px;
}

/* SUCCESS */

.success-card{
max-width:700px;
margin:auto;
background:white;
padding:40px;
border-radius:30px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.success-icon{
font-size:75px;
color:#00b894;
margin-bottom:15px;
text-align:center;
}

.success-title{
text-align:center;
font-size:42px;
font-weight:800;
color:#041c44;
}

.success-subtitle{
text-align:center;
margin-top:10px;
color:#555;
font-size:18px;
}

/* BILL */

.invoice-box{
margin-top:35px;
padding:30px;
border-radius:25px;
background:#f8fbff;
border:2px dashed #041c44;
}

.invoice-top{
display:flex;
justify-content:space-between;
flex-wrap:wrap;
margin-bottom:30px;
}

.invoice-logo{
font-size:32px;
font-weight:800;
color:#041c44;
}

.invoice-details{
line-height:1.9;
color:#444;
margin-top:10px;
}

.bill-table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

.bill-table th{
background:#041c44;
color:white;
padding:15px;
text-align:left;
}

.bill-table td{
padding:15px;
border-bottom:1px solid #ddd;
}

.total-section{
margin-top:25px;
text-align:right;
}

.total-section p{
margin-bottom:10px;
font-size:17px;
}

.total-section h2{
font-size:32px;
color:#041c44;
}

.home-btn{
display:inline-block;
margin-top:20px;
padding:15px 28px;
background:#041c44;
color:white;
text-decoration:none;
border-radius:14px;
font-weight:600;
}

/* ORDER SUMMARY */

.summary-title{
font-size:30px;
margin-bottom:30px;
}

.order-item{
display:flex;
justify-content:space-between;
padding:18px 0;
border-bottom:1px solid rgba(255,255,255,0.15);
}

.total-row{
display:flex;
justify-content:space-between;
margin-top:18px;
font-size:17px;
}

.final{
margin-top:30px;
font-size:30px;
font-weight:700;
}

/* MOBILE */

@media(max-width:950px){

.checkout-page{
flex-direction:column;
}

.left,
.right{
width:100%;
}

.right{
height:auto;
position:relative;
}

.logo{
font-size:38px;
}

.left{
padding:30px 20px;
}

}

</style>

</head>

<body>

<div class="checkout-page">

<!-- LEFT -->

<div class="left">

<div class="logo">
SudhaLaxmiKendra
</div>

<div class="steps">

<div class="step active" id="indicator1">
<div class="circle">1</div>
Contact
</div>

<div class="step" id="indicator2">
<div class="circle">2</div>
Shipping
</div>

<div class="step" id="indicator3">
<div class="circle">3</div>
Payment
</div>

<div class="step" id="indicator4">
<div class="circle">4</div>
Done
</div>

</div>

<!-- STEP 1 -->

<div class="form-step active"
id="step1">

<h2 class="form-title">
Contact Information
</h2>

<div class="input-box">

<label>Email</label>

<input type="email"
id="email"
placeholder="Enter email">

</div>

<div class="input-box">

<label>Phone Number</label>

<input type="text"
id="phone"
placeholder="Enter phone number">

</div>

<div class="btn-box">

<div></div>

<button class="btn next-btn"
onclick="nextStep(2)">
Continue
</button>

</div>

</div>

<!-- STEP 2 -->

<div class="form-step"
id="step2">

<h2 class="form-title">
Shipping Address
</h2>

<div class="input-box">

<label>Full Name</label>

<input type="text"
id="name"
placeholder="Enter full name">

</div>

<div class="input-box">

<label>Address</label>

<textarea rows="4"
id="address"
placeholder="Enter address"></textarea>

</div>

<div class="input-box">

<label>City</label>

<input type="text"
id="city"
placeholder="Enter city">

</div>

<div class="input-box">

<label>Pincode</label>

<input type="text"
id="pincode"
placeholder="Enter pincode">

</div>

<div class="btn-box">

<button class="btn back-btn"
onclick="backStep(1)">
Back
</button>

<button class="btn next-btn"
onclick="nextStep(3)">
Continue
</button>

</div>

</div>

<!-- STEP 3 -->

<div class="form-step"
id="step3">

<h2 class="form-title">
Payment Method
</h2>

<label class="payment-option">

<input type="radio"
name="payment"
value="Cash"
checked>

<i class="fa-solid fa-money-bill-wave payment-icon"></i>

<div>

<h3>Cash On Delivery</h3>

<p>Pay after delivery</p>

</div>

</label>

<label class="payment-option">

<input type="radio"
name="payment"
value="UPI">

<i class="fa-brands fa-google-pay payment-icon"></i>

<div>

<h3>UPI Payment</h3>

<p>Google Pay / PhonePe / Paytm</p>

</div>

</label>

<label class="payment-option">

<input type="radio"
name="delivery"
checked
onclick="updateShipping(50,'Home Delivery')">

<i class="fa-solid fa-truck payment-icon"></i>

<div>

<h3>Home Delivery</h3>

<p>₹50 Shipping Charge</p>

</div>

</label>

<label class="payment-option">

<input type="radio"
name="delivery"
onclick="updateShipping(0,'Pickup From Store')">

<i class="fa-solid fa-store payment-icon"></i>

<div>

<h3>Pickup From Store</h3>

<p>Free Pickup</p>

</div>

</label>

<div class="btn-box">

<button class="btn back-btn"
onclick="backStep(2)">
Back
</button>

<button class="btn next-btn"
onclick="proceedPayment()">
Place Order
</button>

</div>

</div>

<!-- STEP 4 -->

<div class="form-step"
id="step4">

<div class="success-card">

<div class="success-icon">
<i class="fa-solid fa-circle-check"></i>
</div>

<h1 class="success-title">
Order Successful
</h1>

<p class="success-subtitle">
Your order has been placed successfully.
</p>

<div id="invoiceBox"></div>

<div style="text-align:center;">

<button class="btn next-btn"
onclick="printBill()"
style="margin-top:25px;">

<i class="fa-solid fa-print"></i>
Print Bill

</button>

<br>

<a href="index.php"
class="home-btn">

Back To Home

</a>

</div>

</div>

</div>

</div>

<!-- RIGHT -->

<div class="right">

<h2 class="summary-title">
Order Summary
</h2>

<div id="orderItems"></div>

<div class="total-row">
<span>Subtotal</span>
<span id="subtotal"></span>
</div>

<div class="total-row">
<span>CGST</span>
<span id="cgst"></span>
</div>

<div class="total-row">
<span>SGST</span>
<span id="sgst"></span>
</div>

<div class="total-row">
<span>Shipping</span>
<span id="shipping"></span>
</div>

<div class="total-row final">
<span>Total</span>
<span id="finalTotal"></span>
</div>

</div>

</div>

<script>

let cart =
JSON.parse(localStorage.getItem("cart")) || [];

let shippingCharge = 50;

let subtotalAmount = 0;
let cgstAmount = 0;
let sgstAmount = 0;
let finalAmount = 0;

let deliveryType = "Home Delivery";

/* STEP */

function showStep(step){

document.querySelectorAll(".form-step")
.forEach(item=>{
item.classList.remove("active");
});

document
.getElementById("step"+step)
.classList.add("active");

document.querySelectorAll(".step")
.forEach(item=>{
item.classList.remove("active");
});

for(let i=1;i<=step;i++){

document
.getElementById("indicator"+i)
.classList.add("active");

}

}

function nextStep(step){
showStep(step);
}

function backStep(step){
showStep(step);
}

/* SHIPPING */

function updateShipping(price,type){

shippingCharge = price;

deliveryType = type;

displayOrder();

}

/* DISPLAY ORDER */

function displayOrder(){

let html = "";

let subtotal = 0;

cart.forEach(item=>{

let itemTotal =
Number(item.price) *
Number(item.quantity);

subtotal += itemTotal;

html += `

<div class="order-item">

<div>

<h3>${item.name}</h3>

<p>
Qty : ${item.quantity}
</p>

</div>

<div>

₹${itemTotal.toFixed(2)}

</div>

</div>

`;

});

subtotalAmount = subtotal;

cgstAmount =
subtotal * 0.025;

sgstAmount =
subtotal * 0.025;

finalAmount =
subtotal +
cgstAmount +
sgstAmount +
shippingCharge;

document.getElementById("orderItems").innerHTML =
html;

document.getElementById("subtotal").innerHTML =
"₹"+subtotal.toFixed(2);

document.getElementById("cgst").innerHTML =
"₹"+cgstAmount.toFixed(2);

document.getElementById("sgst").innerHTML =
"₹"+sgstAmount.toFixed(2);

document.getElementById("shipping").innerHTML =
"₹"+shippingCharge.toFixed(2);

document.getElementById("finalTotal").innerHTML =
"₹"+finalAmount.toFixed(2);

}

/* PAYMENT */

function proceedPayment(){

let paymentMethod =
document.querySelector(
'input[name="payment"]:checked'
).value;

if(paymentMethod == "UPI"){

showQRCode();

}
else{

completeOrder("Cash");

}

}

/* QR */

function showQRCode(){

document.getElementById("step3").innerHTML = `

<div class="qr-card">

<h1 style="color:#041c44;">
Scan & Pay
</h1>

<p style="margin-top:10px;color:#666;">
Complete payment using UPI
</p>

<img src="images/cleaned_qr.png"
class="qr-image">

<button class="btn next-btn"
onclick="completeOrder('UPI')">

Payment Done

</button>

</div>

`;

}

/* COMPLETE ORDER */

function completeOrder(paymentMethod){

showStep(4);

let orderId =
"ORD"+Math.floor(Math.random()*100000);

let orderData = {

id : orderId,

date : new Date().toLocaleDateString(),

name :
document.getElementById("name").value,

email :
document.getElementById("email").value,

phone :
document.getElementById("phone").value,

address :
document.getElementById("address").value,

city :
document.getElementById("city").value,

pincode :
document.getElementById("pincode").value,

paymentMethod : paymentMethod,

deliveryType : deliveryType,

status : "Pending",

items : cart,

subtotal : subtotalAmount,

cgst : cgstAmount,

sgst : sgstAmount,

shipping : shippingCharge,

total : finalAmount

};

/* SAVE */

let allOrders =
JSON.parse(
localStorage.getItem("orders")
) || [];

allOrders.push(orderData);

localStorage.setItem(
"orders",
JSON.stringify(allOrders)
);

/* BILL */

let invoiceHTML = `

<div class="invoice-box">

<div class="invoice-top">

<div>

<div class="invoice-logo">
SudhaLaxmiKendra
</div>

<div class="invoice-details">

<b>Order ID:</b>
${orderId}
<br>

<b>Date:</b>
${new Date().toLocaleDateString()}
<br>

<b>Payment:</b>
${paymentMethod}
<br>

<b>Delivery:</b>
${deliveryType}

</div>

</div>

<div class="invoice-details">

<b>Name:</b>
${document.getElementById("name").value}
<br>

<b>Email:</b>
${document.getElementById("email").value}
<br>

<b>Phone:</b>
${document.getElementById("phone").value}

</div>

</div>

<table class="bill-table">

<tr>

<th>Product</th>

<th>Qty</th>

<th>Total</th>

</tr>

`;

cart.forEach(item=>{

invoiceHTML += `

<tr>

<td>${item.name}</td>

<td>${item.quantity}</td>

<td>

₹${(item.price * item.quantity).toFixed(2)}

</td>

</tr>

`;

});

invoiceHTML += `

</table>

<div class="total-section">

<p>
Subtotal :
₹${subtotalAmount.toFixed(2)}
</p>

<p>
CGST :
₹${cgstAmount.toFixed(2)}
</p>

<p>
SGST :
₹${sgstAmount.toFixed(2)}
</p>

<p>
Shipping :
₹${shippingCharge.toFixed(2)}
</p>

<h2>
Grand Total :
₹${finalAmount.toFixed(2)}
</h2>

</div>

</div>

`;

document.getElementById("invoiceBox").innerHTML =
invoiceHTML;

localStorage.removeItem("cart");

}

/* PRINT */

function printBill(){

let printData =
document.getElementById("invoiceBox").innerHTML;

let original =
document.body.innerHTML;

document.body.innerHTML =
printData;

window.print();

document.body.innerHTML =
original;

location.reload();

}

displayOrder();

</script>

</body>

</html>