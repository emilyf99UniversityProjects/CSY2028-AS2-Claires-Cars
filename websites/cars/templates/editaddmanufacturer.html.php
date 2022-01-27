<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Update or Add a Manufacturer</h2>

    <form action="" method="POST">
        <input type= "hidden" name= "manufacturers[id]" value="<?=$manufacturers['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="manufacturers[name]" value="<?=$manufacturers['name'] ?? ''?>"required/>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>