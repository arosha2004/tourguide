<?php
require_once 'app/config/config.php';

try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create tour_images table
    $sql = "CREATE TABLE IF NOT EXISTS tour_images (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        tour_id INT(11) NOT NULL,
        image_url VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (tour_id) REFERENCES tours(id) ON DELETE CASCADE
    )";
    $dbh->exec($sql);
    
    // Find the Knuckles Five Peaks tour ID
    $stmt = $dbh->query("SELECT id FROM tours WHERE title = 'Knuckles Five Peaks' LIMIT 1");
    $tour = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($tour) {
        $tour_id = $tour['id'];
        
        // Insert images
        $images = [
            "WhatsApp Image 2026-05-08 at 06.10.11.jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.16.jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.17 (1).jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.17.jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.28.jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.33.jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.34 (1).jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.34 (2).jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.34.jpeg",
            "WhatsApp Image 2026-05-08 at 06.10.35.jpeg"
        ];
        
        $insertStmt = $dbh->prepare("INSERT INTO tour_images (tour_id, image_url) VALUES (:tour_id, :image_url)");
        
        foreach($images as $img) {
            $url = URLROOT . '/public/uploads/knuckles/' . rawurlencode($img);
            $insertStmt->execute([
                ':tour_id' => $tour_id,
                ':image_url' => $url
            ]);
        }
        echo "Images inserted successfully.";
    } else {
        echo "Tour not found.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
