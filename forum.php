<?php
session_start();
include('prevent_direct_access.php');
include('db_connection.php');

$query ="SELECT * FROM board";

$result = mysqli_query($db,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>forum</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header.php");?>
<div id="container" style="height: 100%; padding-left: 15%;padding-right: 15%;" align="center">
    <div style="padding: 5px">
        <h2>Post List</h2>
    </div>
    <div style="padding-top: 20px;width: 100%">
        <table style="width: 50%;border: 0px solid black;" align="center">
            <tr width="100%" style="" align="center">
                <td><b>Number</td>
                <td><b>Writer</td>
                <td><b>Title</td>
            </tr>
            <?php
            while($rows = mysqli_fetch_assoc($result)){
            ?>
                <tr align="center">
                    <td width="20%"><?php echo $rows['id'] ?></td>
                    <td width="30%"><?php echo $rows['name'] ?></td>
                    <td width="50%"><a href="/sepr/forum_view.php?number=<?php echo $rows['id'] ?>"><?php echo $rows['title'] ?></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <br>
    <a class="btn" href="forum_write.php" role="button">Post</a>
</div>
</body>
</html>