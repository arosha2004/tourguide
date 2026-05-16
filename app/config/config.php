<?php
// ============================================================
// DATABASE CONFIGURATION
// !! UPDATE these values before uploading to Namecheap !!
// In cPanel > MySQL Databases, create a DB, user, and assign.
// Namecheap format: cpanelusername_dbname / cpanelusername_dbuser
// ============================================================
define('DB_HOST', 'localhost');
define('DB_USER', 'root');        // Namecheap: cpanelusername_dbuser
define('DB_PASS', '');            // Namecheap: your database password
define('DB_NAME', 'tourguide');   // Namecheap: cpanelusername_dbname

// Admin Panel Credentials
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'password123'); // Change this in production!

// App Root (absolute path to /app folder - do NOT change)
define('APPROOT', dirname(dirname(__FILE__)));

// ============================================================
// AUTO-DETECT URL ROOT
// Works automatically on both localhost (sub-folder) and
// Namecheap production (root domain). No manual edit needed.
// ============================================================
if (php_sapi_name() !== 'cli' && isset($_SERVER['HTTP_HOST'])) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host      = $_SERVER['HTTP_HOST'];
    // SCRIPT_NAME is e.g. /tourguide/public/index.php (local) or /public/index.php (prod)
    $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '/public/index.php'); // -> /tourguide/public | /public
    $basePath  = dirname($scriptDir);                                       // -> /tourguide       | /
    $basePath  = ($basePath === '/') ? '' : $basePath;
    define('URLROOT', $protocol . '://' . $host . $basePath);
} else {
    define('URLROOT', 'http://localhost'); // CLI fallback
}

// Site Name
define('SITENAME', 'The Ceylon Trek');

// ============================================================
// HELPER: Resolve a stored image path to a full URL.
// Handles both old absolute URLs (http://localhost/tourguide/...)
// and new relative paths (/public/uploads/...).
// Usage: asset_url($tour->image_url)
// ============================================================
function asset_url($path) {
    if (empty($path)) return '';
    // Already an absolute URL → rebase to current URLROOT
    if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) {
        // Extract the /public/... portion and reattach to current URLROOT
        if (preg_match('#(/public/.+)$#', $path, $m)) {
            return URLROOT . $m[1];
        }
        return $path; // Unknown format, return as-is
    }
    // Relative path → prepend URLROOT
    return URLROOT . '/' . ltrim($path, '/');
}
