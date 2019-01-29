 <html>
<body>
<h1>Registration</h1>
<form method="POST" action=" ">
<input type="text" name="id" placeholder="id"  required><br>
<input type="text" name="user" placeholder="Useranme" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="pass" placeholder="Password"required><br>
<input type="submit" name="submit" value="Register">
</body>
</html> 
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// session_start();
// $svar=$_SESSION['user'];
// if($svar)
// {
//   echo "Please logout to access this page";
//   echo "<a href='Logout.php'><br>Logout</a>";
//   exit();
// }

// include ('Connection.php');
// include ('mail.php');
?>

<?php 
use rahul\PHP_Project\Connection;
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Registeruser extends Connection{
  public $hashh;
    public function insertion($id,$user,$email,$pass,$hashh)
{
    $p = md5($pass);
    $sql = $this->conn->prepare("insert into users (id,user, email, pass, hashh) values ('$id','$user','$email','$p','$hashh')");
    $r=$sql->execute();
   echo "New User Registered";  
}
}
  
  $r= new Registeruser();
  
  $hashh = rand(10,1000);
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $id=$_POST['id'];
      $user=$_POST['user'];
      $email=$_POST['email'];
      $pass=$_POST['pass'];
  $r->insertion($id,$user,$email,$pass,$hashh);
    class Email extends Registeruser{
    public function Emailfunction($email,$hashh){
    
    
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
    $mail->Password = 'Vrushali@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('rahul.deshmukh@qed42.com', 'Mailer');
    $mail->addAddress($_POST['email'], 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verification Mail For PHP Login';
    $mail->Body    = "Dear User, Please follow this link : http://localhost:8888/PHP_Project/verification.php?email=".$_POST['email']."&hashh=".$hashh;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
    }
}
  $e = new Email();
  $E = $e->Emailfunction($_POST['email'],$hashh);

  }
?>