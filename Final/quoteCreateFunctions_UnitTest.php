<?php
/*
	For code coverage report, we had to disable cookies from quoteCreateClass.php file. This will help you see the actual code coverage
*/


use PHPUnit\Framework\TestCase;
require_once 'quoteCreate.php';
class quoteCreateTest extends TestCase {

    public function testcalculate_price() {
	

	//arr is the array that is passed when submitting a form, bypasses the need for cookies and form submission
       $testArr1 = [100, "NY", 1];
       $solution1 = [1.7400, 174.00];
	   echo '<script type="text/JavaScript"> calculate_price("$testArr1"); </script>';
	   
	 
			
	  // echo “<script>alert(‘some message ’.”.$var.”)</script>”;
       $this->assertEquals(window.value,174.00);	
	}
}
?>