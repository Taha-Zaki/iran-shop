# راه‌اندازی پروژه فروشگاه (PHP)

این پروژه یک فروشگاه ساده با **PHP + Session** است (صفحه محصولات، سبد خرید، تسویه حساب).

## 1) ساختار پیشنهادی (اصلاح‌شده)

```
iran-shop/
  public/
    index.php
    cart.php
    checkout.php
    process.php
    assets/
      css/
        cstyle.css
        bstyle.css
        estyle.css
      js/
        script.js
  Dockerfile
  .dockerignore
```

✅ مسیرهای CSS/JS داخل فایل‌های PHP اصلاح شده و الان درست به `assets/...` اشاره می‌کنند.

---

## 2) تست روی سیستم خودت (Windows)

### گزینه A: سریع‌ترین راه (بدون XAMPP) — PHP Built-in Server
1) اگر PHP روی ویندوزت نصب نیست، راحت‌ترین نصب:
   - XAMPP نصب کن (داخلش PHP هم هست)
   - یا PHP standalone نصب کن و `php` را به PATH اضافه کن.

2) داخل پوشه `iran-shop` برو و این دستور را اجرا کن:

```bash
cd iran-shop
php -S 127.0.0.1:8000 -t public
```

3) بعد در مرورگر باز کن:
- `http://127.0.0.1:8000/`

### گزینه B: با XAMPP (اگر می‌خوای مثل هاست واقعی باشد)
1) XAMPP را نصب و Apache را Start کن.
2) پوشه `public` را داخل `htdocs` کپی کن (یا کل پروژه را).
3) آدرس:
- `http://localhost/` (یا `http://localhost/iran-shop/public/`)

---

## 3) بالا آوردن روی «سرور رایگان»

### پیشنهاد 1: Koyeb (Free Tier + Docker)
Koyeb اجازه می‌دهد اپ‌های Docker را روی پلن رایگان اجرا کنی. citeturn0search1turn0search6

مراحل کلی:
1) پروژه را داخل GitHub بساز و پوش کن.
2) در داشبورد Koyeb یک **Service** جدید بساز.
3) سورس را GitHub انتخاب کن.
4) چون پروژه Dockerfile دارد، Koyeb خودش build می‌کند.
5) Port: برای این Dockerfile لازم نیست دستی چیزی ست کنی (Apache روی 80 می‌آید).

### پیشنهاد 2: Render (اگر PHP را با Docker Deploy کنی)
Render از Docker build پشتیبانی دارد. citeturn0search5turn0search13

مراحل کلی:
1) ریپو را GitHub بساز.
2) در Render یک **Web Service** بساز و گزینه **Docker** را انتخاب کن.
3) Deploy.

> نکته: سیاست‌های رایگان هر پلتفرم ممکن است محدودیت‌هایی مثل sleep یا محدودیت منابع داشته باشد. حتما صفحه‌ی free/pricing خود پلتفرم را ببین. citeturn0search0turn0search13

---

## 4) اجرای پروژه با Docker روی سیستم خودت (اختیاری)
اگر Docker Desktop داری:

```bash
cd iran-shop
docker build -t iran-shop .
docker run --rm -p 8080:80 iran-shop
```

بعد باز کن:
- `http://127.0.0.1:8080/`

---

## 5) نکات سریع دیباگ
- اگر CSS لود نشد: آدرس فایل‌ها باید این شکلی باشد: `assets/css/...`
- Session کار نکرد: مطمئن شو از طریق `http://127.0.0.1:8000` باز می‌کنی نه فایل مستقیم.
- اگر روی هاست ارور 500 گرفتی: نسخه PHP را 8.x بگذار (این کدها با 8.x سازگارند).
