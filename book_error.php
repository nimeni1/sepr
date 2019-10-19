<?php
session_start();
include('prevent_direct_access.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book View</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header.php");?>
<div id="container" style="height: 100%; padding-left: 15%;padding-right: 15%;" align="center">
    <div style="padding: 5px">
        <h2>Book</h2>
    </div>
    <div style="padding-top: 20px">
        <div style="" align="center">
            <h1>there is no this book anymore ! <br>
                Please try again!<br><br></h1>
            <a class="btn" href="book_list.php" role="button">Go back to the list</a>
        </div>
    </div>
</div>
</body>
</html>