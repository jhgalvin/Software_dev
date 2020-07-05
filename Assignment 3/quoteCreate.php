
<?PHP

session_start();

include "Database.php";

if(!$_COOKIE['company_ID']){
	header('Location: index.html');
}

$db = new Database();

$sql="SELECT * from logincredentials where company_ID = '$_COOKIE[company_ID]'";
$db->query($sql);
$user = $db->single();




$sql="SELECT companyAddress1 from companyprofile where company_ID = '$_COOKIE[company_ID]'";
	$db->query($sql);
	$item = $db->single();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Quote</title>
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
            <li class="side-li"><a class="side" href="profileUpdateForm.php">View/Update Profile</a></li>
	    <li class="side-li"><a class="side" href="quoteHistory.php">Quote History</a></li>
            <li class="side-li"><a class="side" href="logoutScript.php">Logout</a></li>
        </ul>
    </div>

   <!--- <header id="imgcontainer"></header> -->
    <div id="container" style='margin-bottom:6em;text-align:center;'>
        <h1>Create Quote</h1>

        <form  id="submit" action="quoteCreateScript.php" method="POST" >

            <label for="gallons">Gallons Requested:</label><br>
          <input type="number" oninput = "clearPrices()" id = "gallons" step=0.01 min = 0.00 placeholder="0.00" name="gallons_Requested" required><br>

            <label for="delivery_address">Delivery Address:</label><br>
           <input type="text" id = "address" name="delivery_Address" value="<?php echo $item->companyAddress1; ?>" readonly><br>

            <label for="delivery_date">Delivery Date:</label><br>
           <input type="date" id = "delivery_date" placeholder="Enter a date for delivery" name="delivery_Date" value="YYYY-MM-DD" required><br>

            <label for="suggested_price">Suggested Price per Gallon:</label><br>
          <input type="number" id = "price" min = 0.00 placeholder="0.00" name="suggested_Price" onkeydown="return false;" style="pointer-events: none;"><br>
			
            <label for="total_cost">Total Amount Due:</label><br>
          <input type="number" id = "total"  placeholder="0.00" name="total_amt_Due" onkeydown="return false;" style="pointer-events: none;"><br>
			

        <button class="button" type="button" onclick="calculate_price()">Get Quote</button>    
	<button class="button" type="submit" onclick = "return submitCheck()">Submit Quote</button>
	<button class="cancel" type="button" onclick="location.href='dashboard.php'">Cancel</button >
            
			

        </form>
    </div>


<script> 

delivery_date.min = new Date().toISOString().split("T")[0];

function submitCheck()
{
	if(document.getElementById("gallons").value == "" || document.getElementById("delivery_date").value == "")
	{
		return true;
	}
	else if (document.getElementById("delivery_date").value < new Date().toISOString().split("T")[0])
	{
		alert("Please select a Future date!");
		return false;
	}
	else if (document.getElementById("price").value == "")
  	{
      		alert("Please click 'Get Quote' before submitting!");
      		return false;
  	}
 	else
  	{

      		return true;
  	}
}


function clearPrices() 
{ 
    document.getElementById('price').value= ""; 
    document.getElementById('total').value= ""; 
  
} 

function calculate_price() 
{ 
    document.getElementById('price').value= parseFloat(5.00).toFixed(2); 
    document.getElementById('total').value=parseFloat(document.getElementById('gallons').value * document.getElementById('price').value).toFixed(2); 
  
} 
</script>


    <script src="sidebar.js"></script>

</body>

</html>
