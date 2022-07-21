
<?php

$server = "localhost";
$user = "root";
$pass = "sms@123";
$database = "login_register_pure_coding";

$conn = mysqli_connect($server, $user, $pass, $database);

error_reporting(0);

// session_start();
// header("Location: index.php");
// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }


if (isset($_POST['submit'])) {

  if (!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['subject']) && !empty($_POST['subject'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];



    $query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
    if ($run) {
   
      echo "<script>alert('Your forms submit successfully.')</script>";
      
    } else {
      echo "form not submit";
    }
   
  } else {
    echo "<script>alert('Woops! something is wrong.')</script>";
  }
  
}
?>

