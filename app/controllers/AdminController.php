<?php
class AdminController extends Controller {
    private $tourModel;

    public function __construct() {
        $this->tourModel = $this->model('Tour');
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
            // Process form
            
            // Handle File Upload
            $image_url = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = dirname(dirname(dirname(__FILE__))) . "/public/uploads/";
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $file_name = time() . '_' . uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_url = URLROOT . '/public/uploads/' . $file_name;
                }
            }

            $data = [
                'title' => trim($_POST['title']),
                'location' => trim($_POST['location']),
                'price' => trim($_POST['price']),
                'badge' => trim($_POST['badge']),
                'duration' => trim($_POST['duration']),
                'image_url' => $image_url
            ];

            if ($this->tourModel->addTour($data)) {
                header('Location: ' . URLROOT . '/admin');
            } else {
                die('Something went wrong');
            }
        } else {
            // Load view with errors
            $data = [
                'title' => 'Add Tour',
                'title_err' => '',
                'location_err' => '',
                'price_err' => '',
            ];
            $this->view('admin/add', $data);
        }
    }
}
