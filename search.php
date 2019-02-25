<?php
include("konekcija.inc");
$ispis = '';
if(isset($_POST["search1"]))


{
	$search = mysqli_real_escape_string($konekcija, $_POST["search1"]);
	$upit = "SELECT * FROM peciva WHERE ime_peciva LIKE '%".$search."%' OR cena LIKE '%".$search."%'";
}
else
{
	$upit = "SELECT * FROM peciva ORDER BY id_peciva";
}
$rezultat = mysqli_query($konekcija, $upit);
if(mysqli_num_rows($rezultat) > 0)
{
	$ispis .= '<table align=center width=600 height=300>
				<tr>
					<th class="th1">Naziv</th>
					<th class="th1">Stara cena</th>
					<th class="th1">Nova cena</th>

					<th class="th1">Slika</th>							
				</tr>';
	while($r = mysqli_fetch_array($rezultat))
	{
		$ispis .= '<tr>
					<td class="td1">'.$r["ime_peciva"].'</td>
					<td class="td1"><strike>'.$r["cena"].'</strike></td>
					<td class="td1">'.$r["popust"].'</td>

					<td class="td_img"><img src='.$r["putanja"].' alt="img_c"/></td>	
				</tr>';
	}
	echo $ispis;
}
else
{
	echo "Nema rezultata";
}
?>