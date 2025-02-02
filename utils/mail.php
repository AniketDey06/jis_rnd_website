<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    

    
    require '../phpMailer/PHPMailer.php';
    require '../phpMailer/SMTP.php';
    require '../phpMailer/Exception.php';

function sendMail(
    string $recipientEmail,
    string $recipientName,
    string $subject,
    string $body,


) {
   
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'sukdebdas991@gmail.com';                     //SMTP username
        $mail->Password = 'yhzl qudi uneo xauw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sukdebdas991@gmail.com', 'Registration');
        $mail->addAddress($recipientEmail, $recipientName);     //Add a recipient


        // echo $body;

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body =   $body;
        // $mail->AltBody = $body;

        $mail->send();

        $mail->clearAddresses();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}





?>