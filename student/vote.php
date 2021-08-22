<?php
require('config.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['sid'])){
 //header("location:access-denied.php");
}

?>
<?php
// retrieving positions sql query
$positions=mysqli_query($connection, "SELECT * FROM position");
?> 
<?php
    // retrieval sql query
// check if Submit is set in POST
 if (isset($_POST['Submit']))
 {
 // get position value
 $position = addslashes( $_POST['position'] ); //prevents types of SQL injection
 
 // retrieve based on position
 $result = mysqli_query($connection,"SELECT * FROM tbcandidates WHERE candidate_position='$position'");
 // redirect back to vote
 //header("Location: vote.php");
 }
 else
 // do something
  
?>

<html>
<head>
<title>voting page</title>
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
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

    if(confirm("Your vote is for "+int))
    {
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","save.php?vote="+int+"&voter_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
    if(xmlhttp.readyState ==4 && xmlhttp.status==200)
    {
  //  alert("dfdfd");
    document.getElementById("error").innerHTML=xmlhttp.responseText;
    }
}

  }
    else
    {
    alert("Choose another candidate ");
    }
    
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body>
    
<header>

<h2>CURRENT POLLS</h2>
  <hr style="height:2px;border-width:0;color:coral;background-color:coral">

  <ul class="navg">

  <li><a href="student.php">Home</a> |</li>
  <li> <a class="active" href="vote.php">Current Polls</a> |</li>
  <li> <a href="profile.php">Manage My Profile</a> |</li>

  <li> <a href="logout.php">Logout</a></li>
</ul>
  </header>
<div class="sdiv">
    <caption><h2>Vote Your Favorite Candidate</h2></caption>
    
<table width="410" align="center">
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
   
    <option disabled selected>-- Select position --</option>
    <?php
      
        $records = mysqli_query($connection, "SELECT postion_name From position");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['postion_name'] ."'>" .$data['postion_name'] ."</option>";  // displaying data in option menu
        } 
    ?>  
  </select></td>

    <!--<td><input type="hidden" id="hidden" value="<?php echo $_SESSION['voter_id']; ?>" /></td>-->
    <!--<td><input type="hidden" id="str" value="<?php echo $_REQUEST['position']; ?>" /></td>-->
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<hr>
<table width="270" align="center">
<form>
<tr>
    <th>Candidates:</th>
</tr>


<?php
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($connection);
//}
  }
else
// do nothing
?>
<tr>
    <h3>NB:Voter can only vote once and voting choices remain anonymous. Each ballot has one, secure voting key and the vote is auditable, verifiable and can be independently observed.</h3>
    <td>&nbsp;</td>
</tr>
</form>
</table>
<center><span id="error"></span></center>
</div>
</div>
</div>
</body>
</html>