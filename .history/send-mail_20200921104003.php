<?php
$to_email = "email1@localhost";
$subject = "Aktivacija računa";
$body = '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Test mail</title>
  <style>
    .wrapper {
      padding: 20px;
      color: #444;
      font-size: 1.3em;
    }
    a {
      background: #592f80;
      text-decoration: none;
      padding: 8px 15px;
      border-radius: 5px;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
    <a href="http://localhost/felinae/index.php?page=verify&token=' . $token . '">Verify Email!</a>
  </div>
</body>

</html>';
$headers = "From: sender\'s email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}