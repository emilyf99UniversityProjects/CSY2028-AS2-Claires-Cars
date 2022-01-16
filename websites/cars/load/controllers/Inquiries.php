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
            $record = 'contact';
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
}
?>
