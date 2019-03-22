<?php

function checkIp($ip){
		$timeout=5; // maximum 5 secs 
	
		//init cURL 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

		curl_setopt($ch, CURLOPT_URL, "http://api.iptrooper.net/check/$ip");
		$resp=curl_exec($ch);
		
		curl_close($ch);
		// 1 is proxy, 0 is not proxy
		if ($resp == 0) 
				return false;
	  else 
				return true;
		
}

if (checkProxy($_SERVER['REMOTE_ADDR'])) {

	echo "this message is because the ip is detected like a Tor/vpn/Bad ip  <br />";
}

?>
