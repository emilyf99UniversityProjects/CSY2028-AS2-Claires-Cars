<section class = "right">
<h2> Latest News </h2>

<?php
    foreach($news as $newsarticle) {
        echo '<table>';
        echo '<li>';
	 	echo '<div class="details">';
		echo '<tr><h2>' . $newsarticle['title'] . '</h2></tr>';
        if (file_exists('images/articles/' . $newsarticle['id'] . '.jpg')) {
            echo '<tr><a href="images/articles/' . $newsarticle['id'] . '.jpg"><img src="/images/articles/' . $newsarticle['id'] . '.jpg" /></a></tr>';
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

    if(!$news) {
        ?>
        <p>Claire's Cars currently has no news articles.</p>
        <p>Please check soon as we frequently add articles</p>
    <?php
    }
?>
</section>