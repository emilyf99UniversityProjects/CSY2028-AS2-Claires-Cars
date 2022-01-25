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

    public function contactSubmit() {

        if(isset($_POST['inquiries'])) {

            $inquiries = $_POST['inquiries'];

            if ($inquiries['id'] == '') {
                $inquiries['id'] = null;
            }

            $this->inquiriesconnect->save($inquiries);

            return [
                'template' => 'contact.html.php',
                'variables' => ['inquiries' => $inquiries],
                'title' => 'Claire\'s Cars - Inquiries',
                'class' => 'contact'
            ];
        }
    }

    public function manageinquiries() {
        $inquiries = $this->inquiriesconnect->find('completed', 0);
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'manageinquiries.html.php',
                'variables' => ['inquiries' => $inquiries],
                'title' => 'Claire\'s Cars - Manage Inquiries',
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

    public function completedinquiries() {
        $inquiries = $this->inquiriesconnect->find('completed', 1);
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'completedinquiries.html.php',
                'variables' => ['inquiries' => $inquiries],
                'title' => 'Claire\'s Cars - Manage Inquiries',
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

    public function completeinquiriesSubmit() {

        if(isset($_POST['inquiries'])) {
            $inquiries = $_POST['inquiries'];
            
            if ($inquiries['id'] == '') {
                $inquiries['id'] = null;
            }

            $this->inquiriesconnect->save($inquiries);
            return [
                'template' => 'completeinquiries.html.php',
                'variables' => ['inquiries' => $inquiries],
                'title' => 'Claire\'s Cars - Edit and Add Inquiry',
                'class' => 'admin'
            ];

        }
    }

    public function completeinquiries() {
        if(isset($_GET['id'])) {
            $find = $this->inquiriesconnect->find('id', $_GET['id']);

            $inquiries = $find[0];
        }

        else {
            $inquiries = false;
        }

        return [
            'template' => 'completeinquiries.html.php',
            'variables' => ['inquiries' => $inquiries],
            'title' => 'Claire\'s Cars - Edit and Add Inquiry',
            'class' => 'admin'
        ];
    }
}
?>
