<?php require_once __DIR__ . '/inc/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسویه حساب</title>
    <link rel="stylesheet" href="assets/css/estyle.css">
    <link rel="stylesheet" href="assets/css/cstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<header><h1>تکمیل خرید</h1></header>

<main class="checkout-container">
    <form action="process.php" method="post" onsubmit="return confirm('سفارش نهایی شود؟');">
        <label>نام و نام خانوادگی *</label><br>
        <input type="text" name="name" required><br><br>

        <!-- فهرست کشویی استان‌ها -->
        <label>استان *</label><br>
        <select name="province" required>
            <option value="">انتخاب کنید</option>
            <option value="آذربایجان شرقی">آذربایجان شرقی</option>
            <option value="تهران">تهران</option>
            <option value="اصفهان">اصفهان</option>
            <option value="فارس">فارس</option>
            <!-- می‌تونی بقیه استان‌ها رو اضافه کنی -->
        </select><br><br>

        <label>آدرس کامل *</label><br>
        <textarea name="address" required></textarea><br><br>

        <button type="submit" class="btn-submit">ثبت سفارش</button>
    </form>

    <div class="summary">
        <h3>خلاصه سبد</h3>
        <?php
         $products = [ 
    1 => ['name' => 'زعفران سرگل نگین', 'price' => 980000],
    2 => ['name' => 'پسته احمدآقایی ممتاز', 'price' => 720000],
    3 => ['name' => 'عسل طبیعی کوهستان', 'price' => 320000],
    4 => ['name' => 'فرش دستباف قم ابریشم', 'price' => 18500000],
    5 => ['name' => 'گلیم دستباف کردستان', 'price' => 4200000]
];
        if (!empty($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $qty) {
                if (isset($products[$id])) {
                    $sub = $products[$id]['price'] * $qty;
                    $total += $sub;
                    echo "<p>{$products[$id]['name']} × $qty = " . number_format($sub) . " تومان</p>";
                }
            }
            echo "<strong>جمع کل: " . number_format($total) . " تومان</strong>";
        } else {
            echo "<p>سبد خالی است</p>";
        }
        ?>
    </div>
</main>

</body>
</html>