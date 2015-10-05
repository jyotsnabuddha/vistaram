<?php
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'replies@lewiscreekbuilders.com';
$password = '6aDr#qE=';
 
// Initial connection to the inbox
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
 
// Grabs any e-mail that is not read
$emails = imap_search($inbox,'UNSEEN');
 
if($emails) {
   foreach($emails as $email_number) {
    $message = imap_fetchbody($inbox,$email_number,1.1);
    if ($message == "") { // no attachments is the usual cause of this
        $message = imap_fetchbody($inbox, $email_number, 1);
    }
                 
    print_r($message);
 
   }// end foreach loop
} // end if($emails)
?>