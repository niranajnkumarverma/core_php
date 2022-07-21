<?php 

include "connection_db.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        echo "<script>alert('Record deleted successfully..')</script>";
      
    }else{

        echo "<script>(Woops!.Error:)</script>" . $sql . "<br>" . $conn->error;

    }

} 

?>

