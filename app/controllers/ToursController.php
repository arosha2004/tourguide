<?php

class ToursController extends Controller {
    public function index() {
        $tourModel = $this->model('Tour');
        $tours = $tourModel->getTours();
        
        $data = [
            'title' => 'All Tours | The Ceylon Trek',
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
        
        $data = [
            'title' => $tour->title . ' | The Ceylon Trek',
            'tour' => $tour,
            'images' => $images
        ];
        
        $this->view('tours/show', $data);
    }
}
