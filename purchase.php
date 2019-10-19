<?php
session_start();
include('prevent_direct_access.php');
include('csrf_tokenize.php');
include('captcha_validation.php');
include('db_connection.php');
$csrf = new CSRF();

//generate token id and value
$token_id = $csrf->get_token_id();
$token_value = $csrf->get_token();

$books_query ="SELECT * FROM books";
$count_query = "SELECT COUNT(*) as Nr_of_books FROM books";

$result_count_query = mysqli_query($db, $count_query);
$books_available = mysqli_query($db, $books_query);
$count_row = mysqli_fetch_assoc($result_count_query);
$count = $count_row['Nr_of_books'];

//check if a post request has been made
if(isset($_POST['account']) && isset($_POST['title'])){
  // Check if token value is valid
  if($csrf->check_valid('post')) {
    $account = $_POST['account'];
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $count_check = 0;
    while($row = mysqli_fetch_assoc($books_available)){
      $nr_copies = $row['Is_avail'];
      $nr_copies = (int) $nr_copies;
      if ($nr_copies > 0){
        if ($row['Book_title'] == $title ){
          if ($row['Book_price'] == $amount){
            $purchase_query = "UPDATE books SET Is_avail = Is_avail - 1 WHERE Book_title = '$title'";
            mysqli_query($db, $purchase_query);
            $message = 'Successful transaction';
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
          else{
            $message = 'Amount input does not match book price';
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
        else{
          $count_check++;
        }
      }
      else{
        $message = 'No more copies available for this book';
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    if ($count == $count_check){
      $message = 'The book you wanted to order is not in out stock yet at the moment';
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}

?>

<head>
  <title>Puchase Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="purchase.css">
</head>

<body>
<?php include("header.php");?>
  <form action=purchase.php method=POST>
    <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
    <div class='input-group'>
      <label>Account number</label>
      <input type=text name=account>
    </div>
    <div class='input-group'>
      <label>Amount</label>
      <input type=text name=amount>
    </div>
    <div class='input-group'>
      <label>Book</label>
      <input type=text name=title>
    </div>

    <div class=input-group>
      <button type=submit class=btn name=order>Order Book</button>
    </div>
    <img id="captcha" src="/sepr/securimage/securimage_show.php" alt="CAPTCHA Image" />
    <input type="text" name="captcha_code" size="10" maxlength="6" />
	  <a href="#" onclick="document.getElementById('captcha').src = '/sepr/securimage/securimage_show.php?' + Math.random();
      return false">[ Different Image ]</a>
  </form>

</body>
