<?php

$to      = 'rahul.deshmukh324.rdr@gmail.com'; // Send email to our user
           $subject = 'Signup | Verification'; // Give the email a subject
           $message = "hello
                      boy
                       ";
           $headers = 'From: rahul.deshmukh@qed42.com' . "\r\n"; // Set from headers
           mail($to, $subject, $message, $headers); // Send our email

?>