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
		<meta name="description" content="Mas de Vignal is gelegen in Le Vignal, een pitoresk dorpje in de zuidelijke Ardèche. Deze luxueuze villa is geschikt voor 12 personen en omvat twee aparte compartimenten: het hoofdverblijf waar u met 10 personen kan logeren en een aangrenzende gîte voor 2 personen.
Vanuit het zwembad (10m x 5m) met panoramische overloopsysteem kan u  zowel overdag als s nachts  genieten van het prachtige uitzicht over de groene vallei. Op het domein bevinden zich een goed onderhouden olijfgaard in aangroei, een pétanqueplein en een buitenkeuken met barbecue. De Mas is gelegen op een heuvel en vanop de verschillende terrassen met uitzicht op het prachtige natuurschoon is het aangenaam verpozen. Er is voldoende schaduwrijke parkeergelegenheid.">
		<meta name="keywords" content="Le vignal,Ardèche, Ardeche, Vakantiewoning, Reserveren, boeken, villa, le mas de vignal, piscine, zwembad, 10 personen, les vans, likoké">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
		<link rel="stylesheet" href="assets/css/cal.css" />
		<link rel="stylesheet" href="assets/css/pricelist.css" />
		<link rel="stylesheet" href="assets/css/lightbox.css" >
		<script src="js/calendar.js" type="text/javascript"></script>
		<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
		<script scr="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"> </script>	
		<script>
  			
  		</script>
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
				function resizeIframe(a){
					for(var b=document.getElementsByTagName("iframe"), c=0; c<b.length;c++){

						if ($(b[c]).is(':visible'))
						{
							var d=b[c].getAttribute("src");
							if (a.iframeuri !== undefined && d.startsWith(a.iframeuri))
							{
								b[c].style.height=""+a.height+"px";

							}
							else if(a.height === undefined && (d.startsWith("https://www.reservation-manager.fr/") || d.startsWith("https://www.reservation-manager.fr/")) )
							{
								b[c].style.height=""+a+"px";
							}
						}
					}
				}
				window.addEventListener("message",function(a){resizeIframe(a.data)})
			});
		</script> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<?php 
		include('database/connection.php');
			function getLocalizedStringForKey($key) {
			
	if (isset($key))
	{


		//one.com
		$servername = "10.3.1.227";
        $username = "yannifh192_mdv";
        $password = "DbFkC6wz";

        $conn = new mysqli($servername, $username, $password, "yannifh192_mdv"); //online

		//local

		/*$servername = "localhost";
		$username = "root";
		$password = "root";

		$conn = new mysqli($servername, $username, $password, "mas_de_vignal"); //local*/
 		
 		
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
								<!--<h1><a href="index.html" id="logo" class="daydreamer" style="color:#ae9b5b;">Mas de Vignal</a></h1>-->
								<!--<hr />-->
								<img alt="Mas de Vignal" src="/images/masdevignal_website.png" width="400px" />
					
							</header>
							<footer>
								<a href="#banner" class="button circled scrolly"><?php getLocalizedStringForKey("button.more"); ?></a>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index2.html"><?php getLocalizedStringForKey("menu.home"); ?></a></li>
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
								<!--<li><a href="#foto" class="scrolly">
							--><?php // getLocalizedStringForKey("menu.pictures"); ?>
							<!--</a></li>-->
								<li><a href="#galerij" class="scrolly"><?php getLocalizedStringForKey("gallery.title"); ?></a></li>
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
<!--
<br /><div class="warning-panel"><h1> INFO COVID-19 </h1>
<p>Het Coronavirus raakt ons allemaal en brengt onzekerheid, ook over jouw vakantie !
Om alvast enig perspectief te hebben op je zomervakantie bieden we de mogelijkheid om een woning te reserveren zonder kosten,  d.w.z. u betaalt geen voorschot !
Wij volgen de richtlijnen en het reisadvies op de voet en ingeval de reis niet kan doorgaan, kan u kosteloos annuleren of omboeken.
In tussentijd : hou het gezond !</p></div> -->
					</header>
				</section>

			<?//php include('php/fotos.php'); 
			?>


			<?php include('php/gallery.php'); 
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
							
					</p>
                          <p>
						<?php getLocalizedStringForKey("reservations.p2"); ?>
							
							</p>

						</header>

						<div class="row" ><br />
							<article class='6u 12u(mobile) special'>
							<div style="text-align:center;">Mas (incl. gîte)</div>
							<div id="calendar">
								<p style="text-align:center;">
								<iframe src="https://www.reservation-manager.fr/class/class.getCal.php?userModuleID=9863efc9e9e0f84130320f8b9301faa9&userItem=287&height=300&width=550&lang=nl&num_months=2" width="100%" height="300" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
								<a target="_blank" href="https://www.reservation-manager.fr/class/class.getModuleMobile.php?userModuleID=9863efc9e9e0f84130320f8b9301faa9&userItem=287&height=300&lang=nl&num_months=3&width=550" class="button"><?php getLocalizedStringForKey("reservations.button.now"); ?></a>
							</p>
							</div>
							</article>
							<article class='6u 12u(mobile) special'>
							<div style="text-align:center;">Mas (excl. gîte)</div>
							<div id="calendar">
								<p style="text-align:center;">
								
								<iframe src="https://www.reservation-manager.fr/class/class.getCal.php?userModuleID=9863efc9e9e0f84130320f8b9301faa9&userItem=288&height=300&width=550&lang=nl&num_months=2" width="100%" height="300" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
								<a target="_blank" href="https://www.reservation-manager.fr/class/class.getModuleMobile.php?userModuleID=9863efc9e9e0f84130320f8b9301faa9&userItem=288&height=300&lang=nl&num_months=3&width=550" class="button"><?php getLocalizedStringForKey("reservations.button.now"); ?></a>
								</p>
							</div>
							</article>
												
							<article class='6u 12u(mobile) special'>
							<div style="text-align:center;">Gîte</div>
							<div id="calendar">
									<p style="text-align:center;">
								<iframe src="https://www.reservation-manager.fr/class/class.getCal.php?userModuleID=9863efc9e9e0f84130320f8b9301faa9&userItem=289&height=300&width=550&lang=nl&num_months=2" width="100%" height="300" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
								<a  target="_blank" href="https://www.reservation-manager.fr/class/class.getModuleMobile.php?userModuleID=9863efc9e9e0f84130320f8b9301faa9&userItem=289&height=300&lang=nl&num_months=3&width=550" class="button"><?php getLocalizedStringForKey("reservations.button.now"); ?></a>
									</p
								
							</div>
							</article>
							
						</div>



						
					</article>

				</div>
<div style="overflow:hidden;" >
	<iframe style="position:relative; top:-50px; border:none;" id="map" src="https://www.google.com/maps/d/u/0/embed?mid=zlyZfyI-GMVY.kR5v-U4KrUCk&z=8" ></iframe>
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
													<h3><a href="/images/huis/grondplan.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title1"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description1"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/images/huis/grondplan_tuin.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title1a"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description1a"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/images/huis/boven.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title2"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description2"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/images/huis/kelder.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title2a"); ?></a></h3>
												</header>
												<span class="timestamp"><?php getLocalizedStringForKey("documents.description2a"); ?></span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="/documenten/huisindeling_nl.pdf" target="_blank"><?php getLocalizedStringForKey("documents.title3"); ?></a></h3>
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
													<h3><a href="mailto:ardechevakantie@gmail.com">ardechevakantie@gmail.com</a></h3>
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
											<li>&copy; Mas de Vignal 2021. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
			<script src="assets/js/lightbox.js"></script>
	</body>
</html>