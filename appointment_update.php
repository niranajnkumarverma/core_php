<?php

include "connection_db.php";
if (isset($_POST['update'])) {

    $appointment_id = $_POST['appointment_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];


    $sql = "UPDATE `appointment` SET  `name`='$name',`email`='$email',`date`='$date' ,`gender`='$gender', `department`='$department', `doctor`='$doctor' WHERE 'id' ='$appointment_id' ";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "<script>alert('Record updated successfully.')</script>";
    } else {

        echo "<script>alert('Error':)</script>" . $sql . "<br>" . $conn->error;
    }
}




if (isset($_GET['id'])) {

    $appointment_id = $_GET['id'];

    $sql = "SELECT * FROM `appointment` WHERE `id`='$appointment_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];
            $email = $row['email'];
            $date  = $row['date'];
            $gender  = $row['gender'];
            $department  = $row['department'];
            $doctor  = $row['doctor'];

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

                    <input type="hidden" name="appointment_id" value="<?php echo $id; ?>">

                    <br>



                    Email:<br>

                    <input type="email" name="email" value="<?php echo $email; ?>">

                    <br>

                    Date:<br>

                    <input type="date" name="date" value="<?php date_format($date, 'd/m/y'); ?>">

                    <br>
                    Gender:<br>

                    <input type="text" name="gender" value="<?php echo $gender; ?>">

                    <br>
                    Department:<br>

                    <input type="text" name="department" value="<?php echo $department; ?>">

                    <br>
                    Doctor:<br>

                    <input type="text" name="doctor" value="<?php echo $doctor; ?>">

                    <br>

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