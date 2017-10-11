<?php
//reCAPTCHA verify
function verify_captcha($SECRET){
	if($SECRET != ""){
		$URL = 'https://www.google.com/recaptcha/api/siteverify';
		$CLIENT_RESPONSE = $_POST['g-recaptcha-response'];
		$REMOTE_IP = $_SERVER['REMOTE_ADDR'];
		$QUERY = array('secret' => $SECRET , 'response' => $CLIENT_RESPONSE , 'remoteip' => $REMOTE_IP);

		$CONTENT = http_build_query($QUERY);
		$CONTENT_LENGTH = strlen($CONTENT);
		$HEADER = "Content-Type: application/x-www-form-urlencoded\r\nContent-Length: $CONTENT_LENGTH";
		$REQUEST = array('http' => array('method' => 'POST' , 'header' => $HEADER , 'content' => $CONTENT));
		$RESPONSE = json_decode(file_get_contents($URL , false , stream_context_create($REQUEST)) , TRUE);

		return $RESPONSE['success'];
	}else{
		return false;
	}
}
?>
