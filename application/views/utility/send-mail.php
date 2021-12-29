<?php 

if (isset($_POST['send_mail'])) {							
    $email = $_POST['email'];									
    $subject = $_POST['subject'];									
    $message = $_POST['message'];	
    if(isset($_POST['from'])){
        $from= $_POST['from'];

    }	else{        
        $from = "no-reply@fingertips.co.in"; //mail created in my hosting
    }							
    
}

ini_set('display_errors',1);
error_reporting( E_ALL );

// $to = $email; //receiver mail address
$to = 'cloudadmin@fingertips.co.in'; //receiver mail address

$subject = $subject; 
$message = $message;
// $headers = "From:" . $from;
$headers = "From: ". $from . "\r\n" .
"CC: ".$email;

if(mail($to,$subject,$message,$headers)){
    echo "Mail sent";
    ?>
    <script>
    window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
    </script>

    <?php
}else{
    echo "Mail not sent";
    ?>
    <script>
    window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
    </script>

    <?php
}



?>