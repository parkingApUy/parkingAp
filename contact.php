<?php
if($_POST) {
echo "HOLA";
require_once "Mail.php";
$from = "Web Master <webmaster@example.com>";
$to = "Nobody <nobody@example.com>";
$subject = "Test email using PHP SMTP with SSL\r\n\r\n";
$body = "This is a test email message";
$host = "smtp.zoho.com";
$port = "465";
$username = "info@parkingap.com.uy";
$password = "fabrizio1717";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}
}
?>
