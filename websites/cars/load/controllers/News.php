<?php
namespace load\controllers;
    class News { 
        private $newsconnect;

        public function __construct($newsconnect) {
        $this-> newsconnect = $newsconnect;
        }

        /*This function is used to find all the articles in the news table, 
        they are sorted Descending so the top article is the newest */

        //the home page is returned with the articles
        public function news() {
            $news = $this->newsconnect->findAllDESC('id');
            return [
                'template' => 'news.html.php',
                'variables' => ['news' => $news],
                'title' => 'Claire\'s Cars - Home',
                'class' => 'home'
            ];
        }

        /*This function is used in the admin hub, it is used on the manage news page and pulls all the records out
        so they can be changed by admins */

        /*If the user is logged in then the page is manage page is returned with the articles in it.
        If not a login eror is displayed and the user is asked to login  */
        public function managenews() {
            $news = $this->newsconnect->findAllDESC('id');
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

        public function editaddnewsSubmit() {

            if(isset($_POST['submit'])) {
                
                $news = $_POST['news'];
                $date = new \DateTime();
			    $news['dateposted'] = $date->format('Y-m-d H:i:s');
                $news['author'] = $_SESSION['username'];

                if ($news['id'] == '') {
                    $news['id'] = null;
                }
    
                $this->newsconnect->save($news);

                if ($_FILES['image']['error'] == 0) {
                    $fileName = $this->newsconnect->lastInsertId() . '.jpg';
                    move_uploaded_file($_FILES['image']['tmp_name'], 'images/articles/' . $fileName);
                }
                return [
                    'template' => 'editaddnews.html.php',
                    'variables' => ['news' => $news],
                    'title' => 'Claire\'s Cars - Edit and Add News',
                    'class' => 'admin'
                ];
    
            }
        }
    
        public function editaddnews() {
            if(isset($_GET['id'])) {
                $find = $this->newsconnect->find('id', $_GET['id']);
    
                $news = $find[0];
            }
    
            else {
                $news = false;
            }
    
            return [
                'template' => 'editaddnews.html.php',
                'variables' => ['news' => $news],
                'title' => 'Claire\'s Cars - Edit and Add News',
                'class' => 'admin'
            ];
        }
    }

?>
