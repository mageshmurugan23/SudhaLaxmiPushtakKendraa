<?php

include "admin/config.php";

$class = $_GET['class'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT * FROM books WHERE class_name=?");
mysqli_stmt_bind_param($stmt, "s", $class);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Books</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

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

.navbar{

width:100%;
background:#001f5c;
padding:20px 8%;
display:flex;
justify-content:space-between;
align-items:center;

}

.logo{

color:white;
font-size:34px;
font-weight:bold;

}

.nav-links{

display:flex;
gap:35px;

}

.nav-links a{

color:white;
text-decoration:none;

}

.title{

text-align:center;
margin:60px 0;

}

.title h1{

font-size:65px;
color:#001f5c;

}

.title p{

font-size:28px;
color:gray;

}

.book-container{

width:92%;
margin:auto;
display:flex;
flex-wrap:wrap;
gap:30px;

}

.book-card{

width:280px;
background:white;
border-radius:15px;
overflow:hidden;
box-shadow:0 5px 15px rgba(0,0,0,0.1);

}

.book-image{

width:100%;
height:280px;

}

.book-image img{

width:100%;
height:100%;
object-fit:cover;

}

.book-content{

padding:18px;

}

.book-name{

font-size:28px;
font-weight:bold;
color:#001f5c;
margin-bottom:10px;

}

.publisher{

color:gray;
margin-bottom:15px;

}

.price{

font-size:35px;
font-weight:bold;
color:#001f5c;
margin-bottom:20px;

}

.select-box{

width:100%;
padding:12px;
margin-bottom:18px;
border:1px solid #ddd;
border-radius:8px;

}

.cart-btn{

width:100%;
padding:15px;
border:2px solid #009245;
background:white;
font-weight:bold;
cursor:pointer;
border-radius:10px;
transition:0.3s;

}

.cart-btn:hover{

background:#009245;
color:white;

}

/* POPUP */

.popup{

width:350px;
background:white;
position:fixed;
top:50%;
left:50%;
transform:translate(-50%,-50%) scale(0);
padding:35px;
border-radius:20px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
transition:0.3s;

}

.popup.active{

transform:translate(-50%,-50%) scale(1);

}

.popup i{

font-size:70px;
color:limegreen;
margin-bottom:20px;

}

.popup h2{

font-size:40px;
color:#001f5c;

}

.popup p{

margin:15px 0;
font-size:18px;
color:gray;

}

.popup button{

padding:14px 28px;
background:#001f5c;
color:white;
border:none;
border-radius:8px;
cursor:pointer;

}

.close{

position:absolute;
top:15px;
right:20px;
font-size:25px;
cursor:pointer;

}

</style>

</head>

<body>

<div class="navbar">

<div class="logo">

SudhaLaxmiKendra

</div>

<div class="nav-links">

<a href="index.php">Home</a>
<a href="#">Shop</a>
<a href="cart.php">Cart</a>
<a href="#">Orders</a>
<a href="#">Profile</a>

</div>

</div>

<div class="title">

<h1>

Available Books

</h1>

<p>

Class : <?php echo htmlspecialchars($class, ENT_QUOTES, 'UTF-8'); ?>

</p>

</div>

<div class="book-container">

<?php

while($row=mysqli_fetch_assoc($result)){
    $bookName = htmlspecialchars($row['book_name'] ?? '', ENT_QUOTES, 'UTF-8');
    $publisher = htmlspecialchars($row['publisher'] ?? '', ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($row['price'] ?? '', ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars($row['image'] ?? '', ENT_QUOTES, 'UTF-8');
    $id = htmlspecialchars($row['id'] ?? '', ENT_QUOTES, 'UTF-8');

?>

<div class="book-card">

<div class="book-image">

<img src="uploads/<?php echo $image; ?>">

</div>

<div class="book-content">

<div class="book-name">

<?php echo $bookName; ?>

</div>

<div class="publisher">

Publisher :
<?php echo $publisher; ?>

</div>

<div class="price">

₹<?php echo $price; ?>

</div>

<select class="select-box"
id="qty<?php echo $id; ?>">

<option value="1">

Quantity : 1

</option>

<option value="2">

Quantity : 2

</option>

<option value="3">

Quantity : 3

</option>

</select>

<button class="cart-btn"

onclick="addToCart(

'<?php echo addslashes($bookName); ?>',

'<?php echo addslashes($publisher); ?>',

'<?php echo addslashes($price); ?>',

'<?php echo addslashes($image); ?>',

document.getElementById('qty<?php echo $id; ?>').value

)">

ADD TO CART

</button>

</div>

</div>

<?php

}

?>

</div>

<!-- POPUP -->

<div class="popup"
id="popup">

<div class="close"
onclick="closePopup()">

×

</div>

<i class="fa-solid fa-circle-check"></i>

<h2>

Added

</h2>

<p id="popup-text">

Book Added

</p>

<button onclick="window.location.href='cart.php'">

VIEW CART

</button>

</div>

<script>

let popup =
document.getElementById("popup");

let popupText =
document.getElementById("popup-text");

function addToCart(
book,
publisher,
price,
image,
quantity
){

let cart =

JSON.parse(
localStorage.getItem("cart")
) || [];

let item = {

name:book,
publisher:publisher,
price:price,
image:image,
quantity:quantity

};

cart.push(item);

localStorage.setItem(

"cart",

JSON.stringify(cart)

);

popup.classList.add("active");

popupText.innerHTML =
book + " Added To Cart";

}

function closePopup(){

popup.classList.remove("active");

}

</script>

</body>

</html>