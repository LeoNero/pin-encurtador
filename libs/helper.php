<?php

function validateURL($url) {
	$regular_expression = "/^(http(s?):\/\/)?(www\.)?[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,4})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
	$result = preg_match($regular_expression, $url);

	if (! $result) {
		return false;
	} 

	return true;
}