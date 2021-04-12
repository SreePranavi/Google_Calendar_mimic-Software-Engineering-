<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","Gcalendar");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE uname='" . $_POST["mail"] . "' and password = '". $_POST["psw"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
		header('Location: http://localhost/OOAD/month.php');
	}
}
?>
<html>

<head>
<title> LOGIN </title>
<link rel="stylesheet" href="login.css">
</head>

<body>

<div class="img">
    
    <img src="cal.png" alt="Calendar" class="logo">

</div>
  
<div class="signin">
<form method="POST" action="">
  <?php if($message!="") { echo $message; } 
  ?><br>

    <label for="mail"><b>Gmail ID</b></label>
    <input type="text" placeholder="Enter Gmail ID" name="mail" required>
    
    <br>
    <br>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    
    <br>
    <br>
    
    <button type="submit" id="s">SIGN IN</button>
    <br>
    <label class="cb">
      <input type="checkbox" checked="checked" name="remember"> Remember me
      <span class="cm"></span>
    </label>
    
    <br>
    <br>
    
    <button type="submit" id="gs">Connect to a signed in account</button>
  </form>  
</div>
</body>
</html>

