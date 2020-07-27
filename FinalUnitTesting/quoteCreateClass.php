<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);


Class quoteCreateClass
{
	public $post;
	public $company_ID;
	public $gallons_Requested;
	public $delivery_Date;
	public $suggested_Price;
	public $total_amt_Due;
	public $delivery_Address1;
	public $delivery_Address2;
	public $delivery_City;
	public $delivery_State;
	public $delivery_ZipCode;
	public $db;
	public $result;
	
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		
		//for unit testing comment out line 29 and uncomment line 30 (simulating cookies)
		//$this->company_ID=$_COOKIE['company_ID'];
		$this->company_ID = $this->post['company_ID'];
		
		$this->gallons_Requested = $this->post['gallons_Requested'];
		$this->delivery_Date = $this->post['delivery_Date'];
		$this->suggested_Price = $this->post['suggested_Price'];
		$this->total_amt_Due = $this->post['total_amt_Due'];
		$this->delivery_Address1 = $this->post['delivery_Address1'];
		$this->delivery_Address2 = $this->post['delivery_Address2'];
		$this->delivery_City = $this->post['delivery_City'];
		$this->delivery_State = $this->post['delivery_State'];		
		$this->delivery_ZipCode = $this->post['delivery_ZipCode'];
		
		//for unit testing, comment out line 43 and 44
		//$this->checkCookie();
		//$this->profileFill();
		
	}
	
	public function checkCookie(){
	 if(!$_COOKIE['company_ID'] ){
		header('Location: index.html');
		}
	}
	
	public function profileFill(){
		//for unit testing comment out lines 56, 57, and 78
		//if($_SERVER['REQUEST_METHOD']=='POST')
		//{
		try
		{
			$sql = "INSERT INTO  companyquote (gallons_Requested, delivery_Date, suggested_Price, total_amt_Due, delivery_Address1, delivery_Address2, delivery_City, delivery_State, delivery_ZipCode, company_ID) 
				VALUES ('$this->gallons_Requested', '$this->delivery_Date', '$this->suggested_Price', '$this->total_amt_Due', '$this->delivery_Address1', '$this->delivery_Address2', '$this->delivery_City', 
				'$this->delivery_State', '$this->delivery_ZipCode', '$this->company_ID')";
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
		
		//}
	}
}