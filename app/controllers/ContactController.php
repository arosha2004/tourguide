<?php

class ContactController extends Controller {
    public function index() {
        $data = [
            'title' => 'Contact Us | The Ceylon Trek',
            'description' => 'Get in touch with The Ceylon Trek. Contact us for inquiries, bookings, and custom trekking packages in Sri Lanka.',
            'keywords' => 'contact, The Ceylon Trek, book tour Sri Lanka, trekking inquiries'
        ];
        $this->view('contact/index', $data);
    }
}
