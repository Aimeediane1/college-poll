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
</head>
<body>
<header>
        <div class="wrapper">
           <!-- <div class ="logo">
            	<aside style="width:40%; padding-left: 9px;margin-left: 20px;margin-top: 40px; font-size:20px;float: left; font-style: bold;">
              <h2>STUDENT HOME </h2>
          </aside>
            </div>-->
<!--<b><font color = "brown" size="6">Simple PHP Polling System</font></b><br><br>-->

<ul class="nav-area">
<li><a class="active" href="admin.php">Home</a> |</li>

<li><a href="position.php">Manage Position</a> | </li>
<li><a href="candidate.php">Manage Candidates</a>| </li>
<li><a href="refresh.php">Results</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>
<aside style="width:50%; padding-left: px;margin-left: 100px; margin-top: 250px;color:#fff; text-transform: uppercase; font-size:20px;float: right; font-style: bold;">
<!--div class="welcome-text">-->
<h1> Click a link above to perform some administrator stuff.</h1>

</aside>
</header>
</body></html>