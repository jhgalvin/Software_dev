<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);


Class quoteCreateClass
{
	public $post;
	
	public $gallons_Requested;

	public $delivery_Date;

	public $suggested_Price;
	public $total_amt_Due;
	public $delivery_Address;
	public $company_ID;
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->id =$_COOKIE['company_ID'];
		$this->gallons_Requested = $this->post['gallons_Requested'];

		$this->company_ID=$_COOKIE['company_ID'];
		$this->delivery_Date = $this->post['delivery_Date'];
		$this->suggested_Price = $this->post['suggested_Price'];
		$this->total_amt_Due = $this->post['total_amt_Due'];
		$this->delivery_Address = $this->post['delivery_Address'];
		
		
		$this->getlogincredentials();
		$this->checkCookie();
		$this->profileFill();
	}

	public function getlogincredentials()
	{
		$sql = "SELECT * FROM logincredentials WHERE company_ID = '$this->company_ID'";
		 
		$this->db->query($sql);
		$this->result = $this->db->single();
		return $result;
	}
	
	public function render(){
	  echo "<PRE>";
	  print_r($this->result);
	}
	
	public function checkCookie(){
	 if(!$_COOKIE['company_ID'] ){
		header('Location: index.html');
		}
	}

	
	public function profileFill(){
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
		try
		{
			$sql = "INSERT INTO  companyquote (gallons_Requested, delivery_Date, suggested_Price, total_amt_Due, delivery_Address, company_ID) VALUES ('$this->gallons_Requested', '$this->delivery_Date', '$this->suggested_Price', '$this->total_amt_Due', '$this->delivery_Address', '$this->company_ID')";
			$this->db->query($sql);
			$this->result = $this->db->execute();
			echo '<script type="text/JavaScript">
            		alert("Quote successfully submitted!");
           		window.location.replace("quoteHistory.php");
            		</script>'
			;
		}catch(PDOException $e){
			echo '<script type="text/JavaScript">
                	alert("An error occured when submitting your quote.");
               		window.location.replace("quoteCreate.php");
                	</script>'
			;
		}
		
		}
	}
}