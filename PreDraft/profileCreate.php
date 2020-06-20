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
			<input type="text"  name="companyName" required><br><br>
			
			<label for = "companyEmail">Company Email:</label><br>
			<input type = "text" name = "companyEmail" required><br><br>

			<label for="companyAddress1">Address 1:</label><br>
			<input type="text" name="companyAddress1" required><br><br>
			
			<label for="companyAddress2">Address 2:</label><br>
			<input type="text" name="companyAddress2"><br><br>

            <label for="companyCity">City:</label><br>
            <input type = "text" name = "companyCity" required><br><br>
			
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