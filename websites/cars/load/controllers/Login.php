<?php
namespace load\controllers;
    class Login { 
        private $loginconnect;

        public function __construct($loginconnect) {
        $this-> loginconnect = $loginconnect;
        }

        public function loginSubmit() {
            $admin = $this->loginconnect->find('username', $_POST['username']);
            if(isset($_POST['submit'])) {
               // var_dump($admin);
               if (isset($admin[0])) {
                  // $user = $admin->fetch();
                  if ($_POST['password'] == $admin[0]['password']) {
                     // var_dump($_SESSION['loggedin']);
         
                     $_SESSION['loggedin'] = true;
                     $_SESSION['loggedin'] = $admin[0]['id'];
         
                     return [
                        'template' => 'logincomplete.html.php',
                        'title' => 'Claire\'s Cars - Admin Login',
                        'variables' => ['admin' => $admin],
                        'class' => 'login'
                      ];
                  }
               }
            }
         
            return [
               'template' => 'loginform.html.php',
               'title' => 'Claire\'s Cars - Admin Login',
               'variables' => ['admin' => $admin],
               'class' => 'login'
             ];
         }

        public function login() {

            return [
                'template' => 'loginform.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Admin Login',
                'class' => 'login'
            ];
        }

        public function logout() {
            unset($_SESSION['loggedin']);

            return [
                'template' => 'logout.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Admin Logout',
                'class' => 'logout'
            ];
        }

        public function adminhub() {
            if(isset($_SESSION['loggedin'])) {
                return [
                    'template' => 'adminhub.html.php',
                    'variables' => [''],
                    'title' => 'Claire\'s Cars - Admin Hub',
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

        public function manageadmins() {
            $admins = $this->loginconnect->findAll();
            if(isset($_SESSION['loggedin'])) {
                return [
                    'template' => 'manageadmin.html.php',
                    'variables' => ['admins' => $admins],
                    'title' => 'Claire\'s Cars - Manage Admin Logins',
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
