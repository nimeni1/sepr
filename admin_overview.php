<?php
session_start();
include('prevent_direct_access.php');
include('db_connection.php');

$user_query = "SELECT * FROM users";
$users = mysqli_query($db, $user_query);

if ($_SESSION['username'] != "admin") {
  header('Location: index.php');
}

?>

<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="admin_overview.css">
  </head>
  <body>
    <?php include("header.php");?>
    <div id="container" style="height: 100%; padding-left: 15%;padding-right: 15%;" align="center">
      <div style="padding: 5px">
          <h2>Admin Overview</h2>
      </div>
      <table>
        <tr>
          <th>Username</th>
          <th>Email</th>
        </tr>
        <?php
          while($row = mysqli_fetch_assoc($users)){
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '</tr>';
          }
         ?>
      </table>
    </div>
  </body>
</html>
