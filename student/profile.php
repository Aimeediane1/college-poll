<?php
session_start();
require('config.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['id'])){
 //header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
 $id =$_POST['id'];
$r = "SELECT * FROM user WHERE id = ".$id;
$result = mysqli_query($connection, $r );
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['id'];
 $firstName = $row['username'];
 
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['username'] ); //prevents types of SQL injection
 //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($connection,"UPDATE user SET username='$myFirstName',  email='$myEmail' WHERE id = '$myId'" );

// redirect back to profile
 header("Location: profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VOter Profile Management</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body>
    <header> 
<h2>MANAGE MY PROFILE</h2>
<hr style="height:2px;border-width:0;color:coral;background-color:coral">

  <ul class="navg">

  <li><a href="student.php">Home</a> |</li>
  <li> <a  href="vote.php">Current Polls</a> |</li>
  <li> <a class="active" href="profile.php">Manage Profile</a> |</li>
  <li><a href="changepass.php">Change Password</a>|</li>
  <li> <a href="logout.php">Logout</a></li>
</ul>
  </header>
<div class="sdiv">
<table border="0" width="620" align="center">
<CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
<form action="profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value="<?php echo $firstName; ?>"></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value="<?php echo $lastName; ?>"></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value="<?php echo $email; ?>"></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Update Profile"></td></tr>

</form>
</table>
<hr>
</div>

</body>
</html>