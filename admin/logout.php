<?php
session_start();
?>
<html><head>
<link rel="stylesheet" type="text/css" href="abcd.css">
<style>
	header {
  background-color: rgb(0, 0, 56);
  padding: 5%;
  margin: 0%;
  text-align: center;
  font-size: 16px;
  color:white;
}

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