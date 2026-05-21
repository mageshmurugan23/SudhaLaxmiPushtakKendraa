<?php

include "admin/config.php";

/* ================= SIGNUP LOGIC ================= */

if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    /* ================= PASSWORD MATCH ================= */
    if($password != $confirm_password){
        echo "<script>alert('Passwords Do Not Match');</script>";
    }
    else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        /* ================= CHECK EMAIL ================= */
        $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) > 0){
            echo "<script>alert('Email Already Exists');</script>";
        }
        else{
            $role = 'user';
            $insert_stmt = mysqli_prepare($conn, "INSERT INTO users(name, email, password, role) VALUES(?, ?, ?, ?)");
            mysqli_stmt_bind_param($insert_stmt, "ssss", $name, $email, $hashed_password, $role);
            mysqli_stmt_execute($insert_stmt);
            echo "<script>alert('Signup Successful'); window.location.href='login.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            width:100%;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg, #041c44, #0a2c6d, #001233);
            overflow-x:hidden;
            position:relative;
            padding: 40px 0; /* Space for scrolling on smaller screens */
        }

        /* ================= BACKGROUND ANIMATIONS ================= */
        body::before{
            content:"";
            position:absolute;
            width:500px;
            height:500px;
            background: rgba(244,197,66,0.15);
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
            background: rgba(255,255,255,0.08);
            border-radius:50%;
            bottom:-120px;
            right:-120px;
            filter:blur(40px);
            animation:move2 7s infinite alternate;
        }

        @keyframes move1{ 100%{ transform: translate(40px,40px); } }
        @keyframes move2{ 100%{ transform: translate(-40px,-40px); } }

        /* ================= SIGNUP BOX ================= */
        .signup-box{
            width:430px;
            padding:45px;
            border-radius:30px;
            background: rgba(255,255,255,0.08);
            backdrop-filter:blur(18px);
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            position:relative;
            z-index:10;
            animation:popup 0.7s ease;
        }

        @keyframes popup{
            0%{ transform: translateY(50px); opacity:0; }
            100%{ transform: translateY(0); opacity:1; }
        }

        /* ================= LOGO ================= */
        .logo{
            text-align:center;
            margin-bottom:30px;
        }

        .logo-img{
            width:100px;
            height:100px;
            border-radius:50%;
            object-fit:cover;
            padding:4px;
            background:#041c44;
            border:3px solid #f4c542;
            box-shadow: 0 0 25px rgba(244,197,66,0.4);
            margin-bottom:15px;
            transition:0.4s;
        }

        .logo h1{
            font-size:32px;
            color:white;
            margin-bottom:5px;
        }

        .logo p{
            color:#ddd;
            font-size:15px;
        }

        /* ================= INPUT ================= */
        .input-box{
            position:relative;
            margin-bottom:20px;
        }

        .input-box input{
            width:100%;
            padding:15px 18px;
            padding-left:55px;
            border-radius:15px;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.08);
            color:white;
            font-size:15px;
            outline:none;
            transition:0.3s;
        }

        .input-box input::placeholder{ color:#ddd; }

        .input-box input:focus{
            border-color:#f4c542;
            box-shadow: 0 0 15px rgba(244,197,66,0.4);
            transform:translateY(-2px);
        }

        .input-box i{
            position:absolute;
            left:20px;
            top:17px;
            font-size:18px;
            color:#f4c542;
        }

        .toggle-password{
            position:absolute;
            right:20px;
            top:17px;
            cursor:pointer;
            color:#ddd;
        }

        /* ================= BUTTON ================= */
        .signup-btn{
            width:100%;
            padding:16px;
            border:none;
            border-radius:15px;
            background: linear-gradient(135deg, #f4c542, #ffdd75);
            color:#041c44;
            font-size:18px;
            font-weight:bold;
            cursor:pointer;
            transition:0.4s;
            box-shadow: 0 8px 20px rgba(244,197,66,0.3);
            margin-top:10px;
        }

        .signup-btn:hover{
            transform: translateY(-3px) scale(1.02);
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

        .extra a:hover{ color:white; }

        @media(max-width:500px){
            .signup-box{ width:92%; padding:35px 25px; }
            .logo h1{ font-size:28px; }
        }
    </style>
</head>

<body>

<div class="signup-box">
    <!-- LOGO SECTION -->
    <div class="logo">
        <img src="LOGO1.png" class="logo-img">
        <h1>Create Account</h1>
        <p>Join us and start shopping</p>
    </div>

    <!-- SIGNUP FORM -->
    <form method="POST">
        <div class="input-box">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" placeholder="Full Name" required>
        </div>

        <div class="input-box">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="input-box">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Create Password" id="password" required>
            <span class="toggle-password" onclick="togglePassword('password', 'eye1')">
                <i class="fa-solid fa-eye" id="eye1"></i>
            </span>
        </div>

        <div class="input-box">
            <i class="fa-solid fa-shield-check"></i>
            <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>
            <span class="toggle-password" onclick="togglePassword('confirm_password', 'eye2')">
                <i class="fa-solid fa-eye" id="eye2"></i>
            </span>
        </div>

        <button type="submit" name="signup" class="signup-btn">
            Signup Now
        </button>
    </form>

    <div class="extra">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

<script>
    function togglePassword(inputId, eyeId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeId);
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

</body>
</html>