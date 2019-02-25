<?php 
	$konekcija=mysqli_connect("localhost","root","","pekara");
	
	$baza=mysqli_select_db($konekcija,"pekara");
	
	$greske=array();
	if(!$konekcija) 
	{
		$greske[]="Greska prilikom povezivanja na server baze";
	}
	else if(!$baza)
	{
		$greske[]="greska prilikom povezivanja sa bazom";
	}
	mysqli_query($konekcija,"SET NAMES UTF8");
	
?> 