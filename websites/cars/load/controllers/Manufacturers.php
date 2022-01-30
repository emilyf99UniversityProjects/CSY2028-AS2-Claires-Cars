<?php
namespace load\controllers;
class Manufacturers {
    private $manufacturersconnect;

    public function __construct($manufacturersconnect) {
    $this-> manufacturersconnect = $manufacturersconnect;
    }

    /*This function finds all the manufacturers in the database and if the user is logged in returns them.
      If they are not logged in then an error message is displayed instead */
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

    /*When the delete button is clicked on a page then the id of the manufactuer is taken from the ID 
    and is used to remove that record from the database.
      Once the record is deleted the user gets a prompt telling them the record has been removed*/
    public function deletemanufacturerSubmit() {
        $manufacturers = $this ->manufacturersconnect->delete($_POST['id']);
     
        return [
            'template' => 'delete.html.php',
            'variables' => ['manufacturers' => $manufacturers],
            'title' => 'Claire\'s Cars - Deleted Successfully',
            'class' => 'admin'
        ];
        
    }

    /*Once the edit or add button has been selected the changes have been saved to the record and a prompt
    is displayed to let the user know thier changes have been made.
    If there is no manufacturer ID then the ID is set to none and the record will not be posted. */
    public function editaddmanufacturerSubmit() {

        if(isset($_POST['submit'])) {
            $manufacturers = $_POST['manufacturers'];
            
            if ($manufacturers['id'] == '') {
                $manufacturers['id'] = null;
            }

            $this->manufacturersconnect->save($manufacturers);
            return [
                'template' => 'edit.html.php',
                'variables' => ['manufacturers' => $manufacturers],
                'title' => 'Claire\'s Cars - Edit and Add Manufacturers',
                'class' => 'admin'
            ];

        }
    }

    /*This record fetches the manufactures and finds the specific one being edited using the ID,
    if there is a new one being added manufacturers will be set to false and no previous record will be prefilled into
    the form */
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

}
?>