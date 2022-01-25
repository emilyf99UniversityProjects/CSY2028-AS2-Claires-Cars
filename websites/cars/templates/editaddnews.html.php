<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Edit or Add a News Article</h2>

    <form action="" method="POST">
        <input type= "hidden" name= "news[id]" value="<?=$news['id'] ?? ''?>"/>
        <label>Title: </label><input type = "text" name="news[title]" value=" <?=$news['title'] ?? ''?>"required/>
        <label>Content: </label><textarea name="news[content]" value=" <?=$news['content'] ?? ''?>"required></textarea>
        <!-- Image name -->
        <input type= "hidden" name= "news[dateposted]" value="<?=$news['dateposted'] ?? ''?>"/>
        <input type= "hidden" name= "news[author]" value="<?=$news['author'] ?? ''?>"/>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>