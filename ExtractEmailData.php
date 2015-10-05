<?php

	require_once('VoucherDetails.php');
    
	function extractDataFromHtml($html){
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);
		$tables = $doc->getElementsByTagName('table');
		$nodes  = $xpath->query('.//tbody/tr/td', $tables->item(0));

		$voucherString = ''.$nodes->item(0)->nodeValue;
		$voucherString = trim($voucherString);
		$voucherNumber = substr($voucherString, strpos($voucherString, ":")+1);
		print('Voucher Number is '.$voucherNumber."\n");
		
		return new VoucherDetails($voucherNumber);
	}
		

	libxml_use_internal_errors(false);
	$link = "output.html";
	$html = file_get_contents($link);
	$voucherDetails = extractDataFromHtml($html);
	var_dump($voucherDetails);

?>