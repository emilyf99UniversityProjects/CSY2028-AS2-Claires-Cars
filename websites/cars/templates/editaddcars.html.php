<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Update or Add a Cars</h2>

    <form action=" " method="POST">
        <input type= "hidden" name= "cars[id]" value="<?=$cars['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="cars[name]" value=" <?=$cars['name'] ?? ''?>"/>
        <!--<label><Manufacturer:-->
        <label>Price: </label><input type = "text" name="cars[price]" value=" <?=$cars['price'] ?? ''?>"/>
        <label>Description: </label><input type = "textarea" name="cars[description]" value=" <?=$cars['description'] ?? ''?>"/>
        <label>Before Price: </label><input type = "text" name="cars[beforeprice]" value=" <?=$cars['beforeprice'] ?? ''?>"/>
        <label>Mileage: </label><input type = "text" name="cars[mileage]" value=" <?=$cars['mileage'] ?? ''?>"/>
        <label>Engine: </label><input type = "text" name="cars[engine]" value=" <?=$cars['engine'] ?? ''?>"/>
        <label>Archived: </label><input type = "checkbox" name="cars[archived]" value=" <?=$cars['archived'] ?? ''?>"/>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>