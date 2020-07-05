<?php
require_once 'quoteCreateClass.php';
require_once 'Database.php';
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase {

    public function testgetlogincredentials() {

      $table = array(
        array(
          'company_ID' => '10000',
          'company_User' => 'Fuel_Maxx',
	  'company_Pass' => 'password'
        ),
        array(
          'company_ID' => '10001',
          'company_User' => 'FuelProvider',
	  'company_Pass' => 'fakepassword'
        )
      );

      $dbase = $this->getMockBuilder('Database')
        ->getMock();

      $dbase->method('resultSet')
          ->will($this->returnValue($table));

      $expectedResult = [
                          'company_ID' => '10000',
          		  'company_User' => 'Fuel_Maxx',
	  		  'company_Pass' => 'password'
                        ];
	
	//post is the array that is passed when submitting a form, bypasses the need for cookies and form submission
       $post = [
                          'company_ID' => '10000',
          		  'company_User' => 'Fuel_Maxx',
	  		  'company_Pass' => 'password'
                        ];
	
      $task = new quoteCreateClass($post);
      $actualResult =  $task->getlogincredentials();

      $this->assertEquals($expectedResult, $actualResult[0]);

    }
}