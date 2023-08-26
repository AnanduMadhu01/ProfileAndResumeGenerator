
<?php
   require 'assets/PHPMailerAutoload.php';
   require 'assets/credintial.php';

   $mail = new PHPMailer;

   // $mail->SMTPDebug = 4;                               // Enable verbose debug output

   $mail->isSMTP();                                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                               // Enable SMTP authentication
   $mail->Username = EMAIL;                 // SMTP username
   $mail->Password =PASS;                           // SMTP password
   $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 587;                                    // TCP port to connect to

   // $mail->setFrom(EMAIL, 'Profile Generator GEC Idukki');
   // $mail->addAddress('anandhumadhu0001@gmail.com');              // Name is optional
   // $mail->addReplyTo(EMAIL);

   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
   // $mail->isHTML(true);                                  // Set email format to HTML
   // $mail->Subject = 'Registration details of Profile Generator';
   // $mail->Body    = '<h1>This is the HTML message</h1> body <b>in bold!</b>';
   // $mail->Body    = '<h1>Donot share your password</h1>Congratulations! You have successfully registered in Profile Generator GEC Idukki,
   //                   <br>Your Username is <b>username</b><br>Password is:<b>pass</b><br>Please note the login details for all further communication 
   //                   with us.';

   // if(!$mail->send()) {
   //    echo 'Message could not be sent.';
   //    echo 'Mailer Error: ' . $mail->ErrorInfo;
   // } else {
   //    echo 'Message has been sent';
   // }
?>