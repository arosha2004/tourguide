<?php

class HomeController extends Controller {
    public function index() {
        $tourModel = $this->model('Tour');
        $tours = $tourModel->getTours();
        
        $data = [
            'title' => 'The Ceylon Trek | Sri Lanka\'s Best Trekking & Hiking Tours',
            'tours' => $tours
        ];
        $this->view('home/index', $data);
    }
}
