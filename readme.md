PHP Mailer
===

This is a simple PHP class for sending emails individually to multiple recipients in PHP.

The Mailer class can also add the greeting for you, in the form "Dear [Name]".

To use it simply edit sendEmails.php - it's pretty self explanatory:

```php
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
```

Then to actually send the email just run the following from a command prompt:

```
./sendEmails.php
```

The script will output its progress to the command prompt (or whatever STDOUT defaults to).

