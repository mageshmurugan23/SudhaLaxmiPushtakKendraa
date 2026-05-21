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

$success = "";

/* ================= SAVE SETTINGS ================= */

if(isset($_POST['save'])){

$site_name = $_POST['site_name'];

$admin_email = $_POST['admin_email'];

$phone = $_POST['phone'];

$address = $_POST['address'];

$theme = $_POST['theme'];

$check = mysqli_query($conn,"SELECT * FROM settings");

if(mysqli_num_rows($check) > 0){

mysqli_query($conn,"
UPDATE settings SET
site_name='$site_name',
admin_email='$admin_email',
phone='$phone',
address='$address',
theme='$theme'
");

}else{

mysqli_query($conn,"
INSERT INTO settings
(site_name,admin_email,phone,address,theme)
VALUES
('$site_name','$admin_email','$phone','$address','$theme')
");

}

$success = "Settings Updated Successfully";

}

/* ================= FETCH ================= */

$get = mysqli_query($conn,"SELECT * FROM settings LIMIT 1");

$data = mysqli_fetch_assoc($get);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

Settings

</title>

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
position:fixed;
left:0;
top:0;
box-shadow:2px 0 10px rgba(0,0,0,0.05);

}

.logo{

font-size:30px;
font-weight:bold;
color:#6c5ce7;
margin-bottom:50px;
text-align:center;

}

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

.menu li a:hover,
.menu li a.active{

background:#6c5ce7;
color:white;

}

/* ================= MAIN ================= */

.main{

margin-left:260px;
width:100%;
padding:35px;

}

.title{

font-size:40px;
font-weight:bold;
margin-bottom:30px;
color:#2d3436;

}

/* ================= CARD ================= */

.card{

background:white;
padding:30px;
border-radius:18px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
max-width:800px;

}

.success{

background:#d4f8e8;
color:#00b894;
padding:15px;
border-radius:10px;
margin-bottom:20px;

}

.form-group{
margin-bottom:22px;
}

.form-group label{

display:block;
margin-bottom:10px;
font-weight:bold;
color:#555;

}

.form-group input,
.form-group textarea,
.form-group select{

width:100%;
padding:15px;
border:1px solid #ddd;
border-radius:10px;
font-size:16px;
outline:none;

}

.form-group textarea{
height:100px;
resize:none;
}

.save-btn{

background:#6c5ce7;
color:white;
border:none;
padding:15px 30px;
border-radius:10px;
font-size:16px;
cursor:pointer;
transition:0.3s;

}

.save-btn:hover{

background:#4834d4;

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
<a href="dashboard.php">
<i class="fa-solid fa-house"></i>
<span>Dashboard</span>
</a>
</li>

<li>
<a href="manage_books.php">
<i class="fa-solid fa-book"></i>
<span>Books</span>
</a>
</li>

<li>
<a href="admin_orders.php">
<i class="fa-solid fa-cart-shopping"></i>
<span>Orders</span>
</a>
</li>

<li>
<a href="customers.php">
<i class="fa-solid fa-users"></i>
<span>Customers</span>
</a>
</li>

<li>
<a href="analytics.php">
<i class="fa-solid fa-chart-line"></i>
<span>Analytics</span>
</a>
</li>

<li>
<a href="settings.php" class="active">
<i class="fa-solid fa-gear"></i>
<span>Settings</span>
</a>
</li>

</ul>

</div>

<!-- ================= MAIN ================= -->

<div class="main">

<div class="title">

Settings

</div>

<div class="card">

<?php if($success != ""){ ?>

<div class="success">

<?php echo $success; ?>

</div>

<?php } ?>

<form method="POST">

<div class="form-group">

<label>

Website Name

</label>

<input type="text"
name="site_name"
value="<?php echo $data['site_name'] ?? ''; ?>">

</div>

<div class="form-group">

<label>

Admin Email

</label>

<input type="email"
name="admin_email"
value="<?php echo $data['admin_email'] ?? ''; ?>">

</div>

<div class="form-group">

<label>

Phone Number

</label>

<input type="text"
name="phone"
value="<?php echo $data['phone'] ?? ''; ?>">

</div>

<div class="form-group">

<label>

Address

</label>

<textarea
name="address"><?php echo $data['address'] ?? ''; ?></textarea>

</div>

<div class="form-group">

<label>

Theme

</label>

<select name="theme">

<option value="Light">

Light

</option>

<option value="Dark">

Dark

</option>

</select>

</div>

<button type="submit"
name="save"
class="save-btn">

Save Settings

</button>

</form>

</div>

</div>

</body>

</html>