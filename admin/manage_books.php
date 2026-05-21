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

/* ================= AUTO BOOKS ================= */

include "book_list.php";

/* ================= FILTER ================= */

$class = "";

if(isset($_GET['class'])){

$class = trim($_GET['class']);

$stmt = mysqli_prepare(

$conn,

"SELECT * FROM books

WHERE TRIM(LOWER(class_name))
=
TRIM(LOWER(?))

ORDER BY id DESC"

);

mysqli_stmt_bind_param($stmt,"s",$class);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

}
else{

$query =
"SELECT * FROM books ORDER BY id DESC";

$result =
mysqli_query($conn,$query);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage Books</title>

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
background:#f4f6fb;
}

/* ================= TOP ================= */

.top{
width:92%;
margin:35px auto;
display:flex;
justify-content:space-between;
align-items:center;
flex-wrap:wrap;
gap:20px;
}

.top h1{
font-size:42px;
color:#111827;
font-weight:bold;
}

/* ================= ADD BUTTON ================= */

.add-btn{
background:linear-gradient(
135deg,
#6c5ce7,
#4834d4
);
color:white;
padding:15px 28px;
border-radius:14px;
text-decoration:none;
font-size:17px;
font-weight:bold;
transition:0.3s;
box-shadow:
0 8px 18px rgba(108,92,231,0.3);
}

.add-btn:hover{
transform:translateY(-4px);
}

/* ================= FILTER ================= */

.filters{
width:92%;
margin:0 auto 30px;
display:flex;
flex-wrap:wrap;
gap:12px;
}

.filter-btn{
padding:12px 20px;
background:white;
border-radius:12px;
text-decoration:none;
color:#041c44;
font-weight:bold;
box-shadow:
0 5px 15px rgba(0,0,0,0.08);
transition:0.3s;
}

.filter-btn:hover{
background:#041c44;
color:white;
transform:translateY(-3px);
}

/* ================= TABLE ================= */

.table-box{
width:92%;
margin:auto;
background:white;
border-radius:22px;
overflow:hidden;
box-shadow:
0 10px 30px rgba(0,0,0,0.08);
padding:10px;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#f8f9fc;
color:#6b7280;
padding:22px;
text-align:left;
font-size:15px;
text-transform:uppercase;
letter-spacing:1px;
}

table td{
padding:22px;
border-bottom:
1px solid #f1f1f1;
vertical-align:middle;
}

tr:hover{
background:#f9fbff;
}

/* ================= IMAGE ================= */

.book-img{
width:85px;
height:85px;
object-fit:cover;
border-radius:16px;
}

/* ================= BOOK INFO ================= */

.book-name{
font-size:19px;
font-weight:bold;
color:#111827;
}

.publisher{
color:#6b7280;
font-size:14px;
margin-top:5px;
}

/* ================= PRICE ================= */

.price{
font-size:20px;
font-weight:bold;
color:#001f5c;
}

/* ================= ACTION ================= */

.action-box{
display:flex;
gap:12px;
}

/* ================= EDIT ================= */

.edit{
background:#0984e3;
color:white;
padding:11px 18px;
border-radius:10px;
text-decoration:none;
font-weight:bold;
transition:0.3s;
}

.edit:hover{
background:#0652dd;
transform:translateY(-3px);
}

/* ================= DELETE ================= */

.delete{
background:#ff4d4d;
color:white;
padding:11px 18px;
border-radius:10px;
text-decoration:none;
font-weight:bold;
transition:0.3s;
}

.delete:hover{
background:#e84141;
transform:translateY(-3px);
}

/* ================= EMPTY ================= */

.empty{
padding:60px;
text-align:center;
font-size:28px;
font-weight:bold;
color:gray;
}

/* ================= MOBILE ================= */

@media(max-width:900px){

.top{
flex-direction:column;
align-items:flex-start;
}

table{
display:block;
overflow-x:auto;
}

.filters{
overflow:auto;
}

}

</style>

</head>

<body>

<!-- ================= TOP ================= -->

<div class="top">

<h1>

Manage Books

</h1>

<a href="add_book.php"
class="add-btn">

<i class="fa fa-plus"></i>
Add Book

</a>

</div>

<!-- ================= FILTERS ================= -->

<div class="filters">

<a class="filter-btn"
href="manage_books.php">

All

</a>

<a class="filter-btn"
href="manage_books.php?class=Nursery">

Nursery

</a>

<a class="filter-btn"
href="manage_books.php?class=LKG">

LKG

</a>

<a class="filter-btn"
href="manage_books.php?class=UKG">

UKG

</a>

<a class="filter-btn"
href="manage_books.php?class=Class 1">

Class 1

</a>

<a class="filter-btn"
href="manage_books.php?class=Class 2">

Class 2

</a>

<a class="filter-btn"
href="manage_books.php?class=Class 3">

Class 3

</a>

<a class="filter-btn"
href="manage_books.php?class=Class 4">

Class 4

</a>

<a class="filter-btn"
href="manage_books.php?class=Class 5">

Class 5

</a>

</div>

<!-- ================= TABLE ================= -->

<div class="table-box">

<table>

<tr>

<th>

Image

</th>

<th>

Book

</th>

<th>

Publisher

</th>

<th>

Class

</th>

<th>

Price

</th>

<th>

Action

</th>

</tr>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<img class="book-img"

src="../uploads/<?php echo $row['image']; ?>">

</td>

<td>

<div class="book-name">

<?php echo $row['book_name']; ?>

</div>

</td>

<td>

<div class="publisher">

<?php echo $row['publisher']; ?>

</div>

</td>

<td>

<?php echo $row['class_name']; ?>

</td>

<td>

<div class="price">

₹<?php echo $row['price']; ?>

</div>

</td>

<td>

<div class="action-box">

<a class="edit"

href="add_book.php?id=<?php echo $row['id']; ?>">

Edit

</a>

<a class="delete"

href="delete_book.php?id=<?php echo $row['id']; ?>">

Delete

</a>

</div>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="6">

<div class="empty">

No Books Found

</div>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>