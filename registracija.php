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
					Ako želite mirisno domaće pecivo na vašoj trpezi, posetite našu pekaru Duo"/>                                           <!--ovde ide opis-->
        <meta name="author" content="Stevan Zdravkovic"/>
        <meta name="copyright" content="Stevan Zdravkovic"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
        $(document).ready(function(){  
   $('#tbMail').keyup(function(){

     var mail = $(this).val();

     $.ajax({
      url:'check.php',
      method:"POST",
      data:{mail1:mail},
      success:function(data)
      {
       if(data != 0)
       {
        $('#sMail').html('<span class="red_mail">Mail je vec u upotrebi.</span>');
        $('#btnPrijavi').attr("disabled", true);
       }
       else
       {
        $('#sMail').html('<span class="green_mail">Mail je slobodan</span>');
        $('#btnPrijavi').attr("disabled", false);
       }
      }
     })
})
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
			<h2>REGISTRUJ SE</h2>

			<form id="regForma" method="post" action= "<?php echo $_SERVER['PHP_SELF'];?>">
			 
			<table border='4' height='600' width='400' bgcolor='black' >
				<tr>
					<td>Ime<p>*</p></td>
					<td><input type='text' id='tbIme' name='tbIme'/></td>
				</tr>
				
				<tr>
					<td>Prezime<p>*</p></td>
					<td><input type='text' id='tbPrezime' name='tbPrezime'/></td>
				</tr>
				
				
				
				<tr>
					<td>Lozinka<p>*</p></td>
					<td><input type='text' id="tbSifra" name='tbLozinka'/></td>
				</tr>
				
				<tr>
					<td>Lozinka ponovo<p>*</p></td>
					<td><input type='text' id='tbSifraOpet' name='tbLozinkaOpet'/></td>
				</tr>
				
				<tr>
					<td>Email<p>*</p></td>
					<td><input type='text' id='tbMail' name='tbMail'/></br>
<span id="sMail"></span></td>				</tr>
				
				<tr>
					<td>Pol<p>*</p></td>
					<td><input type='radio' id='rbMuski' name='rbPol' value='muski'/>M</br>
						<input type='radio' id='rbZenski' name='rbPol' value='zenski'/>Z
					</td>
				</tr>
				
				<tr>
					
					<td colspan='2'><input type='submit' id='btnPrijavi ' name='btnPrijavi' value='Registruj se'/></td>
				</tr>
			
			
			</table>
	  </form>
   
</div>
<div id='slider'>
<?php
include "konekcija.inc";
if (isset($_REQUEST ['btnPrijavi']))
{
	$ime=$_REQUEST['tbIme'];
	$prezime=$_REQUEST['tbPrezime'];
	
	@$lozinka=$_REQUEST['tbLozinka'];
	@$lozinkaprovera=md5($lozinka);
	$mail=$_REQUEST['tbMail'];
	@$pol=$_REQUEST['rbPol'];
	
	        $regIme="/^[A-Z][a-z]{2,10}$/";
			$regPrezime="/^[A-Z][a-z]{2,15}$/";
			
			$regLozinka="/^[a-zA-Z]{2,19}[0-9]{3,10}$/";
			$regMail="/^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('\.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
			
			$podaci = Array();
			$greske = Array();
			
			
			
			if(!preg_match($regIme, $ime))
		{
			$greske[] = "Ime nije u dobrom formatu! Mora počinjati velikim slovom i imati od 3 do 19 slovnih karaktera.(Primer: Pera)";
		}
		else
		{
			$podaci[] = "Ime : ".$ime;
		}
		
		
		if(!preg_match($regPrezime, $prezime))
		{
			$greske[] = "Prezime nije u dobrom formatu!Mora počinjati velikim slovom i imati od 3 do 20 slovnih karaktera.(Primer: Peric)";
		}
		else
		{
			$podaci[] = "prezime: ".$prezime;
		}
		
		
		
		
		
		if(!preg_match($regLozinka, $lozinka))
		{
			$greske[] = "Šifra nije u dobrom formatu! Mora imati od 2 do 19 slovnih karaktera i od 3 do 10 brojeva(Primer: pera123)";
		}
		else
		{
			$podaci[] = "lozinka: ".$lozinka;
		}
		

		if(!preg_match($regMail, $mail))
		{
			$greske[] = "Mail nije u dobrom formatu!";
		}
		else
		{
			$podaci[] = "Mail: ".$mail;
		}
		
		if(empty($pol))
		{
			$greske[]="Morate izabrati neki pol";
			
		}
		
		else
		{
				$podaci[]="Pol: ".$pol;
			
		}
		
		
		
		
		echo "<h2>Vasi podaci su: </h2>";
		if(count($greske) != 0)
		{
			echo "<ul>";
			
			
			foreach($greske as $g)
			{
				echo "<li>".$g."</li>";
			}
			echo "</ul>";
		}
		else
		{
			echo "<ul>";
			
			foreach($podaci as $p)
			{
				echo "<li>".$p."</li>";
			}
			echo "</ul>";
		
	
		
	
		
		$upitProvera="SELECT * FROM korisnici WHERE email='".$mail."'";
		$rezProvera=mysqli_query($konekcija,$upitProvera);
		$brojRedova=mysqli_num_rows($rezProvera);
		mysqli_close($konekcija);
		
		if($brojRedova==0)
		{
			include "konekcija.inc";
			$upit= "INSERT INTO korisnici VALUES ('','$ime','$prezime','$lozinkaprovera','$mail','$pol',2)";
			$rezultat=mysqli_query($konekcija,$upit);
			mysqli_close($konekcija);
			if(!$rezultat){
				echo "<h3>Neuspesan upis u bazu, pokusajte ponovo</h3>";
			}
			else {
				
				echo "<h3>Uspesno ste se registrovali</h3>";
				echo "<a href='logovanje.php'> KLIKNITE OVDE DA SE ULOGUJETE I DA OSTVARITE POPUST NA PROIZVODE</a> ";

				
			}
		}
		else 
		{
			
			echo "<h3>Korisnik sa ovim e-mailom vec postoji, molim Vas izaberite drugi e-mail</h3>";
			
		}
		
	}
		
}

?>


</div>
			

			

			<div id="futer">
				 <div id="menifuter">
			<?php
				$upit1="SELECT * FROM meni WHERE meni_id IN (1,2,11,4,5)";
				@$rez1=mysqli_query($konekcija,$upit1);
				echo"<ul>";
				while(@$r=mysqli_fetch_array($rez1))
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
						@$rez=mysqli_query($konekcija,$upit);
						echo"<ul>";
						while(@$r=mysqli_fetch_array($rez))
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