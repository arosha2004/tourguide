<?php
class Gallery {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all images
    public function getImages() {
        $this->db->query('SELECT * FROM gallery ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Add image
    public function addImage($data) {
        $this->db->query('INSERT INTO gallery (image_url) VALUES (:image_url)');
        $this->db->bind(':image_url', $data['image_url']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Get Image By ID
    public function getImageById($id) {
        $this->db->query('SELECT * FROM gallery WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Delete Image
    public function deleteImage($id) {
        $this->db->query('DELETE FROM gallery WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
