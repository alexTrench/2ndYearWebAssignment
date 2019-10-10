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
</ul>
<?php

$bookISBN = isset($_REQUEST['bookISBN'])? $_REQUEST['bookISBN']: null;

if(empty($bookISBN)){
    header('location: AdminPage.php');
    exit;
}

require_once 'functions.php';
$db = getConnection();

$sqlQuery = "SELECT bookISBN, bookTitle, bookYear, bookPrice, catDesc, pubName 
		FROM nbc_books
		INNER JOIN nbc_category
		ON nbc_category.catID = nbc_books.catID
        INNER JOIN nbc_publisher
        ON nbc_publisher.pubID = nbc_books.pubID
        WHERE bookISBN = :bookISBN";

$bookStmt = $db->prepare($sqlQuery);
$bookStmt->execute(array(':bookISBN' => $bookISBN));

$book = $bookStmt->fetchObject();
echo "Edit form";
echo "<form action=updateBook.php method='POST'>";
echo "<fieldset>
<legend>Book Details</legend>
<label>BookISBN</label><input type='text' readonly name='bookISBN' value='{$book->bookISBN}'>
<label>BookTitle</label><input type='text' name='bookTitle' value='{$book->bookTitle}'>
<label>BookYear</label><input type='text' name='bookYear' value='{$book->bookYear}'>
<label>BookPrice</label><input type='text' name='bookPrice' value='{$book->bookPrice}'>";
$catSql = "SELECT DISTINCT catID, catDesc
           FROM nbc_category
            ORDER BY catDesc";
$nbcCat = $db->query($catSql);
echo "<lablel>Catergory Desc</lablel>";
echo "<select name='catID'>";
while ($category = $nbcCat->fetchObject()){
    echo "<option value='{$category->catID}'>{$category->catDesc}</option>";
}
echo "</select>";

$pubSQL = "SELECT DISTINCT pubID,pubName
           FROM nbc_publisher
           ORDER BY pubName";
$nbcPub = $db->query($pubSQL);
echo "<lablel>Publisher</lablel>";
echo "<select name='pubID'>";
while ($publisher = $nbcPub->fetchObject()){
    $selected = ($book->pubID == $publisher->pubID)? 'selected' : '';
    echo "<option value='{$publisher->pubID}' $selected>{$publisher->pubName}</option>";
}
echo "/<select>";
echo "<p><input type='submit' value='Edit Book'></p>";
echo "</fieldset>";
echo "</form>";
?>
</body>
</html>

