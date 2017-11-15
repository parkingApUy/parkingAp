<?php

require_once "Mail.php";



    // Enter the email where you want to receive the message
    $emailTo = 'info@parkingap.com.uy';

    $clientEmail = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $message = addslashes(trim($_POST['message']));

    $array = array('emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');
	
	

    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if(isEmail($clientEmail) && $subject != '' && $message != '') {
        // Send email
	

	$headers = array(
    'From' => $clientEmail,
    'To' => $emailTo,
    'Subject' => $subject
	);
		
		
		//$headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
		//mail($emailTo, $subject . " (lancar)", $message, $headers);
		
		$smtp = Mail::factory('smtp', array(
        'host' => 'smtp.zoho.com',
        'port' => '465',
        'auth' => true,
        'username' => 'info@parkingap.com.uy',
        'password' => 'fabrizio1717'
    ));

$mail = $smtp->send($to, $headers, $message);



    echo json_encode($array);



}

?>
