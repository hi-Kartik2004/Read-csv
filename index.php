<?php
require_once('php/send_code.php');
session_start();

// Sending email
if ((isset($_SESSION['senderName']) || isset($_SESSION['senderName2'])) && isset($_POST['email'])  && isset($_SESSION['senderPassword'])  && isset($_SESSION['senderPhone'])  && isset($_SESSION['senderEmail'])) {
    // echo "Sent";

    $receiver = $_POST['email'];

    $company = $_POST['receiver_name'];

    $company = $_POST['receiver_name'];


    $receiver_password = $_POST['receiver_password'];
    $membership_id = $_POST['membership_id'];
    // echo $receiver;
    sendEmail();
}

// Customization
if (isset($_POST['senderName']) && isset($_POST['senderPassword'])) {
    $_SESSION['senderName'] = $_POST['senderName'];
    $_SESSION['senderPassword'] = $_POST['senderPassword'];
    $_SESSION['senderPhone'] = $_POST['senderPhone'];
    $_SESSION['senderEmail'] = $_POST['senderEmail'];
    // print_r($_SESSION);

    // header("location: ?auth=1");
}

if (isset($_POST['senderName2']) && $_POST['senderPhone2']) {
    $_SESSION['senderName'] = $_POST['senderName2'];
    $_SESSION['senderPhone'] = $_POST['senderPhone2'];
    $_SESSION['senderEmail'] = "hi.kartikeyasaini@gmail.com";
    $_SESSION['senderPassword'] = "qsltdfvabtpbvnqb"; //default password
    //$_SESSION['senderEmail'] = "hi.kartikeyasaini@gmail.com"; // default sender email
}



//logout
if (isset($_GET['logout'])) {
    unset($_SESSION);
    session_destroy();
    header("location: ./");
}

//setting up defaults
// if (isset($_GET['auth']) && $_GET['auth'] == 0) {
//     $_SESSION['senderName'] =  "Kartikeya Saini";  // default name to be displayed in the email.
//     $_SESSION['senderPhone'] =   "63600 06359";   // default phone number to be displayed in the email.
//     $_SESSION['senderPassword'] = "qsltdfvabtpbvnqb"; //default password
//     $_SESSION['senderEmail'] = "hi.kartikeyasaini@gmail.com"; // default sender email
// }


// Banner
if (isset($_SESSION['senderEmail']) == "hi.kartikeyasaini@gmail.com") {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="text-align:center"role="alert">
            <strong>You are using Kartikeya' . "'s Email id" . '!</strong> so ' . "you will not be able to receive replies! but your name is " . $_SESSION['senderName']  . "
          </div>";
} else if (isset($_SESSION['senderName'])) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="text-align:center"role="alert">
    <strong>You are using ' . $_SESSION['senderName'] . "'s Email id" . '!</strong> ' . "you will be able to receive replies in your inbox!" . '
  </div>';
}

include('pages/header.php');
if (isset($_SESSION['csv_data']) && isset($_SESSION['email_index'])) {
    include('pages/customise.php');
} else if ((!isset($_SESSION['csv_data']) || !isset($_SESSION['email_index'])) && isset($_SESSION['senderName']) && isset($_SESSION['senderPhone'])  && isset($_SESSION['senderEmail'])  && isset($_SESSION['senderPassword'])) {
    // echo $_SESSION['senderEmail'];
    include('pages/input.php');
} else {
    include('pages/login.php');
}

include('pages/footer.php');
