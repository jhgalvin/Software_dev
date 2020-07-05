<?php
require_once 'loginClass.php';
require_once 'Database.php';
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {

    public function testchecklogin() {

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
	
      $task = new loginClass($post);
      $actualResult =  $task->checklogin();

      $this->assertEquals($expectedResult, $actualResult[0]);

    }
}