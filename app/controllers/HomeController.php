<?php

class HomeController extends Controller {
    public function index() {
        $tourModel = $this->model('Tour');
        $tours = $tourModel->getTours();
        
        $data = [
            'title' => 'The Ceylon Trek | Sri Lanka\'s Best Trekking & Hiking Tours',
            'description' => 'The Ceylon Trek offers the best Sri Lanka hiking and trekking Tours. Explore unique trails, stunning waterfalls & misty peaks in Sri Lanka. Book Now!',
            'keywords' => 'Sri Lanka trekking, hiking tours, Ceylon trek, mountain trails, waterfalls, adventure travel, best hiking in Sri Lanka',
            'tours' => $tours
        ];
        $this->view('home/index', $data);
    }
}
