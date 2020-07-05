<?php
	//test database connection (unit test)
	
	require_once Database.php;
	
	$test_query = "SHOW TABLES FROM $dbname";
	$result = mysqli_query($dbname, $test_query);
	
	$tableCnt = 0;
	
	while($tbl = mysqli_fetch_array($result)){
		$tableCnt++;
		#echo $tbl[0]."<br />\n";
	}
	
	if(!$tableCnt){
		echo "There is an issue connecting to database<br />\n";
	}
	else{
		echo "There are $tblCnt tables<br />\n";
	}
	
?>
