<?php
	@session_start();
	/*if(isset($_SESSION['idU']))
	{
		unset($_SESSION['idU']);
		unset($_SESSION['kor_ime']);
		*/{
		session_destroy();
		header('Location: index.php');
	}
?>