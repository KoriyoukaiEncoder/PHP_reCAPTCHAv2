<?php

require_once("./captcha.php");

$result = verify_captcha("ここにシークレットキー");

if($result == false){
	echo "あなたはロボットです";
}else if($result == true){
	echo "あなたはロボットではありません";
}

?>
