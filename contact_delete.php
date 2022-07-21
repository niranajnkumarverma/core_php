<?php 

include "connection_db.php"; 

if (isset($_GET['id'])) {

    $contact_id = $_GET['id'];
    $sql = "DELETE FROM `contact` WHERE `id`='$contact_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        echo "<script>alert('Record deleted successfully..')</script>";
      
    }else{

        echo "<script>(Woops!.Error:)</script>" . $sql . "<br>" . $conn->error;

    }

} 
{

    header('Location: user_list.php');  
}
?>


