<?php

class AboutController extends Controller {
    public function index() {
        $galleryModel = $this->model('Gallery');
        $images = $galleryModel->getImages();
        
        $data = [
            'title' => 'About Us | The Ceylon Trek',
            'description' => 'Learn more about The Ceylon Trek. We are passionate about showcasing the true beauty of Sri Lanka through sustainable trekking and hiking adventures.',
            'keywords' => 'about us, The Ceylon Trek, Sri Lanka trekking team, sustainable tourism Sri Lanka, hiking guides',
            'images' => $images
        ];
        $this->view('about/index', $data);
    }
}
