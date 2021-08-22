<?php //include('funct.php')
$db = mysqli_connect('localhost', 'root', '', 'onlinevoting');
?>
<!doctype html>
<html>
<head>
<title>home</title>
<link rel="stylesheet" type="text/css" href="abc.css">
	<style>
	header {
  background-color: rgb(0, 0, 56);
  padding: 5%;
  margin: 0%;
  text-align: center;
  font-size: 18px;
	color:white;
}
	</style>

</head>
<body>
<header>
		<h2><center>ONLINE VOTING SYTEM</center></h2>
		<hr />
	<p style="font-size:18px;"><marquee behavior="alternate">Now polls are up and running, just login and then go to current polls to vote your favorite candidates.</marquee></p>
	</header>
<center>
<div class="header">
	<h2>Student Registration</h2>
		
	</div>
	
<center>
	<form action="register.php" method="post">
  <?php //include('errors.php') ?>
		<div class="input-group">
    <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
		</div>
	<div class="input-group">
    <label for="email">Email :</label>
        <input type="text" id="email" name="email" required><br><br>
	</div>
	<div class="input-group">
        <label for="password">Password:</label>
        <input type="password"  name="password_1" required><br><br>
		</div>
		<div class="input-group">
<label for="password">Confirm Password:</label>
        <input type="password" name="password_2" required><br><br>
		</div>
	
        <div class="input-group">
        <button type="submit" name="reg_user">submit</button>
			</div>
<p>Already a user?<a href="login.php">Log in</a></p>
      
  </form>
	
	<?php
	
	if(isset($_POST["reg_user"])){
		
	
	$username    =  $_POST['username'];
	$email       =  $_POST['email'];
	$password  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];

	// form validation: ensure that the form is correctly filled
 
			$query = "INSERT INTO user (username, email,password) 
					  VALUES('$username', '$email', '$password')";
			$r = mysqli_query($db, $query); 
		    if(!$r){
				echo "Not done yet".mysqli_error($db);
			}else{
		    echo "It is registered";
				
			}
			//header('location: home.php');  
	}else{
		echo "Not yet submitting the button";
	}
	
	?>
	
	
	</center>
  </aside>
</div>
</aside>
</body>
</html>