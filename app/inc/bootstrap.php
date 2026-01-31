<?php
// Common bootstrap for all pages

// Environment: set APP_ENV=production on server to hide errors.
$env = getenv('APP_ENV') ?: 'development';
if ($env === 'production') {
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
} else {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
}

// Prevent "headers already sent" by buffering output
if (ob_get_level() === 0) {
    ob_start();
}

// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Default timezone for consistency
date_default_timezone_set('Asia/Tehran');
?>
