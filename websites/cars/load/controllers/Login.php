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
               if (isset($admin[0])) {
                    if(password_verify($_POST['password'], $admin[0]['password'])) {
         
                     $_SESSION['loggedin'] = true;
                     $_SESSION['loggedin'] = $admin[0]['id'];
                     $_SESSION['username'] = $_POST['username'];
                     return [
                        'template' => 'adminhub.html.php',
                        'title' => 'Claire\'s Cars - Admin Hub',
                        'variables' => ['admin' => $admin],
                        'class' => 'admin'
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

        public function deleteadminSubmit() {
           $admins = $this ->loginconnect->delete($_POST['id']);

            return [
                'template' => 'delete.html.php',
                'variables' => ['admins' => $admins],
                'title' => 'Claire\'s Cars - Deleted Successfully',
                'class' => 'admin'
            ];
        }
        public function editaddadminSubmit() {

            if(isset($_POST['submit'])) {
                $admins = $_POST['admins'];
                $admins['password'] = password_hash($admins['password'], PASSWORD_DEFAULT);

                if ($admins['id'] == '') {
                    $admins['id'] = null;
                }
    
                $this->loginconnect->save($admins);
                return [
                    'template' => 'editaddadmin.html.php',
                    'variables' => ['admins' => $admins],
                    'title' => 'Claire\'s Cars - Edit and Add Admins',
                    'class' => 'admin'
                ];
    
            }
        }
    
        public function editaddadmin() {
            if(isset($_GET['id'])) {
                $find = $this->loginconnect->find('id', $_GET['id']);
    
                $admins = $find[0];
            }
    
            else {
                $admins = false;
            }
    
            return [
                'template' => 'editaddadmin.html.php',
                'variables' => ['admins' => $admins],
                'title' => 'Claire\'s Cars - Edit and Add Admins',
                'class' => 'admin'
            ];
        }
    }
?>
