function addToCart(id, name) {
    if (confirm(`آیا «${name}» به سبد خرید اضافه شود؟`)) {
        window.location.href = `index.php?add=${id}`;
    }
}

// برای صفحه cart.php - به‌روزرسانی زنده جمع کل
function updateCartTotal() {
    const rows = document.querySelectorAll('.cart-item');
    let grandTotal = 0;

    rows.forEach(row => {
        const qty = parseInt(row.querySelector('.qty').value) || 0;
        const price = parseInt(row.dataset.price);
        const subtotal = qty * price;
        row.querySelector('.subtotal').textContent = subtotal.toLocaleString('fa-IR');
        grandTotal += subtotal;
    });

    document.getElementById('grand-total').textContent = grandTotal.toLocaleString('fa-IR');
}