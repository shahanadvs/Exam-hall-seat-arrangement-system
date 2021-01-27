<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

</head>
<body>
<?php
 require('connect.inc.php');
 session_start();
 $ip_addr=$_SERVER['REMOTE_ADDR'];
$q="INSERT INTO visitors VALUES('$ip_addr')";

mysqli_query($mysqli,$q);
 // If form submitted, insert values into the database.
 //echo $_POST['username'];
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($mysqli,$username);
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($mysqli,$password);
 //Checking is user existing in the database or not
 //$password='".md5($password)."';
 //echo $password;
 $query = "SELECT users_id FROM `users` WHERE username='$username' and password='$password'";
 $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));

 $rows = mysqli_num_rows($result);

 if($rows==1){
	 $user_id=mysqli_fetch_row($result,0,'id');
 	$_SESSION['user_id'] = $user_id;
 	 header("Location: core.php"); // Redirect user to index.php
 }else{
 header("Location: wrong.html");//echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.html'>Login</a></div>";
 }

	
 }
?>
<!--<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div> -->

</body>
</html>


