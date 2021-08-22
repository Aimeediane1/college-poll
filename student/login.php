<?php include('config.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="navg2.css">
	
</head>
<body>
	<header>
		<div class="wrapper">
            <div class ="logo">
		<h2>ONLINE VOTING SYTEM</h2>
		    </div>
<ul class="nav-area">

<li><a class="active" href="hom.html">Home </a></li>
<li><a href="adminstr.html">Manage Administration</a></li>
<li><a href="position.php">Manage Position </a></li>
<li><a href="candidate.php">Manage Candidates</a></li>
<li><a href="poll.php">Poll Results</a></li>
<li><a href="form.html">Logout</a></li>
</ul>
</div>

	<div class="hea">
		<h2>STUDENT LOGIN</h2>
		
	</div>
	
	<form method="post" action="candidate.php">

	<table>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input type="text" name="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
	<td><input type="password" name="password"></td>
</tr>
<tr>

	<td><button type="submit" class="btn" name="login_btn">Login</button></td>
		</tr>
	</table>

</form>


<center>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	
</center>

</aside>
</header>
	<?php
	if (isset($_POST['login_btn'])) {


    $uname = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: candidate.php');
        }else{
            echo "Invalid username and password";
        }

    }
}

?>

</body>
</html>