<?php

class ToursController extends Controller {
    public function show($id) {
        $tourModel = $this->model('Tour');
        $tour = $tourModel->getTourById($id);

        if(!$tour) {
            header('Location: ' . URLROOT);
            exit;
        }
        
        $data = [
            'title' => $tour->title . ' | The Ceylon Trek',
            'tour' => $tour
        ];
        
        $this->view('tours/show', $data);
    }
}
