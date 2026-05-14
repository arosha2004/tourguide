<?php
$host = 'localhost';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=tourguide", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Add description column to tours if not exists
    $cols = $dbh->query("SHOW COLUMNS FROM tours LIKE 'description'")->fetchAll();
    if (empty($cols)) {
        $dbh->exec("ALTER TABLE tours ADD COLUMN description TEXT NULL AFTER image_url");
        echo "Added 'description' column to tours.<br>";
    } else {
        echo "'description' column already exists.<br>";
    }

    // Create tour_images table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS tour_images (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        tour_id INT(11) NOT NULL,
        image_url VARCHAR(500) NOT NULL,
        sort_order INT(11) DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (tour_id) REFERENCES tours(id) ON DELETE CASCADE
    )";
    $dbh->exec($sql);
    echo "Table 'tour_images' created or already exists.<br>";

    echo "<br><strong>Migration complete!</strong>";
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
