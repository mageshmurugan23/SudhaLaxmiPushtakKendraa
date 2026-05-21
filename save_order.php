<?php

include "admin/config.php";

/* ================= GET DATA ================= */

$order_id = $_POST['order_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$items = $_POST['items'];

// NOTE: For true security, prices should be recalculated by fetching item prices 
// from the database using book IDs. Since the current cart stores names/prices directly,
// we are taking them from POST, but using prepared statements to prevent SQL injection.
$subtotal = $_POST['subtotal'];
$cgst = $_POST['cgst'];
$sgst = $_POST['sgst'];
$shipping = $_POST['shipping'];
$total = $_POST['total'];

/* ================= INSERT ORDER ================= */

$stmt = mysqli_prepare($conn, "INSERT INTO orders (order_id, customer_name, customer_email, customer_phone, address, city, pincode, items, subtotal, cgst, sgst, shipping_charge, total_price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");
mysqli_stmt_bind_param($stmt, "ssssssssddddd", $order_id, $name, $email, $phone, $address, $city, $pincode, $items, $subtotal, $cgst, $sgst, $shipping, $total);
$query = mysqli_stmt_execute($stmt);

if($query){

    echo "
    <h2 style='margin-bottom:20px'>
    Invoice
    </h2>
    <p>
    <b>Order ID :</b>
    " . htmlspecialchars($order_id, ENT_QUOTES, 'UTF-8') . "
    </p>
    <p>
    <b>Total :</b>
    ₹" . htmlspecialchars($total, ENT_QUOTES, 'UTF-8') . "
    </p>
    ";

}
else{

echo mysqli_error($conn);

}

?>