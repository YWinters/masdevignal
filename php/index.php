

<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Le mas de Vignal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
		<link rel="stylesheet" href="assets/css/cal.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<?php 
		include('database/connection.php');
			function getLocalizedStringForKey($key) {
			
	if (isset($key))
	{

		//one.com
 		$servername = "localhost";
 		$username = "masdevignal_be";
 		$password = "DbFkC6wz";
 		
 		//local
 		/*$servername = "localhost";
 		$username = "root";
 		$password = "root";*/
 		
 		// Create connection
 		$conn = new mysqli($servername, $username, $password, "masdevignal_be"); //online
 		//$conn = new mysqli($servername, $username, $password, "vignal"); //local
 		
 		// Check connection
 		if ($conn->connect_error) {
     		die("Connection failed: " . $conn->connect_error);
 		} 
		
		$lang = $_GET["lang"];
		//echo "key: ".$key . " lang: ".$lang;
		if (strlen($lang)<=0)
			$lang = "nl";

		//echo $lang;
		$query = "SELECT t.".$lang." FROM translations as t where t.key like '".$key ."'";
		//echo $query;
    	//$result = $conn->query($query);
    	//echo $conn;
    	if (!isset($conn))
    		echo "No connection";
    	if ($result = $conn->query($query)) {
    		//echo $result;
    		while($row = $result->fetch_assoc()){
 
    			echo utf8_encode($row[$lang]);
    		}
    	}
	}
}
		?>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a href="index.html" id="logo" class="daydreamer" style="color:#ae9b5b;"><?php getLocalizedStringForKey("main.title"); ?></a></h1>
								<!--<hr />-->
								<p><?php getLocalizedStringForKey("main.subtitle"); ?></p>
							</header>
							<footer>
								<a href="#banner" class="button circled scrolly"><?php getLocalizedStringForKey("button.more"); ?></a>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.html"><?php getLocalizedStringForKey("menu.home"); ?></a></li>
								<!--<li>
									<a href="#">Dropdown</a>
									<ul>
										<li><a href="#">Lorem ipsum dolor</a></li>
										<li><a href="#">Magna phasellus</a></li>
										<li><a href="#">Etiam dolore nisl</a></li>
										<li>
											<a href="#">And a submenu &hellip;</a>
											<ul>
												<li><a href="#">Lorem ipsum dolor</a></li>
												<li><a href="#">Phasellus consequat</a></li>
												<li><a href="#">Magna phasellus</a></li>
												<li><a href="#">Etiam dolore nisl</a></li>
											</ul>
										</li>
										<li><a href="#">Veroeros feugiat</a></li>
									</ul>
								</li>-->
								<li><a href="#foto" class="scrolly"><?php getLocalizedStringForKey("menu.pictures"); ?></a></li>
								<li><a href="#omgeving" class="scrolly"><?php getLocalizedStringForKey("menu.surroundings"); ?></a></li>
								<li><a href="#prijzen" class="scrolly"><?php getLocalizedStringForKey("menu.reservations"); ?></a></li>
								<li><a href="#contact" class="scrolly"><?php getLocalizedStringForKey("menu.contact"); ?></a></li>
								<li>
									<a href="?"><img src="images/nl.png" width="20px" height="15px" /></a>
								</li>
								<li>
									<a href="?lang=fr"><img src="images/fr.png" width="20px" height="15px" /></a>
									<!--<ul>
										<li><a href="#">Lorem ipsum dolor</a></li>
										<li><a href="#">Magna phasellus</a></li>
										<li><a href="#">Etiam dolore nisl</a></li>
										
										<li>
											<a href="#">And a submenu &hellip;</a>
											<ul>
												<li><a href="#">Lorem ipsum dolor</a></li>
												<li><a href="#">Phasellus consequat</a></li>
												<li><a href="#">Magna phasellus</a></li>
												<li><a href="#">Etiam dolore nisl</a></li>
											</ul>
										</li>
										<li><a href="#">Veroeros feugiat</a></li>
									</ul>-->
								</li>
								<li>
									<a href="?lang=en"><img src="images/gb.png" width="20px" height="15px"/></a>
								</li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
				<section id="banner">
					<header>
						<?php include('php/description.php'); ?>
					</header>
				</section>

			<?php include('php/fotos.php'); 
			?>

			<!-- Main -->
	
			<!-- Features -->
				<div class="wrapper style1">

					<section id="omgeving" class="container special">
						<header>
							<h2 class="daydreamer"><?php getLocalizedStringForKey("surroundings.title"); ?></h2>
							<p ><?php getLocalizedStringForKey("surroundings.main.description"); ?>
