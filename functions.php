<?php
function getConnection() {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=unn_w16010695",
            "unn_w16010695", "Alexander18");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    } catch (Exception $e) {
        /* We should log the error to a file so the developer can look at any logs. However, for now we won't */

        throw new Exception("Connection error " . $e->getMessage(), 0, $e);
    }
}

function makePageStart($PageTitle,$CssPage) {
    $pageStartContent = <<<PAGESTART
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>$PageTitle</title> 
		<link href=$CssPage rel="stylesheet" type="text/css" />
	</head>
	<body>
PAGESTART;
    $pageStartContent .="\n";
    return $pageStartContent;
}





