<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $messagecontent ="Name = ". $fullName . "<br>Email = " . $email . "<br>Message =" . $comment;

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    try{
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Username = 'luisvillala8@gmail.com';
        $mail->Password = 'Monta404';
        $mail->Port = 587;
        
        $mail->isHTML(true);
        $mail->setFrom('luisvillala8@gmail.com', 'Mailer');
        $mail->addAddress('montassar.hizem@esprit.tn');

        $mail->Subject = 'Portfolio Job Offer';
        $mail->Body    = $messagecontent;

        $mail->send();
        echo 'Message has been sent';
    }
    catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }

    // $to = 'montassar.hizem@esprit.tn';
    // $subject = 'Job Proposal';
    // $from = $email;

    // $headers  = 'MIME-Version: 1.0' . "\r\n";
    // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // $headers .= 'From: '.$from."\r\n".
    // 'Reply-To: '.$from."\r\n" .
    // 'X-Mailer: PHP/' . phpversion();

    // $message = '<html><body>';
    // $message .= '<h1 style="color:#f40;">Hi Montassar!</h1>';
    // $message .= '<p style="color:#080;font-size:18px;">'.$comment.'</p>';
    // $message .= '</body></html>';

    // if(mail($to, $subject, $message, $headers)){
    //     echo 'Your mail has been sent successfully.';
    // } else{
    //     echo 'Unable to send email. Please try again.';
    // }
?>