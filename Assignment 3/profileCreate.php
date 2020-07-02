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
            <li class="side-li"><a class="side" href="logoutScript.php">Logout</a></li>
        </ul>
    </div>

   <!--- <header id="imgcontainer"></header> -->
    <div id="container" style='margin-bottom:6em;text-align:center;'>
        <h1>Create Profile</h1>

        <form  id="submit" action="profileCreateScript.php" method="POST">

            <label for="companyName">Company Name:</label><br>
			<input size = "50" type="text"  name="companyName" required><br><br>
			
			<label for = "companyEmail">Company Email:</label><br>
			<input size = "50" type = "text" name = "companyEmail" required><br><br>

			<label for="companyAddress1">Address 1:</label><br>
			<input size = "100" type="text" name="companyAddress1" required><br><br>
			
			<label for="companyAddress2">Address 2:</label><br>
			<input size = "100" type="text" name="companyAddress2"><br><br>

            <label for="companyCity">City:</label><br>
            <input size = "100" type = "text" name = "companyCity" required><br><br>
			
			<label for = "companyState">Select State:</label><br>
				<select id = "stateList" required>
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

            <label for="companyZipCode">Zip Code:</label><br>
            <input minlength = "5" maxlength = "9" type="text" name="companyZipCode" required><br>
			
            <button class="cancel" type="button" onclick="location.href='profileCreate.php'">Clear All</button >
            <button class="button" type="submit">Submit</button >
			

        </form>
    </div>

    <script src="sidebar.js"></script>
</body>

</html>