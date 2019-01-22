<html>
    <body>
<?php



$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Rahul";
$usererr="";
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
try{
    $id =$_POST["id"];
    $user =$_POST["user"];
    
    $email =$_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    $emailErr = "Invalid email format"; 
    $pass =$_POST["pass"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(preg_match("/^[a-zA-Z ]*$/",$user))
    {
     
 
    $sql = "insert into users (id,user, email, pass) values ('$id','$user','$email','$pass')";
   
    $conn->exec($sql);
    echo "New User registered"; 

    }
    else{
        $usererr="Only letters are allowed";
    }
   
   }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
   $conn=null;
} 
?>
<h1>Registration</h1>
<form method="POST" action="registeruser.php">
<input type="text" name="id" placeholder="id" required><br>
<input type="text" name="user" placeholder="Useranme" required> <?php echo($usererr);?><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="pass" placeholder="Password"required><br>
<input type="submit" name="submit" value="Register">
For login<a href="loginform.php"> click here</a>
</a> 

</body>
</html>