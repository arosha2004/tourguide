<?php

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'The Ceylon Trek | Sri Lanka\'s Best Trekking & Hiking Tours'
        ];
        $this->view('home/index', $data);
    }
}
