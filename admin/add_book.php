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

?>
<?php

include "config.php";

/* ================= EDIT MODE ================= */

$edit = false;

$id = "";
$school = "";
$class = "";
$book = "";
$publisher = "";
$price = "";
$old_image = "";

if(isset($_GET['id'])){

$id = $_GET['id'];

$edit = true;

$stmt = mysqli_prepare($conn, "SELECT * FROM books WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$get = mysqli_stmt_get_result($stmt);

$data =
mysqli_fetch_assoc($get);

$school = htmlspecialchars($data['school_name'] ?? '', ENT_QUOTES, 'UTF-8');
$class = htmlspecialchars($data['class_name'] ?? '', ENT_QUOTES, 'UTF-8');
$book = htmlspecialchars($data['book_name'] ?? '', ENT_QUOTES, 'UTF-8');
$publisher = htmlspecialchars($data['publisher'] ?? '', ENT_QUOTES, 'UTF-8');
$price = htmlspecialchars($data['price'] ?? '', ENT_QUOTES, 'UTF-8');
$old_image = htmlspecialchars($data['image'] ?? '', ENT_QUOTES, 'UTF-8');

}

/* ================= ADD BOOK ================= */

if(isset($_POST['add_book'])){

$school = $_POST['school_name'];
$class = $_POST['class_name'];
$book = $_POST['book_name'];
$publisher = $_POST['publisher'];
$price = $_POST['price'];

$image_name = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $file_info = pathinfo($_FILES['image']['name']);
    $file_ext = strtolower($file_info['extension'] ?? '');
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $_FILES['image']['tmp_name']);
    finfo_close($finfo);
    
    if (in_array($file_ext, $allowed_ext) && strpos($mime_type, 'image/') === 0) {
        $image_name = md5(time() . rand()) . "." . $file_ext;
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image_name);
    } else {
        echo "<script>alert('Invalid file type uploaded. Only JPG, PNG, GIF, WEBP are allowed.'); window.location.href='add_book.php';</script>";
        exit();
    }
}

$stmt = mysqli_prepare($conn, "INSERT INTO books (school_name, class_name, book_name, publisher, price, image) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssds", $school, $class, $book, $publisher, $price, $image_name);
mysqli_stmt_execute($stmt);

echo "
<script>
alert('Book Added Successfully');
window.location.href='add_book.php';
</script>
";

}

/* ================= UPDATE BOOK ================= */

if(isset($_POST['update_book'])){

$id = $_POST['id'];
$school = $_POST['school_name'];
$class = $_POST['class_name'];
$book = $_POST['book_name'];
$publisher = $_POST['publisher'];
$price = $_POST['price'];

// We need to fetch the original image first in case it wasn't passed properly from the frontend, but we rely on old_image which is populated during GET or we can fetch it again to be totally secure.
// Since we don't have old_image in POST, we query it.
$stmt = mysqli_prepare($conn, "SELECT image FROM books WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$image = $row['image'] ?? '';

/* IMAGE CHANGE */
if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $file_info = pathinfo($_FILES['image']['name']);
    $file_ext = strtolower($file_info['extension'] ?? '');
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $_FILES['image']['tmp_name']);
    finfo_close($finfo);
    
    if (in_array($file_ext, $allowed_ext) && strpos($mime_type, 'image/') === 0) {
        $image = md5(time() . rand()) . "." . $file_ext;
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
    } else {
        echo "<script>alert('Invalid file type uploaded. Only JPG, PNG, GIF, WEBP are allowed.'); window.location.href='add_book.php?id=$id';</script>";
        exit();
    }
}

/* UPDATE */
$stmt = mysqli_prepare($conn, "UPDATE books SET school_name=?, class_name=?, book_name=?, publisher=?, price=?, image=? WHERE id=?");
mysqli_stmt_bind_param($stmt, "ssssdsi", $school, $class, $book, $publisher, $price, $image, $id);
mysqli_stmt_execute($stmt);

