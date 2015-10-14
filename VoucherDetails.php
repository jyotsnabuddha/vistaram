<?php 

	class VoucherDetails{
		
		private $voucherNumber;
		private $guestName;
		private $bookingDate;
		private $checkinDate;
		private $checkoutDate;
		private $bankAccount;
		private $ifscNum;
		private $numNights;
		private $ratePerRoom;
		private $rate;
		//add all others;
		
		function __construct($vNumber, $gName, $bDate, $cinDate, $coutDate ,$accNum,$ifscNumber,$nightsNum,$roomRate,$totalRate) {
			$this->voucherNumber = $vNumber;
			$this->guestName = $gName;
			$this->bookingDate = $bDate;
			$this->checkinDate = $cinDate;
			$this->checkoutDate = $coutDate;
			$this->bankAccount = $accNum;
			$this->ifscNum = $ifscNumber;
			$this->numNights = $nightsNum;
			$this->ratePerRoom = $roomRate;
			$this->rate = $totalRate;
		}

		

		
	}

?>