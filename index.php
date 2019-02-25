<?php
session_start();
include("konekcija.inc");

?>
<!DOCTYPE html>
<html>
	<head>
		<link href="stil.css" rel="stylesheet" type="text/css" />
		<link href="jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" />
		<link rel ="shortcut icon" href="slike/pekara2.ico"/>  
        <title> Pekara Duo</title>
        <meta charset="UTF-8"/>
         <meta name="keywords" content="Pekara,Naša pekara,Pekara Duo,Naša pekara Duo"/>           <!--ovde treba da upisem kljucne reci-->
        <meta name="description" content="Naša pekara Duo se nalazi u naselju Mirijevo u Beogradu.
					Proizvode u našoj pekari Duo proizvodimo po tradicionalnim recepturama naših predaka.
					Ako želite mirisno domaće pecivo na vašoj trpezi, posetite našu pekaru Duo"/>                                           <!--ovde ide opis-->
        <meta name="author" content="Stevan Zdravkovic"/>
        <meta name="copyright" content="Stevan Zdravkovic"/>
		
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jquery.lightbox-0.5.min.js"></script>
		<script language="JavaScript" src="kveri.js"></script>
		
		
		<script type="text/javascript">
		/*slide*/
$(document).ready(function(){
  slideShow();
});

function slideShow() {
  var current = $('#slajder .show');
 var next=current.next().length ? current.next() : current.parent().children(':first');
  
  current.hide().removeClass('show');
  next.fadeIn().addClass('show');
  
  setTimeout(slideShow, 3000);
}
 </script>
		
		
	</head>
	<body>
		<div id="okvir">
			
			<div id="heder">
				
				<div id="hedergore">
					<div id="log">
					<?php
					
					include "konekcija.inc";
				if(isset($_SESSION['idU']) && $_SESSION['uloga']=='user') /*OR $_SESSION['uloga']=='admin')*/
				{
					
					
					$upit="SELECT * FROM meni WHERE meni_id IN(9)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
				}
				echo"</ul>";
					
				}
				
				else if(isset($_SESSION['idU']) && /*$_SESSION['uloga']=='user') OR*/$_SESSION['uloga']=='admin')
				{
					
					
					$upit="SELECT * FROM meni WHERE meni_id IN(9)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
				}
				echo"</ul>";
					
				}
				
				
				else {
					
				include "konekcija.inc";
				$upitUser="SELECT link,meni_ime FROM meni WHERE meni_id IN (7,8)";
		         $rezUpit= mysqli_query($konekcija,$upitUser);
		         if(!$rezUpit) 
                            {
                                echo "Greska!! -".mysqli_error();
                            }
                           
                            else
                            {
                                echo "<ul>";
                                while($r=mysqli_fetch_array($rezUpit))
                               
                                {
                                    echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
                                }
                                echo "</ul>";
                               
                            }
				}
				?>
					
					</div>
					
					<div id="drustveneMreze">
						<a href="https://www.facebook.com/"><img src="slike/fbb.png" alt="facebook"></img></a>
						<a href="https://www.instagram.com/"><img src="slike/insta.png" alt="facebook"></img></a>
					</div>
					<div class="cistac"></div>
				</div>
				
				<div id="hedersredina">
				
					<div id="logo">
					
					<?php
				$upit="SELECT * FROM slike WHERE alt='logo'";
				$rez=mysqli_query($konekcija,$upit);
				$r=mysqli_fetch_array($rez);
				
					echo "<a href='index.php' ><img src='".$r['putanja']."'alt='".$r['alt']."' class='show'</img></a>";
				
			
			?>
					
					
					
					
					</div>
					
					<div id="naziv"><h1>Naša pekara Duo</h1></div>
					
						
				</div>
				<div class="cistac"></div>
				
				<div id="meni">
				
				<?php
				include "konekcija.inc";
				if(isset($_SESSION['idU']) && $_SESSION['uloga']=='user')
				{
					
					
					$upit="SELECT * FROM meni WHERE meni_id IN(1,2,6,3,4,5,17)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
				}
				echo"</ul>";
					
				}
				else if 	(isset($_SESSION['idU']) && $_SESSION['uloga']=='admin')
				{
					
					
					$upit="SELECT * FROM meni WHERE meni_id IN(1,2,10,12,13,14)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
				}
				echo"</ul>";
				
				}
				
			
				else {
				
						$upitUser="SELECT link,meni_ime FROM meni WHERE meni_id IN (1,2,6,4,5,11)";
						$rezUpit= mysqli_query($konekcija,$upitUser);
						if(!$rezUpit) 
                            {
                                echo "Greska!! -".mysqli_error();
                            }
                           
                            else
                            {
                                echo "<ul>";
                                while($r=mysqli_fetch_array($rezUpit))
                               
                                {
                                    echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
                                }
                                echo "</ul>";
                               
                            }
					}	
				?>
				
				
				
				</div>




			</div>

			<div id="slajder">
			
			<?php
				$upit="SELECT * FROM slike WHERE id_slike IN (1,2,3)";
				$rez=mysqli_query($konekcija,$upit);
				while($r=mysqli_fetch_array($rez))
				{
					echo "<img src='".$r['putanja']."'alt='".$r['alt']."' class='show'/>";
				}
			
			?>
				

			</div>


				

			<div id="akcije">
			<?php
			
						$upitUser="SELECT link,meni_ime FROM meni WHERE meni_id IN (2,5,6)";
						$rezUpit= mysqli_query($konekcija,$upitUser);
						if(!$rezUpit) 
                            {
                                echo "Greska!! -".mysqli_error();
                            }
                           
                            else
                            {
                                
                                while($r=mysqli_fetch_array($rezUpit))
                               
                                {
									
									echo"<div class='akcija'><a href='".$r['link']."'><h2>".$r['meni_ime']."</h2><img src='slike/pekara2.jpg' alt='slika' width='250px' height='220px'></img></a></div>";
									
                                    
                                }
                                
                               
                            }
			
			
			?>
			<!--	<div class="akcija"><a href=".$r['link'].">".$r['meni_ime']."</a></div>
				<div class="akcija"><h2>Kontakt</h2></div>
				<div class="akcija"><h2>Anketa</h2></div>-->
				
			</div>

			<div id="ciljevi">
				<h3>Ciljeci Naše pekare Duo su:</h3>
				</br>
				<p>&#9757;ispunjenje zahteva kupaca&#9757;</p>
				<p>&#9757;dobra poslovna saradnja sa isporučiocima&#9757;</p>
				<p>&#9757;stalno unapređuje kvaliteta proizvoda&#9757;</p>
				<p>&#9757;poštovanje svih važećih zakonskih propisa i načela dobrih poslovnih običaja&#9757;</p>
				<p>&#9757;rentabilnije poslovanje&#9757;</p>
				<p>&#9757;da svojim načinom rada, tehnologijama i drugim aktivnostima ne ugrožava korisnike svojih proizvoda, radnu i životnu sredinu&#9757;</p>
				
			</div>

			<div id="futer">
				 <div id="menifuter">
			<?php
					
					
					if(isset($_SESSION['idU']) && $_SESSION['uloga']=='admin')
				{
				
					
					$upit="SELECT * FROM meni WHERE meni_id IN(1,2,10,12,13,14)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['meni_ime']."</a></li>";
				}
				echo"</ul>";
				
				}
					
					else {
					
					
						$upit="SELECT * FROM meni WHERE meni_id IN (1,2,4,5)";
						$rez=mysqli_query($konekcija,$upit);
						echo"<ul>";
						while($r=mysqli_fetch_array($rez))
							{
								echo "<li><a href='".$r['link']."'>".$r['meni_ime']."</a></li>";
							}
						echo"</ul>";
					}
					?>
				</div>
				
				<div id="futersredina">
					<p>Copyright 2018. Naša pekara Duo | All Rights Reserved | Powered by Stevan Zdravković</p>
				
				</div>
				<div id="futerdesno">	
				<?php
					$upit="SELECT * FROM meni WHERE meni_id IN (15,16)";
						$rez=mysqli_query($konekcija,$upit);
						echo"<ul>";
						while($r=mysqli_fetch_array($rez))
							{
								echo "<li><a href='".$r['link']."'>".$r['meni_ime']."</a></li>";
							}
						echo"</ul>";
					
					?>

				</div>
				<div class="cistac"></div>
			</div>

		</div>
	</body>

</html>