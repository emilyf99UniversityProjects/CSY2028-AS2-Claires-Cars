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
    }

?>
