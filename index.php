<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
New Sudha Laxmi Pustak Kendra
</title>

<!-- FONT AWESOME -->

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
background:#f5f5f5;
}

/* ================= NAVBAR ================= */

.navbar{

width:100%;

background:#041c44;

display:flex;

justify-content:space-between;

align-items:center;

padding:15px 8%;

position:fixed;

top:0;

z-index:1000;

}

.logo-section{

display:flex;

align-items:center;

gap:15px;

}

/* ================= LOGO ================= */

.logo{

width:70px;

height:70px;

border-radius:50%;

object-fit:cover;

background:white;

padding:4px;

box-shadow:
0 5px 15px rgba(0,0,0,0.2);

}

.logo-section h2{

color:white;

font-size:26px;

font-style:italic;

}

/* ================= NAV LINKS ================= */

.nav-links{

display:flex;

list-style:none;

gap:30px;

align-items:center;

}

.nav-links li{

position:relative;

}

.nav-links a{

text-decoration:none;

color:white;

font-size:18px;

transition:0.3s;

cursor:pointer;

}

.nav-links a:hover{

color:#f4c542;

}

.active{

color:#f4c542;

}

/* ================= DROPDOWN ================= */

.dropdown-menu{

position:absolute;

top:35px;

left:0;

background:white;

min-width:250px;

border-radius:10px;

overflow:hidden;

display:none;

box-shadow:
0 5px 15px rgba(0,0,0,0.2);

}

.dropdown-menu a{

display:block;

padding:15px 20px;

color:#041c44;

border-bottom:1px solid #eee;

font-size:16px;

}

.dropdown-menu a:hover{

background:#041c44;

color:white;

}

.show-dropdown{

display:block;

}

/* ================= MENU ================= */

.menu-icon{

display:none;

color:white;

font-size:25px;

}

/* ================= HERO ================= */

.hero{

width:100%;

height:100vh;

background:url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1974&auto=format&fit=crop');

background-size:cover;

background-position:center;

position:relative;

display:flex;

justify-content:center;

align-items:center;

text-align:center;

padding-top:80px;

}

.overlay{

position:absolute;

width:100%;

height:100%;

background:rgba(0,0,0,0.7);

}

.hero-content{

position:relative;

z-index:10;

color:white;

padding:20px;

}

/* ================= HERO LOGO ================= */

.hero-logo{

width:220px;

height:220px;

object-fit:cover;

border-radius:50%;

background:white;

padding:8px;

margin-bottom:25px;

box-shadow:
0 10px 30px rgba(0,0,0,0.5);

animation:float 3s ease-in-out infinite;

}

@keyframes float{

0%{
transform:translateY(0px);
}

50%{
transform:translateY(-10px);
}

100%{
transform:translateY(0px);
}

}

.hero-content h1{

font-size:68px;

line-height:85px;

margin-bottom:20px;

}

.hero-content p{

font-size:25px;

margin-bottom:35px;

color:#f1f1f1;

}

/* ================= BUTTON ================= */

.shop-btn{

padding:16px 40px;

border:none;

border-radius:40px;

background:#f4c542;

color:#041c44;

font-size:18px;

font-weight:bold;

cursor:pointer;

transition:0.3s;

}

.shop-btn:hover{

transform:scale(1.05);

background:white;

}

/* ================= SCHOOL SECTION ================= */

.school-section{

padding:90px 8%;

}

.school-section h2{

text-align:center;

font-size:45px;

margin-bottom:50px;

color:#041c44;

}

.school-container{

display:flex;

justify-content:center;

}

.school-card{

width:900px;

background:white;

border-radius:25px;

overflow:hidden;

box-shadow:
0 5px 15px rgba(0,0,0,0.1);

transition:0.3s;

}

.school-card:hover{

transform:translateY(-10px);

}

.school-card img{

width:100%;

height:350px;

object-fit:cover;

}

.school-details{

padding:30px;

text-align:center;

}

