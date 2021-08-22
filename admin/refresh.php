<?php
require('config.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   
/*
$resulta = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_name='Luis Nani'");

while($row1 = mysqli_fetch_array($resulta))
  {
  $candidate_1=$row1['candidate_cvotes'];
  }
  */
  $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($connection, "SELECT * FROM tbcandidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); 
    $row2 = mysqli_fetch_array($results); 
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; 
      $candidate_1=$row1['candidate_cvotes']; 
}
      if ($row2){
      $candidate_name_2=$row2['candidate_name']; 
      $candidate_2=$row2['candidate_cvotes']; 
}
}
    else
        
?> 

<?php
session_start();

if(empty($_SESSION['admin_id'])){
 //header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>

<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<style>
    header {
  background-color: rgb(0, 0, 56);
  padding: 5%;
  margin: 0%;
  text-align: center;
  font-size: 16px;
  color:white;
}
.navg{
  float: right;
  list-style: none;
  margin-top: 20px;
}
.navg li{
  display: inline-block;
}
.navg li a{
  color: #fff;
  text-decoration: none;
  padding: 5px 20px;
  font-family: poppins;
  font-size: 16px;
}
.navg li a:hover{
  background: #fff;
  color: #333;
}
.navg a.active{
background-color: darkgrey;

}
.sdiv{
         text-align: center;
         border: 3px ridge;
background-color: beige;
    }
</style>

<script language="JavaScript" src="js/admin.js">
</script>
<script>
  function positionValidate(positionForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to see the poll results under the chosen position.";

if (positionForm.position.selectedIndex == 0)
{
errorMessage+="Position not set! Choose a position to retrieve the respective poll results.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}
</script>
</head>
<body>
  <header>
<h2>POll RESULTS</h2>
<hr style="height:2px;border-width:0;color:coral;background-color:coral">

   <ul class="navg">
<li><a  href="admin.php">Home</a></li>
<!--<li><a href="adminstr.html">Manage Administration</a></li>-->
<li><a  href="position.php">Manage Position</a></li>
<li><a href="candidate.php">Manage Candidates </a></li>
<li><a class="active" href="refresh.php">Poll Results</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
  </header>

<div class="sdiv">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
     <option disabled selected>-- Select position --</option>
    <?php
      
        $records = mysqli_query($connection, "SELECT postion_name From position");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['postion_name'] ."'>" .$data['postion_name'] ."</option>";  // displaying data in option menu
        } 
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
</div>


</body></html>