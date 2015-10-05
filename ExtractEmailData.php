<?php

	
    
	function extractDataFromHtml($html){
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);
		$tables = $doc->getElementsByTagName('table');
		$nodes  = $xpath->query('.//tbody/tr/td', $tables->item(0));
		//print_r($nodes);
		//var_dump($nodes->item(0)->nodeValue.trim());
		$voucherString = ''.$nodes->item(0)->nodeValue;
		$voucherString = trim($voucherString);
		$voucherNumber = substr($voucherString, strpos($voucherString, ":")+1);
		print('Voucher Number is '.$voucherNumber." done");
		
	}
		
		/*libxml_use_internal_errors(false);
	$link = "sample.html";
	$html = file_get_contents($link);
	extractDataFromHtml($html); */
?>