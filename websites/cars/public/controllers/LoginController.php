<?php
    class LoginController { 
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
