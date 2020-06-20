<?php
	ini_set("display_errors",E_ALL);
	include "profileCreateClass.php";
	$profile = new profileCreateClass($_POST);
	echo "<PRE>";
	print_r($profile);
?>