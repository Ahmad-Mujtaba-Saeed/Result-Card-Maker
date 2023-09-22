<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
#ubb
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function mmail($to ,$subject , $message ,$header){


   
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ahmadmujtabap72@gmail.com';
        $mail->Password = 'ubbiwkzfjfrtouvb';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ahmadmujtabap72@gmail.com');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;



        $mail->send();


        echo
            "
    <script>
    alert('sent Successfuly');
    document.location.href = 'index.php';
    </script>
    ";
    
}