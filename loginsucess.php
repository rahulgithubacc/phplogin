<?php 
session_start();

$svar = $_SESSION['user'];
if(!$svar)
{
  echo "You need to Login First to see this Page!";
  exit();
}
?>
<html>
    <body>
        <center><h1>Welcome!!!!!!!!!!!!!!</h1></center>
    </body>
    <a href="Logout.php">Logout</a>
</html>