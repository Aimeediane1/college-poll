<?php
   include("config.php");
  $id =$_GET['id'];
  
  $quer = "DELETE FROM tbcandidates WHERE candidate_id=".$id;
  //echo $query;

  $r = mysqli_query($connection, $quer);
  
  if($r){
    echo " deleted successfly";
  }else{
    echo "Something went wrong!";
  }

?>