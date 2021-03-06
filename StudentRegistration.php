<?php 
session_start();
require("mongo-config.php");
$name=$email=$password=$dateofbirthday=$nhpassword='';
$error=array('submit'=>'','success'=>'');

if(isset($_SESSION['email'])){
  header("Location:blogPage.php?id=".rand());
}
if(isset($_POST['submit'])){
	if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['dateofbirthday'])){
		$error['submit']='There are errors in the form!';
		exit;
	}
	$name=htmlspecialchars($_POST['name']);
	$email=htmlspecialchars($_POST['email']);
	$dateofbirthday=htmlspecialchars($_POST['dateofbirthday']);
	$nhpassword=htmlspecialchars($_POST['password']);
	$password=password_hash($nhpassword,PASSWORD_DEFAULT);
	
	$query = $collection->findOne(['email' => $email]);
	
	if($query){
		$error['submit']='The user already exist. Please use another Email account.';
		exit;
	}
	else{
		$insertOneResult = $collection->insertOne([
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'date-of-birthday'=>$dateofbirthday,
		]);
		//$error['success']='Signup success.';
		
		header("Location:LoginPage.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Registration | 7 Waves</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- bootstrap3links -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">

  @import url('https://fonts.googleapis.com/css?family=Quicksand');
.footer {
  padding: 20px;

  background: #ddd;
  margin-top: 20px;
}
body {
  font-family: Arial;
  
  background: #f1f1f1;
}


.fa {
  padding: 20px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}
* {
  box-sizing: border-box;
}

input[type=text], select, textarea  {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=number], select, textarea  {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=Date], select, textarea  {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password], select, textarea , pattern {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}


label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #dd4b39;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  /*background-color: #f2f2f2;*/
  padding: 20px;
  text-align: center;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 45%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 1000px) {
  .col-75{
    width: 100%;
    /* text-align: center; */
    line-height: 25px;
    font-size:80%;
    width:75%
  }

 
}

</style>

</head>
<body>
  <nav class="navbar navbar-default" style="background-color: rgb(32,31,37); font-family: sans-serif; font-size: 130% ;  text-align: center; " 
  >
  
   <!-- <div class="container-fluid"> -->
     <div class="navbar-header"><br>
       
 <div style="height:100px; ">
         <img src="Logopit_1571920426174.jpeg" class="rounded-circle" alt="Cinque Terre" width="80" height="80"></div>
 
     <!-- </div> -->
     <div  style="  color: white; text-align: center; >
 
       <a href="#" style="color: white"></a>
       <a href="index.php" style="color: white; padding-left: 20px;">Home</a>
       <a href="index.php#about" style="color: white ;padding-left: 20px;">About</a>
       <a href="index.php#courses" style="color: white ; padding-left: 20px;">Services</a>
       <!-- <a href="index.php" style="color: white;padding-left: 20px">Contact</a> -->
       <a href="LoginPage.php" style="color: white ;padding-left: 20px;">Login</a>
  <h2 class="navheading" ><strong>
       Signup
     </strong></h2>
     
 
   </div>
 </nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      

      <form action="StudentRegistration.php" method="POST">
        
<div class="row">
      <div class="col-25">
        <label for="fname"> Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" placeholder="Your Name" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Date">Date Of Birth</label>
      </div>
      <div class="col-75">
        <input type="Date" id="Date" name="dateofbirthday" placeholder="Your Birthdate.."> 
      
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Email">Email id</label>
      </div>
      <div class="col-75">
        <input type="text" id="Email" name="email" placeholder="Your Email id" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
     <label for="psw">Password</label>
   </div>
      <div class="col-75">

    <input type="password" id="psw" name="password" placeholder="Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
   <br><br> <!--<input type="checkbox" onclick="myFunction()">    Show Password-->

     </div>
    </div><br><br>



    
    <div style="text-align: center;">
      

    <div style="color:red"><?php echo $error['submit'];?></div>
	<div style="color:green"><?php echo $error['success'];?></div>
      <input type="submit" name="submit">




  </div>





  </form>
</div> 
<div class="col"></div>
</div> 

<div class="footer">
  <h6>Developed and maintained by 7 Waves</h6><br>
 <a href="https://www.facebook.com/7waves-102331067869510/?ti=as" class="fa fa-facebook"></a>
  <a href="https://twitter.com/official7waves?s=08" class="fa fa-twitter"></a>
  <a href="#" class="fa fa-google"></a>
  <a href="#" class="fa fa-youtube"></a>
  <a href="https://instagram.com/official7waves?igshid=yzfg5tdez7s4" class="fa fa-instagram"></a>
  <h6 style="text-align: center;">&copy; 2020. All Rights Reserved.7 Waves.</h6>
</div>


        
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


</body>
</html>