<?php 
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>position names</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="admin.js"></script>
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
     
     <h2>MANAGE POSITIONS</h2>
        <hr style="height:2px;border-width:0;color:coral;background-color:coral">


  
    <ul class="navg">
<li><a  href="admin.php">Home</a></li>
<!--<li><a href="adminstr.html">Manage Administration</a></li>-->
<li><a class="active" href="position.php">Manage Position</a></li>
<li><a href="candidate.php">Manage Candidates </a></li>
<li><a href="refresh.php">Results</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
  </header>
  
  <div  class="sdiv">
   
    
    <table width="420" align="center">
   <caption><h2> ADD NEW POSITION </h2></caption>
  <form name="fmPosition" id="fmPosition"method="post" action="position.php" onsubmit="return positionValidate(this)">
<tr>
	  <td><label for="position_name">Position name:</label></td>
       <td><input type="text" name="postion_name"><br /></td>
      </tr>
      <tr>
      <td><input type="submit" name ="submit" value="ADD"/></td>
     <td><input type="submit" name ="retrieve" value="RETRIEVE"/></td></tr>
     
    </form>
  </table>
  <hr>
    <?php
    if(isset($_POST["submit"])){
     
$newPosition = addslashes( $_POST['postion_name'] ); 

$sql = mysqli_query($connection, "INSERT INTO position (postion_name) VALUES ('$newPosition')");

if(!$sql){
        echo "failed" .mysqli_error($connection);
      }
      else{
        echo "position saved";
      }
    }

    //if(isset($_POST['retrieve'])){
    else{ 
     $retieve = "SELECT * FROM position";
     $r = mysqli_query($connection, $retieve);
    
       ?>
        <table width="470" align="center">

         <tr>
            
          <th>Position ID</th>
          <th>Position name</th>
        
         </tr>
        
       <?php
        while($row = mysqli_fetch_array($r)){ 
        ?>
        <tr><td><?php echo $row['postion_id']; ?></td>
            <td><?php echo $row['postion_name']; ?></td>
             <td><a href="delete.php?id=<?php echo $row['postion_id'];?>">Delete Position</a></td>
          
        </tr>
        <?php 
      }
      echo "</table>";
     }
  
?>

</div>
  </body>
</html>
