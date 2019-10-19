<?php
include('captcha_validation.php');
if (isset($_FILES["fileToUpload"])){
  $target_dir = "/sepr/uploads/";
  $target_file = $_SERVER['DOCUMENT_ROOT']. $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if(isset($_POST["submit"])) {
    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != 'txt') {
        $message = "Sorry, only txt files are allowed.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message =  "Sorry, your file was not uploaded.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Sorry, there was an error uploading your file.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
  }
}

?>

<html>
  <head>
    <title>Upload Book</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </head>

  <body>
    <?php include("header.php");?>
    <div id="container" style="height: 100%; padding-left: 15%;padding-right: 15%;" align="center">
      <div style="padding: 5px">
          <h2>Upload Book</h2>
      </div>
      <br>
      Here you can upload a book, and the developers may decide to add an entry for it in the website.
      <br>
      <form action="upload_book.php" method="post" enctype="multipart/form-data">
          Select file to upload:
          <br>
          <input type="file" name="fileToUpload" id="fileToUpload">
          <br>
          <div class="input-group">
            <img id="captcha" src="/sepr/securimage/securimage_show.php" alt="CAPTCHA Image" />
            <input type="text" name="captcha_code" size="10" maxlength="6" />
            <a href="#" onclick="document.getElementById('captcha').src = '/sepr/securimage/securimage_show.php?' + Math.random();
              return false">[ Different Image ]</a>
        	</div>
          <br>
          <input type="submit" value="Upload" name="submit">
      </form>
    </div>
  </body>
</html>
