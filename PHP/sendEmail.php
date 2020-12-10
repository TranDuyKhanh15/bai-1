<?php 

//adminer
$servername = "db";
$username = "root";
$password = "12345";
$dbname = "docker_db";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect){
  echo "Error No: ". mysqli_connect_error();
  echo "Error Description: " . mysqli_connect_error();
  exit;
}else{
  echo "connect mysql success!";
}


//sendEmail
use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";


$name = "khanh";
$listEmail = $_POST['emails'];
$subject = $_POST['subject'];
$body = "
    <div style='display: flex; justify-content: center;'>
      <div style='width: 500px; margin-top: 150px; display: flex; transform: rotate(-7deg); padding: 20px; border: 1px solid #BFBFBF; box-shadow: 10px 10px 5px #aaaaaa;'>
        <div style='width: 100%;'>
          <div style='text-align: center; font-size: 32px;'>
            My profile
          </div>
          <div style='padding-left: 20px; padding-top: 20px;'>
            Name: Tran Duy Khanh
          </div>
          <div style='padding-left: 20px; padding-top: 20px;'>
            Address: ...
          </div>
          <div style='padding-left: 20px; padding-top: 20px;'>
            Phone: ...
          </div>
        </div>
      </div>
    </div>
";

foreach($listEmail as $Email){

//adminer
  $sql = "INSERT INTO Email (name, email, subject) 
                    VALUES ('$name', '$Email', '$subject')";

  if (mysqli_query($connect,$sql)) {
    echo "success!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }
  echo "<p>danh sach email la $Email</p>";

  
// send email
  $mail = new PHPMailer();

  //smtp settings
  $mail->isSMTP();
  $mail->Host = "mailhog";
  $mail->SMTPAuth = true;
  $mail->Username = "";
  $mail->Password = '';
  $mail->Port = 1025;

  //email settings
  $mail->isHTML(true);
  $mail->setFrom("khanh@mal.com", $name);
  $mail->addAddress($Email);
  $mail->Subject = $subject;
  $mail->Body = $body;

  if($mail->send()){
      $status = "success";
      $response = "Email is sent!";
  }
  else
  {
      $status = "failed";
      $response = "Something is wrong: <br>" . $mail->ErrorInfo;
  }
}

?>
                           