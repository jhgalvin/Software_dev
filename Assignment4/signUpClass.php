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
	
		
		$this->company_Pass = crypt($this->post['company_Pass']);
		
		$this->profileFill();
	}
	public function render(){
	  echo "<PRE>";
	  print_r($this->result);
	}
	
	


	
	public function profileFill(){
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
		
			$sql = "INSERT INTO logincredentials (company_User, Company_Pass ) VALUES ('$this->company_User', '$this->company_Pass')";
			$this->db->query($sql);
			$this->result = $this->db->execute();
			echo '<script type="text/JavaScript">
            		alert("Account successfully created.");
           		window.location.replace("login.php");
            		</script>'
			;
		
		}
	}
}