.school-details h3{

font-size:40px;

margin-bottom:10px;

color:#041c44;

}

.school-details p{

color:gray;

margin-bottom:20px;

font-size:18px;

}

.school-details button{

padding:14px 35px;

border:none;

background:#041c44;

color:white;

border-radius:40px;

cursor:pointer;

font-size:16px;

transition:0.3s;

}

.school-details button:hover{

background:#f4c542;

color:black;

}

/* ================= CLASS POPUP ================= */

.class-popup{

width:100%;

height:100vh;

background:rgba(0,0,0,0.6);

position:fixed;

top:0;

left:0;

display:none;

justify-content:center;

align-items:center;

z-index:2000;

}

.popup-box{

width:500px;

background:white;

padding:40px;

border-radius:20px;

text-align:center;

position:relative;

}

.popup-box h2{

margin-bottom:30px;

color:#041c44;

font-size:35px;

}

.popup-buttons{

display:flex;

flex-wrap:wrap;

gap:15px;

justify-content:center;

}

.popup-buttons button{

padding:14px 25px;

border:none;

background:#041c44;

color:white;

border-radius:10px;

cursor:pointer;

transition:0.3s;

}

.popup-buttons button:hover{

background:#f4c542;

color:black;

}

.close-btn{

position:absolute;

top:15px;

right:20px;

font-size:35px;

cursor:pointer;

}

/* ================= FEATURED ================= */

.books-section{

padding:80px 8%;

}

.books-section h2{

text-align:center;

font-size:42px;

margin-bottom:50px;

color:#041c44;

}

.books-container{

display:flex;

gap:30px;

flex-wrap:wrap;

justify-content:center;

}

.book-card{

width:320px;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:
0 5px 15px rgba(0,0,0,0.1);

transition:0.3s;

}

.book-card:hover{

transform:translateY(-10px);

}

.book-card img{

width:100%;

height:250px;

object-fit:cover;

}

.book-info{

padding:20px;

text-align:center;

}

.book-info h3{

font-size:28px;

margin-bottom:15px;

color:#041c44;

}

.book-info p{

color:gray;

font-size:17px;

line-height:28px;

}

/* ================= FOOTER ================= */

footer{

background:#041c44;

color:white;

padding:60px 8%;

margin-top:50px;

}

.footer-container{

display:flex;

justify-content:space-between;

flex-wrap:wrap;

gap:40px;

}

.footer-box{

width:300px;

}

.footer-box h2,
.footer-box h3{

margin-bottom:20px;

}

.footer-box p{

margin-bottom:10px;

color:#ddd;

}

.footer-box input{

width:100%;

padding:12px;

border:none;

border-radius:10px;

margin-bottom:10px;

}

.footer-box button{

padding:12px 25px;

border:none;

background:#f4c542;

border-radius:10px;

cursor:pointer;

font-weight:bold;

}

.copyright{

text-align:center;

margin-top:50px;

color:#ccc;

font-size:15px;

}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

.nav-links{
display:none;
}

.menu-icon{
display:block;
}

.hero-content h1{

font-size:42px;

line-height:55px;

}

.hero-content p{

font-size:18px;

}

.hero-logo{

width:150px;

height:150px;

}

.school-card{
width:100%;
}

.school-details h3{

font-size:28px;

}

.popup-box{
width:90%;
}

}

</style>

</head>

<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar">

<div class="logo-section">

<img src="LOGO1.png"
alt="logo"
class="logo">

<h2>
New Sudha Laxmi Pustak Kendra
</h2>

</div>

<ul class="nav-links">

<li>

<a class="active"
href="index.php">

Home

</a>

</li>

<li>

<a onclick="toggleDropdown()">

School

<i class="fa-solid fa-caret-down"></i>

</a>

<div class="dropdown-menu"
id="schoolDropdown">

<a onclick="showClasses()">

Gyan Sarovar Public School

</a>

</div>

</li>

<li>

<a href="cart.php">

Cart

</a>

</li>

<li>

