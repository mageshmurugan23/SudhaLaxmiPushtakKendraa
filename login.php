<?php

session_start();

include "admin/config.php";

/* ================= LOGIN ================= */

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

/* ================= SUCCESS ================= */

if($user = mysqli_fetch_assoc($result)){
    
    // Support both new password_hash() and old md5() for backwards compatibility during transition, or just enforce new. I will check both.
    if(password_verify($password, $user['password']) || md5($password) === $user['password']){

        /* SESSION */
        session_regenerate_id(true); // Prevent session fixation

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        /* ================= REDIRECT ================= */
        if($user['role'] == "admin"){
            header("Location: admin/dashboard.php");
            exit();
        }
        else{
            header("Location: index.php");
            exit();
        }
    }
    else{
        echo "<script>alert('Invalid Email Or Password');</script>";
    }
}
else{
    echo "<script>alert('Invalid Email Or Password');</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Modern Login</title>

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

width:100%;
height:100vh;

display:flex;
justify-content:center;
align-items:center;

background:
linear-gradient(
135deg,
#041c44,
#0a2c6d,
#001233
);

overflow:hidden;
position:relative;

}

/* ================= BACKGROUND ================= */

body::before{

content:"";

position:absolute;

width:500px;
height:500px;

background:
rgba(244,197,66,0.15);

border-radius:50%;

top:-120px;
left:-120px;

filter:blur(40px);

animation:move1 6s infinite alternate;

}

body::after{

content:"";

position:absolute;

width:450px;
height:450px;

background:
rgba(255,255,255,0.08);

border-radius:50%;

bottom:-120px;
right:-120px;

filter:blur(40px);

animation:move2 7s infinite alternate;

}

@keyframes move1{

100%{
transform:
translate(40px,40px);
}

}

@keyframes move2{

100%{
transform:
translate(-40px,-40px);
}

}

/* ================= LOGIN BOX ================= */

.login-box{

width:430px;

padding:45px;

border-radius:30px;

background:
rgba(255,255,255,0.08);

backdrop-filter:blur(18px);

border:
1px solid rgba(255,255,255,0.2);

box-shadow:
0 15px 40px rgba(0,0,0,0.3);

position:relative;

z-index:10;

animation:popup 0.7s ease;

}

@keyframes popup{

0%{
transform:
translateY(50px);
opacity:0;
}

100%{
transform:
translateY(0);
opacity:1;
}

}

/* ================= LOGO ================= */

.logo{

text-align:center;
margin-bottom:30px;

}

.logo-img{

width:120px;
height:120px;

border-radius:50%;

object-fit:cover;

padding:4px;

background:#041c44;

border:3px solid #f4c542;

box-shadow:
0 0 25px rgba(244,197,66,0.4);

margin-bottom:18px;

transition:0.4s;

}

.logo-img:hover{

transform:scale(1.08) rotate(5deg);

}

.logo h1{

font-size:38px;
color:white;
margin-bottom:8px;

}

.logo p{

color:#ddd;
font-size:15px;

}

/* ================= INPUT ================= */

.input-box{

position:relative;
margin-bottom:24px;

}

.input-box input{

width:100%;

padding:17px 18px;
padding-left:55px;

border-radius:15px;

border:
1px solid rgba(255,255,255,0.2);

background:
rgba(255,255,255,0.08);

color:white;

font-size:16px;

outline:none;

transition:0.3s;

}

.input-box input::placeholder{

color:#ddd;

}

.input-box input:focus{

border-color:#f4c542;

box-shadow:
0 0 15px rgba(244,197,66,0.4);

transform:translateY(-2px);

}

.input-box i{

position:absolute;

left:20px;
top:19px;

font-size:18px;

color:#f4c542;

}

/* ================= PASSWORD TOGGLE ================= */

.toggle-password{

position:absolute;

right:20px;
top:19px;

cursor:pointer;

color:#ddd;

}

/* ================= BUTTON ================= */

.login-btn{

width:100%;

padding:16px;

border:none;

border-radius:15px;

background:
linear-gradient(
135deg,
#f4c542,
#ffdd75
);

color:#041c44;

font-size:18px;
font-weight:bold;

cursor:pointer;

transition:0.4s;

box-shadow:
0 8px 20px rgba(244,197,66,0.3);

}

.login-btn:hover{

transform:
translateY(-3px) scale(1.02);

background:white;

}

/* ================= EXTRA ================= */

.extra{

text-align:center;
margin-top:25px;

color:white;

font-size:15px;

}

.extra a{

color:#f4c542;

font-weight:bold;

text-decoration:none;

transition:0.3s;

}

.extra a:hover{

color:white;

}

/* ================= DIVIDER ================= */

.divider{

margin:25px 0;

display:flex;
align-items:center;

gap:15px;

color:#ddd;

font-size:14px;

}

.divider::before,
.divider::after{

content:"";

flex:1;

height:1px;

background:
rgba(255,255,255,0.2);

}

/* ================= SOCIAL ================= */

.social-login{

display:flex;
justify-content:center;
gap:18px;

}

.social-btn{

width:50px;
height:50px;

border-radius:50%;

display:flex;
justify-content:center;
align-items:center;

background:
rgba(255,255,255,0.08);

border:
1px solid rgba(255,255,255,0.15);

color:white;

font-size:20px;

cursor:pointer;

transition:0.4s;

}

.social-btn:hover{

background:#f4c542;
color:#041c44;

transform:
translateY(-5px);

}

/* ================= RESPONSIVE ================= */

@media(max-width:500px){

.login-box{

width:92%;
padding:35px 25px;

}

.logo h1{

font-size:30px;

}

.logo-img{

width:95px;
height:95px;

}

}

</style>

</head>

<body>

<div class="login-box">

<!-- ================= LOGO ================= -->

<div class="logo">

<img src="LOGO1.png"
class="logo-img">

<h1>

Welcome Back

</h1>

<p>

Login To Continue Shopping

</p>

</div>

<!-- ================= FORM ================= -->

<form method="POST">

<div class="input-box">

<i class="fa-solid fa-envelope"></i>

<input type="email"
name="email"
placeholder="Enter Your Email"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input type="password"
name="password"
placeholder="Enter Password"
id="password"
required>

<span class="toggle-password"
onclick="togglePassword()">

<i class="fa-solid fa-eye"></i>

</span>

</div>

<button type="submit"
name="login"
class="login-btn">

Login Now

</button>

</form>

<!-- ================= DIVIDER ================= -->

<div class="divider">

OR CONTINUE WITH

</div>

<!-- ================= SOCIAL ================= -->

<div class="social-login">

<div class="social-btn">
<i class="fa-brands fa-google"></i>
</div>

<div class="social-btn">
<i class="fa-brands fa-facebook-f"></i>
</div>

<div class="social-btn">
<i class="fa-brands fa-instagram"></i>
</div>

</div>

<!-- ================= SIGNUP ================= -->

<div class="extra">

Don't have an account?

<a href="signup.php">

Create Account

</a>

</div>

</div>

<!-- ================= JAVASCRIPT ================= -->

<script>

function togglePassword(){

let password =
document.getElementById("password");

if(password.type === "password"){

password.type = "text";

}
else{

password.type = "password";

}

}

</script>

</body>

</html>