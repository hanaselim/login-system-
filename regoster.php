<?php
include("database.php");
session_start();

if(isset($_SESSION['email'])){
	header("Location:home.php?reason=you are alredy logined");
}

if(isset($_POST["register-submit"])){
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$pass2=$_POST['conf'];

	if(empty($name) OR empty($email) OR empty($username) OR empty($pass) OR empty($pass2)){
		header("location:regoster.php?error=All fields all empty");
		exit();
				}
			$query="SELECT * FROM users WHERE email='".$email."'";
			$result=mysqli_query($conn,$query);
			if(mysqli_num_rows($result)>0) {
				header("location:regoster.php?error=This email is Already taken");
				exit();
					}	

	if($pass != $pass2){
	header("location:regoster.php?error=Passwords don't match");
				exit();	
	}

	if($pass ==$pass2){
		$pass_hash=password_hash($pass, PASSWORD_DEFAULT);
		$sql="INSERT INTO users(fullname,username,email,password) VALUES ('".$name."','".$username."','".$email."','".$pass_hash."')";
		$row=mysqli_query($conn,$sql);
		if($row){
			$_SESSION['name']=$name;
			$_SESSION['email']=$email;
			header("location:home.php?register=done");
		}
		else{
			header("location:regoster.php?error=My sql error");
				exit();
		}
	}


}






?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login system in php</title>
	<link rel="stylesheet" type="text/css" href="css/regoster.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 offset-md-3">
				<form action="regoster.php" method="POST">
					<h1 class="text-center text-primary">REGISTER USER</h1>
					<div clas="form-group">
						<p class="text-center text-danger">
							
							<?php
								if(isset($_GET['error'])){
									echo $_GET['error'];
								}
								?>
						</p>
					</div>
					<div class="form-group">
						<label for="name">Full name</label>
						<input type="text" name="name" class="form-control" placeholder="enter your name">
		</div>
		<div class="form-group">
						<label for="name">User name</label>
						<input type="text" name="username" class="form-control" placeholder="enter your username">
		</div>
		<div class="form-group">
						<label for="name">Email</label>
						<input type="email" name="email" class="form-control" placeholder="enter your email">
		</div>
		<div class="form-group">
						<label for="name">password</label>
						<input type="password" name="password" class="form-control" placeholder="enter your password">
		</div>
		<div class="form-group">
						<label for="name">Confirm password</label>
						<input type="password" name="conf" class="form-control" placeholder="enter your confirm password"> 
		</div>
		<div class="form-group">
			<input type="submit" name="register-submit" class="btn btn-block bg-primary" value="Register">
		</div>
		<div class="form-group text-center">
			<p>Already a member ?</p>
			<a href="login.php" >Login here </a>
	</form>

	</div>



</body>
</html>