<?php
ini_set("session.save_path", "/home/unn_w16010695/sessionData");
session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Book</title>
</head>
<body>
<?php

require_once 'functions.php';


$bookISBN = isset($_POST['bookISBN'])? $_POST['bookISBN']: null;


$bookTitle = isset($_POST['bookTitle'])? $_POST['bookTitle']: null;


$bookPrice = isset($_POST['bookPrice'])? $_POST['bookPrice']: null;


$bookYear = isset($_POST['bookYear'])? $_POST['bookYear']: null;


$pubID = isset($_POST['pubID'])? $_POST['pubID']: null;


$catID = isset($_POST['catID'])? $_POST['catID']: null;


if(!empty($bookISBN)){
    $db = getConnection();

    $updateSQL ="UPDATE nbc_books set bookISBN = :bookISBN, bookTitle = :bookTitle, bookYear = :bookYear, bookPrice = :bookPrice, catID = :catID, pubID = pubID
                 WHERE bookISBN = :bookISBN";


    try{
        $updateStmt = $db->prepare($updateSQL);
        $binging = array(
            ':bookISBN' => $bookISBN,
            ':bookTitle' => $bookTitle,
            ':bookYear' => $bookYear,
            ':bookPrice' => $bookPrice,
            ':catID' => $catID,
            ':pubID' => $pubID
        );

        $updateStmt->execute($binging);

        $message = 'Record Edited';

    }catch (Exception $e){
        $message = "<h1>Failed to update</h1>\n<p>$updateSQL</p>\n";
        $message .= $e->getMessage();
    }
}else{

    $message = "You have not chosen a book";
}
?>
</body>
</html>