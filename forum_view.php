<?php
session_start();
include('prevent_direct_access.php');
include('db_connection.php');

$post_num = $_GET["number"];
$query ="SELECT * FROM board WHERE id=$post_num";
$result = mysqli_query($db,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forum View</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>
<?php include("header.php");?>
<div id="container" style="height: 100%; padding-left: 15%;padding-right: 15%;" align="center">
    <div style="padding: 5px">
        <h2>Post View</h2>
    </div>
    <div style="padding-top: 20px">
        <div style="">
            <?php
            while($rows = mysqli_fetch_array($result)){
                ?>
            <div style="background-color: #B0C4DE;float:left; width: 15%;"> Number : <?php echo $rows['id']; ?> </div>
            <div style="background-color: #B0C4DE;float:left; width: 70%;"> Title : <?php echo $rows['title']; ?> </div>
            <div style="background-color: #B0C4DE;float:left; width: 15%;"> Writer : <?php echo $rows['name']; ?> </div>

        </div>
        <div style="height: 500px;border: 0.5px black solid;padding-top: 50px;padding-left: 30px;padding-right: 30px;" align="left">
            <?php echo $rows['content'];
            }
            ?>
        </div>
        <a class="btn" href="forum.php" role="button">Go back to the list</a>
    </div>
</div>
</body>
</html>
