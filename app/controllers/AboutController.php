<?php

class AboutController extends Controller {
    public function index() {
        $galleryModel = $this->model('Gallery');
        $images = $galleryModel->getImages();
        
        $data = [
            'title' => 'About Us | The Ceylon Trek',
            'images' => $images
        ];
        $this->view('about/index', $data);
    }
}
