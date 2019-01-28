<?php
session_start();

include('Connection.php');
if(!empty($_SESSION['user'])) 
{
  echo "You have logged in previously </br>";
  echo "<a href='loginsucess.php'>Please go to Login success page.</a>";
}
else 
{ 
  ?>
<html>
<body>
<form method="POST" action="index.php ">
  <input type="text" name="user" placeholder="Username" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>" required><br>
  <input type="password" name="pass" placeholder="Password" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];}?>" required><br>
  <input type="submit" name="submit" value="Login">
  For Registration<a href="registeruser.php"> click here</a><br>
  <input type="checkbox" name="chk" value="checked">Remember Me<br>
</form>
</body>
</html>
<?php 
}
 ?>
<?php

class Index extends Connection {
  public  function success($user,$pass)
  {
   // print_r($this->conn);
   $p = md5($pass);
    $sql = $this->conn->prepare("SELECT * FROM users WHERE user='$user' and pass='$p' and activeuser =1");
    $sql->execute();
    $count=$sql->rowCount();
    return $count;  
  }
  }
  
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
  $c=new Connection();
  $i= new Index();
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $a=$i->success($user,$pass);
  
  if($a > 0) {
    $_SESSION['user'] = $_POST['user'];
    if( $_POST['chk'] == 'checked')
    {
      setcookie('user',$_POST['user']);
      setcookie('pass',$_POST['pass']);
    } 
    header('location:loginsucess.php');
  }
  echo "Not an authorised user";
 }
?>
