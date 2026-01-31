<?php
require_once __DIR__ . '/inc/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = $_POST['name']    ?? 'نامشخص';
    $address = $_POST['address'] ?? '';
    $phone   = $_POST['phone']   ?? '';

    echo "<h1 style='color:green; text-align:center;'>سفارش شما با موفقیت ثبت شد!</h1>";
    echo "<p>نام: $name</p>";
    echo "<p>آدرس: $address</p>";
    echo "<p>تلفن: $phone</p>";

    unset($_SESSION['cart']);

    echo "<p><a href='index.php'>بازگشت به فروشگاه</a></p>";

    echo "<script>setTimeout(() => { location.replace('index.php'); }, 4000);</script>";
} else {
    header("Location: index.php");
}
?>