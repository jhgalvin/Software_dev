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

if("<? php echo $item->companyAddress1; ?>" == "")
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

<script type="text/javascript"> 

delivery_date.min = new Date().toISOString().split("T")[0];

function submitCheck()
{
	if(document.getElementById("gallons").value == "")
	{
		alert("Please enter the number of gallons you want!");
		return false;
	}
	else if(document.getElementById("delivery_date").value == "")
	{
		alert("Please enter a delivery date!");
		return false;
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

function getGallonsRequestedFactor(numGallons)
{
	
    if(numGallons >= 1000.00)
    {
         var a = parseFloat("0.02");
    }
    else
    {
         var a = parseFloat("0.03");
    }
	/*
	var b = document.getElementById("gallons").value;
	if(b >= 1000.00 && a == "0.02") 
	{
		alert("Gallons over 1000 Test Passed");
	}
	else if(b < 1000.00 && a == "0.03")
	{
		alert("Gallons under 1000 Test Passed");
	}
	else{
		alert("Gallons Test Failed");
	}
	*/
	return a;
}

function getLocationFactor(state)
{
    if(state == "TX")
    {
        var a = parseFloat("0.02");
    }
    else
    {
        var a = parseFloat("0.04");
    }
	/*
	if((document.getElementById("delivery_State").value == "TX" && a == 0.02) || (document.getElementById("delivery_State").value != "TX" && a == 0.04)) 
	{
		alert("Location Test Passed");
	}
	else{
		alert("Location Test Failed");
	}
	*/
	return a;
}

function getRateHistoryFactor(numQuotes)
{

	if (numQuotes > 0)
	{
		var a = parseFloat("0.01");
	}
	else
	{
		var a = parseFloat("0.00"); 
	}
	/*
	if(("<?php echo $rowNum ?>" > 0 && a == 0.01) || ("<?php echo $rowNum ?>" <= 0 && a == 0.00)) 
	{
		alert("History Test Passed");
	}
	else{
		alert("History Test Failed");
	}
	*/
	return a;
}

function getCompanyProfitFactor()
{
    var a = parseFloat("0.1");
	/*if(a == 0.1)
	{
		alert("Profit Test Passed");
	}
	else 
	{
		alert("Profit Test Failed");
	}
	*/
    return a;
}


function calculate_price()
{
	if(document.getElementById("gallons").value <= 0.00)
	{
		alert("Please enter the amount of gallons you want!");
		return false;
	}
	
    var currentPrice = 1.50;

    var numGallons = document.getElementById("gallons").value;
    var state = document.getElementById("delivery_State").value;
    var numQuotes = "<?php echo $rowNum ?>";

	var margin = (getLocationFactor(state) - getRateHistoryFactor(numQuotes) + getGallonsRequestedFactor(numGallons) + getCompanyProfitFactor()) * currentPrice;
	var suggestedPrice = parseFloat(currentPrice + margin).toFixed(4);
    var finalCost = parseFloat(numGallons * suggestedPrice).toFixed(2);

    
	
	
    document.getElementById('price').value = suggestedPrice;
    document.getElementById('total').value = finalCost;
	/*
	if(1.695 == document.getElementById("price").value)
	{
		alert("Price Test Passed");
	}
	else 
	{
		alert("Price Test Failed");
	}
	
	if(2542.50 == document.getElementById("total").value)
	{
		alert("Total Test Passed");
	}
	else 
	{
		alert("Total Test Failed");
	}
	*/
}

</script>


    <script src="sidebar.js"></script>

</body>

</html>