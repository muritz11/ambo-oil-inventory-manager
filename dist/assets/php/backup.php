<?php

//ini_set("SMTP","ssl://smtp.gmail.com");
//ini_set("smtp_port","465");

$to = 'chisomm1198@gmail.com';

$subject = 'This is a test email';

$msg = 'Hello there. Thanks for testing!!!';

$headers = 'From: muritztech ';

mail($to, $subject, $msg, $headers);