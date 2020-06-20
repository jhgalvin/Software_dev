<?PHP
/*
session_start();

include "Database.php";


$db = new Database();

$sql="SELECT * from user where user_id = '$_COOKIE[user_id]'";
$db->query($sql);
$user = $db->single();

if(!$_COOKIE['user_id']){
	header('Location: index.html');
}
if ($_COOKIE['user_id']){

	$sql="SELECT 
	quote.gallons,
	quote.delivery_address,
	quote.delivery_date,
	quote.price,
	quote.total
	FROM quote;
		
	$db->query($sql);
	$result = $db->resultSet();
	}
	//$rowNum = $db->rowCount();
	// echo "<pre>";
	// echo print_r($result);die;

*/
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
            <li class="side-li"><a class="side" href="profileUpdate.php">View/Update Profile</a></li>
	    <li class="side-li"><a class="side" href="quoteCreate.php">Create New Quote</a></li>
            <li class="side-li"><a class="side" href="logoutScript.php">Logout</a></li>
            
        </ul>
    </div>

   <!--- <header id="imgcontainer"></header> -->
    <div id="container" style='margin-bottom:6em;text-align:center;'>
         <!-- POSTS -->
  <h1>List of All Past Quotes</h1>
            <table class="table-info" style="width:80%;margin:auto;box-shadow: 2px 2px 12px #5a9c5a;">
              <thead style="color:white;background:rgb(90, 156, 90);">
                <tr>
					<th> #</th>
                  <th>Gallons Requested</th>
                  <th>Delivery Address</th>
		  <th>Delivery Date</th>
                  <th>Price per Gallon</th>
		  <th>Total Cost</th>
                </tr>
              </thead>

              <tbody>
             <?PHP

		/*THE FOLLOWING IS HARDCODED FILLER DATA! DELETE LATER!!!!*/
		
		for ($num=1; $num <= 5; $num++) {
 	 		$shade = ($num % 2) ? 'style="background:#deffdc;"':'';
			echo "<tr $shade>
				<td>$num</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
				<td>Filler Data</td>
							
							
					</tr>";
		}
				
		/*  FIX ME!!!!   INTEGRATE WITH DATABASE!!!
				$num=1;
				foreach($result as $item){
					$shade = ($num % 2) ? 'style="background:#deffdc;"':'';
					echo "<tr $shade>
							<td>$num</td>
							<td>$item->gallons</td>
							<td>$item->delivery_address</td>
							<td>$item->delivery_date</td>
							<td>$item->price</td>
							<td>$item->total</td>
							
							
						</tr>";
						$num++;
				}
			*/ ?>
              </tbody>
            </table>
 
        </div>

        

    <script src="sidebar.js"></script>
</body>

</html>
