<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);

Class loginClass
{
	public $post;
	public $company_User; //user_email
	public $company_Pass; //user_password

	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->company_User = $this->post['company_User'];
		$this->company_Pass = $this->post['company_Pass']; 
	
		
		$this->checklogin();
		
	}

public function checklogin()
{
		$sql = "SELECT * FROM logincredentials WHERE company_User = '$this->company_User'";
		
		$this->db->query($sql);
		$this->result = $this->db->single();
		if(crypt($this->company_Pass, $this->result->company_Pass) == $this->result->company_Pass) 
		{
			$this->login();
		}
		else 
		{ 
			exit(header("Location: login.php?wp=1")); 
		}
		return $result;
}

	public function login()
	{
		setcookie('company_ID',$this->result->company_ID,time()+(60*60),'/');
		exit(header("Location: dashboard.php")); /* Redirect browser */
		
	 }
	
}
?>