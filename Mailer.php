<?php
    class Mailer {
        private $recipients;
        private $message;
        private $subject;
        private $fromAddr;
        private $addGreeting;

        public function __construct($message, Array $recipients, $subject, $fromAddr, $addGreeting) {
            $this->message     = $message;
            $this->recipients  = $recipients;
            $this->subject     = $subject;
            $this->fromAddr    = $fromAddr;
            $this->addGreeting = $addGreeting;
        }

        public function sendAll($pauseEvery = 5) {
            $count = 1;
            foreach($this->recipients as $toName => $toAddr) {
                // Every 5 emails, wait for two seconds
                if(!empty($pauseEvery) && $count%$pauseEvery == 0) {
                    echo "Waiting for a second...\n";
                    sleep(1);
                }
                // Now send the email
                $this->sendEmail($toAddr, $toName);
                // Increment counter
                $count++;
            }
        }

        private function sendEmail($toAddr, $toName = null) {
            // Prepare name and subject
            $toName  = is_string($toName)  ? $toName  : 'Sir/Madam';
            
            // Set headers
            $headers = 'X-Mailer: php';
            if(isset($this->fromAddr)) { $headers .= "\r\n" . 'From: ' . $this->fromAddr; }

            // Compose body
            $body = $this->message;
            if($this->addGreeting) {
                $body = 'Dear ' . $toName . ",\r\n\r\n" . $body;
            }

            // Send the email
            if (mail($toAddr, $this->subject, $body, $headers)) {
                echo('Message sent to ' . $toName . ': ' . $toAddr . "\n");
            } else {
                echo('Failed to send message to ' . $toName . ': ' . $toAddr . "\n");
            }
        }
    }

