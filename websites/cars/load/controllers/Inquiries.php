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
}
?>
