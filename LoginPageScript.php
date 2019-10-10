<?php
ini_set("session.save_path" , "/home/unn_w16010695/sessionData");

session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Login process script</title>
</head>
<body>
<?php

$username = filter_has_var(INPUT_POST,'username')? $_POST['username']: null;
$username = trim($username);
$password = filter_has_var(INPUT_POST, 'password')? $_POST['password']: null;
$password = trim($password);

if(empty($username) || empty($password)) {
    echo "<p>You need to proved a username and a password.Please try again</p>";
    echo "<p><a href='LoginPage.php'>TRY AGAIN</a></p>";
}
else {
    try {


        //clear any session setting that might be left
        unset($_SESSION['username']);
        unset($_SESSION['password']);

        //set up database connection
        require_once("functions.php");
        $dbConn = getConnection();

        //sqlQuery
        $querySQL = "SELECT passwordHash
                 FROM nbc_users
                 WHERE username = :username";

        $stmt = $dbConn->prepare($querySQL);
        $stmt->execute(array(':username' => $username));
        $user = $stmt->fetchObject();

        //if there is a record returned
        if ($user) {
            if (password_verify($password, $user->passwordHash)){


                //set session variable called logged-in and username
                $_SESSION['logged-in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
            else {
                echo "<p>The username or password were incorrect</p>";
                echo "<p><a href='LoginPage.php'>Try Again</a>/p>";

            }
        }
        else{
            echo "<p>The username or password were incorrect</p>";
            echo "<p><a href='LoginPage.php'>Try Again</a></p>";

        }
    }
    catch(Exception $e){
        echo "<p>Book not found</p>";

    }
}

?>
</body>
</html>