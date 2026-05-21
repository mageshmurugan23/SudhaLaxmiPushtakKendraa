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

/* ================= GET USERS ================= */

$users =
mysqli_query(
$conn,
"SELECT * FROM users
WHERE role='user'
ORDER BY id DESC"
);

$total_users =
mysqli_num_rows($users);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Customers</title>

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

/* ================= TOP ================= */

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

/* ================= STATS ================= */

.stats{

background:white;

padding:25px;

border-radius:20px;

margin-bottom:30px;

box-shadow:
0 5px 15px rgba(0,0,0,0.08);

display:flex;
justify-content:space-between;
align-items:center;

}

.stats h2{

font-size:28px;
color:#041c44;

}

.stats p{

font-size:40px;
font-weight:bold;
color:#041c44;

}

/* ================= TABLE ================= */

.table-box{

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:
0 5px 15px rgba(0,0,0,0.08);

}

table{

width:100%;
border-collapse:collapse;

}

table th{

background:#041c44;

color:white;

padding:18px;

text-align:left;

font-size:16px;

}

table td{

padding:20px;

border-bottom:
1px solid #eee;

font-size:16px;

}

tr:hover{

background:#f9fbff;

}

/* ================= USER ================= */

.user-box{

display:flex;
align-items:center;
gap:15px;

}

.user-icon{

width:50px;
height:50px;

border-radius:50%;

background:#041c44;

display:flex;
justify-content:center;
align-items:center;

color:white;

font-size:20px;

}

/* ================= BADGE ================= */

.role{

padding:8px 18px;

border-radius:30px;

background:#d4f8e8;

color:#009245;

font-weight:bold;

display:inline-block;

}

/* ================= EMPTY ================= */

.empty{

padding:60px;

text-align:center;

font-size:30px;

color:gray;

}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

body{
padding:20px;
}

.table-box{
overflow-x:auto;
}

.title{
font-size:35px;
}

}

</style>

</head>

<body>

<!-- ================= TOP ================= -->

<div class="top-bar">

<h1 class="title">

Customers

</h1>

<a href="dashboard.php"
class="back-btn">

<i class="fa-solid fa-arrow-left"></i>

Back Dashboard

</a>

</div>

<!-- ================= STATS ================= -->

<div class="stats">

<h2>

Total Registered Customers

</h2>

<p>

<?php echo $total_users; ?>

</p>

</div>

<!-- ================= TABLE ================= -->

<div class="table-box">

<?php

if($total_users > 0){

?>

<table>

<tr>

<th>

ID

</th>

<th>

Customer

</th>

<th>

Email

</th>

<th>

Role

</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($users)){

?>

<tr>

<td>

#<?php echo $row['id']; ?>

</td>

<td>

<div class="user-box">

<div class="user-icon">

<i class="fa-solid fa-user"></i>

</div>

<div>

<b>

<?php echo htmlspecialchars($row['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>

</b>

</div>

</div>

</td>

<td>

<?php echo htmlspecialchars($row['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>

</td>

<td>

<span class="role">

<?php echo ucfirst($row['role']); ?>

</span>

</td>

</tr>

<?php

}

?>

</table>

<?php

}
else{

echo "

<div class='empty'>

No Customers Found

</div>

";

}

?>

</div>

</body>

</html>