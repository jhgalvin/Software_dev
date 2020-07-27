<?php
require_once 'loginClass.php';
require_once 'Database.php';
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase 
{

    public function testchecklogin() 
	{

	//post is the array that is passed when submitting a form, bypasses the need for cookies and form submission
       $post = [
          		  'company_User' => 'Fuel_Maxx',
	  		      'company_Pass' => 'password'
                        ];
	
      $task = new loginClass($post);
      $actualResult =  $task->checklogin();

      $this->assertEquals('Fuel_Maxx', $actualResult->company_User);
	  
	//Now testing a login with wrong credentials
	  $post2 = [
                  
          		  'company_User' => 'Does not exist',
	  		      'company_Pass' => 'password'
                        ];
	
      $task2 = new loginClass($post2);
      $actualResult2 =  $task2->checklogin();

      $this->assertEquals('', $actualResult2);
	  

    }
}