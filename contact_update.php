<?php

include "connection_db.php";
if (isset($_POST['update'])) {

    $contact_id = $_POST['contact_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "UPDATE `contact` SET  `name`='$name',`email`='$email',`subject`='$subject' ,`message`='$message' WHERE 'id' ='$contact_id' ";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "<script>alert('Record updated successfully.')</script>";
    } else {

        echo "<script>alert('Error':)</script>" . $sql . "<br>" . $conn->error;
    }
}




if (isset($_GET['id'])) {

    $contact_id = $_GET['id'];

    $sql = "SELECT * FROM `contact` WHERE `id`='$contact_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];
            $email = $row['email'];
            $subject  = $row['subject'];
            $message  = $row['message'];


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


            <h2>Contact Update Form</h2>

            <form action="" method="post">

                <fieldset>

                    <legend>Personal information:</legend>

                    Name:<br>

                    <input type="text" name="name" value="<?php echo $name; ?>">

                    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">

                    <br>

                    Email:<br>

                    <input type="email" name="email" value="<?php echo $email; ?>">

                    <br>

                    Date:<br>

                    <input type="text" name="subject" value="<?php echo $subject; ?>">

                    <br>
                    Gender:<br>

                    <input type="text" name="message" value="<?php echo $message; ?>">



                    <input type="submit" value="Update" name="update">
                    <button><a href="user_list.php">Back</a></button>

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