<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage News</h2>
    <p>All the News Articles are listed here.</p>
    <!--Add news link is before the records so it can easily be found by the admin -->
    <p><a href ="/news/editaddnews">Add a new News Article</a></p>

    <?php
    //for each news record found in the database it is displayed as a row in the table
    foreach ($news as $newsarticle) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4>Title: ' . $newsarticle['title'] . '</h4>';
        echo '<h4>Content: ' . $newsarticle['content'] . '</h4>';
        echo '<h4>Date Posted: ' . $newsarticle['dateposted'] . '</h4>';
        echo '<h4>Author: ' . $newsarticle['author'] . '</h4></td>';
        //an edit button is displayed in each record that uses the news ID in the link to provide a unique record page
        echo '<td><p><a href = "/news/editaddnews?id=' .$newsarticle['id'] . '">Edit News Article</a></p></td>';
        //delete function is on a link, rather than open a new page when clicked it deletes the article straight away
        echo '<td><form method = "post" action = "/news/deletenewsarticle">
        <input type = "hidden" name = "id" value = "' . $newsarticle['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete this Article" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }
     /*if there are no news articles records found a message is displayed to the user so they have a physical prompt to look at 
      and are not confused by a blank page*/
    if(!$news) {
    ?>
    <p>There are currently no News Articles in the database.</p>
    <?php
    }
    ?>
</section>