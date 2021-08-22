
<?php 
/*$server="127.0.0.1";
$user="aimee";
$pass="";
$db="onlinevoting";
$connection=mysqli_connect($server,$user,$pass,$db);*/
$connection = mysqli_connect('localhost', 'root', '', 'onlinevoting');
if(!$connection){
	echo "Not passing";
}
else{
	echo " ";
}
?>