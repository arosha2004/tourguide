<?php

class ContactController extends Controller {
    public function index() {
        $data = [
            'title'       => 'Contact Us | The Ceylon Trek',
            'description' => 'Get in touch with The Ceylon Trek. Contact us for inquiries, bookings, and custom trekking packages in Sri Lanka.',
            'keywords'    => 'contact, The Ceylon Trek, book tour Sri Lanka, trekking inquiries'
        ];
        $this->view('contact/index', $data);
    }

    public function send() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . URLROOT . '/contact');
            exit;
        }

        $name    = trim(htmlspecialchars($_POST['name']    ?? ''));
        $email   = trim(filter_var($_POST['email']   ?? '', FILTER_SANITIZE_EMAIL));
        $phone   = trim(htmlspecialchars($_POST['phone']   ?? ''));
        $message = trim(htmlspecialchars($_POST['message'] ?? ''));

        if (empty($name) || empty($email) || empty($message)) {
            $data = [
                'title'   => 'Contact Us | The Ceylon Trek',
                'description' => 'Contact The Ceylon Trek.',
                'keywords'    => 'contact',
                'error'   => 'Please fill in all required fields.'
            ];
            $this->view('contact/index', $data);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data = [
                'title'   => 'Contact Us | The Ceylon Trek',
                'description' => 'Contact The Ceylon Trek.',
                'keywords'    => 'contact',
                'error'   => 'Please enter a valid email address.'
            ];
            $this->view('contact/index', $data);
            return;
        }

        $to      = 'info@lankatrek.com';
        $subject = 'New Contact Form Message from ' . $name;
        $body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = "From: noreply@ceylontrek.online\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();

        $sent = @mail($to, $subject, $body, $headers);

        $data = [
            'title'       => 'Contact Us | The Ceylon Trek',
            'description' => 'Contact The Ceylon Trek.',
            'keywords'    => 'contact',
            'success'     => $sent
        ];

        if (!$sent) {
            $data['error'] = 'Message could not be sent. Please contact us via WhatsApp.';
        }

        $this->view('contact/index', $data);
    }
}
