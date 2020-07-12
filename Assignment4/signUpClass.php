<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);


Class signUpClass
{
	public $post;
	
	public $company_User;
	public $company_Pass;
	
	
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		$this->post = $post; // $_POST array from form;
		
		$this->company_User = $this->post['company_User'];
		$this->company_Pass = password_hash($this->post['company_Pass'], PASSWORD_DEFAULT);
		
		//comment out line 25 when unit testing
		$this->profileFill();
	}
	
	public function profileFill(){
		//comment out lines 30, 31, and 50 for unit testing
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
		try
		{
			$sql = "INSERT INTO logincredentials (company_User, Company_Pass ) VALUES ('$this->company_User', '$this->company_Pass')";
			$this->db->query($sql);
			$this->result = $this->db->execute();
			echo '<script type="text/JavaScript">
            		alert("Account successfully created.");
           		window.location.replace("login.php");
            		</script>'
			;
		}catch(PDOException $e){
			echo '<script type="text/JavaScript">
                	alert("An error occured (Username already exist).");
               		window.location.replace("SignUp.php");
                	</script>'
			;
		}
		return $this->checkSuccessful();
		}
	}

	public function checkSuccessful()
	{
		$sql = "SELECT * FROM logincredentials WHERE company_User = '$this->company_User'";
		 
		$this->db->query($sql);
		$this->result = $this->db->single();
		if($this->result->company_User == $this->company_User)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}