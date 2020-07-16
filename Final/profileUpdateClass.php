<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);


Class profileUpdateClass
{
	public $post;
	public $company_ID;
	public $companyName;
	public $companyAddress1;
	public $companyAddress2;
	public $companyCity;
	public $companyZipCode;
	public $companyState;
	public $db;
	public $result;
	
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		
		//for unit testing comment out line 26 (below) and uncomment line 27- Simulating cookies
		$this->company_ID=$_COOKIE['company_ID'];
		//$this->company_ID = $this->post['company_ID'];

		$this->companyName = $this->post['companyName'];
		$this->companyAddress1 = $this->post['companyAddress1'];
		$this->companyAddress2 = $this->post['companyAddress2'];
		$this->companyCity = $this->post['companyCity'];
		$this->companyState = $this->post['companyState'];
		$this->companyZipCode = $this->post['companyZipCode'];
		
		//for unittesting comment out lines 37 and 38
		$this->checkCookie();
		$this->profileUpdate();
	}

	public function checkCookie(){
	 if(!$_COOKIE['company_ID'] ){
		header('Location: index.html');
		}
	}
	
	public function profileUpdate(){
		//for unit testing comment out lines 49, 50, and 71
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
		try
		{
			$sql="
	        UPDATE companyprofile SET companyName = '$this->companyName', companyAddress1 = '$this->companyAddress1', companyAddress2 = '$this->companyAddress2', companyCity = '$this->companyCity', companyState = '$this->companyState',
	        companyZipCode = '$this->companyZipCode' WHERE company_ID = '$this->company_ID'";
			$this->db->query($sql);
			$this->result = $this->db->execute();
			echo '<script type="text/JavaScript">
            		alert("Profile successfully updated.");
           		    window.location.replace("dashboard.php");
            		</script>'
			;
		}catch(PDOException $e){
			echo '<script type="text/JavaScript">
                	alert("An error occurred when updating your profile. Please try again.");
               		window.location.replace("profileUpdateForm.php");
                	</script>'
			;
		}
		return $this->checkSuccessful();
		}
	}

	public function checkSuccessful()
	{
		$sql = "SELECT * FROM companyprofile WHERE company_ID = '$this->company_ID'";

		$this->db->query($sql);
		$this->result = $this->db->single();
		if($this->result->companyName == $this->companyName
		and $this->result->companyAddress1 == $this->companyAddress1
		and $this->result->companyAddress2 == $this->companyAddress2
		and $this->result->companyState == $this->companyState
		and $this->result->companyCity == $this->companyCity
		and $this->result->companyZipCode == $this->companyZipCode)
		{
			return true;
		}
		else
		{
			return false;
		}
	}



}