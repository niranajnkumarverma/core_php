


<?php

$server = "localhost";
$user = "root";
$pass = "sms@123";
$database = "login_register_pure_coding";

$conn = mysqli_connect($server, $user, $pass, $database);



if (isset($_POST['submit'])) {
	if (!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['phone']) && !empty($_POST['date']) && !empty($_POST['gender']) && !empty($_POST['department']) && !empty($_POST['doctor'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];
		$gender = $_POST['gender'];
		$department = $_POST['department'];
		$doctor = $_POST['doctor'];


		$query = "INSERT INTO appointment (name, email, phone, date, gender, department, doctor) VALUES ('$name', '$email', '$phone', '$date', '$gender', '$department', '$doctor')";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($run) {

         $_SESSION['status'] = "Forms submited";
		 $_SESSION['status_code'] = "success";
		// echo "<script>alert('Woops! forms submited.')</script>";
		}
	} else {
		echo "<script>alert('Woops! Something Wrong Went.')</script>";
	}

	
}
{

	header('Location: index.php');  
}
?>
