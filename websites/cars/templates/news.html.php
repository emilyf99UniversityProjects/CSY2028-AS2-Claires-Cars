<section class = "right">
<h2> Latest News </h2>

<?php
    //for each article found the record is displayed in a table row
    foreach($news as $newsarticle) {
        echo '<table>';
        echo '<li>';
	 	echo '<div class="details">';
		echo '<tr><h2>' . $newsarticle['title'] . '</h2></tr>';

        //if a image file exists with the same ID as the article it is retreived as the article picture
        if (file_exists('images/articles/' . $newsarticle['id'] . '.jpg')) {
            echo '<tr><img src="/images/articles/' . $newsarticle['id'] . '.jpg" /></a></tr>';
        }
		echo '<tr><h3>' . $newsarticle['content'] . '</h3></tr>';
        echo '<tr>';
		echo '<td><p>Publish Date: ' . $newsarticle['dateposted'] . '</p></td>';
		echo '<td><p>Author: ' . $newsarticle['author'] . '</p></td>';
        echo '</tr>';
		echo '</div>';
	 	echo '</li>';
        echo '</table>';
    }

    //if there is no articles to display then a message is displayed to help the user understand why the page is blank
    if(!$news) {
        ?>
        <p>Claire's Cars currently has no news articles.</p>
        <p>Please check soon as we frequently add articles</p>
    <?php
    }
?>
</section>