<?php 
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Candidates</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="js/admin.js">
</script>
<link rel="stylesheet" type="text/css" href="ab.css">
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
    table, th, td {
  padding: 5px;
  text-align: left;    
}
body {
  font-size: 120%;
  background: #F0FFFF;
}

</style>
</head>
<body>
    
    
            <header>
        <h2>MANAGE CANDIDATES</h2>
        <hr style="height:2px;border-width:0;color:coral;background-color:coral">


    <ul class="navg">
<li><a  href="admin.php">Home </a></li>
<!--<li><a href="adminstr.html">Manage Administration</a></li>-->
<li><a href="position.php">Manage Position</a></li>
<li><a class="active" href="candidate.php">Manage Candidates</a></li>
<li><a href="refresh.php">Results</a></li>
<li><a href="logout.php">Logout</a></li>
<ul>

    </header>
    
     <div id="myDIV" class="sdiv">
      <table width="380" align="center">
        <caption><h2> ADD NEW CANDIDATES </h2></caption>
<form name="fmCandidate" id="fmCandidate"method="post" action="candidate.php" onsubmit="return candidateValidate(this)">

    <tr>
      <td>Candidate name:</td>
        <td><input type="text" name="candidate_name" /></td>
      </tr>
 
      <tr>
        <td>Candidate Position:</td>
     <td>
    <select name="position">
    <option disabled selected>-- Select position --</option>
    <?php
      
        $records = mysqli_query($connection, "SELECT postion_name From position");

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['postion_name'] ."'>" .$data['postion_name'] ."</option>";  
        } 
    ?>  
  </select>
    </td>
</tr>

      <td><input type="submit" name ="submit" value="ADD"/></td>
     <td><input type="submit" name ="retrieve" value="RETRIEVE"/></td>
   </tr>
 </table>
     <hr />
   </form>
   <?php
// inserting sql query
if (isset($_POST['submit']))
{

$newCandidateName = addslashes( $_POST['candidate_name'] ); 
$newCandidatePosition = addslashes( $_POST['position'] );
$pos = addslashes($_POST['position']);

$sql = "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')";
$sr= mysqli_query($connection, $sql);

if(!$sr){
        echo "failed" .mysqli_error($connection);
      }
      else{
        echo "Candidate saved";
      }
    }
    else{
      $retieve = "SELECT * FROM tbcandidates";
     $r = mysqli_query($connection, $retieve);
    
       ?>
     <table border="0" width="620" align="center">
    <tr>
<h3><center>AVAILABLE CANDIDATES</center></h3>
</tr>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
</tr>

 
       <?php
        while($row = mysqli_fetch_array($r)){ 
        ?>
        <tr><td><?php echo $row['candidate_id']; ?></td>
          <td><?php echo $row['candidate_name']; ?></td>
            <td><?php echo $row['candidate_position']; ?></td>
             <td><a href="delt.php?id=<?php echo $row['candidate_id']?>">Delete Candidate</a></td>
          
        </tr>
        <?php 
      }
      echo "</table>";
     }
  
?>
    
  </body>
</html>

            