<?php
class Tour
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get All Tours
    public function getTours()
    {
        $this->db->query('SELECT * FROM tours ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Get Tour By ID
    public function getTourById($id)
    {
        $this->db->query('SELECT * FROM tours WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Get Tour Images
    public function getTourImages($id)
    {
        $this->db->query('SELECT * FROM tour_images WHERE tour_id = :id ORDER BY sort_order ASC');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    // Add Tour
    public function addTour($data)
    {
        $this->db->query('INSERT INTO tours (title, location, price, badge, duration, image_url, description) VALUES (:title, :location, :price, :badge, :duration, :image_url, :description)');

        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':badge', $data['badge']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    // Add Tour Image
    public function addTourImage($tour_id, $image_url, $sort_order = 0)
    {
        $this->db->query('INSERT INTO tour_images (tour_id, image_url, sort_order) VALUES (:tour_id, :image_url, :sort_order)');
        $this->db->bind(':tour_id', $tour_id);
        $this->db->bind(':image_url', $image_url);
        $this->db->bind(':sort_order', $sort_order);
        return $this->db->execute();
    }
}
