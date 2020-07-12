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

$states = array("AK","AL","AR","AZ","CA","CO","CT","DE","FL","GA","HI","IA","ID","IL","IN","KS","KY",
"LA","MA","MD","ME","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR",
"PA","RI","SC","SD","TN","TX","UT","VA","VT","WA","WI","WV","WY");

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
        <li class="side-li"><a class="side" href="quoteCreate.php">Create Quote</a></li>
        <li class="side-li"><a class="side" href="quoteHistory.php">Quote History</a></li>
        <li class="side-li"><a class="side" href="logoutScript.php">Log out</a></li>
    </ul>
  </div>

   <!--- <header id="imgcontainer"></header> -->
   <script src="sidebar.js"></script>

   </body>


   <form  action="profileUpdateScript.php" method="post">
		<div id="container" style='margin-bottom:6em;text-align:center;'>
			<h1> Profile Update Form </h1>
				<label for="companyName">Company Name:</label><br>
				<input size = "50" type="text" name="companyName" value="<?php echo $item->companyName; ?>" required ><br><br>

				<label for="companyAddress1">Address 1:</label><br>
				<input size = "100" type="text" name = "companyAddress1" value="<?php echo $item->companyAddress1; ?>" required ><br><br>

				<label for="companyAddress2">Address 2:</label><br>
				<input size = "100" type="text" name="companyAddress2" value="<?php echo $item->companyAddress2; ?>" ><br><br>
				
				<label for="companyCity">City:</label><br>
				<input size = "100" type="text" name="companyCity" value="<?php echo $item->companyCity; ?>" required ><br><br>
				
				<label for = "companyState">Select State:</label><br>
				<select id = "companyState" name= "companyState" required>
				<option value="<?php echo $item->companyState; ?>" selected><?php echo $item->companyState; ?></option>
				<?PHP
                foreach($states as $s){
                echo "<option value='$s'>$s </option>";
                }
                ?>

				</select>
				<br><br>
				<label for="companyZipCode"><br>Zip Code:</br></label>
				<input size = "9" minlength = "5" type="text" name="companyZipCode" value="<?php echo $item->companyZipCode; ?>" required ><br>
				
				
			<button class="cancel" type="button" onclick="location.href='profileUpdateForm.php'">Undo All</button >
			<button class="button" type="submit">Submit</button >
        </div>
    </form>

</html>