<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Update or Add a Admin</h2>

    <form action="" method="POST">
        <input type= "hidden" name= "admins[id]" value="<?=$admins['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="admins[username]" value="<?=$admins['username'] ?? ''?>"required/>
        <label>Password: </label><input type = "password" name="admins[password]" value="<?=$admins['password'] ?? ''?>"required/>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>