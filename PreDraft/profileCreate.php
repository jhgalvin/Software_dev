<?PHP
/*session_start();

include "Database.php";

if(!$_COOKIE['user_id']){
	header('Location: index.html');
}

$db = new Database();

$sql="SELECT * from user where user_id = '$_COOKIE[user_id]'";
$db->query($sql);
$user = $db->single();


*/?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
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
            <li class="side-li"><a class="side" href="logoutScript.php">Logout</a></li>
        </ul>
    </div>

   <!--- <header id="imgcontainer"></header> -->
    <div id="container" style='margin-bottom:6em;text-align:center;'>
        <h1>Create Profile</h1>

        <form  id="submit" action="profileCreateScript.php" method="POST">

            <label for="companyName">Company Name:</label><br>
			<input type="text"  name="companyName" required><br>

			<label for="companyAddress1">Address 1:</label><br>
			<input type="text" name="companyAddress1" required><br>
			
			<label for="companyAddress2">Address 2:</label><br>
			<input type="text" name="companyAddress2"><br>

            <label for="companyCity">City:</label><br>
            <input  name = "companyCity" required><br>
			
			<label for="companyState">State:</label><br>
            <input  name = "companyCity" required><br>

            <label for="companyZipCode">Zip Code:</label><br>
            <input type="text" name="companyZipCode" required><br>
			
			<br>
			
            <button class="cancel" type="button" onclick="location.href='profileCreate.php'">Clear All</button >
            <button class="button" type="submit">Submit</button >
			

        </form>
    </div>

    <script src="sidebar.js"></script>
</body>

</html>