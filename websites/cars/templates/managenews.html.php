<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage News</h2>
    <p>All the News Articles are listed here.</p>
    <p><a href ="">Add a new News Article</a></p>

    <?php
    foreach ($news as $newsarticle) {
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4>Title: ' . $newsarticle['title'] . '</h4>';
        //add thumbnail image
        echo '<h4>Content: ' . $newsarticle['content'] . '</h4>';
        echo '<h4>Date Posted: ' . $newsarticle['dateposted'] . '</h4>';
        echo '<h4>Author: ' . $newsarticle['author'] . '</h4>';
        echo '<p><a href ="">Delete this Article (cannot be undone)</a></p>';
        echo '<p><a href = "">Edit Car</a></p>';
        echo '<td><form method = "post" action = "/news/deletenewsarticle">
        <input type = "hidden" name = "id" value = "' . $newsarticle['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete this Article" />
        </form></td>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$news) {
    ?>
    <p>There are currently no News Articles in the database.</p>
    <?php
    }
    ?>
</section>