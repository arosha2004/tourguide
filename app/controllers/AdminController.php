<?php
class AdminController extends Controller {
    private $tourModel;
    private $galleryModel;

    public function __construct() {
        $this->tourModel = $this->model('Tour');
        $this->galleryModel = $this->model('Gallery');
    }

    public function index() {
        $tours = $this->tourModel->getTours();
        $data = [
            'title' => 'Admin Panel - Manage Tours',
            'tours' => $tours
        ];
        $this->view('admin/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $upload_dir = dirname(dirname(dirname(__FILE__))) . "/public/uploads/tours/";
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Handle cover image upload
            $image_url = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $file_name = time() . '_' . uniqid() . '.' . $ext;
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_url = URLROOT . '/public/uploads/tours/' . $file_name;
                }
            }

            $data = [
                'title'       => trim($_POST['title']),
                'location'    => trim($_POST['location']),
                'price'       => trim($_POST['price']),
                'badge'       => trim($_POST['badge']),
                'duration'    => trim($_POST['duration']),
                'description' => trim($_POST['description']),
                'image_url'   => $image_url
            ];

            $tour_id = $this->tourModel->addTour($data);

            if ($tour_id) {
                // Handle additional images (up to 6)
                if (isset($_FILES['extra_images'])) {
                    $files = $_FILES['extra_images'];
                    $count = count($files['name']);
                    for ($i = 0; $i < $count; $i++) {
                        if ($files['error'][$i] == 0) {
                            $ext = pathinfo($files["name"][$i], PATHINFO_EXTENSION);
                            $file_name = time() . '_' . uniqid() . '_' . $i . '.' . $ext;
                            $target_file = $upload_dir . $file_name;
                            if (move_uploaded_file($files["tmp_name"][$i], $target_file)) {
                                $extra_url = URLROOT . '/public/uploads/tours/' . $file_name;
                                $this->tourModel->addTourImage($tour_id, $extra_url, $i);
                            }
                        }
                    }
                }
                header('Location: ' . URLROOT . '/admin');
            } else {
                die('Something went wrong while adding the tour.');
            }
        } else {
            $data = [
                'title'        => 'Add Tour',
                'title_err'    => '',
                'location_err' => '',
                'price_err'    => '',
            ];
            $this->view('admin/add', $data);
        }
    }

    public function gallery() {
        $images = $this->galleryModel->getImages();
        $data = [
            'title'  => 'Admin Panel - Manage Gallery',
            'images' => $images
        ];
        $this->view('admin/gallery', $data);
    }

    public function addGalleryImage() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image_url = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = dirname(dirname(dirname(__FILE__))) . "/public/uploads/gallery/";
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $file_name = time() . '_' . uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_url = URLROOT . '/public/uploads/gallery/' . $file_name;
                }
            }

            if (!empty($image_url)) {
                $data = ['image_url' => $image_url];
                if ($this->galleryModel->addImage($data)) {
                    header('Location: ' . URLROOT . '/admin/gallery');
                } else {
                    die('Something went wrong');
                }
            } else {
                die('Please upload an image');
            }
        } else {
            $data = ['title' => 'Add Gallery Image'];
            $this->view('admin/add_gallery', $data);
        }
    }
}
