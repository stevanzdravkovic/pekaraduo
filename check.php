<?php  

include("konekcija.inc"); 
if(isset($_POST["mail1"]))
{
 $mail = mysqli_real_escape_string($konekcija, $_POST["mail1"]);
 $upit = "SELECT * FROM korisnici WHERE email = '".$mail."'";
 $rez = mysqli_query($konekcija, $upit);
 echo mysqli_num_rows($rez);
}

?>