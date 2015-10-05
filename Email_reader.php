    <?php
    
     
    class Email_reader {
     
    	// imap server connection
    	public $conn;
     
    	// inbox storage and inbox message count
    	private $inbox;
    	private $msg_cnt;
     
    	// email login credentials
     	
        private $host   =  "imap.gmail.com";
    	private $user   = 'vistaramrooms@gmail.com';
    	private $pass   = 'vistaram@66669';
    	private $port   = '993'; 
        
	// connect to the server and get the inbox emails
    	function __construct() {
    		$this->connect();
    		$this->inbox();
    	}
     
    	// close the server connection
    	function close() {
    		$this->inbox = array();
    		$this->msg_cnt = 0;
     
    		imap_close($this->conn);
    	}
     
    	// open the server connection
    	// the imap_open function parameters will need to be changed for the particular server
    	// these are laid out to connect to a Dreamhost IMAP server
    	function connect() {
    		
		$this->conn = imap_open('{'.$this->host.':'.$this->port.'/imap/ssl}', $this->user, $this->pass);
    	}
     
    	// move the message to a new folder
    	function move($msg_index, $folder='INBOX.Processed') {
    		// move on server
    		imap_mail_move($this->conn, $msg_index, $folder);
    		imap_expunge($this->conn);
     
    		// re-read the inbox
    		$this->inbox();
    	}
     
    	// get a specific message (1 = first email, 2 = second email, etc.)
    	function get($msg_index=NULL) {
    		if (count($this->inbox) <= 0) {
    			return array();
    		}
    		elseif ( ! is_null($msg_index) && isset($this->inbox[$msg_index])) {
    			return $this->inbox[$msg_index];
    		}
     
    		return $this->inbox[0];
    	}
     
    	// read the inbox
    	function inbox() {
    		$this->msg_cnt = imap_num_msg($this->conn);
            	echo "Number of emails read = ".$this->msg_cnt."\n";
        
    		
		/*$in = array();
    		for($i = 1; $i <= $this->msg_cnt; $i++) {
    			$in[] = array(
    				'index'     => $i,
    				'header'    => imap_headerinfo($this->conn, $i),
    				'body'      => imap_body($this->conn, $i),
    				'structure' => imap_fetchstructure($this->conn, $i)
    			); */

	

        $output = '<table>';

        $output.='<tr><th>Subject</th><th>voucher</th><th>From</th><th>seen</th><th>type</th></tr>';

        $mails = imap_search($this->conn, 'FROM "hotelpartners@goibibo.com" SUBJECT "Confirm Hotel Booking"');

        //print_r($mails);

        for($i=0; $i<=sizeof($mails);$i++){
            
            $header = imap_fetch_overview($this->conn, $mails[$i], 0);
            $body = imap_fetchbody($this->conn,$mails[$i],1.1);
            
              
            $output.= '<tr>';
            $output.= '<td><span class="subject">'.$header[0]->subject.'</span> </td>';
            $output.= '<td><span class="from">'.$header[0]->from.'</span></td>';
            $output.= '<td><span class="voucher">'.$mails[0]->voucher.'</span></td>';
            $output.= '<td><span class="date">'.$header[0]->date.'</span></td>>';
            $output.= '<td><span class="toggler">'.($header[0]->seen ? 'read' : 'unread').'"></span></td>';
            $structure=imap_fetchstructure($this->conn,$mails[$i]);
            $output.= '<td><span class="type">'.$structure->type.'</span> </td>';
            $output.='</tr>';
            
        }
	 	/*for($i=1; $i<=$this->msg_cnt;$i++){
			
			$header = imap_fetch_overview($this->conn, $i, 0);
            $body = imap_fetchbody($this->conn,$mails[$i],1.1);
            
            if ($header[0]->from=="hotelpartners@goibibo.com")
            {
                $output.='<tr>';
            
    			$output.= '<td><span class="subject">'.$header[0]->subject.'</span> </td>';
    			$output.= '<td><span class="from">'.$header[0]->from.'</span></td>';
    			$output.= '<td><span class="date"> '.$header[0]->date.'</span></td>';
                $output.= '<td><span class="toggler '.($header[0]->seen ? 'read' : 'unread').'"></span></td>';
                $output.='</tr>';
            }
		}*/

        $output.='</table>';
		echo $output."\n";		


    	}
     
    }

    $reader = new Email_reader();


    
     
    ?>
