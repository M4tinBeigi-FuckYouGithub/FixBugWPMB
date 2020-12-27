<?php
/*
Author: Matin Beigi
Version: 1.0
*/

function ___fixbugwpmb($input) {
	$allow = false;
	$found = false;
	foreach (headers_list() as $header) {
		if (preg_match("/^content-type:\\s+(text\\/|application\\/((xhtml|atom|rss)\\+xml|xml))/i", $header)) {
			$allow = true;
		}

		if (preg_match("/^content-type:\\s+/i", $header)) {
			$found = true;
		}
	}
	
	
	if ($allow || !$found) {
		return preg_replace("/\\A\\s*/m", "", $input);
	} else {
		return $input;
	}
}

ob_start("___fixbugwpmb");
