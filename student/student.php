<?php
require('config.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 //header("location:access-denied.php");
}
?>
<html><head>
<link rel="stylesheet" type="text/css" href="nav.css">
<style>
	header{
	background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('im7.png');
	height: 100vh;
	-webkit-background-size: cover;
	background-postion: center center;
	position: relative;
}
</style>
</head>
<body>
<header>
        <div class="wrapper">
            <div class ="logo">
            	<aside style="width:40%; padding-left: 9px;margin-left: 20px;margin-top: 40px; font-size:20px;float: left; font-style: bold;">
              <h2 style="color:white;">STUDENT HOME </h2>
          </aside>
            </div>
<!--<b><font color = "brown" size="6">Simple PHP Polling System</font></b><br><br>-->

<ul class="nav-area">
<li><a href="student.php">Home</a> |</li>
<li><a href="vote.php">Current Polls</a> | </li>
<li><a href="manage-profile.php">Manage My Profile</a> | </li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>
<aside style="width:40%; padding-left: 9px;margin-left: 150px;margin-top: 250px; text-transform: uppercase; font-size:20px;float: right; font-style: bold;">
<!--div class="welcome-text">-->
<h1 style="color:white;"> Click a link above to do some stuff.</h1>

</aside>
</header>
</body></html>