<?php require_once __DIR__ . '/inc/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
    <link rel="stylesheet" href="assets/css/bstyle.css">
</head>
<body>

<header>
    <h1>سبد خرید شما</h1>
    <a href="index.php" class="btn-back">← ادامه خرید</a>
</header>

<main>

<?php

$products = [ 
    1 => ['name' => 'زعفران سرگل نگین', 'price' => 980000],
    2 => ['name' => 'پسته احمدآقایی ممتاز', 'price' => 720000],
    3 => ['name' => 'عسل طبیعی کوهستان', 'price' => 320000],
    4 => ['name' => 'فرش دستباف قم ابریشم', 'price' => 18500000],
    5 => ['name' => 'گلیم دستباف کردستان', 'price' => 4200000]
];

if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $id = (int)$_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}

if (empty($_SESSION['cart'])) {
    echo "<p class='empty-cart'>سبد خرید شما خالی است!</p>";
} else {
    echo "<table class='cart-table'>";
    echo "<thead><tr><th>محصول</th><th>قیمت واحد</th><th>تعداد</th><th>جمع ردیف</th><th></th></tr></thead>";
    echo "<tbody>";

    foreach ($_SESSION['cart'] as $id => $qty) {
        if (isset($products[$id])) {
            $p = $products[$id];
            $sub = $p['price'] * $qty;
            echo "<tr class='cart-item' data-price='{$p['price']}'>";
            echo "<td>{$p['name']}</td>";
            echo "<td>" . number_format($p['price']) . " تومان</td>";
            echo "<td><input type='number' class='qty' value='$qty' min='1' onchange='updateCartTotal()'></td>";
            echo "<td class='subtotal'>" . number_format($sub) . " تومان</td>";
            echo "<td><a href='cart.php?remove=$id' class='btn-remove' onclick='return confirm(\"حذف شود؟\")'>حذف</a></td>";
            echo "</tr>";
        }
    }

    echo "</tbody>";
    echo "<tfoot><tr><td colspan='3'>جمع کل خرید</td><td id='grand-total'>0</td><td></td></tr></tfoot>";
    echo "</table>";

    echo "<div class='cart-actions'><a href='checkout.php' class='btn-checkout'>تسویه حساب →</a></div>";
}
?>

</main>

<script src="assets/js/script.js"></script>
<script>updateCartTotal();</script>

</body>
</html>