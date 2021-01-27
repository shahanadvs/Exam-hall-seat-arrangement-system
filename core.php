                                                                                                         <?php
require('connect.inc.php');
require('core.inc.php');

if(loggedin())
{ 
  $username=getuser($mysqli,'username');
  //echo "WELCOME ".$username;

  include 'roomdetail.html';

}
else{
  header('Location: login.html');
}



?>



