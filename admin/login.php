<?php include('config.php')



?>
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
		    <!--
<ul class="nav-area">

<li><a class="active" href="hom.html">Home </a></li>
<li><a href="adminstr.html">Manage Administration</a></li>
<li><a href="position.php">Manage Position </a></li>
<li><a href="candidate.php">Manage Candidates</a></li>
<li><a href="poll.php">Poll Results</a></li>
<li><a href="form.html">Logout</a></li>
</ul>
</div>-->

	<div class="hea">
		<h2>ADMIN LOGIN</h2>
		
	</div>
	
	<form method="post" action="checklogin.php">

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


</aside>
</header>
	
</body>
</html>