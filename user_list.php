<?php 

include "connection_db.php";
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>


<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
</head>

<body>



    <div class="container">

        <h2>Users List</h2>

<table id="tblUser">

    <thead>

        <tr>

        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>

                    <td><a class="btn btn-info" href="user_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="user_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 
 
<hr>
    <div class="container">

        <h2>Contact List</h2>

<table id="tblUser1">

    <thead>

        <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Action</th>

    </tr>

    </thead>

    <tbody> 
    <?php 

include "connection_db.php";
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

?>

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['message']; ?></td>

                    <td><a class="btn btn-info" href="contact_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="contact_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

<hr>

    <div class="container">

        <h2>Appointment List</h2>

<table id="tblUser2">

    <thead>

        <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Doctor</th>
      
        <th>Action</th>

    </tr>

    </thead>

    <tbody> 
    <?php 

include "connection_db.php";
$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);

?>


        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['doctor']; ?></td>

                    <td><a class="btn btn-info" href="appointment_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="appointment_delete.php?id=<?php echo  $row['id']; ?>" onclick="return delete_appointment()">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 
<script src="assets/js/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );

jQuery(document).ready(function($) {
    $('#tblUser1').DataTable();
} );
jQuery(document).ready(function($) {
    $('#tblUser2').DataTable();
} );


</script>

<script>
    window.addEventListener('load', function() {

    });
    function delete_appointment(id) {
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        timer: 3000
        })
    .then((willDelete) => {
    if (willDelete) {
        console.log("Yes");
        // swal("Poof! Your imaginary file has been deleted!", {
    
    } else {
        // swal("Your imaginary file is safe!");
        console.log("No");
    }
    });
        }
</script>


</body>

</html>



