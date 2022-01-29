<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Update or Add a Manufacturer</h2>

    <form action="" method="POST">
        <!--Hidden as the user does not need to see the ID.
        However if the hiddens are not included then form will not post due to missing data 
        ID is on an auto incrementer-->
        <input type= "hidden" name= "manufacturers[id]" value="<?=$manufacturers['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="manufacturers[name]" value="<?=$manufacturers['name'] ?? ''?>"required/>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>