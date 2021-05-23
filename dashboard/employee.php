<?php

if(isset($_POST['register'])) {
	
$sql = mysql_connect('localhost', 'root', '');
		mysql_select_db('sms', $sql);

		$a = $_POST['name'];
		$b = $_POST['email'];
		$c = $_POST['phone'];

		$d = "INSERT INTO user (username, email, phone)VALUES('$a', '$b', '$c')";
		$e = mysql_query($d) or die(mysql_error());
		$f = "INSERT INTO sms1 (phone,msg)VALUES('$c','Fire Alert')";
		$g = mysql_query($f) or die(mysql_error());
			
			echo "<script>alert('Employee successfully registered !!!');</script>";
			echo "<script>window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EY | GDS </title>
  <link rel="stylesheet" href="assets/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-basic.css">
</head>
<body style="height:500px;">

<div>
  	<header class="header-basic">

			<div class="header-limiter">

				<h1><a href="index.php">Fire<span>pad</span></a></h1>

				<nav>
					<a href="index.php"> Home</a>
					<a href="employee.php" class="selected">Admin</a>
					
				</nav>
			</div>

		</header>
  
  
  
  <form method="POST">
    <h2 class="text-warning text-center pt-5"><u>Employee Registration</u></h2>
	
	<label>
        <input type="text" class="input" name="name" placeholder="Enter Employee Name"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <label>
      <input type="text" class="input" name="email" placeholder="Enter Employee Email"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <label>
        <input type="number" class="input" name="phone" placeholder="Enter Employee Number"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <button name="register" type="submit">Sign up</button>
  </form>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 </body>
</html>