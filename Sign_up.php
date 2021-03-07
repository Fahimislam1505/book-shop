<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="../style file/style_for_homepage.css">
     <link rel="stylesheet" type="text/css" href="../style file/bootstrap-4.5.2-dist/css/bootstrap.min.css">
     
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
	
	<form method="post" action="Sign_up.php">
		 <div class="form-group">
    <label >Name </label>
    <input type="text" name="name" placeholder="write your name..." class="form-control">
         </div>
		<div class="form-group">
    <label >email </label>
    <input type="email" name="email"  required class="form-control">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>
         <div class="form-group">
    <label >Password </label>
    <input type="Password" name="pass"  required class="form-control">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>
         <div class="form-group">
         	 <label for="customer">Customer Type</label>

				<select name="custtype" id="customer">
				  <option value="science">Scientific</option>
				  <option value="commerce">Commercial</option>
				  <option value="hitory">Historiocal</option>
				  <option value="others">Others</option>
				</select> 
         </div>
         <button type="submit" name="submit" style="background-color: blue;color: white">Submit
         </button>
	</form>
 </div>
	</body>
	</html>
	<?php
	   $conn=mysqli_connect('localhost','root','','bookshop');
	   if($conn){
	   echo"sucessfull connect";
           if(isset($_POST['submit'])){

            $name= $_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $custtype=$_POST['custtype'];
            
            $sql="INSERT INTO signup VALUES ('$name','$email','$pass','$custtype')";
            if(mysqli_query($conn,$sql)){
              echo "insert succcessfull";
            }
           

     /*      $stmt = $conn->prepare("INSERT INTO register(name,email,pass,custtype) VALUES (?, ?,?,?)");
			$stmt->bind_param("ssss", $name, $email,$pass,$custtype);
			$name= $_POST['name'];
          $email=$_POST['email'];
          $pass=$_POST['pass'];
          $custtype=$_POST['custtype'];
			$stmt->execute();
			$stmt->close();
     */
           
	   }
	}
	   else{
	   echo "unsuccessfull".mysqli_error($conn);
	   }
	?>