echo "
<script>
alert('Book Updated Successfully');
window.location.href='add_book.php';
</script>
";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

<?php

if($edit){

echo "Edit Book";

}
else{

echo "Add Book";

}

?>

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
padding:40px;
}

/* ================= TOP ================= */

.top-bar{
width:550px;
margin:auto auto 20px;
display:flex;
justify-content:space-between;
align-items:center;
}

/* ================= BACK ================= */

.back-btn{
background:#041c44;
color:white;
padding:12px 20px;
border-radius:12px;
text-decoration:none;
font-weight:bold;
display:flex;
align-items:center;
gap:10px;
transition:0.3s;
}

.back-btn:hover{
background:#6c5ce7;
}

/* ================= FORM ================= */

.form-box{
width:550px;
background:white;
margin:auto;
padding:40px;
border-radius:20px;
box-shadow:
0 5px 15px rgba(0,0,0,0.1);
}

h1{
text-align:center;
color:#6c5ce7;
margin-bottom:35px;
font-size:45px;
}

input,
select{
width:100%;
padding:16px;
margin-bottom:22px;
border:1px solid #ccc;
border-radius:12px;
font-size:17px;
}

/* ================= IMAGE ================= */

.current-image{

width:120px;
height:120px;
object-fit:cover;
border-radius:16px;
margin-bottom:20px;
display:block;
border:2px solid #ddd;
padding:5px;
background:#f7f7f7;

}

/* ================= BUTTON ================= */

button{
width:100%;
padding:16px;
border:none;
background:#6c5ce7;
color:white;
font-size:20px;
border-radius:12px;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#4834d4;
}

/* ================= RESPONSIVE ================= */

@media(max-width:650px){

.form-box,
.top-bar{
width:100%;
}

}

</style>

</head>

<body>

<!-- ================= TOP ================= -->

<div class="top-bar">

<a href="dashboard.php"
class="back-btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

</div>

<!-- ================= FORM ================= -->

<div class="form-box">

<h1>

<?php

if($edit){

echo "Edit Book";

}
else{

echo "Add New Book";

}

?>

</h1>

<form method="POST"
enctype="multipart/form-data">

<input type="hidden"
name="id"
value="<?php echo $id; ?>">

<input type="text"
name="school_name"
placeholder="School Name"
required
value="<?php echo $school; ?>">

<select name="class_name"
required>

<option value="">Select Class</option>

<option value="Nursery"
<?php if($class=="Nursery"){echo "selected";} ?>>

Nursery

</option>

<option value="LKG"
<?php if($class=="LKG"){echo "selected";} ?>>

LKG

</option>

<option value="UKG"
<?php if($class=="UKG"){echo "selected";} ?>>

UKG

</option>

<option value="Class 1"
<?php if($class=="Class 1"){echo "selected";} ?>>

Class 1

</option>

<option value="Class 2"
<?php if($class=="Class 2"){echo "selected";} ?>>

Class 2

</option>

<option value="Class 3"
<?php if($class=="Class 3"){echo "selected";} ?>>

Class 3

</option>

<option value="Class 4"
<?php if($class=="Class 4"){echo "selected";} ?>>

Class 4

</option>

<option value="Class 5"
<?php if($class=="Class 5"){echo "selected";} ?>>

Class 5

</option>

</select>

<input type="text"
name="book_name"
placeholder="Book Name"
required
value="<?php echo $book; ?>">

<input type="text"
name="publisher"
placeholder="Publisher"
required
value="<?php echo $publisher; ?>">

<input type="number"
name="price"
placeholder="Price"
required
value="<?php echo $price; ?>">

<?php

if($edit){

?>

<img src="../uploads/<?php echo trim($old_image); ?>"
class="current-image">

<?php

}

?>

<input type="file"
name="image">

<button type="submit"

name="<?php

if($edit){

echo "update_book";

}
else{

echo "add_book";

}

?>">

<?php

if($edit){

echo "Update Book";

}
else{

echo "Add Book";

}

?>

</button>

</form>

</div>

</body>

</html>