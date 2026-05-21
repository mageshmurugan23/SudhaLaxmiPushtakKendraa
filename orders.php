<?php

session_start();

include "admin/config.php";

/* ================= LOGIN CHECK ================= */

if(!isset($_SESSION['user_id'])){

header("Location: login.php");
exit();

}

/* ================= GET ALL ORDERS ================= */

$orders =
mysqli_query(
$conn,
"SELECT * FROM orders
ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>My Orders</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f5f5f5;
padding:40px;
}

.title{
font-size:55px;
font-weight:bold;
color:#041c44;
margin-bottom:35px;
}

.order-card{
background:white;
padding:30px;
border-radius:25px;
margin-bottom:25px;
box-shadow:
0 5px 15px rgba(0,0,0,0.08);
}

.order-top{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
flex-wrap:wrap;
gap:20px;
}

.order-id{
font-size:34px;
font-weight:bold;
color:#041c44;
margin-bottom:8px;
}

.order-date{
font-size:17px;
color:gray;
}

.status{
padding:12px 22px;
border-radius:30px;
font-weight:bold;
font-size:15px;
color:white;
}

.pending{
background:#f4b400;
color:black;
}

.shipped{
background:#2196f3;
}

.delivered{
background:green;
}

.book-item{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 0;
border-bottom:1px solid #ddd;
gap:20px;
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
border-radius:12px;
background:#eee;
}

.book-details h3{
font-size:25px;
color:#041c44;
margin-bottom:8px;
}

.book-details p{
font-size:17px;
color:gray;
margin-bottom:5px;
}

.item-price{
font-size:25px;
font-weight:bold;
color:#041c44;
}

.total{
margin-top:25px;
text-align:right;
font-size:32px;
font-weight:bold;
color:#041c44;
}

.empty{
background:white;
padding:100px;
border-radius:25px;
text-align:center;
font-size:35px;
color:gray;
box-shadow:
0 5px 15px rgba(0,0,0,0.08);
}

@media(max-width:900px){

body{
padding:20px;
}

.title{
font-size:40px;
}

.book-item{
flex-direction:column;
align-items:flex-start;
}

.total{
text-align:left;
}

}

</style>

</head>

<body>

<h1 class="title">
My Orders
</h1>

<?php

if(mysqli_num_rows($orders) == 0){

echo "

<div class='empty'>

No Orders Found

</div>

";

}

while($row = mysqli_fetch_assoc($orders)){

$items =
json_decode($row['items'],true);

$status =
$row['status'];

$statusClass = "pending";

if($status == "Shipped"){

$statusClass = "shipped";

}
else if($status == "Delivered"){

$statusClass = "delivered";

}

?>

<div class="order-card">

<div class="order-top">

<div>

<div class="order-id">

<?php echo htmlspecialchars($row['order_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>

</div>

<div class="order-date">

<?php echo date(
"d M Y h:i A",
strtotime($row['order_date'])
); ?>

</div>

</div>

<div class="status <?php echo $statusClass; ?>">

<?php echo $status; ?>

</div>

</div>

<?php

if(is_array($items)){

foreach($items as $item){

$image = "";

if(isset($item['image'])){

$image = $item['image'];

}

?>

<div class="book-item">

<div class="book-left">

<img src="uploads/<?php echo $image; ?>">

<div class="book-details">

<h3>

<?php echo htmlspecialchars($item['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>

</h3>

<p>

Quantity :
<?php echo $item['quantity']; ?>

</p>

<p>

Price :
₹<?php echo $item['price']; ?>

</p>

</div>

</div>

<div class="item-price">

₹<?php echo $item['price'] * $item['quantity']; ?>

</div>

</div>

<?php

}

}

?>

<div class="total">

Total :
₹<?php echo number_format($row['total_price'],2); ?>

</div>

</div>

<?php } ?>

</body>

</html>