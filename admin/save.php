<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('config.php');
 $vote = $_REQUEST['vote'];
  $user_id=$_REQUEST['voter_id'];
   $position=$_REQUEST['position'];

$sql=mysqli_query($connection, "SELECT position,voter_id FROM tbvotes where position='$position' and voter_id='$user_id'");

if(mysqli_num_rows($sql))
{
    echo "<h3>You have already done your for this Position</h3>";
  //return "1";
 /* echo "<script>alert('already vote')</script>";*/ 
}
else
{
    //insert data and check position
    $ins=mysqli_query($connection,"INSERT INTO tbvotes (voter_id, position, candidateName) VALUES ('$user_id', '$position', '$vote')");
    mysqli_query($connection, "UPDATE tbcandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
    mysqli_close($connection);
 
echo "<h3 style='color:blue'>Congrates You have submitted your vote for canditate ".$vote."</h3>";

}

?> 