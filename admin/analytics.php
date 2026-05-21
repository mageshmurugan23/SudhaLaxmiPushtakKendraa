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

include "config.php";

/* ================= TOTAL CUSTOMERS ================= */

$total_users = 0;

$users_query =
mysqli_query(
$conn,
"SELECT COUNT(*) AS total_users
FROM users
WHERE role='user'"
);

if($users_query){

$users_data =
mysqli_fetch_assoc($users_query);

$total_users =
$users_data['total_users'];

}

/* ================= TOTAL BOOKS ================= */

$total_books = 0;

$books_query =
mysqli_query(
$conn,
"SELECT COUNT(*) AS total_books
FROM books"
);

if($books_query){

$books_data =
mysqli_fetch_assoc($books_query);

$total_books =
$books_data['total_books'];

}

/* ================= TOTAL ORDERS ================= */

$total_orders = 0;

$orders_query =
mysqli_query(
$conn,
"SELECT COUNT(*) AS total_orders
FROM orders"
);

if($orders_query){

$orders_data =
mysqli_fetch_assoc($orders_query);

$total_orders =
$orders_data['total_orders'];

}

/* ================= TOTAL REVENUE ================= */

$total_revenue = 0;

$revenue_query =
mysqli_query(
$conn,
"SELECT SUM(total_price) AS revenue
FROM orders"
);

if($revenue_query){

$revenue_data =
mysqli_fetch_assoc($revenue_query);

$total_revenue =
$revenue_data['revenue'];

if($total_revenue == NULL){

$total_revenue = 0;

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Analytics Dashboard</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f5f6fa;
padding:35px;
}

.top-bar{

display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:35px;
flex-wrap:wrap;
gap:20px;

}

.title{

font-size:45px;
font-weight:bold;
color:#041c44;

}

.back-btn{

background:#041c44;
color:white;
padding:14px 24px;
border-radius:12px;
text-decoration:none;
font-weight:bold;
display:flex;
align-items:center;
gap:10px;
transition:0.3s;

}

.back-btn:hover{

background:#f4c542;
color:black;

}

.analytics-grid{

display:grid;
grid-template-columns:
repeat(auto-fit,minmax(250px,1fr));

gap:25px;
margin-bottom:35px;

}

.card{

background:white;
padding:30px;
border-radius:25px;
box-shadow:
0 5px 15px rgba(0,0,0,0.08);

}

.card i{

font-size:45px;
margin-bottom:20px;
color:#041c44;

}

.card h2{

font-size:20px;
color:gray;
margin-bottom:10px;

}

.card h1{

font-size:45px;
color:#041c44;

}

.chart-box{

background:white;
padding:35px;
border-radius:25px;
box-shadow:
0 5px 15px rgba(0,0,0,0.08);

}

.chart-title{

font-size:32px;
margin-bottom:35px;
color:#041c44;

}

.chart{

display:flex;
align-items:flex-end;
justify-content:space-between;
height:300px;
gap:20px;

}

.bar{

flex:1;

background:
linear-gradient(
180deg,
#6c5ce7,
#041c44
);

border-radius:15px 15px 0 0;

position:relative;

}

.bar span{

position:absolute;
bottom:-40px;
left:50%;

transform:translateX(-50%);

font-weight:bold;
color:#041c44;

}

.bar h3{

position:absolute;
top:-35px;
left:50%;

transform:translateX(-50%);

font-size:22px;
color:#041c44;

}

@media(max-width:900px){

body{
padding:20px;
}

.title{
font-size:35px;
}

.chart{
height:220px;
}

}

</style>

</head>

<body>

<div class="top-bar">

<h1 class="title">
Analytics Dashboard
</h1>

<a href="dashboard.php"
class="back-btn">

<i class="fa-solid fa-arrow-left"></i>

Back Dashboard

</a>

</div>

<div class="analytics-grid">

<div class="card">

<i class="fa-solid fa-users"></i>

<h2>Total Customers</h2>

<h1>
<?php echo $total_users; ?>
</h1>

</div>

<div class="card">

<i class="fa-solid fa-book"></i>

<h2>Total Books</h2>

<h1>
<?php echo $total_books; ?>
</h1>

</div>

<div class="card">

<i class="fa-solid fa-cart-shopping"></i>

<h2>Total Orders</h2>

<h1>
<?php echo $total_orders; ?>
</h1>

</div>

<div class="card">

<i class="fa-solid fa-indian-rupee-sign"></i>

<h2>Revenue</h2>

<h1>

₹<?php echo number_format($total_revenue,2); ?>

</h1>

</div>

</div>

<div class="chart-box">

<h2 class="chart-title">
Website Analytics
</h2>

<div class="chart">

<div class="bar"
style="height:60%;">

<h3>
<?php echo $total_users; ?>
</h3>

<span>
Users
</span>

</div>

<div class="bar"
style="height:70%;">

<h3>
<?php echo $total_books; ?>
</h3>

<span>
Books
</span>

</div>

<div class="bar"
style="height:85%;">

<h3>
<?php echo $total_orders; ?>
</h3>

<span>
Orders
</span>

</div>

<div class="bar"
style="height:95%;">

<h3>

₹<?php echo number_format($total_revenue,0); ?>

</h3>

<span>
Revenue
</span>

</div>

</div>

</div>

</body>

</html>