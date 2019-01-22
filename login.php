
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "Rahul";
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
try{
	$user =$_POST["user"];
    $pass =$_POST["pass"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql = "SELECT * FROM users";
    // $result = $conn->query($sql);
    // $user = $result->fetchAll();
    // print_r($user); exit();
     $sql = $conn->prepare ("SELECT * FROM users WHERE user='$user' and pass='$pass'");
    
    $result = $sql->execute();
    if($result)
    include('loginsucess.php');
    else
    echo "Sorry u are not an authorised user.Try again";
    
   }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
   $conn=null;
}  
        ?>
  