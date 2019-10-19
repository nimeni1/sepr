<?php
session_start();
include('prevent_direct_access.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>King of the Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header.php");?>
<div class="header">
	<h2>Book bar</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information, but not admin -->
    <?php  if (isset($_SESSION['username']) && $_SESSION['username'] != 'admin') : ?>
    <div align="center">
        <p>Welcome to our Book store!<br><br><strong><?php echo $_SESSION['username']; ?></strong></p>
        <a class="btn btn-default" href="forum.php" role="button">Go to the Forum</a>
        <a class="btn btn-default" href="book_list.php" role="button">Go to the Book list</a>
        <a class="btn btn-default" href="upload_book.php" role="button">Go to Book Upload</a>
        <p style="padding-top: 10px;"><a class="btn btn-danger" href="index.php?logout='1'" role="button">log out</a></p>
    </div>
    <?php endif ?>

		<!-- logged in user information, for admin user -->
		<?php  if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') : ?>
		<div align="center">
				<p>Welcome to our Book store!<br><br><strong><?php echo $_SESSION['username']; ?></strong></p>
				<a class="btn btn-default" href="forum.php" role="button">Go to the Forum</a>
				<a class="btn btn-default" href="book_list.php" role="button">Go to the Book list</a>
                <a class="btn btn-default" href="admin_overview.php" role="button">Go to Admin Overview</a>
                <a class="btn btn-default" href="upload_book.php" role="button">Go to Book Upload</a>
				<p style="padding-top: 10px;"><a class="btn btn-danger" href="index.php?logout='1'" role="button">log out</a></p>
		</div>
		<?php endif ?>
</div>

</body>
</html>
