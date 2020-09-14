<?php

   $to = 'klinc.urban97@gmail.com';
   $subject = 'Hello from XAMPP!';
   $message = 'This is a Mailhog test';
   $headers = "klinc.urban97@gmail.com\r\n";

   if (mail($to, $subject, $message, $headers)) {
      echo "SUCCESS";
   } else {
      echo "ERROR";
}