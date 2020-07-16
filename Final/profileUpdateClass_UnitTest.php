<?php

/*
	For code coverage report, we had to disable cookies from quoteCreateClass.php file. This will help you see the actual code coverage

*/
require_once 'profileUpdateClass.php';
require_once 'Database.php';
use PHPUnit\Framework\TestCase;

class profileUpdateTest extends TestCase {

    public function testprofileUpdate() {

	//post is the array that is passed when submitting a form, bypasses the need for cookies and form submission
       $post = [
				'company_ID' => '100007',
				'companyName' => 'ProfileUnitTest',
                'companyAddress1' => '123 TestAddress1',
                'companyAddress2' => '456 TestAddress2',
                'companyCity' => 'Sacramento',
                'companyState' => 'CA',
                'companyZipCode' => '1234',
                ];

      $task = new profileUpdateClass($post);
      $actualResult =  $task->profileUpdate();
	  $this->assertTrue($actualResult);
		}
}