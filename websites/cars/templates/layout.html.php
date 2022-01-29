<!DOCTYPE html>
<html lang = "en"> 
	<!-- This is the main layout for all pages, 
		 Rather than have the code be repetitive this is called when the main layout is needed,
		 and values are passed into it to make it dynamic. -->
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<!--This takes the title value passed to it to alter the title on each page -->
		<title><?php echo $title; ?></title>
	</head
	>
	<body>
	<header>
		<section>
			<aside>
			<h3>Opening Hours:</h3>
                <p>Mon-Fri: 09:00-17:30</p>
                <p>Sat: 09:00-17:00</p>
                <p>Sun: Closed</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
		
	<nav>
		<ul>
			<!--Navigation menu that is displayed consistently on each page -->
			<li><a href="/news/news">Home</a></li>
			<li><a href="/cars/cars">Showroom</a></li>
			<li><a href="/cars/about">About Us</a></li>
			<li><a href="/inquiries/contact">Contact us</a></li>
			<li><a href="/jobs/clairescareers">Claire's Careers</a></li>
			<li><a href="/admins/login">Admin Login</a></li>

			<!--The naviation links below are only displayed if the user is logged in
				This stops non admins from having access to the admin features of the site -->
			<?php
				if(isset($_SESSION['loggedin'])) {
				echo '<li><a href="/admins/logout">Admin Logout</a></li>';
				echo  '<li><a href="/admins/adminhub">Admin Hub</a><li>';
				}?>
		</ul>
	</nav>

	<img src="/images/randombanner.php"/>

	<!--assigns the class based on the value assigned in the controller --> 
	<main class = "<?php echo $class;?> ">
    	<?php 
		//assigns the page content based on the value assigned in the controller
		echo $content; 
		?>
		
	</main>

	<footer>
		&copy; Claire's Cars 2021
	</footer>
</body>
</html>