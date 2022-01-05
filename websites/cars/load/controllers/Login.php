<?php
namespace load\controllers;
    class Login { 
        private $adminconnect;

        public function __construct($adminconnect) {
        $this-> adminconnect = $adminconnect;
        }

        public function login() {

            return [
                'template' => 'loginform.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Admin Login',
                'class' => 'login'
            ];
        }
    }
?>
