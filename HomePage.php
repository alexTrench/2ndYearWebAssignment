<?php
ini_set("session.save_path", "/home/unn_w16010695/sessionData");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="HomePage.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<ul id="NavBar">
    <li><a href="HomePage.php">Home</a></li>
    <li><a href="LoginPage.php">Login</a></li>
    <li><a href="Credits.php">Credit</a></li>
    <li><a href="AdminPage.php">Admin Page</a></li>
    <?php
    if(isset($_SESSION['logged-in'])) {
        if ($_SESSION['logged-in'] === true) {
            echo "<a href='logoutScript.php'>Logout</a>";

        }
        else {
            echo "<form method='post' action='LoginPageScript.php'>
        <fieldset>
            Username <input type='text' name='username' />
            Password <input type='password' name='password' />
            <input type='submit' value='Login' />
        </fieldset>
        </form>";
        }
    }
    else{
        echo "<form method='post' action='LoginPageScript.php'>
        <fieldset>
            Username <input type='text' name='username' />
            Password <input type='password' name='password' />
            <input type='submit' value='Login' />
        </fieldset>
        </form>";
    }
    ?>
</ul>

</body>
</html>