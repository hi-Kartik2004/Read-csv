<?php
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function sendEmail($receiver, $receiver_name, $receiver_password, $membership_id)
{
    global $mail;
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
        echo "Something went wrong";
        exit();
        die();
    }

    // } else {
    //     header("location: ../?login");
    // }
    $my_path = "new.pdf";
    $subject = "IEEE Student Member Account Details";
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';        //gmail             //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $senderEmail;      //Gmail userid              //SMTP username
        $mail->Password   = $senderPassword;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($senderEmail, 'IEEE UVCE');
        // $mail->addAddress('kud', 'Joe User');     //Add a recipient
        $mail->addAddress($receiver);               //Name is optional
        // $mail->addBCC("mohithvarmavs@ieee.org", "Mohith");
        // $mail->addBCC("Kruthin@ieee.org", "Kruthin");
        // $mail->addBCC("kavyabhat@ieee.org", "Kavya");
        // $mail->addBCC("nilkantgunjote@ieee.org", "Nilkant");
        // $mail->addBCC("manjeshpatil18@ieee.org", "Manjesh Patil");
        // $mail->addBCC("bccaddress@ccdomain.com", "Some BCC Name");

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'] . '/email_sender/new.pdf');   //Optional name

        // $mail->AddAttachment("99091208_Subramani_Membership_card.pdf");
        // $mail->AddAttachment("99091208_Subramani_Payment_receipt.pdf");

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "Hello, " . $receiver_name . " <br> <br>

        Welcome to IEEE UVCE! <br> <br>
        
        Congratulations! Your IEEE account has been created. <br> <br>
        
        Thank you for joining IEEE UVCE, your account will be active till 31st December 2023. You can sign in to your account through www.ieee.org <br> <br>
        
        The SIGHT membership will be added as soon as possible when the membership limit is increased. <br> <br>
        
        You can use the following information to sign in. <br> <br>
        Email ID : " . $receiver . " <br>
        Password : " . $receiver_password . " <br> <br>
        
        Your IEEE Membership Number is: " . $membership_id . " <br> <br>
        
        Please note down your Membership number. It will be required to register for various events happening in college. <br> <br>
        
        The Payment Receipt and softcopy of the Membership Card for 2023 are attached to this email. Keep them safe for future reference. <br> <br>
        
        For any queries, contact: <br>
        Kishan ST- +91 97409 71256 <br>
        Chidambara Nadig- +91 94830 99572  <br>
        Lokesh Jaidev- +91 79759 84335 <br> <br>
    
    Best regards,

    <br>
    
    " . $senderName . " <br>
    Team IEEE UVCE <br>
    +91 " . $senderPhone;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


        if ($mail->send()) {
            // $mail->SMTPDebug  = 0;
            // $mail->send();
            echo '<div class="alert alert-warning alert-dismissible fade show" style ="text-align:center" role="alert">
            <strong>Message has been sent!</strong> to ' . $receiver . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            // echo 'Message has been sent to' . $receiver . " of " . $company;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    return 0;
}

// sendVerificationCode('kudlu2004@gmail.com');
