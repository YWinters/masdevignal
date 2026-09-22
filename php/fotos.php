<!-- Carousel -->


				<section id="foto" class="carousel">
					<div class="reel">


						<?php 
              $lang = $_GET["lang"];
              //echo "lang:" . $lang;
              if (strlen($lang)<=0)
                $lang = "nl";
							include('database/connection.php');
							$query = "SELECT * FROM fotos as f ORDER BY f.order";
							//echo $query;
              	if ($result = $conn->query($query)) {
              					//print_r($result);
   								/* fetch object array */
    							while ($obj = $result->fetch_assoc()) {

    								echo "<article>";
    								echo "<a href='#' class='image featured'><img src='".$obj['url']."' alt='' /></a>";
    								echo "<header>";
                    if ($lang == "nl")
                    {
    								echo "<h3><a href='#'>".$obj['titel']."</a></h3>";
    								echo "</header>";
    								echo "<p>".$obj['beschrijving']."</p>";
                    }
                    if ($lang == "fr")
                    {
                    echo "<h3><a href='#'>".$obj['titel_fr']."</a></h3>";
                    echo "</header>";
                    echo "<p>".$obj['beschrijving_fr']."</p>";
                    }
                     if ($lang == "en")
                    {
                    echo "<h3><a href='#'>".$obj['titel_en']."</a></h3>";
                    echo "</header>";
                    echo "<p>".$obj['beschrijving_en']."</p>";
                    }
    								echo "</article>";
    							}

    							/* free result set */
    							$result->close();
							}

						?>

						

					</div>
				</section>