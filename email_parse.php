 

 <?php

 include "testmail.php" ;

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'vistaramrooms@gmail.com';
$password = 'vistaram@66669';
 
// Initial connection to the inbox
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
 
// Grabs any e-mail that is not read
$emails = imap_search($inbox,'FROM "hotelpartners@goibibo.com" SUBJECT "Confirm Hotel Booking" ');
 
if($emails) {
	
	//'<th>'"booking no."'</th>'
   foreach($emails as $email_number) {
    $message = imap_fetchbody($inbox,$email_number,1.1);
    if ($message == "") { // no attachments is the usual cause of this
        $message = imap_fetchbody($inbox, $email_number, 1);
        extractDataFromHtmltest($message);
        echo " \n";
        echo " \n";
        echo " \n";
        echo " \n";
        echo " \n";

    }
   //print '<div>'; 

    //print($message);
  
       //'<td>' $x = $message.getElementsByTagName("u")[0].getAttribute("Booking ID/Voucher No")'</td>'; 
	
 	//print '</div>';
 	
   }// end foreach loop
} // end if($emails)
?>