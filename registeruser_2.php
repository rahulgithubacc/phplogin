<?php
session_start();
$svar=$_SESSION['user'];
if($svar)
{
  echo "Please logout to access this page";
  echo "<a href='Logout.php'><br>Logout</a>";
  exit();
}
include 'Connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>
<html>
<body>
<h1>Registration</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
<input type="text" name="id" placeholder="id" required><br>
<input type="text" name="user" placeholder="Useranme" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="pass" placeholder="Password"required><br>
<input type="submit" name="submit" value="Register">
</body>
</html>
<?php
class Registeruser extends Connection{
    public function insertion($id,$user,$email,$pass)
{
    $p = md5($pass);
    $sql = $this->conn->prepare("insert into users (id,user, email, pass) values ('$id','$user','$email','$p')");
    $r=$sql->execute();
   echo "New User Registered";  
}
}
  $r= new Registeruser();
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $id=$_POST['id'];
      $user=$_POST['user'];
      $email=$_POST['email'];
      $pass=$_POST['pass'];
  $r->insertion($id,$user,$email,$pass);
  }
?>