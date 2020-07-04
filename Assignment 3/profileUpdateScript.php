<?php
	ini_set("display_errors",E_ALL);
	include "profileUpdateClass.php";
	$profile = new profileUpdateClass($_POST);
	echo "<PRE>";
	print_r($profile);
?>