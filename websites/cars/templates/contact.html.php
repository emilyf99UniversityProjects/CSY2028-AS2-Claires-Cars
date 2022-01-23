
<h2>Contact Us</h2>
<h3>Enter your details below:</h3>

<form action=" " method="POST" >
    <input type= "hidden" name= "inquiries[id]" value="<?=$inquiries['id'] ?? ''?>"/>
    <label>Name: </label><input type = "text" name="inquiries[name]" value=" <?=$inquiries['name'] ?? ''?>"/>
    <label>Email: </label> <input type="text" name = "inquiries[email]" value=" <?=$inquiries['email'] ?? ''?>"/>
	<label>Telephone: </label> <input type="text" name = "inquiries[telephone]" value=" <?=$inquiries['telephone'] ?? ''?>"/>
	<label>Inquiry: </label> <textarea name = "inquiries[inquiry]" value=" <?=$inquiries['inquiry'] ?? ''?>" > </textarea>
    <input type= "hidden" name= "inquiries[completed]" value="<?=$inquiries['completed'] ?? ''?>"/>
    <input type= "hidden" name= "inquiries[completeddate]" value="<?=$inquiries['completeddate'] ?? ''?>"/>
    <input type= "hidden" name= "inquiries[completedby]" value="<?=$inquiries['completedby'] ?? ''?>"/>

    <input type= "submit" name = "contact" value = "Save" />
    
</form>
