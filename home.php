<?php   

session_start();
if(!isset($_SESSION['email'])){
		header("Location:login.php?reason=you are not allowed to enter ");

}


include("header.php");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<style type="text/css">
		
		.main{
			height: 100vh;
			width:100%;
			background-color:#444;
			color: white;
			display: flex;
			align-items: center;
			justify-content: center; 
			font-size: 5.5em;
		}

		.profile-image-upload-div{
			position: fixed;
			top:0px;
			left:0px;
			display:none;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100%;
			width: 100%;
			background: rgba(0,0,0,0.68);
		}

		.profile-image-upload-div form{
			background-color: white;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			padding: 10px 15px;
		}

		.profile-image-upload-div form input{
			height: 35px;
			width: 100%;
			border:1px solid black;
		}

		.profile-image-upload-div form input[type="file"]{
			border: none;
		}

		.profile-image-upload-div a {
					color: white;
					text-decoration: none;
					margin-left:20%; 
		}

	</style>
</head>
<body>
	<?php 
		if(isset($_GET['profile'])){
			if($_GET['profile']=='close'){
				echo "<style>
						.profile-image-upload-div{
							display: none;
						}
				</style>";
			}
			else{
				echo "<style>
						.profile-image-upload-div{
							display: flex;
						}
				</style>";
			}
		}

	?>
<div class="profile-image-upload-div">
		<a href="?profile=close">Close</a>
		<form action="uploadprofile.php" method="POST" id="profile-form" enctype="multipart/form-data">
			<h2>Upload Profile Pic</h2>
			<input type="file" name="profile-image" required />
			<input type="submit" name="submit-profile" form="profile-form" />
		</form>
	</div>
	<div class="main">
		<h1>WELCOME TO HOMEPAGE</h1>
	</div>
	
</body>
</html>