<br/><br/></p>
						</header>
						<div class="row">
							<article class="4u 12u(mobile) special">
								<a href="#" class="image featured"><img src="images/omgeving/pontdarc.png" alt="" /></a>
								<header>
									<h3><a href="#"><?php getLocalizedStringForKey("surroundings.title1"); ?></a></h3>
								</header>
								<p>
									<?php getLocalizedStringForKey("surroundings.description1"); ?>
								
	
								</p>
							</article>
							<article class="4u 12u(mobile) special">
								<a href="#" class="image featured"><img src="images/omgeving/sport.png" alt="" /></a>
								<header>
									<h3><a href="#"><?php getLocalizedStringForKey("surroundings.title2"); ?></a></h3>
								</header>
								<p>
									<?php getLocalizedStringForKey("surroundings.description2"); ?>
									
								</p>
							</article>
							<article class="4u 12u(mobile) special">
								<a href="#" class="image featured"><img src="images/omgeving/vans.png" alt="" /></a>
								<header>
									<h3><a href="#"><?php getLocalizedStringForKey("surroundings.title3"); ?></a></h3>
								</header>
								<p>
									<?php getLocalizedStringForKey("surroundings.description3"); ?>
									
								</p>
							</article>
							
						</div>
						<div class="row">
							<article class="4u 12u(mobile) special">
								<a href="#" class="image featured"><img src="images/omgeving/feuilledechou.png" alt="" /></a>
								<header>
									<h3><a href="#"><?php getLocalizedStringForKey("surroundings.title4"); ?></a></h3>
								</header>
								<p>
									<?php getLocalizedStringForKey("surroundings.description4"); ?>
									
									</p>
							</article>
							<article class="4u 12u(mobile) special">
								<a href="#" class="image featured"><img src="images/omgeving/ventoux.png" alt="" /></a>
								<header>
									<h3><a href="#"><?php getLocalizedStringForKey("surroundings.title5"); ?></a></h3>
								</header>
								<p>
									<?php getLocalizedStringForKey("surroundings.description5"); ?>
									
								</p>
							</article>
							<article class="4u 12u(mobile) special">
								<a href="#" class="image featured"><img src="images/omgeving/vogue.png" alt="" /></a>
								<header>
									<h3><a href="#"><?php getLocalizedStringForKey("surroundings.title6"); ?></a></h3>
								</header>
								<p>
									<?php getLocalizedStringForKey("surroundings.description6"); ?>
									
								</p>
							</article>
							
						</div>
					</section>

				</div>
				<div class="wrapper style2">

					<article id="main" class="container special">
						<a href="#" class="image featured"><img src="images/huis/huis.jpg" alt="" /></a>
						<header>
							<h2><a href="" id="prijzen" class="daydreamer"><?php getLocalizedStringForKey("menu.reservations"); ?></a></h2>
							<p>
								<?php getLocalizedStringForKey("reservations.p1"); ?>
							
					</p><p>
						<?php getLocalizedStringForKey("reservations.p2"); ?>
							
							</p>
						</header>
						<!--<p>
							Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
							posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
							sit arcu sociis. Nunc fermentum adipiscing tempor cursus nascetur adipiscing adipiscing. Primis aliquam
							mus lacinia lobortis phasellus suscipit. Fermentum lobortis non tristique ante proin sociis accumsan
							lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
							consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
							interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
							natoque aenean scelerisque.
						</p>-->
	

						<?php 
							include('php/calendar.php');
						?>
						<footer>
							<a href="mailto:ardechevakantie@gmail.com" class="button"><?php getLocalizedStringForKey("reservations.button.now"); ?></a>
						</footer>
					</article>

				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">

							<!-- Tweets -->
								

							<!-- Posts -->
						
								<section class="4u 12u(mobile)">
									<header>
										<h2 class="icon fa-file circled"><span class="label"><?php getLocalizedStringForKey("documents.title"); ?></span></h2>
									</header>
									<ul class="divided">
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/images/huis/romarin_2_glvl.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title1"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description1"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/images/huis/romarin_2_verdiep.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title2"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description2"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/images/huis/huisindeling.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title3"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description3"); ?></span>
											</article>
										</li>

										
										
										
									</ul>
								</section>

								<section class="4u 12u(mobile)">
									<header>
										<h2 class="icon fa-sun-o circled"><span class="label">Tweets</span></h2>
									</header>
									<div style="text-align: center">
									<div style="margin:0 auto;">
									<!-- weather widget start --><img src="http://w.bookcdn.com/weather/picture/32_w640931_1_6_ecf0f1_250_2b252c_2b252c_2b252c_1_2b252c_2b252c_0_3.png?scode=124&domid=w209" /><!-- weather widget end -->
									</div>
									</div>
								</section>

								<section class="4u 12u(mobile)">
									<header>
										<h2 class="icon fa-phone circled" id="contact"><span class="label">Documenten</span></h2>
									</header>
									<ul class="divided">
										<li>
											<article class="post stub">
												<header>
													<h3><a href="tel:+32476247863">+32 476 247 863</a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("contact.telephone"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="#">ardechevakantie@gmail.com</a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("contact.email"); ?></span>
											</article>
										</li>								
									</ul>
								</section>

							<!-- Photos -->
								<!--<section class="4u 12u(mobile)">
									<header>
										<h2 class="icon fa-phone circled"><span class="label">Contact</span></h2>
									</header>
									<div class="row 25%">
										<div class="6u">
											<a href="#" class="image fit"><img src="images/pic10.jpg" alt="" /></a>
										</div>
										<div class="6u$">
											<a href="#" class="image fit"><img src="images/pic11.jpg" alt="" /></a>
										</div>
										<div class="6u">
											<a href="#" class="image fit"><img src="images/pic12.jpg" alt="" /></a>
										</div>
										<div class="6u$">
											<a href="#" class="image fit"><img src="images/pic13.jpg" alt="" /></a>
										</div>
										<div class="6u">
											<a href="#" class="image fit"><img src="images/pic14.jpg" alt="" /></a>
										</div>
										<div class="6u$">
											<a href="#" class="image fit"><img src="images/pic15.jpg" alt="" /></a>
										</div>
									</div>
								</section>
-->
						</div>
						<hr />
						<div class="row">
							<div class="12u">

								<!-- Contact -->
								<!--	<section class="contact">
										<header>
											<h3>Nisl turpis nascetur interdum?</h3>
										</header>
										<p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus tempor aliquet.</p>
										<ul class="icons">
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
											<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
											<li><a href="#" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
											<li>&copy; Mas de Vignal 2016. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>