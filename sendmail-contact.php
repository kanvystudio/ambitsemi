<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  // Multiple recipients
  $to = 'info@ambitsemi.com';


  $name = $_POST['form_name'];
  $email = $_POST['form_email'];
  $sub = $_POST['form_sub'];
  $phone = $_POST['form_phone'];
  $message = $_POST['form_message'];

  $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';


  $name = isset($name) ? "Name: $name<br><br>" : '';
  $email = isset($email) ? "Email: $email<br><br>" : '';
  $sub = isset($sub) ? "Subject: $sub<br><br>" : '';  
  $phone = isset($phone) ? "Phone: $phone<br><br>" : '';
  $message = isset($message) ? "Message: $message<br><br>" : '';
  $subject = isset($subject) ? $subject : 'New Message | Contact Form';

  // Message
  $message = "$name $email $sub $phone $message $referrer";

  // To send HTML mail, the Content-type header must be set
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';


  // Mail it
  mail($to, $subject, $message, implode("\r\n", $headers));
  
  header("Location:https://www.ambitsemi.com/contact.html?message=We have successfully received your Message and will get Back to you as soon as possible.");
  
  
  
  
}
?>