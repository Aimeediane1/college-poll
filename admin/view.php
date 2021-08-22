
<?php
   include("database.php");
   $id = $_GET['id'];
   $query = "SELECT * FROM user WHERE id =".$id;
   
   $result = mysqli_query ($conn, $query);
   if(!$result){
	   echo "Error ".mysqli_error($conn);
   }else{
	   while($row=mysqli_fetch_array($result)){
		    echo "<br/><hr/>";
		   echo "fname: ".$row['fname']; echo "<br/>";
		   echo "lname: ".$row['lname']; echo "<br/>";
		   echo "email: ".$row['email']; echo "<br/>";
		      echo "telephone: ".$row['telephone']; echo "<br/>";
		   echo "fathername: ".$row['fathername']; echo "<br/>";
		   echo "mothername: ".$row['mothername']; echo "<br/>";
		      echo "status: ".$row['status']; echo "<br/>";
		   echo "sex: ".$row['sex']; echo "<br/>";
		   echo "date_of_birth: ".$row['date_of_birth']; echo "<br/>";
		      echo "province: ".$row['province']; echo "<br/>";
		   echo "district: ".$row['district']; echo "<br/>";
		   echo "sector: ".$row['sector']; echo "<br/>";
		      echo "village: ".$row['village']; echo "<br/>";
		   echo "cell: ".$row['cell']; echo "<br/>";
	   }
   }
?>