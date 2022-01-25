<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Complete Inquiry</h2>

    <form action="" method="POST">
        <input type= "hidden" name= "inquiries[id]" value="<?=$inquiries['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="inquiries[name]" value=" <?=$inquiries['name'] ?? ''?>" readonly="readonly"/>
        <label>Email: </label><input type = "text" name="inquiries[email]" value=" <?=$inquiries['email'] ?? ''?>" readonly="readonly"/>
        <label>Telephone: </label><input type = "text" name="inquiries[telephone]" value=" <?=$inquiries['telephone'] ?? ''?>"readonly="readonly"/>
        <label>Inquiry: </label><input type = "text"  name="inquiries[inquiry]" value=" <?=$inquiries['inquiry'] ?? ''?>"readonly="readonly"/>
        <label>Completed: </label><input type = "checkbox" name="inquiries[completed]" value= 1 />
                                  <input type = "hidden" name="inquiries[completed]" value= 0 />

        <input type= "submit" name = "submit" value = "Save" />                    
       <!-- <input type= "hidden" name= "inquiries[completeddate]" value="<?//=$inquiries['completeddate'] ?? ''?>"/> 
        <input type= "hidden" name= "inquiries[completedby]" value="<//?=$inquiries['completedby'] ?? ''?>"/> -->

    </form>
</section>