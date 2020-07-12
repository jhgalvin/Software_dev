<?php
require_once 'signUpClass.php';
require_once 'Database.php';
use PHPUnit\Framework\TestCase;

class SignUpTest extends TestCase {

    public function testprofileFill() {
	//post is the array that is passed when submitting a form, bypasses the need for cookies and form submission
       $post = [
          		  'company_User' => 'UnitTest',
	  		    'company_Pass' => 'password'
                        ];
	
      $task = new signUpClass($post);
      $actualResult =  $task->profileFill();

      $this->assertTrue($actualResult);
    }
}