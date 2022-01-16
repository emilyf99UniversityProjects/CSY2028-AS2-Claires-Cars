<section class = "right">
<h2> Latest News </h2>

<?php
    foreach($news as $newsarticle) {
        echo '<li>';
	 	echo '<div class="details">';
		echo '<h3>' . $newsarticle['title'] . '</h3>';
        echo '<image src="images/articles/' . $newsarticle['imagename'] . '" width = 100px height = 100px >';
		echo '<p>' . $newsarticle['content'] . '</p>';
		echo '<p>Publish Date: ' . $newsarticle['dateposted'] . '</p>';
		echo '<p>Author: ' . $newsarticle['author'] . '</p>';
		echo '</div>';
	 	echo '</li>';
    }

    if(!$news) {
        ?>
        <p>Claire's Cars currently has no news articles.</p>
        <p>Please check soon as we frequently add articles</p>
    <?php
    }
?>
</section>