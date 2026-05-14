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
            'images' => $images
        ];
        $this->view('gallery/index', $data);
    }
}
