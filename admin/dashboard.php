<?php

session_start();

if(!isset($_SESSION['role'])){

header("Location: ../login.php");

}

if($_SESSION['role'] != "admin"){

header("Location: ../login.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

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

    display:flex;

}

/* ================= SIDEBAR ================= */

.sidebar{

    width:260px;

    height:100vh;

    background:white;

    padding:30px 20px;

    box-shadow:
    2px 0 10px rgba(0,0,0,0.05);

    position:fixed;

    left:0;

    top:0;

}

.logo{

    font-size:30px;

    font-weight:bold;

    color:#6c5ce7;

    margin-bottom:50px;

    text-align:center;

}

/* ================= MENU ================= */

.menu{

    list-style:none;

}

.menu li{

    margin-bottom:18px;

}

.menu li a{

    text-decoration:none;

    color:#555;

    display:flex;

    align-items:center;

    gap:15px;

    padding:15px;

    border-radius:12px;

    transition:0.3s;

    font-size:17px;

}

.menu li a:hover{

    background:#6c5ce7;

    color:white;

}

/* ================= MAIN ================= */

.main{

    margin-left:260px;

    width:100%;

    padding:35px;

}

/* ================= TOP BAR ================= */

.top-bar{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:40px;

}

.top-bar h1{

    font-size:40px;

    color:#2d3436;

}

/* ================= ADD BUTTON ================= */

.add-book-link{

    text-decoration:none;

}

.add-btn{

    background:#6c5ce7;

    color:white;

    border:none;

    padding:15px 30px;

    border-radius:12px;

    font-size:18px;

    cursor:pointer;

    transition:0.3s;

    font-weight:bold;

}

.add-btn:hover{

    background:#4834d4;

    transform:scale(1.05);

}

/* ================= CARDS ================= */

.cards{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(220px,1fr));

    gap:25px;

    margin-bottom:40px;

}

.card{

    background:white;

    padding:30px;

    border-radius:18px;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.08);

    transition:0.3s;

}

.card:hover{

    transform:translateY(-8px);

}

.card h2{

    color:#6c5ce7;

    margin-bottom:15px;

    font-size:22px;

}

.card p{

    font-size:38px;

    font-weight:bold;

    color:#2d3436;

}

/* ================= TABLE ================= */

.table-box{

    background:white;

    border-radius:18px;

    padding:25px;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.08);

}

.table-title{

    margin-bottom:25px;

}

.table-title h2{

    color:#2d3436;

    font-size:28px;

}

table{

    width:100%;

    border-collapse:collapse;

}

table th{

    text-align:left;

    padding:16px;

    background:#f5f6fa;

    color:#555;

}

table td{

    padding:18px 15px;

    border-bottom:
    1px solid #eee;

}

/* ================= STATUS ================= */

.status{

    padding:8px 16px;

    border-radius:30px;

    font-size:14px;

    font-weight:bold;

}

.active{

    background:#d4f8e8;

    color:#00b894;

}

.low{

    background:#fff3cd;

    color:#f39c12;

}

.out{

    background:#ffd6d6;

    color:#e74c3c;

}

/* ================= BUTTONS ================= */

.action-btn{

    border:none;

    padding:9px 16px;

    border-radius:8px;

    cursor:pointer;

    color:white;

    margin-right:8px;

    font-size:14px;

}

.edit{

    background:#0984e3;

}

.delete{

    background:#e74c3c;

}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .sidebar{

        width:80px;

    }

    .logo{

        font-size:18px;

    }

    .menu li a span{

        display:none;

    }

    .main{

        margin-left:80px;

    }

}

</style>

</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

<div class="logo">

Pustak

</div>

<ul class="menu">

<li>

<a href="#">

<i class="fa-solid fa-house"></i>

<span>

Dashboard

</span>

</a>

</li>

<li>

<a href="manage_books.php">

<i class="fa-solid fa-book"></i>

<span>

Books

</span>

</a>

</li>

<li>

<a href="admin_orders.php">

<i class="fa-solid fa-cart-shopping"></i>

<span>

Orders

</span>

</a>

</li>

<li>

<a href="customers.php">

<i class="fa-solid fa-users"></i>

<span>

Customers

</span>

</a>

</li>

<li>

<a href="analytics.php">

<i class="fa-solid fa-chart-line"></i>

<span>

Analytics

</span>

</a>

</li>

<li>

<a href="settings.php">

<i class="fa-solid fa-gear"></i>

<span>

Settings

</span>

</a>

</li>

</ul>

</div>

<!-- ================= MAIN ================= -->

<div class="main">

<!-- ================= TOP BAR ================= -->

<div class="top-bar">

<h1>

Admin Dashboard

</h1>

<a href="add_book.php"
class="add-book-link">

<button class="add-btn">

+ Add Book

</button>

</a>

</div>

<!-- ================= CARDS ================= -->

<div class="cards">

<div class="card">

<h2>

Total Books

</h2>

<p>

120

</p>

</div>

<div class="card">

<h2>

Orders

</h2>

<p>

58

</p>

</div>

<div class="card">

<h2>

Customers

</h2>

<p>

34

</p>

</div>

<div class="card">

<h2>

Revenue

</h2>

<p>

₹24K

</p>

</div>

</div>

<!-- ================= TABLE ================= -->

<div class="table-box">

<div class="table-title">

<h2>

Books List

</h2>

</div>

<table>

<tr>

<th>

Book

</th>

<th>

Class

</th>

<th>

Publisher

</th>

<th>

Price

</th>

<th>

Status

</th>

<th>

Action

</th>

</tr>

<tr>

<td>

Hindi

</td>

<td>

Class 1

</td>

<td>

Hapigo

</td>

<td>

₹165

</td>

<td>

<span class="status active">

Active

</span>

</td>

<td>

<button class="action-btn edit">

Edit

</button>

<button class="action-btn delete">

Delete

</button>

</td>

</tr>

<tr>

<td>

English

</td>

<td>

Class 2

</td>

<td>

NCERT

</td>

<td>

₹145

</td>

<td>

<span class="status low">

Low Stock

</span>

</td>

<td>

<button class="action-btn edit">

Edit

</button>

<button class="action-btn delete">

Delete

</button>

</td>

</tr>

<tr>

<td>

Math

</td>

<td>

Class 3

</td>

<td>

Hapigo

</td>

<td>

₹235

</td>

<td>

<span class="status out">

Out Of Stock

</span>

</td>

<td>

<button class="action-btn edit">

Edit

</button>

<button class="action-btn delete">

Delete

</button>

</td>

</tr>

</table>

</div>

</div>

</body>

</html>