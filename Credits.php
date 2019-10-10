<!DOCTYPE html>
<html lang="en">
<head>
    <link href="Credits.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Credits</title>
</head>
<body>
<ul id="NavBar">
    <li><a href="index.php">Home</a></li>
    <li><a href="LoginPage.php">Login</a></li>
    <li><a href="Credits.php">Credit</a></li>
    <li><a href="orderBooksForm.php">Order</a></li>
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