<?php
session_start();
include('prevent_direct_access.php');
include('db_connection.php');

$query ="SELECT * FROM books";

$result = mysqli_query($db,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Book list</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>
<?php include("header.php");?>
<div id="container" style="height: 100%; padding-left: 15%;padding-right: 15%;" align="center">
    <div style="padding: 5px">
        <h2>Book list</h2>
    </div>
    <div style="padding-top: 20px;width: 100%">
        <table style="width: 70%;border: 0px solid black;" align="center">
            <tr width="100%" style="" align="center">
                <td><b>ISDN</td>
                <td><b>Writer</td>
                <td><b>Title</td>
                <td><b>Image</b></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px"></td>
            </tr>
            <?php
            while($rows = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td colspan="4" style="height: 15px;"></td>
                </tr>
                <tr align="center" style="padding-top: 15px">
                    <td width="15%"><?php echo $rows['ISBN'] ?></td>
                    <td width="20%"><?php echo $rows['Book_writer'] ?></td>
                    <td width="30%"><a href="/sepr/book_description.php?isbn=<?php echo $rows['ISBN'] ?>"><?php echo $rows['Book_title'] ?></a></td>
                    <td width="30%"><img src="/sepr/image/<?php echo $rows['image_path'] ?>.jpg" style='height:50%; width: 100%; object-fit: contain'></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>