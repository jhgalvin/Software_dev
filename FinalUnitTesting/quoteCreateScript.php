<?php
	ini_set("display_errors",E_ALL);
	include "quoteCreateClass.php";
	$profile = new quoteCreateClass($_POST);
	echo "<PRE>";
	print_r($profile);
	?>