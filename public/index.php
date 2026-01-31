<?php require_once __DIR__ . '/inc/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه محصولات ایرانی</title>
    <link rel="stylesheet" href="assets/css/cstyle.css">
</head>
<body>

<header>
    <h1>فروشگاه محصولات اصیل ایرانی</h1>
    <nav>
        <a href="cart.php" class="cart-link">
            سبد خرید 
            <span class="cart-count">
                <?php 

                echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
                ?>
            </span>
        </a>
    </nav>
</header>

<main>

<?php
?>
<script>
window.addEventListener('load', () => {
  if (!sessionStorage.getItem('welcomeShown')) {
    alert('به فروشگاه محصولات ایرانی خوش آمدید!');
    const ok = confirm('مایل به مشاهده محصولات هستید؟');
    sessionStorage.setItem('welcomeShown', '1');
    if (!ok) alert('خوشحال می‌شویم بعداً برگردید!');
  }
});
</script>
<?php

$products = [
    1 => ['name' => 'زعفران سرگل نگین', 'price' => 980000, 'img' => 'zaferan.jpg'],
    2 => ['name' => 'پسته احمدآقایی ممتاز', 'price' => 720000, 'img' => 'peste.jpg'],
    3 => ['name' => 'عسل طبیعی کوهستان', 'price' => 320000, 'img' => 'asal.jpg'],
    4 => ['name' => 'فرش دستباف قم ابریشم', 'price' => 18500000, 'img' => 'farsh.jpg'],
    5 => ['name' => 'گلیم دستباف کردستان', 'price' => 4200000, 'img' => 'gilim.jpg']
];

if (isset($_GET['add']) && is_numeric($_GET['add'])) {
    $id = (int)$_GET['add'];
    if (isset($products[$id])) {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        } else {
            $_SESSION['cart'][$id]++;
        }
        echo "<div class='success-msg'>{$products[$id]['name']} به سبد اضافه شد!</div>";
    }
}

echo "<div class='product-grid'>";

foreach ($products as $id => $item) {
    echo "<div class='product-card'>";
    echo "<div class='product-img-placeholder'>{$item['name']}</div>";
    echo "<h3>{$item['name']}</h3>";
    echo "<p class='price'>" . number_format($item['price']) . " تومان</p>";
    echo "<button class='btn-add' onclick='addToCart($id, \"{$item['name']}\")'>افزودن به سبد</button>";
    echo "</div>";
}

echo "</div>";
?>

</main>

<footer>
    <p>Erfan Alaie:)</p>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
