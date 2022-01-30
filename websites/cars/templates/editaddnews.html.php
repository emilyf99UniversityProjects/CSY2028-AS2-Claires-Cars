<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Edit or Add a News Article</h2>

    <!--enctype has to be included as images are saved on this form -->
    <form action="" method="POST" enctype="multipart/form-data">
        <!--Hidden as the user does not need to see the ID.
        However if the hiddens are not included then form will not post due to missing data 
        ID is on an auto incrementer-->
        <input type= "hidden" name= "news[id]" value="<?=$news['id'] ?? ''?>"/>
        <label>Title: </label><input type = "text" name="news[title]" value="<?=$news['title'] ?? ''?>"required/>
        <label>Content: </label><input type = "text" name="news[content]" value="<?=$news['content'] ?? ''?>"required/>
      
        <!-- If there is a file that has the same name as the news article ID, 
        then that file is echoed as the cars picture-->
        <?php
        if (isset($newsarticle) && file_exists('images/articles' . $news['id'] . '.jpg')) 
        {
            echo '<img src="images/articles' . $news['id'] . '.jpg/>';
        }
        ?>
        <label>Article Image: </label>

        <input type="file" name="image" />
        <input type= "hidden" name= "news[author]" value="<?=$_SESSION['username']?>"/>
        <input type= "submit" name = "submit" value = "Add Post" />
    </form>
</section>