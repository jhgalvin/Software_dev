<?PHP
session_start();

include "Database.php";

if(!$_COOKIE['company_ID']){
	header('Location: index.html');
}

$db = new Database();

$sql="SELECT * from logincredentials
 where company_ID = '$_COOKIE[company_ID]'";
$db->query($sql);
$company_ID = $db->single();

if(isset($_GET['company_ID']) && ($_GET['company_ID']!== '')){
	$company_ID = $_GET['company_ID'];


	$sql="SELECT * from companyprofile where company_ID = '$company_ID'";
	$db->query($sql);
	$item = $db->single();

}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$companyName = $_POST['companyName'];
	$companyAddress1 = $_POST['companyAddress1'];
	$companyAddress2 = $_POST['companyAddress2'];
	$companyCity = $_POST['companyCity'];
	$companyState = $_POST['companyState'];
	$companyZipCode = $_POST['companyZipCode'];

	$sql="
	UPDATE companyprofile SET companyName = '$companyName', companyAddress1 = '$companyAddress1', companyAddress2 = '$companyAddress2', companyCity = '$companyCity', companyState = '$companyState', 
	companyZipCode = '$companyZipCode' WHERE companyName = '$companyName'";
	$db->query($sql);
	$db->execute();
	header('Location: dashboard.php');
	// echo "<pre>";
	 //echo print_r($vv);die;

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Company Profile</title>
  <link rel="stylesheet" href="style.css"> <!-- it is fixed to style.css -->
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
        <li class="side-li"><a class="side" href="logoutScript.php">Log out</a></li>
    </ul>
  </div>

   <!--- <header id="imgcontainer"></header> -->
   <script src="sidebar.js"></script>

   </body>


   <form  method="post">
		<div id="container" style='margin-bottom:6em;text-align:center;'>
			<h1> Update Form </h1>
				<label for="companyName">Company Name:</label><br>
				<input size = "50" type="text" name="companyName" required ><br><br>

				<label for="companyAddress1">Address 1:</label><br>
				<input size = "100" type="text" name = "companyAddress1" required ><br><br>

				<label for="companyAddress2">Address 2:</label><br>
				<input size = "100" type="text" name="companyAddress2"><br><br>
				
				<label for="companyCity">City:</label><br>
				<input size = "100" type="text" name="companyCity" required ><br><br>
				
				<label for = "companyState">Select State:</label><br>
				<select id = "companyState" required>
					<option value = "AL">AL</option>
					<option value = "AK">AK</option>
					<option value = "AZ">AZ</option>
					<option value = "AR">AR</option>
					<option value = "CA">CA</option>
					<option value = "CO">CO</option>
					<option value = "CT">CT</option>
					<option value = "DE">DE</option>
					<option value = "FL">FL</option>
					<option value = "GA">GA</option>
					<option value = "HI">HI</option>
					<option value = "ID">ID</option>
					<option value = "IL">IL</option>
					<option value = "IN">IN</option>
					<option value = "IA">IA</option>
					<option value = "KS">KS</option>
					<option value = "KY">KY</option>
					<option value = "LA">LA</option>
					<option value = "ME">ME</option>
					<option value = "MD">MD</option>
					<option value = "MA">MA</option>
					<option value = "MI">MI</option>
					<option value = "MN">MN</option>
					<option value = "MS">MS</option>
					<option value = "MO">MO</option>
					<option value = "MT">MT</option>
					<option value = "NE">NE</option>
					<option value = "NV">NV</option>
					<option value = "NH">NH</option>
					<option value = "NJ">NJ</option>
					<option value = "NM">NM</option>
					<option value = "NY">NY</option>
					<option value = "NC">NC</option>
					<option value = "ND">ND</option>
					<option value = "OH">OH</option>
					<option value = "OK">OK</option>
					<option value = "OR">OR</option>
					<option value = "PA">PA</option>
					<option value = "RI">RI</option>
					<option value = "SC">SC</option>
					<option value = "SD">SD</option>
					<option value = "TN">TN</option>
					<option value = "TX">TX</option>
					<option value = "UT">UT</option>
					<option value = "VT">VT</option>
					<option value = "VA">VA</option>
					<option value = "WA">WA</option>
					<option value = "WV">WV</option>
					<option value = "WI">WI</option>
					<option value = "WY">WY</option>
				</select>
				<br><br>
				<label for="companyZipCode"><br>Zip Code:</br></label>
				<input size = "9" minlength = "5" type="text" name="companyZipCode" required ><br>
				
				
			<button class="cancel" type="button" onclick="location.href='profileUpdateForm.php'">Clear All</button >
			<button class="button" type="submit">Submit</button >
        </div>
    </form>

</html>