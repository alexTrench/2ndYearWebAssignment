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
    }else{
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
<aside id="offers">

</aside>

<script type="text/javascript" src="getRequest.js"></script>
<script type="text/javascript" src="displayJSON.js"></script>



<script type="text/javascript">
    /* add a window load listener */
    window.addEventListener('load', function () {
        /* define the getQuotes function, inside the listener so it's local to it */
        var getSpecialOffers = function() {
            // call getRequest with the url, the callback function, and the config object
            getRequest('getOffers.php',displayJSON, {responseType:'json'});
            setTimeout(getSpecialOffers, 5000); // set a timer to call this same function again in 20 seconds
        };
        /* now call the function defined above */
        getSpecialOffers();
    });

</script>
</body>
</html>