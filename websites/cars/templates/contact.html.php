
<h2>Contact Us</h2>
<h3>Enter your details below:</h3>

<form action="" method="POST" >
    <input type= "hidden" name= "inquiries[id]" value="<?=$inquiries['id'] ?? ''?>"/>
    <input type = "hidden" name="inquiries[completed]" value= 0 />
    <label>Name: </label><input type = "text" name="inquiries[name]" value="<?=$inquiries['name'] ?? ''?>" required />
    <label>Email: </label> <input type="text" name = "inquiries[email]" value="<?=$inquiries['email'] ?? ''?>"required />
	<label>Telephone: </label> <input type="text" name = "inquiries[telephone]" value="<?=$inquiries['telephone'] ?? ''?>" required/>
	<label>Inquiry: </label><textarea name = "inquiries[inquiry]" value="<?=$inquiries['inquiry'] ?? ''?>" required> </textarea>

    <input type= "submit" name = "submit" value = "Save" />
    
</form>
