<?php
    class JobsController { 
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
}
?>
