<?php
session_start();
?>
<html><head>
<link rel="stylesheet" type="text/css" href="abcd.css">
<style>
	.sdiv{
         text-align: center;
         border: 3px ridge;
background-color: beige;
    }
	
</style>
</head>
<header>
<center><b><font size="6">OnlineVoting System</font></b></center><br><br>
</header>
<div class="sdiv">
<h1>Logged Out Successfully </h1>
<p align="center">&nbsp;</p>

<?php
session_destroy();
?>
You have been successfully logged out.<br><br><br>
Return to <a href="login.php">Login</a>

</div>
</body></html>