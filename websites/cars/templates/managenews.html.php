<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage News</h2>
    <p>All the News Articles are listed here.</p>
    <p><a href ="/news/editaddnews">Add a new News Article</a></p>

    <?php
    foreach ($news as $newsarticle) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4>Title: ' . $newsarticle['title'] . '</h4>';
        //add thumbnail image
        echo '<h4>Content: ' . $newsarticle['content'] . '</h4>';
        echo '<h4>Date Posted: ' . $newsarticle['dateposted'] . '</h4>';
        echo '<h4>Author: ' . $newsarticle['author'] . '</h4></td>';
        echo '<td><p><a href = "/news/editaddnews?id=' .$newsarticle['id'] . '">Edit News Article</a></p></td>';
        echo '<td><form method = "post" action = "/news/deletenewsarticle">
        <input type = "hidden" name = "id" value = "' . $newsarticle['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete this Article" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }

    if(!$news) {
    ?>
    <p>There are currently no News Articles in the database.</p>
    <?php
    }
    ?>
</section>