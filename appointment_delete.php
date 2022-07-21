
<?php 

include "connection_db.php"; 
error_reporting(0);

session_start();
// header("Location: login.php");
if (isset($_SESSION['username'])) {
}

if (isset($_GET['id'])) {

    $appointment_id = $_GET['id'];
    $sql = "DELETE FROM `appointment` WHERE `id`='$appointment_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        $_SESSION['status'] = "Record deleted successfully.";
		$_SESSION['status_code'] = "error";
        // echo "<script>alert('Record deleted successfully..')</script>";
      
    }else{
        $_SESSION['status'] = "Woops!.Error";
		$_SESSION['status_code'] = "error";
        // echo "<script>(Woops!.Error:)</script>" . $sql . "<br>" . $conn->error;

    }

} 
{

    header('Location: user_list.php');  
}
?>

