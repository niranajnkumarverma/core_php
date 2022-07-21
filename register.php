<?php

include 'connection_db.php';  ## This is your database connection

error_reporting(0);

session_start();
// header("Location: login.php");
if (isset($_SESSION['username'])) {
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				// echo "<script>alert(' User Registration Successfully.')</script>";
				$_SESSION['status'] = "User Registration Successfully.";
				$_SESSION['status_code'] = "success";
				header("Location: login.php");
			} else {
				// echo "<script>alert('Woops! Something Wrong Went.')</script>";
				$_SESSION['status'] = "Woops! Something Wrong Went.";
				$_SESSION['status_code'] = "error";
				header("Location: register.php");
			}
		} else {
			$_SESSION['status'] = "Woops! Email Already Exists..";
			$_SESSION['status_code'] = "error";
			// echo "<script>alert('Woops! Email Already Exists.')</script>";
			header("Location: register.php");
		}
	} else {
		$_SESSION['status'] = "Woops! Password Not Matched..";
		$_SESSION['status_code'] = "error";
		// echo "<script>alert('Password Not Matched.')</script>";

		header("Location: register.php");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form</title>
</head>


<body>

	<div class="container">
		<form action="#" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="form-group col-md-12">
				<input type="checkbox" name="agree" value="<?php echo $_POST['agree']; ?>" required>
				<span class="error"><?php echo $agreeErr; ?>Please accept Terms and Conditions!"</span>
			</div>
			<div class="input-group">
				<button id="reg" name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="assets/js/sweetalert.min.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		

			<?php
	// if (isset($_SESSION['status']) && $_SESSION['status'] != '') 
	{
	?>


<script>
			swal({
				title: "<?php echo $_SESSION['status']; ?>",
				icon: "<?php echo $_SESSION['status_code']; ?>",
				button: "Ok!",
				showConfirmButton: false,
				timer: 3000
				
			});
			// .then(
            //     function () 
            //     {
            //         window.location.href='login.php';
            //     },
            //     function (dismiss)
            //     {
            //         if (dismiss === 'timer') 
            //         {
            //           window.location.href='register.php';
            //         }
            //     }
			// )

		// });
	</script>

<?php
}

// unset($_SESSION['status']);

?>


</body>

</html>