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

    // Search Tours
    public function searchTours($keyword)
    {
        $this->db->query('SELECT * FROM tours WHERE title LIKE :keyword OR location LIKE :keyword OR description LIKE :keyword ORDER BY created_at DESC');
        $this->db->bind(':keyword', '%' . $keyword . '%');
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
    // Update Tour
    public function updateTour($data)
    {
        if (!empty($data['image_url'])) {
            $this->db->query('UPDATE tours SET title = :title, location = :location, price = :price, badge = :badge, duration = :duration, description = :description, image_url = :image_url WHERE id = :id');
            $this->db->bind(':image_url', $data['image_url']);
        } else {
            $this->db->query('UPDATE tours SET title = :title, location = :location, price = :price, badge = :badge, duration = :duration, description = :description WHERE id = :id');
        }

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':badge', $data['badge']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':description', $data['description']);

        return $this->db->execute();
    }

    // Delete Tour
    public function deleteTour($id)
    {
        $this->db->query('DELETE FROM tours WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Delete Tour Images (from extra gallery)
    public function deleteTourImages($tour_id)
    {
        $this->db->query('DELETE FROM tour_images WHERE tour_id = :id');
        $this->db->bind(':id', $tour_id);
        return $this->db->execute();
    }
}
