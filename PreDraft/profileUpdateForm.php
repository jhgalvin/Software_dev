<?PHP
/*session_start();

include "Database.php";

if(!$_COOKIE['user_id']){
	header('Location: index.html');
}

$db = new Database();

$sql="SELECT * from user
 where user_id = '$_COOKIE[user_id]'";
$db->query($sql);
$user = $db->single();

if(isset($_GET['id']) && ($_GET['id']!== '')){
	$product_id = $_GET['id'];


	$sql="SELECT * from animal where animal_id = '$product_id'";
	$db->query($sql);
	$item = $db->single();

}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = $_POST['name'];
	$DOB = $_POST['DOB'];
	$gender = $_POST['gender'];
	$breed = $_POST['breed'];
	$display = $_POST['display'];

	$sql="
	UPDATE animal SET animal_name = '$name', animal_DOB = '$DOB', animal_gender = '$gender', animal_breed = '$breed', animal_display = '$display'
	WHERE animal_id = '$product_id' ";
	$db->query($sql);
	$db->execute();
	header('Location: animalUpdate.php');
	// echo "<pre>";
	 //echo print_r($vv);die;

}

*/
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
				<input type="text" name="companyName" required ><br><br>
				
				<label for = "companyEmail"?Company Email:</label><br>
				<input type = "text" name = "companyEmail" required><br><br>

				<label for="companyAddress1">Address 1:</label><br>
				<input type="text" name = "companyAddress1" required ><br><br>

				<label for="companyAddress2">Address 2:</label><br>
				<input type="text" name="companyAddress2"><br><br>
				
				<label for="companyCity">City:</label><br>
				<input type="text" name="companyCity" required ><br><br>
				
				<label for = "companyState">Select State:</label><br>
				<select id = "stateList" required>
					<option value = "AL">Alabama</option>
					<option value = "AK">Alaska</option>
					<option value = "AZ">Arizona</option>
					<option value = "AR">Arkansas</option>
					<option value = "CA">California</option>
					<option value = "CO">Colorado</option>
					<option value = "CT">Connecticut</option>
					<option value = "DE">Deleware</option>
					<option value = "FL">Florida</option>
					<option value = "GA">Georgia</option>
					<option value = "HI">Hawaii</option>
					<option value = "ID">Idaho</option>
					<option value = "IL">Illinois</option>
					<option value = "IN">Indiana</option>
					<option value = "IA">Iowa</option>
					<option value = "KS">Kansas</option>
					<option value = "KY">Kentucky</option>
					<option value = "LA">Louisiana</option>
					<option value = "ME">Maine</option>
					<option value = "MD">Maryland</option>
					<option value = "MA">Massachussetts</option>
					<option value = "MI">Michigan</option>
					<option value = "MN">Minnesota</option>
					<option value = "MS">Mississippi</option>
					<option value = "MO">Missouri</option>
					<option value = "MT">Montana</option>
					<option value = "NE">Nebraska</option>
					<option value = "NV">Nevada</option>
					<option value = "NH">New Hampshire</option>
					<option value = "NJ">New Jersey</option>
					<option value = "NM">New Mexico</option>
					<option value = "NY">New York</option>
					<option value = "NC">North Carolina</option>
					<option value = "ND">North Dakota</option>
					<option value = "OH">Ohio</option>
					<option value = "OK">Oklahoma</option>
					<option value = "OR">Oregon</option>
					<option value = "PA">Pennsylvania</option>
					<option value = "RI">Rhode Island</option>
					<option value = "SC">South Carolina</option>
					<option value = "SD">South Dakota</option>
					<option value = "TN">Tennessee</option>
					<option value = "TX">Texas</option>
					<option value = "UT">Utah</option>
					<option value = "VT">Vermont</option>
					<option value = "VA">Virginia</option>
					<option value = "WA">Washington</option>
					<option value = "WV">West Virginia</option>
					<option value = "WI">Wisconsin</option>
					<option value = "WY">Wyoming</option>
				</select>
				<br><br>
				<label for="companyZipCode"><br>Zip Code:</br></label>
				<input type="text" name="companyZipCode" required ><br>
				
				<br>


			<button class="cancel" type="button" onclick="location.href='profileUpdate.php'">Clear All</button >
			<button class="button" type="submit">Submit</button >
        </div>
    </form>


value="<?php echo $item->companyName; ?>"



</html>