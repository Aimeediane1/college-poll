<?php
include('config.php')
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
    
  <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  

</head>
<body>
 
  <header>
    
 <div class="wrapper">
            <div class ="logo">
             
    <h2 style="color:white;font-size:40px"><center><u>ONLINE VOTING SYSTEM</u></center></h2>

</div>

</div>

 
   <div class="hea">
    <h2>LOGIN PANEL
 </h2>
    
  </div>
  
       <form action="admin.php"  onsubmit = "return validation()" method="POST">  
 
<table >
<tr> 

    <td style="font-size:16px;color: white;"><label for="Admin"name="Admin">Admin</label>
    <input type="radio" name="Admin" value="Admin"></td>

    <td style="font-size:16px;color: white;"><label for="user">user</label>

    <td><input type="radio" name="user" value="user"></td><br>
  </tr>
    

        <tr>
          <td width="298"><input type="text" placeholder="Enter Username" name="username">  </td>
        <
</tr>
<tr>
        <td width="278"><input type="password" placeholder="Enter Password" name="password"> <br/></td>

      
      </tr>
        <tr>
<div class="cancalbtn">
        <td width="78"><button type="submit"class="button submit" name="login_btn"> Login</button> </td> 
       
        <td width="78"><button type="submit"class="button submit" name="submit"><a href="register.php">Sign Up </a></button></td>
      </div>
      </tr>
     <tr>
        <td><a href="#" name="forgot">Forgot  password? </a></td> 
      </tr>
        </table>
      
        </form>  
     
</header>

<?php
  if (isset($_POST['login_btn'])) {
    /*
    $errors = array('login' => '', 'username' => '', 'password' => '', 'incorrect' => '');

  if(empty($_POST['Admin'])){
    $errors['login'] = 'You must choose between admin and user';}
  if(empty($_POST['username'])){
    $errors['username'] = 'A username is required';}
  if(empty($_POST['password'])){
    $errors['password'] = 'password is required';}*/
  $person = $_POST['Admin'];
 $uname = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
       if ($uname != "" && $password != ""){

  if($person == 'Admin'){
  //if($username === 'admin' && $password === 'admin250'){
if($uname == 'admin' && $password == 'admin250'){
    
        $sql_query = "select count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        } 
        } 

  } else if($person == 'user'){
    
    // write query 
    $sql_query = "select count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        } 
}
}
}

?>


</body>
</html>