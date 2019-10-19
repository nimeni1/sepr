<?php
session_start();
include('prevent_direct_access.php');
include('db_connection.php');

$chosen_isbn = $_GET["isbn"];
$query ="SELECT * FROM books WHERE ISBN=$chosen_isbn";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result)==0){
    header('location: book_error.php');
}
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
        <div style="">
            <?php
                while($rows = mysqli_fetch_array($result)){
            ?>
            <div style="background-color: #B0C4DE;float:left; width: 15%; height:50px;padding-top: 10px;"> Number : <?php echo $rows['ISBN']; ?> </div>
            <div style="background-color: #B0C4DE;float:left; width: 70%; height:50px;padding-top: 10px;"> Title : <?php echo $rows['Book_title']; ?> </div>
            <div style="background-color: #B0C4DE;float:left; width: 15%; height:50px;padding-top: 10px;"> Writer : <?php echo $rows['Book_writer']; ?> </div>

        </div>
        <div style="width:30%;height: 500px;float:left;" align="left">
            <img src="/sepr/image/<?php echo $rows['image_path'] ?>.jpg" style='height: 100%;width: 100%'>
        </div>
        <div style="width:70%;height: 500px;border: 0.5px black solid;padding-top: 50px;padding-left: 30px;padding-right: 30px;float:left;" align="left">
            <b><h3>Price : € <?php echo $rows['Book_price'];?></h3></b><br>
            <b>Description : </b><br><br>
            <?php echo $rows['Book_description'];
            }
            ?>
        </div>
        <a class="btn" href="purchase.php" role="button">Buy</a>
        <a class="btn" href="book_list.php" role="button">Go back to the list</a>
    </div>
</div>
</body>
</html>