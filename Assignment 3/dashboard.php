<?PHP
/*
session_start();

include "Database.php";

if(!$_COOKIE['user_id']){
	header('Location: index.html');
}

$db = new Database();

$sql="SELECT * from user where user_id = '$_COOKIE[user_id]'";
$db->query($sql);
$user = $db->single();

*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oil Company</title>
    <link rel="stylesheet" href="dashboard.css">
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
            <li class="side-li"><a class="side" href="quoteCreate.php">Create Quote</a></li>
            <li class="side-li"><a class="side" href="quoteHistory.php">Quote History</a></li>
	    <li class="side-li"><a class="side" href="profileUpdateForm.php">Update Profile</a></li>
            <li class="side-li"><a class="side" href="logoutScript.php">Log out</a></li>
        </ul>
    </div>

    <header id="imgcontainer"></header>
    <div id="container">
        <h1>Client Dashboard</h1>
        </div>
        
    


    <script src="sidebar.js"></script>
</body>

</html>
