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




$sql="SELECT * from companyprofile where company_ID = '$_COOKIE[company_ID]'";
	$db->query($sql);
	$item = $db->single();

$sql="SELECT * from companyquote where company_ID = '$_COOKIE[company_ID]'";
	$db->query($sql);
	$result = $db->single();
    $rowNum = $db->rowCount();

?>

<script>
if("<?php echo $item->companyAddress1; ?>" == "")
	{
		alert("You Must Fill Out Your Profile Before Creating A Quote!");
		window.location.replace("profileUpdateForm.php");
	}
</script>

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

            <label for="delivery_address1">Delivery Address 1:</label><br>
           <input type="text" id = "address1" name="delivery_Address1" value="<?php echo $item->companyAddress1; ?>" readonly><br>

	        <label for="delivery_address2">Delivery Address 2:</label><br>
           <input type="text" id = "address2" name="delivery_Address2" value="<?php echo $item->companyAddress2; ?>" readonly><br>

	        <label for="delivery_city">Delivery City:</label><br>
           <input type="text" id = "city" name="delivery_City" value="<?php echo $item->companyCity; ?>" readonly><br>

	        <label for = "delivery_State">Delivery State:</label><br>
			<input type="text" id = "delivery_State" name= "delivery_State" value = "<?php echo $item->companyState; ?>" readonly><br>

	        <label for="delivery_zipcode">Delivery Zip Code:</label><br>
           <input size = "9" minlength = "5"type="text" id = "zipcode" name="delivery_ZipCode" value="<?php echo $item->companyZipCode; ?>" readonly><br>

            <label for="delivery_date">Delivery Date:</label><br>
           <input type="date" id = "delivery_date" placeholder="Enter a date for delivery" name="delivery_Date" value="YYYY-MM-DD" required><br>

            <label for="suggested_price">Suggested Price per Gallon:</label><br>
          <input type="number" id = "price" step=0.0001 min = 0.00 placeholder="0.0000" name="suggested_Price" onkeydown="return false;" style="pointer-events: none;"><br>
			
            <label for="total_cost">Total Amount Due:</label><br>
          <input type="number" id = "total" step=0.01 placeholder="0.00" name="total_amt_Due" onkeydown="return false;" style="pointer-events: none;"><br>
			

        <button class="button" type="button" onclick="calculate_price()">Get Quote</button>    
	<button class="button" type="submit" onclick = "return submitCheck()">Submit Quote</button>
	<button class="cancel" type="button" onclick="location.href='dashboard.php'">Cancel</button >
            
			

        </form>
    </div>


<script> 

delivery_date.min = new Date().toISOString().split("T")[0];
var currentPrice = 1.50;
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

function getGallonsRequestedFactor()
{
	
    if(document.getElementById("gallons").value >= 1000.00)
    {
         var a = parseFloat("0.02");
         return a;
    }
    else
    {
         var b = parseFloat("0.03");
         return b;
    }
	
}

function getLocationFactor()
{
    if(document.getElementById("delivery_State").value == "TX")
    {
        var a = parseFloat("0.02");
        return a;
    }
    else
    {
        var b = parseFloat("0.04");
        return b;
    }
}

function getRateHistoryFactor()
{
	var numQuotes = "<?php echo $rowNum ?>";
	if (numQuotes > 0)
	{
		var a = parseFloat("0.01");
		return a;
	}
	else
	{
		var b = parseFloat("0.00");
		return b; 
	}

}

function getCompanyProfitFactor()
{
    var a = parseFloat("0.1");
    return a;
}

function calculate_price() 
{
	var margin = (getLocationFactor() - getRateHistoryFactor() + getGallonsRequestedFactor() + getCompanyProfitFactor()) * currentPrice;
	var suggestedPrice = currentPrice + margin;
    document.getElementById('price').value= parseFloat(suggestedPrice).toFixed(4);
    document.getElementById('total').value=parseFloat(document.getElementById('gallons').value * document.getElementById('price').value).toFixed(2); 
  
}

</script>


    <script src="sidebar.js"></script>

</body>

</html>