<?php
class Portal789Controller extends Controller {
    private $tourModel;
    private $galleryModel;

    public function __construct() {
        // Protect all admin routes except login and logout
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlParts = explode('/', $url);
        $method = isset($urlParts[1]) ? strtolower($urlParts[1]) : 'index';

        if ($method !== 'login' && $method !== 'logout') {
            $this->requireAuth();
        }

        $this->tourModel = $this->model('Tour');
        $this->galleryModel = $this->model('Gallery');
    }

    private function requireAuth() {
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: ' . URLROOT . '/portal789/login');
            exit;
        }
    }

    public function login() {
        // If already logged in, redirect to admin index
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            header('Location: ' . URLROOT . '/portal789');
            exit;
        }

        $data = [
            'title' => 'Admin Login',
            'error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if ($username === ADMIN_USER && $password === ADMIN_PASS) {
                $_SESSION['admin_logged_in'] = true;
                header('Location: ' . URLROOT . '/portal789');
                exit;
            } else {
                $data['error'] = 'Invalid username or password.';
            }
        }

        $this->view('portal789/login', $data);
    }

    public function logout() {
        unset($_SESSION['admin_logged_in']);
        session_destroy();
        header('Location: ' . URLROOT . '/portal789/login');
        exit;
    }

    public function index() {
        $tours = $this->tourModel->getTours();
        $data = [
            'title' => 'Admin Panel - Manage Tours',
            'tours' => $tours
        ];
        $this->view('portal789/index', $data);
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
                    $image_url = '/public/uploads/tours/' . $file_name; // relative path
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
                                $extra_url = '/public/uploads/tours/' . $file_name; // relative path
                                $this->tourModel->addTourImage($tour_id, $extra_url, $i);
                            }
                        }
                    }
                }
                header('Location: ' . URLROOT . '/portal789');
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
            $this->view('portal789/add', $data);
        }
    }

    public function gallery() {
        $images = $this->galleryModel->getImages();
        $data = [
            'title'  => 'Admin Panel - Manage Gallery',
            'images' => $images
        ];
        $this->view('portal789/gallery', $data);
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
                    $image_url = '/public/uploads/gallery/' . $file_name; // relative path
                }
            }

            if (!empty($image_url)) {
                $data = ['image_url' => $image_url];
                if ($this->galleryModel->addImage($data)) {
                    header('Location: ' . URLROOT . '/portal789/gallery');
                } else {
                    die('Something went wrong');
                }
            } else {
                die('Please upload an image');
            }
        } else {
            $data = ['title' => 'Add Gallery Image'];
            $this->view('portal789/add_gallery', $data);
        }
    }
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tour = $this->tourModel->getTourById($id);
            $image_url = $tour->image_url; // Keep old image by default

            // Handle cover image upload if a new one is provided
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_dir = dirname(dirname(dirname(__FILE__))) . "/public/uploads/tours/";
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $file_name = time() . '_' . uniqid() . '.' . $ext;
                $target_file = $upload_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Delete old image if it exists and isn't a default or external url
                    if (!empty($tour->image_url) && strpos($tour->image_url, '/public/uploads/') === 0) {
                        $old_file = dirname(dirname(dirname(__FILE__))) . $tour->image_url;
                        if (file_exists($old_file)) {
                            unlink($old_file);
                        }
                    }
                    $image_url = '/public/uploads/tours/' . $file_name;
                }
            }

            $data = [
                'id'          => $id,
                'title'       => trim($_POST['title']),
                'location'    => trim($_POST['location']),
                'price'       => trim($_POST['price']),
                'badge'       => trim($_POST['badge']),
                'duration'    => trim($_POST['duration']),
                'description' => trim($_POST['description']),
                'image_url'   => $image_url
            ];

            if ($this->tourModel->updateTour($data)) {
                header('Location: ' . URLROOT . '/portal789');
            } else {
                die('Something went wrong while updating the tour.');
            }
        } else {
            $tour = $this->tourModel->getTourById($id);
            if (!$tour) {
                header('Location: ' . URLROOT . '/portal789');
                exit;
            }

            $data = [
                'title_page' => 'Edit Tour',
                'tour'       => $tour
            ];
            $this->view('portal789/edit', $data);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tour = $this->tourModel->getTourById($id);
            if ($tour) {
                // Delete main image
                if (!empty($tour->image_url) && strpos($tour->image_url, '/public/uploads/') === 0) {
                    $old_file = dirname(dirname(dirname(__FILE__))) . $tour->image_url;
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                }

                // Delete extra images
                $images = $this->tourModel->getTourImages($id);
                foreach ($images as $img) {
                    if (!empty($img->image_url) && strpos($img->image_url, '/public/uploads/') === 0) {
                        $extra_file = dirname(dirname(dirname(__FILE__))) . $img->image_url;
                        if (file_exists($extra_file)) {
                            unlink($extra_file);
                        }
                    }
                }

                // Delete from db
                $this->tourModel->deleteTourImages($id);
                if ($this->tourModel->deleteTour($id)) {
                    header('Location: ' . URLROOT . '/portal789');
                } else {
                    die('Something went wrong deleting the tour.');
                }
            } else {
                header('Location: ' . URLROOT . '/portal789');
            }
        } else {
            header('Location: ' . URLROOT . '/portal789');
        }
    }

    public function deleteGalleryImage($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image = $this->galleryModel->getImageById($id);
            if ($image) {
                if (!empty($image->image_url) && strpos($image->image_url, '/public/uploads/') === 0) {
                    $file_path = dirname(dirname(dirname(__FILE__))) . $image->image_url;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                
                if ($this->galleryModel->deleteImage($id)) {
                    header('Location: ' . URLROOT . '/portal789/gallery');
                } else {
                    die('Something went wrong deleting gallery image.');
                }
            } else {
                header('Location: ' . URLROOT . '/portal789/gallery');
            }
        } else {
            header('Location: ' . URLROOT . '/portal789/gallery');
        }
    }
}
