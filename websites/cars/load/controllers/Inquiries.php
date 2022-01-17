<?php
namespace load\controllers;
    class Inquiries { 
        private $inquiriesconnect;

        public function __construct($inquiriesconnect) {
        $this-> inquiriesconnect = $inquiriesconnect;
    }

    public function contact() {
        $inquiries = $this->inquiriesconnect->findAll();
        return [
            'template' => 'contact.html.php',
            'variables' => ['inquiries' => $inquiries], 
            'title' => 'Claires\'s Cars - Contact Us',
            'class' => 'contact'
        ];
    }

    public function contactSubmit() {
        $inquiries = $this->inquiriesconnect->insert($record);
        if(isset($_POST['formsubmit'])) {
           // $record = //;
            $values = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'inquiry' => $_POST['inquiry']
                ];  
        }
        else {
            return [
                'template' => 'contact.html.php',
                'variables' => ['inquiries' => $inquiries], 
                'title' => 'Claires\'s Cars - Contact Us',
                'class' => 'contact'
            ];  
        }
    }

    public function manageinquiries() {
        $inquiries = $this->inquiriesconnect->findAll();
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'manageinquiries.html.php',
                'variables' => ['inquiries' => $inquiries],
                'title' => 'Claire\'s Cars - Manage Inquiries',
                'class' => 'admin'
            ];
        }
        else {
            return [
                'template' => 'loginerror.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Login Error',
                'class' => 'admin'
            ];
        }
    }
}
?>
