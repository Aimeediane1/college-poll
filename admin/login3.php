<?php

  	$errors = array('login' => '', 'username' => '', 'password' => '', 'incorrect' => '');
if(isset($_POST['submit'])){
	if(empty($_POST['Admin'])){
		$errors['login'] = 'You must choose between admin and user';}
	if(empty($_POST['username'])){
		$errors['username'] = 'A username is required';}
	if(empty($_POST['password'])){
		$errors['password'] = 'password is required';}
  $person = $_POST['Admin'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($person == 'Admin'){
	if($username === 'admin' && $password === 'admin250'){

		header('location:admin/admin.php');
	  }else{
		$errors['incorrect'] = 'Username Or Password is incorrect!';
	  }

  } else if($person == 'user'){
    include('config.php');
    // write query 
    $sql = "SELECT id FROM user WHERE username= '$username' and passwords = '$password'";
    
    // get the result set (set of rows)
    $result = mysqli_query($connection, $sql);
    
    // fetch the resulting rows as an array
    $account = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // check how many results
    $count = mysqli_num_rows($result);
    if($count == 1){
      header('Location: student.php');

    }
  else{
  echo 'username or password is incorrect';

  }
	mysqli_free_result($result);

	// close connection
	mysqli_close($connection);

  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOG IN</title>
  <link rel="stylesheet" type="text/css" href="navg4.css">
  
  <style>
    header{
  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('im3.jpg');
  height: 100vh;
  -webkit-background-size: cover;
  background-postion: center center;
  position: relative;
}
     
  /* input[type=text], input[type=password] {   
          width: 50%;   
          margin: 8px 0;  
          padding: 12px 20px;   
          display: inline-block;   
          border: 2px ;   
          box-sizing: border-box;  
          border-radius: 20px; 
      }  
   .button:hover {   
          opacity: 0.7; 
          background-color: black;header{
  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('im3.jpg');
  height: 100vh;
  -webkit-background-size: cover;
  background-postion: center center;
  position: relative;
}
           
      }   
         .hea {
  width: 40%;
  margin: 100px auto 0px;
  margin-left: 500px;
  color: white;
  background: #ivory;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}

   form, .content {
  width: 40%;
  margin: 0px auto;
  margin-left: 500px;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: ivory;
  border-radius: 0px 0px 10px 10px;
}  
      .cancelbtn:hover{
        background-color: black;
      }
      .submit:hover{
        background-color: black;
      }*/
  </style>
    
 
</head>
<body>
 
  <header>
    
 <div class="wrapper">
            <div class ="logo">
             
    <h2><center>ONLINE VOTING SYTEM</center></h2>

</div>

</div>

 
   <div class="hea">
    <h2>LOGIN PANEL
 </h2>
    
  </div>
  
       <form action="admin.php" method="POST">  
 <!--<aside style="width:50%; padding-left: px;margin-left: 200px; margin-top: 250px;color:#fff; text-transform: uppercase; font-size:20px;float: right; font-style: bold;">-->
   
<table >
<tr> 

    <td style="font-size:16px;color: white;"><label for="Admin"name="Admin">Admin</label>
    <input type="radio" name="Admin" value="Admin"></td>

    <td style="font-size:16px;color: white;"><label for="user">user</label>

    <td><input type="radio" name="Admin" value="user"><br></td>
  </tr>
    <p style="color:red"><?php echo $errors['login']; ?></p> 

        <tr>
          <td width="298"><input type="text" placeholder="Enter Username" name="username">  </td>
        <p style="color:red"><?php echo $errors['username'];?></p>
</tr>
<tr>
        <td width="278"><input type="password" placeholder="Enter Password" name="password"> <br/></td>

        <p style="color:red"><?php echo $errors['password'];?></p>
      </tr>
        <tr>
<div class="cancalbtn">
        <td width="78"><button type="submit"class="button submit" name="submit"> Login</button> </td> 
        <p style="color:red"><?php echo $errors['incorrect'];?></p>
        <td width="78"><button type="submit"class="button submit" name="submit"><a href="register.php">Sign Up </a></button></td>
      </div>
      </tr>
     <tr>
        <td><a href="#" name="forgot">Forgot  password? </a></td> 
      </tr>
        </table>
      </aside>
        </form>  
     
   
  



</div>
</header>
</body>
</html>