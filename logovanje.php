<?php
session_start();
	
	include("konekcija.inc");
	
	if(isset($_REQUEST['btnPrijavi'])){
		$email=$_REQUEST['tbMail'];
		$pass=md5(trim($_REQUEST['tbLozinka']));
		
		$upit="SELECT * FROM korisnici k INNER JOIN ulga u ON k.uloga_id=u.id_uloga WHERE email='$email' AND lozinka='$pass'";
		$rez=mysqli_query($konekcija,$upit);
		if(mysqli_num_rows($rez) == 0)
		{
			
			echo "<script>alert('Greska prilikom logovanja')</script>";
			/*$greske[] = "Greska prilikom logovanja!";*/
		}
		
		else
		{
			$r= mysqli_fetch_array($rez);
			
			$_SESSION['id_user'] = $r['id_korisnik'];
			
			$_SESSION['idU'] = $r['uloga_id'];
			
			$_SESSION['uloga'] = $r['naziv_uloga'];
			
			$_SESSION['email'] = $r['email'];
			
			switch($_SESSION['idU'])
			{
				case '1':
					header('Location: admin.php');
					break;
					
				case '2':
					header('Location: user.php');
					break;
			}
		}	
	}



?>

<!DOCTYPE html>
<html>
	<head>
		<link href="stil.css" rel="stylesheet" type="text/css" />
		<link rel ="shortcut icon" href="slike/pekara2.ico"/>  
        <title> Pekara Duo</title>
        <meta charset="UTF-8"/>
         <meta name="keywords" content="Pekara,Naša pekara,Pekara Duo,Naša pekara Duo"/>           <!--ovde treba da upisem kljucne reci-->
        <meta name="description" content="Naša pekara Duo se nalazi u naselju Mirijevo u Beogradu.
					Proizvode u našoj pekari Duo proizvodimo po tradicionalnim recepturama naših predaka.
					Ako želite mirisno domaće pecivo na vašoj trpezi, posetite našu pekaru Duo"/>                                            <!--ovde ide opis-->
        <meta name="author" content="Stevan Zdravkovic"/>
        <meta name="copyright" content="Stevan Zdravkovic"/>
	</head>
	<body>
		<div id="okvir">
			
			<div id="heder">
				
				<div id="hedergore">
					<div id="log">
					<?php
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
				
				?>
				
				
				
				</div>




			</div>

			<div id='forma'>
			<h2>OSTVARI POPUST I ULOGUJ SE</h2>

			<form id="regForma" method="post" action= "<?php echo $_SERVER['PHP_SELF'];?>">
			 
			<table border='4' height='400' width='400' bgcolor='black' >
				
				
				<tr>
					<td>E-mail<p>*</p></td>
					<td><input type='text' id='tbMail' name='tbMail'/></td>
				</tr>
				
				<tr>
					<td>Lozinka<p>*</p></td>
					<td><input type='text' id="tbSifra" name='tbLozinka'/></td>
				</tr>
				
				
				
				
				
				<tr>
					
					<td colspan='2'><input type='submit' id='btnPrijavi ' name='btnPrijavi' value='Prijavi se' /></td>
				</tr>
			
			
			</table>
	  </form>
   
</div>





			

			

			<div id="futer">
				 <div id="menifuter">
			<?php
				$upit="SELECT * FROM meni WHERE meni_id IN (1,2,11,4,5)";
				$rez=mysqli_query($konekcija,$upit);
				echo"<ul>";
				while($r=mysqli_fetch_array($rez))
				{
					echo "<li><a href='".$r['link']."'>".$r['meni_ime']."</a></li>";
				}
				echo"</ul>";
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