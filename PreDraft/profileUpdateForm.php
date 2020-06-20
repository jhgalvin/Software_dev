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
  <link rel="stylesheet" href="product.css">
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
				<label for="companyName"><br>Company Name:</br></label>
				<input type="text" name="companyName" required ><br>

				<label for="companyAddress1"><br>Address 1:</br></label>
				<input type="text" name = "companyAddress1" required ><br>

				<label for="companyAddress2"><br>Address 2:</br></label>
				<input type="text" name="companyAddress2"><br>
				
				<label for="companyCity"><br>City:</br></label>
				<input type="text" name="companyCity" required ><br>
				
				<label for="companyState"><br>State:</br></label>
				<input type="text" name="companyState" required ><br>
				
				<label for="companyZipCode"><br>Zip Code:</br></label>
				<input type="text" name="companyZipCode" required ><br>
				
				<br>


			<button class="cancel" type="button" onclick="location.href='profileUpdate.php'">Clear All</button >
			<button class="button" type="submit">Submit</button >
        </div>
    </form>


value="<?php echo $item->companyName; ?>"



</html>