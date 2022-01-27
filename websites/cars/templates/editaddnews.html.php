<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Edit or Add a News Article</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type= "hidden" name= "news[id]" value="<?=$news['id'] ?? ''?>"/>
        <label>Title: </label><input type = "text" name="news[title]" value=" <?=$news['title'] ?? ''?>"required/>
        <label>Content: </label><textarea name="news[content]" value=" <?=$news['content'] ?? ''?>"required></textarea>
      
        <?php

                    if (isset($newsarticle) && file_exists('images/articles' . $news['id'] . '.jpg')) {
                    echo '<img src="images/articles' . $news['id'] . '.jpg" />';
                     }
                ?>
                <label>Product image</label>

                <input type="file" name="image" />
        <input type= "hidden" name= "news[author]" value="<?=$_SESSION['username']?>"/>
        <input type= "submit" name = "submit" value = "Add Post" />
    </form>
</section>