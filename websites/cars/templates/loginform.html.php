<section class= "right">
    <h2>Log in</h2>
			<form action="index.php" method="post">
				<label>Username</label>
				<input type="text" name="username" />

				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
</section>

<?php

/*If the submit button is pressed then the name entered is compared to the database and its stored names 
to find a match,
this first isset block is to search for a normal user in the user table in the database
if(isset($_POST['submit'])) {
    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');

    $values = [
        'username' => $_POST['username'],
    ];

    $stmt->execute($values);

    //checks whether there are any records in the database, if 0 then nothin will happen due to the > operator
    if($stmt->rowCount() > 0) {
        $admin = $stmt ->fetch();

        //below compares the password entered to the ones stored, if it finds a match then a login session is started
        if(password_verify($_POST['password'], $admin['password'])) {
            $_SESSION['loggedin'] = $user['username'];
            //displays a message letting the user know they are logged in
            echo '<p>You have been logged in </p>';
        }
    else {
        //lets the user know that the login was unsuccessful 
        echo '<p>Sorry, Incorrect Username or Password</p>';
        }
    }   
}

//if submit is not pressed then the empty form is displayed for the user to enter thier login details
else { 
    $content =
		loadTemplate('../templates/loginform.html.php');
}
*/
?>