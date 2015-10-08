<?php

	require_once('VoucherDetails.php');
    
	function extractDataFromHtml($html){
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);
		$tables = $doc->getElementsByTagName('table');
		$nodes  = $xpath->query('.//tbody/tr/td', $tables)->$item[0];

		$voucherString = ''.$nodes->$item[0]->nodeValue;
		$voucherString = trim($voucherString);
		$voucherNumber = substr($voucherString, strpos($voucherString, ":")+1);
		print('Voucher Number is '.$voucherNumber."\n");
		//return new VoucherDetails($voucherNumber);


	/*$nodes  = $xpath->query('.//table[2]/tbody[1]/tr/td/table/tbody/table/tr[2]/td[2]', $tables)->$item[1];
	$nameString = ''.$nodes->$item[1]->nodeValue;
	$nameString = trim($nameString);
	$guestName = substr($nameString , strpos($nameString , ":")+1);
	print('Guest name is : '.$guestName."\n");
		


	$xpath->query('.//table[2]/tbody[1]/tr/td/table/tbody/table/tr[3]/td[2]', $tables)->$item[2];
	$bookingstring = ''.$nodes->$item[2]->nodeValue;
	$bookingDate = substr($bookingstring , strpos($bookingString,":")+1);
	print('Booking date is '.$bookingDate."\n");


	$xpath->query('.//table[2]/tbody[1]/tr/td/table/tbody/table/tr[4]/td[2]', $tables)->$item[3];
	$checkinstring = ''.$nodes->$item[2]->nodeValue;
	$checkinDate = substr($checkinstring , strpos($checkinString,":")+1);
	print('Checkin date is '.$checkinDate."\n");


	$xpath->query('.//table[2]/tbody[1]/tr/td/table/tbody/table/tr[5]/td[2]', $tables)->$item[4];
	$checkoutstring = ''.$nodes->$item[2]->nodeValue;
	$checkoutDate = substr($checkoutstring , strpos($checkoutString,":"));
	print('Checkout date is '.$checkoutDate."\n"); */

	}
		

	libxml_use_internal_errors(false);
	$link = "output.html";
	$html = file_get_contents($link);
	$voucherDetails = extractDataFromHtml($html);
	var_dump($voucherDetails);

?>