<?php

class ContactController extends Controller {
    public function index() {
        $data = [
            'title' => 'Contact Us | The Ceylon Trek'
        ];
        $this->view('contact/index', $data);
    }
}
