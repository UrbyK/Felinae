
<?php
$to = "somebody@example.com";
$subject = "My subject";
$message = "Hello world!";
$headers = "From: firemuc@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";

   if (mail($to, $subject, $message, $headers)) {
      echo "SUCCESS";
      echo $message;
   } else {
      echo "ERROR";
}