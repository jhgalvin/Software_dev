<?PHP
session_start();

include "Database.php";


$db = new Database();

$sql="SELECT * from logincredentials where company_ID = '$_COOKIE[company_ID]'";
$db->query($sql);
$user = $db->single();

if(!$_COOKIE['company_ID']){
	header('Location: index.html');
}
if ($_COOKIE['company_ID']){

	$sql="SELECT * FROM companyquote
	WHERE companyquote.company_ID = '$_COOKIE[company_ID]'";
		
	$db->query($sql);
	$result = $db->resultSet();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote History</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sidebar.css">
</head>

<body>

    <div id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="side-ul">
            <li class="side-li"><a class="side" href="dashboard.php">Dashboard</a></li>
            <li class="side-li"><a class="side" href="quoteCreate.php">Create New Quote</a></li>
            <li class="side-li"><a class="side" href="profileUpdateForm.php">View/Update Profile</a></li>
            <li class="side-li"><a class="side" href="logoutScript.php">Logout</a></li>
            
        </ul>
    </div>

   <!--- <header id="imgcontainer"></header> -->
    <div id="container" style='margin-bottom:6em;text-align:center;'>
         <!-- POSTS -->
  <h1>List of All Past Quotes</h1>
            <table class="table-info" style="width:80%;margin:auto;box-shadow: 2px 2px 12px #426378;">
              <thead style="color:white;background:steelblue;">
                <tr>
					<th> #</th>
                  <th>Gallons Requested</th>
                  <th>Delivery Address 1</th>
                  <th>Address 2</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zipcode</th>
		          <th>Delivery Date</th>
                  <th>Price per Gallon</th>
		          <th>Total Cost</th>
                </tr>
              </thead>

              <tbody>
             <?PHP

		/*THE FOLLOWING IS HARDCODED FILLER DATA! DELETE LATER!!!!
		
		for ($num=1; $num <= 5; $num++) {
 	 		$shade = ($num % 2) ? 'style="background:#b0e0ff;"':'';
			echo "<tr $shade>
				<td>$num</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
							
							
					</tr>";
		}*/
				
		/* INTEGRATION WITH DATABASE!!! */
				$num=1;
				foreach($result as $item){
					$shade = ($num % 2) ? 'style="background:#b0e0ff;"':'';
					echo "<tr $shade>
							<td>$num</td>
							<td>$item->gallons_Requested</td>
							<td>$item->delivery_Address1</td>
							<td>$item->delivery_Address2</td>
							<td>$item->delivery_City</td>
							<td>$item->delivery_State</td>
							<td>$item->delivery_ZipCode</td>
							<td>$item->delivery_Date</td>
							<td>$item->suggested_Price</td>
							<td>$item->total_amt_Due</td>
							
							
						</tr>";
						$num++;
				}
			 ?>
              </tbody>
            </table>
 
        </div>

        

    <script src="sidebar.js"></script>
</body>

</html>
