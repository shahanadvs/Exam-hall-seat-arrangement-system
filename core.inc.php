<?php
require 'connect.inc.php';
//include 'nlogin.html';
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
$ref=$_SERVER['HTTP_REFERER'];
/*$ip_addr=$_SERVER['REMOTE_ADDR'];
$q="INSERT INTO visitors VALUES('$ip_addr')";

mysql_query($q);
*/

function loggedin()
{ //echo "to check";
  if(isset($_SESSION['user_id']))
          return true;
  else return true;

 }
 function getuser($mysqli,$field)
 { //echo $field;
   //echo "to get username";
   $id=$_SESSION['user_id'];
   //echo $id;
    $query = "SELECT $field FROM `users` WHERE users_id='$id'";
 $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
 $rows = mysqli_num_rows($result);
 if($rows==1){
 return mysqli_fetch_row($result);
//,0,$field
 }
 }



  ?>