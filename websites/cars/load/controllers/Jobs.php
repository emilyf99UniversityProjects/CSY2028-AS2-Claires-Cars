<?php
namespace load\controllers;
    class Jobs { 
        private $jobconnect;

        public function __construct($jobconnect) {
        $this-> jobconnect = $jobconnect;
    }

    public function clairescareers() {
        $jobs = $this->jobconnect->findAll();
        return [
            'template' => 'clairescareers.html.php',
            'variables' => ['jobs' => $jobs],
            'title' => 'Claire\'s Careers',
            'class' => 'jobs'
        ];
    }

    public function managecareers() {
        $jobs = $this->jobconnect->findAll();
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managecareers.html.php',
                'variables' => ['jobs' => $jobs],
                'title' => 'Claire\'s Cars - Manage Careers',
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

    public function deletejobpostingSubmit() {
        $jobs = $this ->jobconnect->delete($_POST['id']);

        return [
            'template' => 'delete.html.php',
            'variables' => ['jobs' => $jobs],
            'title' => 'Claire\'s Cars - Deleted Successfully',
            'class' => 'admin'
        ];
    }
}
?>
