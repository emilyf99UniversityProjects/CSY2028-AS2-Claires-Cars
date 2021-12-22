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
			<li><a href="/">Home</a></li>
			<li><a href="/cars.php">Showroom</a></li>
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li>
		</ul>
	</nav>

	<img src="/images/randombanner.php"/>

    <?php echo $content; ?>


	<footer>
		&copy; Claire's Cars 2021
	</footer>
</body>
</html>