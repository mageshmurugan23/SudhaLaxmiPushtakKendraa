<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: ../login.php");
    exit();
}

include "config.php";

/* ================= CHECK ID ================= */

if(isset($_GET['id'])){

$id = $_GET['id'];

    $stmt = mysqli_prepare($conn, "SELECT image FROM books WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if($row) {
        $image = $row['image'] ?? '';
        if ($image != "") {
            $image_path = "../uploads/".$image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }

        $stmt = mysqli_prepare($conn, "DELETE FROM books WHERE id=?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }

/* ================= REDIRECT ================= */

echo "

<script>

alert('Book Deleted Successfully');

window.location.href='manage_books.php';

</script>

";

}
else{

echo "

<script>

alert('Invalid Request');

window.location.href='manage_books.php';

</script>

";

}

?>