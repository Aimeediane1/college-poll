<?php
require('config.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 //header("location:access-denied.php");
}
?>

<html>
<head>
	<meta charset="UTF-8">
<title>home</title>
<link rel="stylesheet" type="text/css" href="navg.css">

</head>
<body>
	<header>
		<div class="wrapper">
		    <!--div class ="logo">
		    	<img src="im3.jpg" alt="">
            </div>-->
            <ul class="nav-area">
            <li><a class="active" href="home.php">Home</a> |</li>
<li><a href="about.html">About</a> | </li>
<li><a href="login3.php">Login</a> | </li>
            </ul>
        </div>
        <div class="welcome-text">
        	<h1>online voting platform</h1>
        </div>
</header>
</body>
</html>

