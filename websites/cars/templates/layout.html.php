<!DOCTYPE html>
<html lang = "en"> 
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?php echo $title; ?></title>
	</head>
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
			<li><a href="/news/news">Home</a></li>
			<li><a href="/cars/cars">Showroom</a></li>
			<li><a href="/cars/about">About Us</a></li>
			<li><a href="/inquiries/contact">Contact us</a></li>
			<li><a href="/jobs/clairescareers">Claire's Careers</a></li>
			<li><a href="/admins/login">Admin Login</a></li>
		</ul>
	</nav>

	<img src="/images/randombanner.php"/>
	<main class = "<?php echo $class;?> ">
    	<?php echo $content; ?>
	</main>

	<footer>
		&copy; Claire's Cars 2021
	</footer>
</body>
</html>