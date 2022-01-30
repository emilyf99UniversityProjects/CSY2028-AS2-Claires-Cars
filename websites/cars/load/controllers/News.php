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

        /*If the user is logged in then the manage news page is returned with the articles in it.
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

        /*When this is called it uses the ID from the record to delete that news article 
        The delete page is returned so the user has a visual prompt to show them the article has been deleted */
        public function deletenewsarticleSubmit() {
            $news = $this ->newsconnect->delete($_POST['id']);
     
            return [
                'template' => 'delete.html.php',
                'variables' => ['news' => $news],
                'title' => 'Claire\'s Cars - Deleted Successfully',
                'class' => 'admin'
            ];
        
        }

        /*When the submit button is pressed on the add or edit page a new time is created, 
        this date is then assigned to the dateposted attribute of the table.
        the author attribute is retrieved from the username assigned in the login function
        These are used to get the author and date of the page*/
        public function editaddnewsSubmit() {

            if(isset($_POST['submit'])) {
                
                $news = $_POST['news'];
                $date = new \DateTime();
			    $news['dateposted'] = $date->format('Y-m-d H:i:s');
                $news['author'] = $_SESSION['username'];

                //if there is no id then set the value to null
                if ($news['id'] == '') {
                    $news['id'] = null;
                }
    
                $this->newsconnect->save($news);

                //when an image is added it takes the id of the record and adds a .jpg image extension. 
                //that file is then moved to the articles picture directory and the file name is added.
                if ($_FILES['image']['error'] == 0) {
                    $fileName = $this->newsconnect->lastInsertId() . '.jpg';
                    move_uploaded_file($_FILES['image']['tmp_name'], 'images/articles/' . $fileName);
                }

                //when returned a prompt is shown to the user let them know their chnages have been made
                return [
                    'template' => 'edit.html.php',
                    'variables' => ['news' => $news],
                    'title' => 'Claire\'s Cars - Edit and Add News',
                    'class' => 'admin'
                ];
    
            }
        }
    
        //when the editadd link is clicked this finds the record with the matching ID of the title.
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
