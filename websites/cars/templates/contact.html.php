<!-- This form is used so user can post inquiries -->
<h2>Contact Us</h2>
<h3>Enter your details below:</h3>

<form action="" method="POST" >
    <!--Hidden as the user does not need to see the ID.
        However if the hiddens are not included then form will not post due to missing data 
        ID is on an auto incrementer-->
    <input type= "hidden" name= "inquiries[id]" value="<?=$inquiries['id'] ?? ''?>"/>
    <!--completed is hidden as the customer does not need to see this when submitting#
        This is submitted as 0 as the users enquiry has not been completed, this ensures it is posted to 
        the right list of the admin -->
    <input type = "hidden" name="inquiries[completed]" value= 0 />
    <label>Name: </label><input type = "text" name="inquiries[name]" value="<?=$inquiries['name'] ?? ''?>" required />
    <label>Email: </label> <input type="text" name = "inquiries[email]" value="<?=$inquiries['email'] ?? ''?>"required />
	<label>Telephone: </label> <input type="text" name = "inquiries[telephone]" value="<?=$inquiries['telephone'] ?? ''?>" required/>
	<label>Inquiry: </label><textarea name = "inquiries[inquiry]" value="<?=$inquiries['inquiry'] ?? ''?>" required> </textarea>

    <input type= "submit" name = "submit" value = "Save" />
    
</form>
