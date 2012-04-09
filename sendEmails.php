#!/bin/env php

<?php
    require_once('Mailer.php');

    // Message config
    $fromAddr    = '"Joe Bloggs" <joe@example.com>'; // OR simply 'joe@example.com'
    $subject     = 'An email about something';
    $message     = 'Guess what? I just sent you an email!'; //  OR file_get_contents('message.txt')
    $addGreeting = true; // Whether to add a 'Dear ...,' line to the top of the email
    $recipients  = array(
        'joe@example.com', // This will appear 'Dear Sir/Madam,' (if $addGreeting == true)
        'Joe' => 'joe@example.com', // This will appear 'Dear Joe,'
    );

    // Set the mailer going
    $mailer = new Mailer($message, $recipients, $subject, $fromAddr, $addGreeting);
    $mailer->sendAll();

