
<?php

   $to = 'firemuc@gmail.com';
   $subject = 'Hello from XAMPP!';
   $message = 'This is a Mailhog test';
   $headers = "From: klinc.urban97@gmail.com\r\n";

   if (mail($to, $subject, $message, $headers)) {
      echo "SUCCESS";
   } else {
      echo "ERROR";
}
?>