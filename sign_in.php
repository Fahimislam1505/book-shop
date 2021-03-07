<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="../style file/bootstrap-4.5.2-dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="../style file/style_for_homepage.css">
</head> 
<body>
  <div class="container">
  <header class="container-fluid">
      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/bookshop/php file/homepage.php">Home</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/bookshop/php%20file/sign_up.php">Register</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/bookshop/php%20file/about.php">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/bookshop/php%20file/contact.php">Contact</a>
  </li>
  <li class="nav-item float-left">
    <a class="nav-link" href="http://localhost/bookshop/php%20file/sign_in.php">Login</a>
  </li>
 
</ul>
  </header>
  
  <p>No Account? Please <a href="signup.php"> Signup</a></p> 


<div class="row">
  <div class="container">
  <form action="sign_in.php" method="post">
  <div class="row">
    <div class="col-25">
      <label >Email</label>
    </div>
    <div class="col-75">
      <input type="text" name="email" placeholder="User ID...">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label >Password</label>
    </div>
    <div class="col-75">
      <input type="password"  name="pass" placeholder="Password">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Signin" name="login">
  </div>
  </form>
</div>
</div>


</div>
</body>
</html>

<?php
$conn=mysqli_connect('localhost','root','','bookshop');
 if($conn){
     echo"sucessfull connect";
if(isset($_POST['login']))
{
  $id=$_POST['email'];
  $pass=$_POST['pass'];

  $sql="SELECT  email,pass FROM signup WHERE  email='$id' and pass='$pass'";
             $result = mysqli_query($conn,$sql);
            
            
            if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["email"]. " - password: " . $row["pass"].  "<br>";
  }
                $_SESSION['email']=$id;
                $_SESSION['admin_login_status']="loged in";
                header("location:admin/homepage.php");

}
                
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
  

}
}
     else{
     echo "unsuccessfull".mysqli_error($conn);
     }
?>