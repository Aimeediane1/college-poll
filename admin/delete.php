<?php
  include("config.php");
  $id =$_GET['id'];
  
  $query = "DELETE FROM position WHERE postion_id=".$id;
  //echo $query;

  $r = mysqli_query($connection, $query);
  
  if($r){
	  echo " deleted successfly";
  }else{
	  echo "Something went wrong!";
  }

?>

