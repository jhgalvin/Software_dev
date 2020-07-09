<?php
	ini_set("display_errors",E_ALL);
	include "signUpClass.php";
	$profile =  new signUpClass($_POST);
	echo "<PRE>";
	print_r($profile);
	?>