<?php require_once __DIR__ . '/inc/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسویه حساب - فروشگاه محصولات ایرانی</title>
    <link rel="stylesheet" href="assets/css/cstyle.css">          
    <link rel="stylesheet" href="assets/css/estyle.css">      
</head>
<body>

<header>
    <h1>تکمیل خرید</h1>
    <a href="cart.php" class="btn-back">← بازگشت به سبد خرید</a>
</header>

<main class="checkout-container">

    <div class="checkout-grid">

        
        <section class="checkout-form-section">
            <h2>اطلاعات تحویل</h2>
            <form action="process.php" method="post" class="checkout-form" onsubmit="return confirm('آیا سفارش را نهایی می‌کنید؟');">

                <div class="form-group">
                    <label for="full-name">نام و نام خانوادگی کامل *</label>
                    <input type="text" id="full-name" name="name" required placeholder="مثال: ارفعان محمدی">
                </div>

                <div class="form-group">
                    <label for="phone">شماره همراه *</label>
                    <input type="tel" id="phone" name="phone" required placeholder="۰۹۱۲XXXXXXX" pattern="09[0-9]{9}">
                </div>

                <div class="form-group">
                    <label for="address">آدرس کامل پستی *</label>
                    <textarea id="address" name="address" rows="4" required placeholder="استان، شهر، خیابان، پلاک، واحد ..."></textarea>
                </div>

                <div class="form-group">
                    <label for="postal-code">کد پستی (۱۰ رقمی)</label>
                    <input type="text" id="postal-code" name="postal" pattern="\d{10}" placeholder="XXXXXXXXXX">
                </div>

                <button type="submit" class="btn-submit">ثبت سفارش و پرداخت</button>
            </form>
        </section>

        
        <aside class="order-summary">
            <h2>خلاصه سفارش</h2>
            <?php

            $products = [ 
            1 => ['name' => 'زعفران سرگل نگین', 'price' => 980000],
            2 => ['name' => 'پسته احمدآقایی ممتاز', 'price' => 720000],
            3 => ['name' => 'عسل طبیعی کوهستان', 'price' => 320000],
            4 => ['name' => 'فرش دستباف قم ابریشم', 'price' => 18500000],
            5 => ['name' => 'گلیم دستباف کردستان', 'price' => 4200000]
                        ];

            if (empty($_SESSION['cart'])) {
                echo "<p>سبد خرید خالی است!</p>";
            } else {
                $total = 0;
                echo "<ul class='summary-list'>";
                foreach ($_SESSION['cart'] as $id => $qty) {
                    if (isset($products[$id])) {
                        $p = $products[$id];
                        $sub = $p['price'] * $qty;
                        $total += $sub;
                        echo "<li>{$p['name']} × {$qty} = " . number_format($sub) . " تومان</li>";
                    }
                }
                echo "</ul>";
                echo "<div class='total-box'>";
                echo "<strong>جمع کل:</strong> " . number_format($total) . " تومان";
                echo "</div>";
            }
            ?>
        </aside>

    </div>

</main>

<footer>
    <p>Erfan Alaie:)</p>
</footer>

</body>
</html>