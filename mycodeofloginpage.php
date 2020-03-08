<?php
include("database.php");
session_start();

if(isset($_POST['login-submit'])){
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	$query="SELECT * FROM users WHERE email='".$email."'";
	$result=mysqli_query($conn,$query);

	$row=mysqli_fetch_array($result);

	if(empty($email) OR empty($pass) ){
			header("Location:login.php?error=All fields are empty");
			exit();
					}
			
	else if(!mysqli_num_rows($result) > 0) {
					header("Location:login.php?error=Register first please!");
					exit();
						}	

	else{
		while($row){
		$pass1= password_verify($pass,$row['password']);
					if($pass){
								$_SESSION['name']=$name;
								$_SESSION['email']=$email;
								header("Location:home.php?login=done&email=$email");
						}
						else{
								header("location:login.php?error=Wrong password");
								exit();
						}
		}
	}
			
	}	