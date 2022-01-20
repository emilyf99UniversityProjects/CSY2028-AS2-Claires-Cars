<?php
namespace load\controllers;
    class News { 
        private $newsconnect;

        public function __construct($newsconnect) {
        $this-> newsconnect = $newsconnect;
        }

        public function news() {
            $news = $this->newsconnect->findAll();
            return [
                'template' => 'news.html.php',
                'variables' => ['news' => $news],
                'title' => 'Claire\'s Cars - Home',
                'class' => 'home'
            ];
        }

        public function managenews() {
            $news = $this->newsconnect->findAll();
            if(isset($_SESSION['loggedin'])) {
                return [
                    'template' => 'managenews.html.php',
                    'variables' => ['news' => $news],
                    'title' => 'Claire\'s Cars - Manage News',
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

        public function deletenewsarticleSubmit() {
            $news = $this ->newsconnect->delete($_POST['id']);
     
            return [
                'template' => 'delete.html.php',
                'variables' => ['news' => $news],
                'title' => 'Claire\'s Cars - Deleted Successfully',
                'class' => 'admin'
            ];
        
        }
    }

?>
