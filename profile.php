<?php

session_start();

include "admin/config.php";

/* ================= LOGIN CHECK ================= */

if(!isset($_SESSION['user_id'])){

header("Location: login.php");
exit();

}

/* ================= USER DATA ================= */

$name  = $_SESSION['name'];
$email = $_SESSION['email'];
$role  = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

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

background:
linear-gradient(
135deg,
#041c44,
#08285c,
#001233
);

min-height:100vh;

color:white;

}

/* ================= NAVBAR ================= */

.navbar{

width:100%;
padding:18px 50px;

background:#001f54;

display:flex;
justify-content:space-between;
align-items:center;

box-shadow:0 5px 15px rgba(0,0,0,0.3);

}

.logo{

display:flex;
align-items:center;
gap:15px;

}

.logo img{

width:65px;
height:65px;

border-radius:50%;

object-fit:cover;

border:3px solid #f4c542;

background:#041c44;

padding:2px;

}

.logo h1{

font-size:36px;
font-style:italic;
color:white;

}

.nav-links{

display:flex;
gap:35px;

}

.nav-links a{

text-decoration:none;
color:white;

font-size:18px;
font-weight:500;

transition:0.3s;

}

.nav-links a:hover{

color:#f4c542;

}

/* ================= PROFILE SECTION ================= */

.profile-container{

display:flex;
justify-content:center;
align-items:center;

padding:60px 20px;

}

/* ================= PROFILE CARD ================= */

.profile-card{

width:450px;

background:
rgba(255,255,255,0.08);

backdrop-filter:blur(15px);

border:
1px solid rgba(255,255,255,0.15);

border-radius:30px;

padding:40px;

text-align:center;

box-shadow:
0 15px 35px rgba(0,0,0,0.3);

animation:popup 0.6s ease;

}

@keyframes popup{

0%{
opacity:0;
transform:translateY(40px);
}

100%{
opacity:1;
transform:translateY(0);
}

}

/* ================= PROFILE IMAGE ================= */

.profile-img{

width:130px;
height:130px;

border-radius:50%;

object-fit:cover;

border:5px solid #f4c542;

padding:4px;

background:#041c44;

margin-bottom:20px;

box-shadow:
0 0 25px rgba(244,197,66,0.4);

}

/* ================= TITLE ================= */

.profile-card h2{

font-size:32px;
margin-bottom:10px;

}

.role{

display:inline-block;

padding:8px 20px;

border-radius:30px;

background:#f4c542;

color:#041c44;

font-weight:bold;

margin-bottom:25px;

}

/* ================= INFO ================= */

.info-box{

background:
rgba(255,255,255,0.07);

padding:18px;

border-radius:18px;

margin-bottom:18px;

text-align:left;

}

.info-box h4{

color:#f4c542;
margin-bottom:8px;

font-size:15px;

}

.info-box p{

font-size:17px;

word-break:break-word;

}

/* ================= BUTTONS ================= */

.btn-group{

display:flex;
gap:15px;

margin-top:25px;

}

.btn{

flex:1;

padding:15px;

border:none;

border-radius:15px;

font-size:16px;
font-weight:bold;

cursor:pointer;

transition:0.4s;

text-decoration:none;

display:flex;
justify-content:center;
align-items:center;
gap:8px;

}

/* EDIT BUTTON */

.edit-btn{

background:
linear-gradient(
135deg,
#f4c542,
#ffdd75
);

color:#041c44;

}

.edit-btn:hover{

transform:translateY(-3px);

background:white;

}

/* LOGOUT BUTTON */

.logout-btn{

background:
rgba(255,255,255,0.1);

color:white;

border:1px solid rgba(255,255,255,0.2);

}

.logout-btn:hover{

background:#ff4d4d;

}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

.navbar{

padding:15px 20px;
flex-direction:column;
gap:15px;

}

.logo h1{

font-size:28px;

}

.nav-links{

gap:20px;
flex-wrap:wrap;
justify-content:center;

}

.profile-card{

width:100%;

}

.btn-group{

flex-direction:column;

}

}

</style>

</head>

<body>

<!-- ================= NAVBAR ================= -->

<div class="navbar">

<div class="logo">

<img src="LOGO1.png">

<h1>New Sudha Laxmi Pustak Kendra</h1>

</div>

<div class="nav-links">

<a href="index.php">Home</a>

<a href="cart.php">Cart</a>

<a href="orders.php">Orders</a>

<a href="profile.php">Profile</a>

<a href="logout.php">Logout</a>

</div>

</div>

<!-- ================= PROFILE ================= -->

<div class="profile-container">

<div class="profile-card">

<img src="LOGO1.png" class="profile-img">

<h2>

<?php echo $name; ?>

</h2>

<div class="role">

<?php echo ucfirst($role); ?>

</div>

<!-- ================= INFO ================= -->

<div class="info-box">

<h4>

<i class="fa-solid fa-user"></i>
 Full Name

</h4>

<p>

<?php echo $name; ?>

</p>

</div>

<div class="info-box">

<h4>

<i class="fa-solid fa-envelope"></i>
 Email Address

</h4>

<p>

<?php echo $email; ?>

</p>

</div>

<div class="info-box">

<h4>

<i class="fa-solid fa-shield-halved"></i>
 Account Role

</h4>

<p>

<?php echo ucfirst($role); ?>

</p>

</div>

<!-- ================= BUTTONS ================= -->

<div class="btn-group">

<a href="edit_profile.php"
class="btn edit-btn">

<i class="fa-solid fa-pen"></i>

Edit Profile

</a>

<a href="logout.php"
class="btn logout-btn">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</div>

</div>

</body>

</html>