
<?php
$to = "somebody@example.com";
$subject = "My subject";
$message = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

   if (mail($to, $subject, $message, $headers)) {
      echo "SUCCESS";
      echo $message;
   } else {
      echo "ERROR";
}