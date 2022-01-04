<?php
    class NewsController { 
        private $newsconnect;

        public function __construct($newsconnect) {
        $this-> newsconnect = $newsconnect;
    }
}
?>