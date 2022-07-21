<?php

include "connection_db.php";
if (isset($_POST['update'])) {

    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "UPDATE `users` SET  `username`='$username',`email`='$email',`password`='$password' WHERE 'id' ='$user_id' ";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "<script>alert('Record updated successfully.')</script>";
    } else {

        echo "<script>alert('Error':)</script>" . $sql . "<br>" . $conn->error;
    }
}




if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $username = $row['username'];
            $email = $row['email'];
            $password  = $row['password'];
            $id = $row['id'];
        }
?>


<br>
<br>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
            <title>Document</title>
        </head>

        <body>


            <h2>User Update Form</h2>

            <form action="" method="post">

                <fieldset>

                    <legend>Personal information:</legend>

                    Name:<br>

                    <input type="text" name="username" value="<?php echo $username; ?>">

                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                    <br>



                    Email:<br>

                    <input type="email" name="email" value="<?php echo $email; ?>">

                    <br>

                    Password:<br>

                    <input type="password" name="password" value="<?php echo $password; ?>">

                    <br>

                    <input type="submit" value="Update" name="update">                    
                    <button><a  href="user_list.php">Back</a></button>

                </fieldset>

            </form>

        </body>

        </html>

<?php

    } else {

        header('Location: user_list.php');
    }
}

?>