<a href="orders.php">

Orders

</a>

</li>

<li>

<a href="profile.php">

Profile

</a>

</li>


</ul>

<div class="menu-icon">

<i class="fa-solid fa-bars"></i>

</div>

</nav>

<!-- ================= HERO ================= -->

<section class="hero">

<div class="overlay"></div>

<div class="hero-content">

<img src="LOGO1.png"
class="hero-logo">

<h1>

New Sudha Laxmi <br>
Pustak Kendra

</h1>

<p>

All School Books & Stationery In One Place

</p>

<button class="shop-btn">

Explore Now

</button>

</div>

</section>

<!-- ================= SCHOOL SECTION ================= -->

<section class="school-section">

<h2>

Available School

</h2>

<div class="school-container">

<div class="school-card">

<img

src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop"

alt="school">

<div class="school-details">

<h3>

Gyan Sarovar Public School

</h3>

<p>

Piprakhurd, Supaul

</p>

<button onclick="showClasses()">

View Classes

</button>

</div>

</div>

</div>

</section>

<!-- ================= CLASS POPUP ================= -->

<div class="class-popup"
id="classPopup">

<div class="popup-box">

<span class="close-btn"
onclick="closePopup()">

&times;

</span>

<h2>

Select Class

</h2>

<div class="popup-buttons">

<button onclick="showBooks('Nursery')">
Nursery
</button>

<button onclick="showBooks('LKG')">
LKG
</button>

<button onclick="showBooks('UKG')">
UKG
</button>

<button onclick="showBooks('1')">
Class 1
</button>

<button onclick="showBooks('2')">
Class 2
</button>

<button onclick="showBooks('3')">
Class 3
</button>

<button onclick="showBooks('4')">
Class 4
</button>

<button onclick="showBooks('5')">
Class 5
</button>

</div>

</div>

</div>

<!-- ================= FEATURED ================= -->

<section class="books-section">

<h2>

Featured Stationery

</h2>

<div class="books-container">

<div class="book-card">

<img src="https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=1000&auto=format&fit=crop">

<div class="book-info">

<h3>

Premium Notebooks

</h3>

<p>

High quality notebooks for daily school use.

</p>

</div>

</div>

<div class="book-card">

<img src="https://images.unsplash.com/photo-1588072432836-e10032774350?q=80&w=1000&auto=format&fit=crop">

<div class="book-info">

<h3>

Stationery Collection

</h3>

<p>

Pens, pencils, erasers and all essentials.

</p>

</div>

</div>

<div class="book-card">

<img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=1000&auto=format&fit=crop">

<div class="book-info">

<h3>

Study Essentials

</h3>

<p>

Smart learning accessories for students.

</p>

</div>

</div>

</div>

</section>

<!-- ================= FOOTER ================= -->

<footer>

<div class="footer-container">

<div class="footer-box">

<h2>

SudhaLaxmiKendra

</h2>

<p>

All School Books and Stationery Items in One Place.

</p>

</div>

<div class="footer-box">

<h3>

Contact

</h3>

<p>

+91 9876543210

</p>

<p>

info@gmail.com

</p>

</div>

<div class="footer-box">

<h3>

Newsletter

</h3>

<input type="text"
placeholder="Enter Email">

<button>

Subscribe

</button>

</div>

</div>

<div class="copyright">

© 2026 New Sudha Laxmi Pustak Kendra

</div>

</footer>

<script>

/* ================= DROPDOWN ================= */

function toggleDropdown(){

document
.getElementById("schoolDropdown")
.classList.toggle("show-dropdown");

}

/* ================= SHOW CLASS ================= */

function showClasses(){

document
.getElementById("classPopup")
.style.display = "flex";

}

/* ================= CLOSE POPUP ================= */

function closePopup(){

document
.getElementById("classPopup")
.style.display = "none";

}

/* ================= SHOW BOOKS ================= */

function showBooks(className){

window.location.href =
"books.php?class=" + className;

}

</script>

</body>
</html>