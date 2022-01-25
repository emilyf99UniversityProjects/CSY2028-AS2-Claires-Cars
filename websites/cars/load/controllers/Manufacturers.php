<?php
namespace load\controllers;
class Manufacturers {
    private $manufacturersconnect;

    public function __construct($manufacturersconnect) {
    $this-> manufacturersconnect = $manufacturersconnect;
    }

    public function managemanufacturers() {
        $manufacturers = $this->manufacturersconnect->findAll();
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managemanufacturers.html.php',
                'variables' => ['manufacturers' => $manufacturers],
                'title' => 'Claire\'s Cars - Manage Manufacturers',
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

    public function deletemanufacturerSubmit() {
        $manufacturers = $this ->manufacturersconnect->delete($_POST['id']);
     
        return [
            'template' => 'delete.html.php',
            'variables' => ['manufacturers' => $manufacturers],
            'title' => 'Claire\'s Cars - Deleted Successfully',
            'class' => 'admin'
        ];
        
    }

    public function editaddmanufacturerSubmit() {

        if(isset($_POST['submit'])) {
            $manufacturers = $_POST['manufacturers'];
            
            if ($manufacturers['id'] == '') {
                $manufacturers['id'] = null;
            }

            $this->manufacturersconnect->save($manufacturers);
            return [
                'template' => 'editaddmanufacturer.html.php',
                'variables' => ['manufacturers' => $manufacturers],
                'title' => 'Claire\'s Cars - Edit and Add Manufacturers',
                'class' => 'admin'
            ];

        }
    }

    public function editaddmanufacturer() {
        if(isset($_GET['id'])) {
            $find = $this->manufacturersconnect->find('id', $_GET['id']);

            $manufacturers = $find[0];
        }

        else {
            $manufacturers = false;
        }

        return [
            'template' => 'editaddmanufacturer.html.php',
            'variables' => ['manufacturers' => $manufacturers],
            'title' => 'Claire\'s Cars - Edit and Add Manufacturers',
            'class' => 'admin'
        ];
    }
    
    public function findmanufacturers(){
        $manufacturers = $this->manufacturersconnect->findAll();

        return [
            'template' => 'cars.html.php',
            'variables' => ['manufacturers' => $manufacturers],
            'title' => 'Claire\'s Cars - Cars',
            'class' => 'admin'
        ];

    }
}
?>