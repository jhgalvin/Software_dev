<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);

Class loginClass
{
	public $post;
	public $company_User; //user_email
	public $company_Pass; //user_password
	public $company_ID; //department_id
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->company_User = $this->post['company_User'];
		$this->company_Pass = $this->post['company_Pass'];
		
		$sql = "SELECT * FROM user WHERE company_User = '$this->company_User' AND company_Pass = '$this->company_Pass' ";

		$this->db->query($sql);
		$this->result = $this->db->single();
		$this->company_ID = $this->result->company_ID;
		$this->login();
	}
	public function login()
	{
		 print_r($result);
		if($this->result)
		{
			setcookie('user_id',$this->result->user_id,time()+(60*60),'/');
		
			exit(header("Location: dashboard.php")); /* Redirect browser */
		}
		else 
		{
			exit(header("Location: login.php?wp=1")); /* Wrong password, Go back to the same page  */

		}
	 }
	
}
?>