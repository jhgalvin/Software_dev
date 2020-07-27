<?php

/*
	For code coverage report, we had to disable cookies from quoteCreateClass.php file. This will help you see the actual code coverage 

*/
require_once 'quoteCreateClass.php';
require_once 'Database.php';
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase {

    public function testgetlogincredentials() {
	//post is the array that is passed when submitting a form, bypasses the need for cookies and form submission
       $post = [
				'company_ID' => '10000',
				'company_User' => 'Fuel_Maxx',
				'company_Pass' => 'password',
                'delivery_Date' => '2020-05-13',
                'suggested_Price' => '35.00',
                'total_amt_Due' => '56.00',
                'delivery_Address1' => '123 Here',
                'delivery_Address2' => '',
                'delivery_City' => 'Houston',
                'delivery_State' => 'TX',
                'delivery_ZipCode' => '1234',
				'gallons_Requested' => '5.00'
                ];

      $task = new quoteCreateClass($post);
      $actualResult =  $task->getlogincredentials();
	  $this->assertEquals('10000', $actualResult->company_ID);
	  $this->assertEquals('Fuel_Maxx', $actualResult->company_User);
	  $this->assertEquals('password', $actualResult->company_Pass);
		}
}