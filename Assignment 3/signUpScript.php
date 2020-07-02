<?php
	ini_set("display_errors",E_ALL);
	include "signUpClass.php";
	$profile = info($_POST);
	echo "<PRE>";
	print_r($profile);
	?>