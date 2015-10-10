<?php

	require_once('VoucherDetails.php');
    
	function extractDataFromHtml($html){
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);

		//Extract voucher number
		$tables = $doc->getElementsByTagName('table');
		$nodes  = $xpath->query('.//tbody/tr/td', $tables->item(0));
		$voucherString = ''.$nodes->item(0)->nodeValue;
		$voucherString = trim($voucherString);
		$voucherNumber = substr($voucherString, strpos($voucherString, ":")+1);
		print('Voucher Number is '.$voucherNumber."\n");
		
		//Extract voucher details
			
		$body = $doc->getElementsByTagName('body');
		$i = 1;
		$details = array();
		while(true){
			$nodes = $xpath->query('//body/table[3]/*/*/td/table/tbody/tr/td/table/tr['.$i.']/td[1]', $doc);
			if($nodes->length == 0) break;
			$key = trim($nodes->item(0)->nodeValue);
			//echo  "\n\nkey : ".$key."\n\n";
			$nodes = $xpath->query('//body/table[3]/*/*/td/table/tbody/tr/td/table/tr['.$i.']/td[2]', $doc);
			$value= trim($nodes->item(0)->nodeValue);
			//echo  "\n\nvalue : ".$value."\n\n";
			$details[$key] = $value;
			$i++;
		} 

		//Extract Bank payment details
		$j= 1;
		$bank = array();
		while(true){

		$nodes=$xpath->query('//body/table[5]/*/*/*/table/*/*/*/table/tr['.$j.']/td[1]', $doc);
		if($nodes->length == 0) break;
		$key = trim($nodes->item(0)->nodeValue);

		$nodes=$xpath->query('//body/table[5]/*/*/*/table/*/*/*/table/tr['.$j.']/td[2]', $doc);
		$value= trim($nodes->item(0)->nodeValue);
		$bank[$key]=$value;
		$j++;

	}

		//Extract Tariff Applicable
		
		$k= 2;
		$tariff = array();
		while(true){
			$nodes=$xpath->query('//body/table[7]/*/*/*/table/tbody/*/*/table/thead/tr/td['.$k.']',$doc);
			if($nodes->length == 0) break;
			$key = trim($nodes->item(0)->nodeValue);

			$nodes=$xpath->query('//body/table[7]/*/*/*/table/tbody/*/*/table/tbody/tr/td['.$k.']',$doc);
			$value = trim($nodes->item(0)->nodeValue);
			$tariff[$key]= $value;
			$k++;


		}


		
		//Extract Summary
		
		var_dump($details);
		return new VoucherDetails($voucherNumber,  $details["name of guest"] , $details["booking date"] , $details["checkin date"] ,$details["checkout date"] , $bank["Account No."] , $bank["IFSC No."],$tariff["#nights"],$tariff["rate per room"], $tariff["room rate"]);
	}
		

	libxml_use_internal_errors(false);
	$link = "output.html";
	$html = file_get_contents($link);
	$voucherDetails = extractDataFromHtml($html);
	var_dump($voucherDetails);

?>
