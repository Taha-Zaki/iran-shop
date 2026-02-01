<?php
// Global bootstrap for all pages: prevents "headers already sent" and starts sessions safely.
ob_start();

// Set timezone (adjust if needed)
date_default_timezone_set('Asia/Tehran');

// Start session if not started
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Basic error display toggle (keep ON for local dev, OFF for production)
// You can set APP_ENV=production on the server to hide errors.
$appEnv = getenv('APP_ENV') ?: 'development';
if ($appEnv === 'production') {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
} else {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}
?>
