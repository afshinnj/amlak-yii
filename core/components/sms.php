<?php
namespace app\components;

class SMS {
	/**
	 * function send
	 * @param $recipientNumber 
	 * @param $msg
	 */	
	public static function Send($recipientNumber, $msg) {
		$USERNAME = "af6900"; 
		$PASSWORD = "654321"; 
		
		
		$message = urlencode($msg); // [FILL] the content of the message; (in url-encoded format !)
	
		// creating the url based on the information above
		$url = "http://www.payam-resan.com/APISend.aspx?" .
		"Username=" . $USERNAME . "&Password=" . $PASSWORD .
		"&From=" . "50002060384490" . "&To=" . $recipientNumber .
		"&Text=" . $message  ;
		// sending the request via http call
		$result = file_get_contents($url);
		// Now you can compare the response with 0 or 1
	}	

}

