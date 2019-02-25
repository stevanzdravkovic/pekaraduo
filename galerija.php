<?php
session_start();
include("konekcija.inc");

?>
<!DOCTYPE html>
<html>
	<head>
		<link href="stil.css" rel="stylesheet" type="text/css" />
		<link href="css/lightbox.css" rel="stylesheet" type="text/css" />
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
		 
		
		
		
		<script type="text/javascript" src="fb/lib/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="fb/lib/jquery.mousewheel.pack.js"></script>
		<script type="text/javascript" src="fb/source/jquery.fancybox.pack.js"></script>
		<link href="fb/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
			<script>
		$(document).ready(function(){  
      load_data();  
      function load_data(stranica)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page1:stranica},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var stranica = $(this).attr("id");  
           load_data(stranica);  
      });
 });
	</script>
		




	
		<script>
			$(document).ready(function()
			{
				$(".fancybox").fancybox({autoPlay:true});
			});
		
		
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





			<div id="slider">


							












			
	<!--		
		<?php

				include "konekcija.inc";
				if(isset($_SESSION['idU']) && $_SESSION['uloga']=='user')
				{
					
					
					$upit="SELECT * FROM peciva ";
				$rez=mysqli_query($konekcija, $upit);
				echo"<h2>PECIVA SA POPUSTOM</h2>";
				echo "<table border='1'>";
			while($r=mysqli_fetch_array($rez))
					{
				echo "<div class='slike'><a href='".$r['putanja']."'class='fancybox' rel='gallery'><img height='200px' width='300px' src='".$r['putanja']."'/></br><p>Naziv : ".$r['ime_peciva']."</p></a></br><p>Stara cena: <del>".$r['cena']."rsd.</del></p><p>Nova cena : ".$r['popust']." rsd.</p></div>";
					
					}
				echo "<div class='cisti'></div>";
				echo "</table>";}
			
else if (isset($_SESSION['idU']) && $_SESSION['uloga']=='admin')
	{
					
					
					$upit="SELECT * FROM peciva ";
				$rez=mysqli_query($konekcija, $upit);
				echo"<h2>PECIVA SA POPUSTOM</h2>";
				echo "<table border='1'>";
			while($r=mysqli_fetch_array($rez))
					{
				echo "<div class='slike'><a href='".$r['putanja']."'class='fancybox' rel='gallery'><img height='200px' width='300px' src='".$r['putanja']."'/></br><p>Naziv : ".$r['ime_peciva']."</p></a></br><p>Stara cena: ".$r['cena']."rsd.</p><p>Nova cena : ".$r['popust']." rsd.</p></div>";
					
					}
				echo "<div class='cisti'></div>";
				echo "</table>";}
			
else {
   $upit= "SELECT * FROM peciva";
   $rez=mysqli_query($konekcija,$upit);
	echo"<h2>PECIVA</h2>";
   echo "<table border='1'>";
   while($r=mysqli_fetch_array($rez))
   {
	  

	  echo "<div class='slike'><a href='".$r['putanja']."'class='fancybox' rel='gallery'>
	  <img height='200px' width='300px' src='".$r['putanja']."'/>
	  </br><p>Naziv : ".$r['ime_peciva']."</p></a></br><p>Cena : ".$r['cena']." rsd.</p></div>";
	  
	  
	 
	 
	 
   }
   echo "<div class='cisti'></div>";
	echo "</table>";
}


?>-->

<div id="pagination_data">  
                </div> 
	<div class="cistac"></div>

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