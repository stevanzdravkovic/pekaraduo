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
		<link rel ="shortcut icon" href="slike/ico.ico"/>  
        <title> Pekara Duo</title>
        <meta charset="UTF-8"/>
        <meta name="keywords" content="Pekara,Naša pekara,Pekara Duo,Naša pekara Duo"/>           <!--ovde treba da upisem kljucne reci-->
        <meta name="description" content="Naša pekara Duo se nalazi u naselju Mirijevo u Beogradu.
					Proizvode u našoj pekari Duo proizvodimo po tradicionalnim recepturama naših predaka.
					Ako želite mirisno domaće pecivo na vašoj trpezi, posetite našu pekaru Duo"/>              <!--ovde ide opis-->
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
			echo"<h2>IZMENI PROIZVOD</h2>";
					$id = $_GET['id_peciva'];
					include_once('konekcija.inc');
					 
					 
				?>
			<form action="<?php echo "update.php?id_peciva=".$id?>" name="forma" id="forma" method="POST" enctype="multipart/form-data">
			<input type = "hidden" name = "tbIdPeciva" value = "<?php echo $id ?>"/>
			<table border="1">
			<tr>
				<td>Naziv proizvoda:</td>
				<td><input type="text" id="ime_peciva" name="ime_peciva"/></td>
			</tr>
			<tr>
				<td>Cena proizvoda:</td>
				<td><input type="text" id="cena" name="cena"/></td>
			</tr>
			<tr>
				<td>Cena sa popustom:</td>
				<td><input type="text" id="popust" name="popust"/></td>
			</tr>
			
			
			<tr>
				<td>Slika:</td>
				<td>
					<input type="file" id="Slika" name="Slika" />
				</td>
			</tr>
		
			<tr>
				<td colspan="2"><input type="submit" name="btnUpdate"  name="btnUpdate" value="Promeni"/>
			</tr>
			</table> 
			</form>
			<?php
			if(isset($_REQUEST['btnUpdate'])){	
				$id_proizvod = $_REQUEST['tbIdPeciva'];
				$naziv_proizvod=$_REQUEST['ime_peciva'];
				$cena_proizvod=$_REQUEST['cena'];
				$popust=$_REQUEST['popust'];
				
				$ime_proizvod=$_FILES['Slika']['name'];
				$tmp_proizvod=$_FILES['Slika']['tmp_name'];
		
				$putanja="slike/".$ime_proizvod;
		
				if(move_uploaded_file($tmp_proizvod,$putanja)){
					include("konekcija.inc");
					$upit_update = "UPDATE peciva SET ime_peciva = '".$naziv_proizvod."', cena='".$cena_proizvod."',popust='".$popust."', putanja = '".$putanja."' WHERE id_peciva ='".$id_proizvod."'";
					$rez=mysqli_query($konekcija,$upit_update);
					if(!$rez){
					echo"Greška prilikom upisa!!!";	
					}
					else{
						echo"<p class='green'>Proizvod je promenjen!</p>";
					}
				}
			}
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