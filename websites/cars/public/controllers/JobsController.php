<?php
    class JobsController { 
        private $jobconnect;

        public function __construct($jobconnect) {
        $this-> jobconnect = $jobconnect;
    }
}
?>