<?php
require_once('recaptchalib.php');
require('../../../../wp-blog-header.php');
global $root;
global $qode_options_infographer;

$publickey = $qode_options_infographer['recaptcha_public_key'];
$privatekey = $qode_options_infographer['recaptcha_private_key']; 

if ($publickey == "") $publickey = "6Lf1CeMSAAAAANl7S5nZt8XnLq0sJ9IthPYXeYi3";
if ($privatekey == "") $privatekey = "6Lf1CeMSAAAAAOaiM7K_WhPnaf0L1b2cGRen-wBx";



$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

//echo $_POST["recaptcha_challenge_field"] . " | " . $_POST["recaptcha_response_field"];
//print_r($resp);

$use_captcha = $qode_options_infographer['use_recaptcha'];
if ($resp->is_valid || $use_captcha == "no") {
?>success<?php

$email_to = $qode_options_infographer['receive_mail'];
$email_from = $qode_options_infographer['email_from'];
$subject = $qode_options_infographer['email_subject'];


$text = "Name: " . $_POST["name"] . "\n";
$text .= "Last Name: " . $_POST["lname"] . "\n";
$text .= "Email: " . $_POST["email"] . "\n";
$text .= "WebSite: " . $_POST["website"] . "\n";
$text .= "Message: " . $_POST["message"];


$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
$headers .= "From: $email_from" . "\r\n";
mail($email_to, $subject, $text, $headers);



}
else 
{
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .  "(reCAPTCHA said: " . $resp->error . ")");
}
 


?>