<?php
if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])) { 

 	require 'leftsectionadmin.html.php';
	 ?>
	<section class= "right">
    <p>You are already logged in </p> 
	</section>
 <?php
}
else {
    ?>
    <section class= "right">
    <h2>Log in</h2>
			<form action="" method="post">
				<label>Username</label>
				<input type="text" name="username" required />

				<label>Password</label>
				<input type="password" name="password" required/>

				<input type="submit" name="submit" value="Log In" />
			</form>
    </section>
<?php
}
?>

