<?php
namespace load\controllers;
    class Login { 
        private $loginconnect;

        public function __construct($loginconnect) {
        $this-> loginconnect = $loginconnect;
        }

        /*When the login button is click the find funciton is used to see if there is a matching username to the 
        one inputted by the user. 
        If there is a matching  username then the password entered is checked against the hashed passwords 
        in the database.  */
        public function loginSubmit() {
            $admin = $this->loginconnect->find('username', $_POST['username']);
            if(isset($_POST['submit'])) {
               if (isset($admin[0])) {
                    if(password_verify($_POST['password'], $admin[0]['password'])) {
                        
                     /*This is used on other pages to verify that the admin is logged in before
                       they can make changes. */
                     $_SESSION['loggedin'] = true;
                     /*When the sesion is logged in the admin id and username is stored so it 
                     can be used on other pages */
                     $_SESSION['loggedin'] = $admin[0]['id'];
                     $_SESSION['username'] = $_POST['username'];

                     /*Once the user is logged in they are taken to the main admin hub for ease
                     of use of the webstie. */
                     return [
                        'template' => 'adminhub.html.php',
                        'title' => 'Claire\'s Cars - Admin Hub',
                        'variables' => ['admin' => $admin],
                        'class' => 'admin'
                      ];
                  }
               }
            }
         
            /*If the above isn't performed the login form loads again */
            return [
               'template' => 'loginform.html.php',
               'title' => 'Claire\'s Cars - Admin Login',
               'variables' => ['admin' => $admin],
               'class' => 'login'
             ];
         }

        public function login() {
            /*login function returns the blank login page */
            return [
                'template' => 'loginform.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Admin Login',
                'class' => 'admin'
            ];
        }

        /*When the logout is clicked in the admin hub then the user is unset and can no longet make 
         changes on the admin hub. 
         
         A log out template is shown and this is a visual prompt so the user knows they are logged out*/
        public function logout() {
            unset($_SESSION['loggedin']);

            return [
                'template' => 'logout.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Admin Logout',
                'class' => 'logout'
            ];
        }

        /*If the user is logged in the adminhub page is retrieved, from this page the admin can access all
        admin features in a subnavigation menu
        
        If the admin is not logged in and they try to access the site then they are are taken to an error page
        where they are asked to log back in*/
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

        /*One the manageadmins page this function finds all the admins in the database and displays 
        them as a table if the user is logged in. 
        If the user is not logged in then the error message is displayed and the user cannot see the admin
        functions. */
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
         /*When the delete button is clicked on a page then the id of the admin is taken from the ID in the URL
        and is used to remove that record from the database.
        Once the record is deleted the user gets a prompt telling them the record has been removed*/
        public function deleteadminSubmit() {
           $admins = $this ->loginconnect->delete($_POST['id']);

            return [
                'template' => 'delete.html.php',
                'variables' => ['admins' => $admins],
                'title' => 'Claire\'s Cars - Deleted Successfully',
                'class' => 'admin'
            ];
        }
        /*Once the edit or add button has been selected the changes have been saved to the record and a prompt
        is displayed to let the user know thier changes have been made.
        If there is no manufacturer ID then the ID is set to none and the ID will be set by the DBMS*/

        public function editaddadminSubmit() {

            if(isset($_POST['submit'])) {
                $admins = $_POST['admins'];
                //password hashing makes admin adding and editing more secure and harder to infiltrate
                $admins['password'] = password_hash($admins['password'], PASSWORD_DEFAULT);

                if ($admins['id'] == '') {
                    $admins['id'] = null;
                }
    
                $this->loginconnect->save($admins);
                //a visual prompt is returned so the user knows their changes have been made.
                return [
                    'template' => 'edit.html.php',
                    'variables' => ['admins' => $admins],
                    'title' => 'Claire\'s Cars - Edit and Add Admins',
                    'class' => 'admin'
                ];
    
            }
        }
    
        /*This function seraches the admin table ID for the one that matches the ID posted in the URL
        This ensures the record that can be edited is the one the user wanted to. */
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
