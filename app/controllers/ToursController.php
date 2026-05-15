<?php

class ToursController extends Controller {
    public function index() {
        $tourModel = $this->model('Tour');
        $tours = $tourModel->getTours();
        
        $data = [
            'title' => 'All Tours | The Ceylon Trek',
            'description' => 'Explore our wide range of trekking and hiking tours in Sri Lanka. Find the perfect adventure for your skill level.',
            'keywords' => 'Sri Lanka tours, trekking packages, hiking adventures, Ceylon trek tours',
            'tours' => $tours
        ];
        
        $this->view('tours/index', $data);
    }

    public function show($id) {
        $tourModel = $this->model('Tour');
        $tour = $tourModel->getTourById($id);
        $images = $tourModel->getTourImages($id);

        if(!$tour) {
            header('Location: ' . URLROOT);
            exit;
        }
        
        $description = isset($tour->description) ? substr(strip_tags($tour->description), 0, 157) . '...' : 'Join us for an exciting trekking tour in Sri Lanka. Experience breathtaking views and nature.';
        
        $data = [
            'title' => $tour->title . ' | The Ceylon Trek',
            'description' => $description,
            'keywords' => $tour->title . ', Sri Lanka trekking, hiking tour',
            'og_image' => $tour->image_url,
            'tour' => $tour,
            'images' => $images
        ];
        
        $this->view('tours/show', $data);
    }
}
