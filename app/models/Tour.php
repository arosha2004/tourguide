<?php
class Tour {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get All Tours
    public function getTours() {
        $this->db->query('SELECT * FROM tours ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Add Tour
    public function addTour($data) {
        $this->db->query('INSERT INTO tours (title, location, price, badge, duration, image_url) VALUES (:title, :location, :price, :badge, :duration, :image_url)');
        
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':badge', $data['badge']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':image_url', $data['image_url']);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
