<?php
/*If the user is already logged in and they return to the login page the admin menu is displayed as well as
  a message telling them that they are already logged in. This prevents the user becoming confused and trying to 
  login when they are alreadly logged in. */
if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])) { 

 	require 'leftsectionadmin.html.php';
	 ?>
	<section class= "right">
    <p>You are already logged in </p> 
	</section>
 <?php
}

/*If the user is not logged in the login form is displayed for the user */ 
else {
    ?>
    <section class= "right">
    <h2>Log in</h2>
			<form action="" method="post">

				<label>Username</label><input type="text" name="username" required />

				<label>Password</label><input type="password" name="password" required/>

				<input type="submit" name="submit" value="Log In" />
			</form>
    </section>
<?php
}
?>

