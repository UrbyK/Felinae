<?php
    function send_email($to_email, $token){
        
        
        $subject = "Aktivacija računa";
        $body = '
            <!DOCTYPE html>
            
            <html>

                <head>
                    <title>Email validacija</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    
                <style tyoe="text/css">
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

            </html>
        ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
        // More headers
        $headers .= 'From: <no-reply@felinae.com>' . "\r\n";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }
    }