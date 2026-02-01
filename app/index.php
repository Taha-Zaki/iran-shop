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
$products = [
    1 => [
        'name'     => 'زعفران سرگل',
        'price'    => 980000,
        'category' => 'food',   
        'rating'   => 4,          
        'stock'    => 15,
        'img' => 'zaferan.jpg'
    ],
    2 => [
        'name'     => 'پسته ممتاز',
        'price'    => 720000,
        'category' => 'food',
        'rating'   => 5,
        'stock'    => 8,
        'img' => 'peste.jpg'
        
    ],
    3 => [
        'name'     => 'فرش دستباف',
        'price'    => 18500000,
        'category' => 'luxury',
        'rating'   => 3,          
        'stock'    => 3,
        'img' => 'gilim.jpg'
        
    ],
    4 => [
        'name'     => 'عسل طبیعی کوهستان',
        'price'    => 320000,
        'category' => 'food',
        'rating'   => 4,          
        'stock'    => 20,
        'img' => 'asal.jpg'
    ]
];

if (isset($_GET['add']) && is_numeric($_GET['add'])) {
    $id = (int)$_GET['add'];
    if (isset($products[$id]) && $products[$id]['stock'] > 0) {
        if (!isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] = 1;
        else $_SESSION['cart'][$id]++;
        echo "<div class='success'>{$products[$id]['name']} اضافه شد!</div>";
    } else {
        echo "<div class='error'>موجودی کافی نیست!</div>";
    }
}

echo "<div class='product-grid'>";
foreach ($products as $id => $item) {
    echo "<div class='product-card'>";

    echo "<div class='stars'>";
    for ($i = 1; $i <= 5; $i++) {
        echo ($i <= $item['rating']) ? "★" : "☆";
    }
    echo "</div>";

    echo "<h3>{$item['name']}</h3>";
    echo "<p class='price'>" . number_format($item['price']) . " تومان</p>";

    $discount_text = "";
    switch ($item['category']) {
        case 'food':
            $discount_text = "۵٪ تخفیف مواد غذایی";
            break;
        case 'luxury':
            $discount_text = "۱۲٪ تخفیف لوکس";
            break;
        default:
            $discount_text = "بدون تخفیف";
    }
    echo "<small>$discount_text</small><br>";

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