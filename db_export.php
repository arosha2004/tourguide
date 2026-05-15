<?php
/**
 * Database Export Script
 * -------------------------------------------------
 * Run this LOCALLY (http://localhost/tourguide/db_export.php)
 * to download a full SQL dump of your database.
 * Import the downloaded file into Namecheap via cPanel > phpMyAdmin.
 *
 * !! DELETE this file from the server after importing !!
 * -------------------------------------------------
 */

require_once 'app/config/config.php';

$host   = DB_HOST;
$user   = DB_USER;
$pass   = DB_PASS;
$dbname = DB_NAME;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

$output  = "-- The Ceylon Trek Database Export\n";
$output .= "-- Generated: " . date('Y-m-d H:i:s') . "\n";
$output .= "-- Host: $host | Database: $dbname\n\n";
$output .= "SET FOREIGN_KEY_CHECKS=0;\n";
$output .= "SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';\n";
$output .= "SET NAMES utf8;\n\n";

// Get all tables
$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    // DROP + CREATE
    $output .= "-- ----------------------------\n";
    $output .= "-- Table structure for `$table`\n";
    $output .= "-- ----------------------------\n";
    $output .= "DROP TABLE IF EXISTS `$table`;\n";

    $createRow = $pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
    $output .= $createRow['Create Table'] . ";\n\n";

    // Rows
    $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
        $output .= "-- ----------------------------\n";
        $output .= "-- Records for `$table`\n";
        $output .= "-- ----------------------------\n";
        foreach ($rows as $row) {
            $values = array_map(function($v) use ($pdo) {
                return $v === null ? 'NULL' : $pdo->quote($v);
            }, array_values($row));
            $cols   = '`' . implode('`, `', array_keys($row)) . '`';
            $output .= "INSERT INTO `$table` ($cols) VALUES (" . implode(', ', $values) . ");\n";
        }
        $output .= "\n";
    }
}

$output .= "SET FOREIGN_KEY_CHECKS=1;\n";

// Force download
$filename = $dbname . '_export_' . date('Ymd_His') . '.sql';
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Content-Length: ' . strlen($output));
echo $output;
exit;
