<?php
namespace load\controllers;
class Cars {
    private $carsconnect;
    private $manufacturersconnect;

    public function __construct($carsconnect, $manufacturersconnect) {
    $this->carsconnect = $carsconnect;
    $this->manufacturersconnect = $manufacturersconnect;
    /*This controller needs to access both cars and manufacturers in order to edit and add cars, 
    therefore both conenections are established. */
    }

    /*This function is used to return the about page information, 
    no database file is included as there is no records being retrieved on this page. */
    public function about(){
        return[
        'template' => 'about.html.php',
        'variables' => [''], 
        'title' => 'Claires\'s Cars - About',
        'class' => 'about'
        ];
    }

    /*The cars function fetches all the cars that are not archived onto the cars page,
    it also gets all the manacturers as these are needed for the sub navigation menu. */
    public function cars() {
        // 0 means all the cars that are not archived are retrieved
        $cars = $this->carsconnect->find('archived', 0);
        $manufacturer = $this->manufacturersconnect->findAll();
        return [
            'template' => 'cars.html.php',
            'variables' => ['cars' => $cars, 'manufacturers' => $manufacturer], 
            'title' => 'Claires\'s Cars - Our Cars',
            'class' => 'admin'
            ];
    }

    /*This function is used in the admin hub and retrieves all cars that are archived,
    all of the cars who are archived are assigned a 1 value
    This function can only be accessed if the user is logged into the page */
    public function managearchivecars() {
        $cars = $this->carsconnect->find('archived', 1);
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managearchivecars.html.php',
                'variables' => ['cars' => $cars],
                'title' => 'Claire\'s Cars - Manage Archived Cars',
                'class' => 'admin'
            ];
        }
        //if the user is not logged in then a error page is displayed asking them to log in
        else {
            return [
                'template' => 'loginerror.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Login Error',
                'class' => 'admin'
            ];
        }
    }

    /*All the cars are retrieved that are not archived, designated by a 0 value 
     This is only retrieved if the user is logged in, if they are not logged in an error message is fetched 
     instead*/
    public function managecars() {
        $cars = $this->carsconnect->find('archived', 0);
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managecars.html.php',
                'variables' => ['cars' => $cars],
                'title' => 'Claire\'s Cars - Manage Cars',
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
     /*When the delete button is clicked on a page then the id of the car is taken from the ID in the URL
    and is used to remove that record from the database.
      Once the record is deleted the user gets a prompt telling them the record has been removed*/
    public function deletecarSubmit() {
        $cars = $this->carsconnect->delete($_POST['id']);
 
        return [
            'template' => 'delete.html.php',
            'variables' => ['cars' => $cars],
            'title' => 'Claire\'s Cars - Deleted Successfully',
            'class' => 'admin'
        ];
    
    }
     /*Once the edit or add button has been selected the changes have been saved to the record and a prompt
    is displayed to let the user know thier changes have been made.
    If there is no manufacturer ID then the ID is set to none and the ID will be set by the DBMS*/
    public function editaddcarsSubmit() {

        if(isset($_POST['submit'])) {
            $cars = $_POST['cars'];
            
            if ($cars['id'] == '') {
                $cars['id'] = null;
            }

            $this->carsconnect->save($cars);

            //when an image is added it takes the id of the record and adds a .jpg image extension. 
            //that file is then moved to the articles picture directory and the file name is added.
            if ($_FILES['image']['error'] == 0) {
                $fileName = $this->carsconnect->lastInsertId() . '.jpg';
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/cars/' . $fileName);
            }
            return [
                'template' => 'edit.html.php',
                'variables' => ['cars' => $cars],
                'title' => 'Claire\'s Cars - Edit and Add Cars',
                'class' => 'admin'
            ]; 

        }
    }
    /*This function finds all the car records added to the website and retrieves the one that has the same ID as the URl
    If there is no match then the empty form is displayed instead so the user can add a new car */
    public function editaddcars() {
        if(isset($_GET['id'])) {
            $find = $this->carsconnect->find('id', $_GET['id']);

            $cars = $find[0];
        }

        else {
            $cars = false;
        }
        
            $manufacturers =$this->manufacturersconnect->findall();
        return [
            'template' => 'editaddcars.html.php',
            'variables' => ['cars' => $cars, 'manufacturers'=> $manufacturers],
            'title' => 'Claire\'s Cars - Edit and Add Cars',
            'class' => 'admin'
        ];
    }

    /*This function is used so that when the user loads the cars page the name of all the manufacturers is 
    displayed on the left side.
    The ID and Name is stored so that when the manufacturer is clicked the system searched for the cars with just the 
    matching manufacturers */
    public function manufacturers(){
        $manufacturers = $this->manufacturersconnect->findAll();
        $cars = $this->carsconnect->find('manufacturerId', $_GET['id']);


        return [
            'template' => 'cars.html.php',
            'variables' => ['manufacturers' => $manufacturers, 'cars' => $cars],
            'title' => $_GET['name'],
            'class' => 'admin'
        ];

    }
} 
?> 