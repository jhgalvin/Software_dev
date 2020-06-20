<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);


Class profileCreateClass
{
	public $post;
	
	public $companyName;
	public $companyAddress;
	public $companyCity;
	public $companyState;
	public $companyZipCode;
	public $user_id;
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->id =$_COOKIE['user_id'];
		$this->animal_name = $this->post['companyName'];
		$this->companyAddress1 = $this->['companyAddress1'];
		$this->companyAddress2 = $this->['companyAddress2'];
		$this->companyCity=$_COOKIE['companyCity'];
		$this->companyZipCode = $this->post['companyZipCode'];
		
		

		$sql = "SELECT * FROM user WHERE user_id = '$this->user_id'";
		 
		$this->db->query($sql);
		$this->result = $this->db->single();
		
		$this->checkCookie();
		$this->profileFill();
	}
	public function render(){
	  echo "<PRE>";
	  print_r($this->result);
	}
	
	/*public function checkCookie(){
	 if(!$_COOKIE['user_id'] ){
		header('Location: index.html');
		}
	}*/

	
	public function profileFill(){
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
		try
		{
			$sql = "INSERT INTO  companyProfile (companyName, companyAddress1,companyAddress2, companyCity, companyState, companyZipCode) VALUES ('$this->companyName', '$this->companyAddress1', '$this->companyAddress2', 
				'$this->companyCity', '$this->companyState', '$this->companyZipCode')";
			$this->db->query($sql);
			$this->result = $this->db->execute();
			echo '<script type="text/JavaScript">
            		alert("Profile was successfully added.");
           		window.location.replace("http://www.zoonika.com/dashboard.php");
            		</script>'
			;
		}catch(PDOException $e){
			echo '<script type="text/JavaScript">
                	alert("An error occured when inserting this animal (Possibly a duplicate).");
               		window.location.replace("http://www.zoonika.com/profileCreate.php");
                	</script>'
			;
		}
		//header("Location: http://www.zoonika.com/profileCreate.php");
		}
	}
}