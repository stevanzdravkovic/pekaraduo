<?php
session_start();
if($_SESSION['uloga']!='admin')
{
	header('Location:index.php');
}
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
					Ako želite mirisno domaće pecivo na vašoj trpezi, posetite našu pekaru Duo"/>                                        <!--ovde ide opis-->
        <meta name="author" content="Stevan Zdravkovic"/>
        <meta name="copyright" content="Stevan Zdravkovic"/>
		
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jquery.lightbox-0.5.min.js"></script>
		<script language="JavaScript" src="kveri.js"></script>
		
		
		
		
		
	</head>
	<body>
		<div id="okvir">
			
			<div id="heder">
				
				<div id="hedergore">
					<div id="log">
					<?php
					
					include "konekcija.inc";
				if(isset($_SESSION['idU']) && $_SESSION['uloga']=='user' OR $_SESSION['uloga']=='admin')
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
				
					
					$upit="SELECT * FROM meni WHERE meni_id IN(1,2,6,3,4,5)";
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
					//ovde se zavrsavaju ilnkovi koje vidi user kad se uloguje
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

			<div class="admin">
			
			<?php
			
			include("konekcija.inc");
			echo "<h2>Obrisi slike</h2>";
				if(isset($_REQUEST['btnBrisi'])){
					@$id_peciva = $_REQUEST['brisanje'];
					foreach ($id_peciva as $id){
						$upit = "DELETE FROM peciva WHERE id_peciva = ".$id;
						$rezultat = mysqli_query ($konekcija,$upit) or die("Upit za brisanje nije uspeo.");
						if($rezultat){
							echo "<script language = 'javascript'>
										alert('Uspesno ste obrisali proizvod.');
								  </script>";
							}
						}
					}
				$upit="SELECT * FROM peciva";
				$rez=mysqli_query($konekcija, $upit);
				
				echo "<form><table border = '1px'><tr>
							<th>RB</th>
							<th>Naziv</th>
							<th>Cena</th>
							<th>Cena sa popustom</th>
							<th>Slika</th>
							<th>Brisi</th></tr>";
					$i = 1;
					if(mysqli_num_rows($rez) == 0){
						echo "Nije pronadjen ni jedan proizvod.";
					}
					else{
						while($r = mysqli_fetch_array($rez)){
							echo "<tr>
									<td>".$i."</td>
									<td>".$r['ime_peciva']."</td>
									<td>".$r['cena']." rsd.</td>
									<td>".$r['popust']." rsd.</td>
									<td><img src='".$r['putanja']."' width = '150px' height = '150px'/></td>
									<td><input type = 'checkbox' name = 'brisanje[]' value = '".$r['id_peciva']."'/></td>
								  </tr>";
							$i++;
						}
					}
					echo " <tr><td colspan ='8'><center><input type = 'submit' name='btnBrisi' id='btnBrisi' value='Obriši'/></center></td></tr>
						   </table></form>";
			
			
			/*
echo"<h2>Vasi podaci : </h2>";
include "konekcija.inc";
if (isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	
}
   
	
	$upit="SELECT * FROM korisnici WHERE email='$email'";
	$rez=mysqli_query($konekcija,$upit);
	echo "<table border='1' id='zebrica'>";
	echo"<h2>Vasi podaci : </h2>";
	while($r=mysqli_fetch_array($rez))
	{
		echo "<tr><td>Vas ID je: ".$r['id_korisnik']."</td></tr><tr><td>Vase ime je: ".$r['ime']."</td></tr><tr><td>Vase prezime je: ".$r['prezime']."</td></tr>
		<tr><td>Vas Mail je: ".$r['email']."</td></tr><br/><tr><td>Vas pol je: ".$r['pol']."</td></tr>";
	}
	echo "</table><br/><br/><br/><br/>";
	*/
?>
				

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
					
					
						$upit="SELECT * FROM meni WHERE meni_id IN (1,2,3,4,5)";
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