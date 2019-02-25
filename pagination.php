<?php  
session_start();
 include("konekcija.inc");  
 $zapis_strana = 3;  
 $stranica = '';  
 $ispis = '';  
 if(isset($_POST["page1"]))  
 {  
      $stranica = $_POST["page1"];  
 }  
 else  
 {  
      $stranica = 1;  
 }  
 $start = ($stranica - 1)*$zapis_strana;  
 $upit = "SELECT * FROM peciva ORDER BY id_peciva DESC LIMIT $start, $zapis_strana";  
 $rez = mysqli_query($konekcija, $upit);  
 echo '<h2>GALERIJA</h2>';
 while($r = mysqli_fetch_array($rez))  
 {  

     
      $ispis .= '


		<div class="slike">
		<a href='.$r['putanja'].'>
	  		<img src='.$r['putanja'].' width="300px" alt='.$r['ime_peciva'].' height="200px" />
	  		</br>
	  		<p>Naziv : '.$r['ime_peciva'].'</p></a></br><p>Cena : '.$r['cena'].'rsd.</p></div>';

        
 }  
 $ispis .= '<br/><div class="cistac"></div><br/><div align="center">';  
 $upit_stranica = "SELECT * FROM peciva ORDER BY id_peciva DESC";  
 $rez_stranica = mysqli_query($konekcija, $upit_stranica);  
 $broj_zapisa = mysqli_num_rows($rez_stranica);  
 $broj_stranica = ceil($broj_zapisa/$zapis_strana);  
 for($i=1; $i<=$broj_stranica; $i++)  
 {  
      $ispis .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;color:white;' id='".$i."'>".$i."</span>";  
 }  
 $ispis .= '</div><br /><br />';  
 echo $ispis;  
 ?>  