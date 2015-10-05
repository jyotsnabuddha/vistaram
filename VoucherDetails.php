<?php 

	class VoucherDetails{
		
		private $voucherNumber;
		private $guestName;
		private $bookingDate;
		private $checkinDate;
		private $checkoutDate;
		//add all others;
		
		function __construct($vNumber, $gName, $bDate, $cinDate, $coutDate) {
			$this->voucherNumber = $vNumber;
			$this->guestName = $gName;
			$this->bookingDate = $bDate;
			$this->checkinDate = $cinDate;
			$this->checkoutDate = $coutDate;
		}
		
	}

?>