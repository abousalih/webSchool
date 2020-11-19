<?php
	session_start();
	session_destroy(); // Supprimer la session
	header('location:../utilisateurs/login.php');
	exit();
?>