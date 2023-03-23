<?php
// error_reporting(0);
session_start();

if (isset($_SESSION['csv_data'])) {
    print_r($_SESSION['csv_data']);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function sendEmail($subject = "IEEE UVCE")
{
    global $mail;
    $sent_count = 0;
    // $code = rand(1000,9999);\
    $mail->SMTPDebug = false;
    // $companyName = $company;
    // if (isset($_SESSION['name']) && isset($_SESSION['phone'])) {
    if (isset($_SESSION['senderName'])  && isset($_SESSION['senderPhone'])  && isset($_SESSION['senderEmail'])  && isset($_SESSION['senderPassword'])) {
        $senderName = $_SESSION['senderName'];    // Your name to be displayed in the email.
        $senderPhone = $_SESSION['senderPhone'];       // Your phone number to be displayed in the email.
        $senderPassword = $_SESSION['senderPassword'];
        $senderEmail = $_SESSION['senderEmail'];
        //$receiver_name = $_SESSION['receiver_name'];
    } else {
        // echo "Something went wrong";
        // exit();
        // die();
    }

    if (isset($_POST['send'])) {
        if (isset($_SESSION['csv_data'])) {
            $data = $_SESSION['csv_data'];
        } else {
            die("No data found");
            exit();
        }
        $template = $_POST['template'];
        // print_r($_SESSION['csv_data']);

        $count = count($data);
        // echo $count;
        // echo $template;
        // echo strlen($template);

        $break_points = array();
        for ($i = 0; $i < $count; $i++) {
            $mail = new PHPMailer(true);
            $mail->SMTPSecure = 'ssl';
            $str = "";
            for ($j = 0; $j < strlen($template); $j++) {
                if ($template[$j] == '$') {
                    // $str =  $str . $template[$j];
                    $str  =  $str . ($data[$i][$template[$j + 1]]);
                    $flag = 1;
                    // array_push($break_points, $j + 1);
                } else {
                    if (isset($flag) && $flag) {
                        $flag = 0;
                    } else {
                        $str = $str . $template[$j];
                    }
                }
            }
            echo $str;


            $subject = $subject;
            try {

                //include_once('class.phpmailer.php');
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                // require 'class.phpmailer.php'; // path to the PHPMailer class
                //require 'class.smtp.php';
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';        //gmail             //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = "";      //Gmail userid              //SMTP username
                $mail->Password   = "";                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($senderEmail, 'IEEE UVCE');

                $mail->addAddress($data[$i][$_SESSION['email_index']]);
                echo $data[$i][$_SESSION['email_index']];
                // $mail->AddAttachment("99091208_Subramani_Membership_card.pdf");
                // $mail->AddAttachment("99091208_Subramani_Payment_receipt.pdf");

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $str;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


                if ($mail->send()) {
                    echo "Sent";
                    // $mail->SMTPDebug  = 0;
                    $sent_count++;
                    // echo 'Message has been sent to' . $receiver . " of " . $company;
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    header("location: csv.php");
}

// if ($sent_count == $count) {
//     echo '<div class="alert alert-warning alert-dismissible fade show" style ="text-align:center" role="alert">
//     <strong>Message has been sent!</strong> to ' . $receiver . '
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// } else {
//     echo "Some mails have been missed check the csv file";
// }
return 0;
//sendVerificationCode('kudlu2004@gmail.com');
