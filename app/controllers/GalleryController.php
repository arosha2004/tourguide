<?php
class GalleryController extends Controller {
    private $galleryModel;

    public function __construct() {
        $this->galleryModel = $this->model('Gallery');
    }

    public function index() {
        $images = $this->galleryModel->getImages();
        $data = [
            'title' => 'Sri Lanka Trekking Gallery | The Ceylon Trek',
            'description' => 'Browse our gallery of stunning landscapes, breathtaking waterfalls, and hiking adventures in Sri Lanka.',
            'keywords' => 'Sri Lanka gallery, trekking photos, hiking images, Ceylon trek gallery',
            'images' => $images
        ];
        $this->view('gallery/index', $data);
    }
}
