
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>

  <style>
ul {
 list-style-type: none;
 margin: 0;
 padding: 0;
 overflow: hidden;
 background-color: #333333;
	text-align: center;
	position: fixed;
	margin-top: -50px;
	margin-left: 0px;
	width: 1400px;
	
}
li {
 float: left;
}
li a {
 display: block;
 color: white;
 text-align: center;
 padding: 5px;
	margin-left: 80px;
	width: 100px;
 
 text-decoration: none;
}
li a:hover {
 background-color: #49A450;
}
		body{
			margin: 0;
			background-image: url('white');
			background-repeat: no-repeat;

			background-size: cover;
			overflow-y: visible;
			height: 800px;
		
			 
		}
	  
	  
	  
table {
border-collapse: collapse;
width: 85%;
color: #588c7e;
font-family: Verdana, sans-serif ;
font-size: 13px;
text-align: left;
margin-left: 5px;
	margin-top: 50px;

}
th {
background-color: #588C7E;
color: white;

}
tr:nth-child(even) {background-color: #f2f2f2}
	  
	  
</style>

    <meta charset="UTF-8">
   </head>
<body>
      <ul class="nav-links">
        <li>
          <a href="dashbord.php" class="active">
            <span class="links_name">land certificate</span>
          </a>
        </li>
        <li>
          <a href="IDdashbord.php">
            <span class="links_name">identity replacement</span>
          </a>
        </li>
        <li>
          <a href="birthdashbord.php">
            <span class="links_name">birth certificate</span>
          </a>
        </li>

        <li>
          <a href="stock.php">
            <span class="links_name">criminol records</span>
          </a>
        </li>

        <li>
          <a href="deathdashbord.php">
            <span class="links_name">death certificate</span>
          </a>
        </li>
		  <li>
          <a href="calldashbord.php">
            <span class="links_name">messages</span>
          </a>
        </li>
<
        <li class="log_out">
          <a href="home.html">
            <i class="bx bx-log-out"></i>
            <span class="links_name" onClick="return confirm('Are you sure you want to log out?')">Log out</span>
          </a>
        </li>
      </ul>

	</table>

</body>
</html>


  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
//function get()
//	  {
//		  var a=confirm("are you sure to log out?");
//		  if(a==true){
//			  document.write("log out successful");
//		  }
//		 
//	  }
 </script>

<table>
<tr>
<th>fname</th>
<th>lname</th>
<th>email</th>
<th>telephone</th>
<th>fathername</th>
<th>mothername</th>
<th>status</th>
<th>sex</th>
<th>date_of_birth</th>
<th>province</th>
<th>district</th>
<th>sector</th>
<th>village</th>
<th>cell</th>
	<th colspan="3"> action </th>


</tr>
<?php
include('database.php');

$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)  {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["fname"]. "</td><td>" . $row["lname"] . "</td><td>" 
. $row["email"]. "</td><td>" . $row["telephone"]. "</td><td>" . $row["fathername"]. "</td><td>" 
. $row["mothername"]. "</td><td>" . $row["status"]. "</td><td>"  . $row["sex"]. "</td><td>" . $row["date_of_birth"]. "</td><td>" . $row["province"]. "</td><td>" . $row["district"]. "</td><td>". $row["sector"]. "</td><td>" . $row["village"]. "</td><td>" . $row["cell"]. "</td>"  
	?>
	<td><a href="view.php?id=<?php echo $row['id'];?>"> view </a></td>
		<td><a href="productdetails.php?id=<?php echo $row['id'];?>"> update </a></td>
		<td><a href="delete.php?id=<?php echo $row['id'];?>"> delete </a></td>
	<?php
	"<br/></tr>";
}	
}
	 else { echo "0 results"; }
$conn->close();
?>
	
</table>
