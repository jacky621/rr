<?php
### Use API : http://api.d1ka.me/airy/gen/ ( Created by Handika Pratama ) ###
### Script By : Ahyar Dwi S ###
### Thanks to SGB TEAM ###
class AiryExtrap {
	function __construct() {
		$this->api_url = "https://www.hackthebox.eu/api/invite/generate";
	}
	public function extrap() {
		return $this->request();
	}
	protected function request($postdata = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($postdata !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0');
        curL_setopt($ch, CURLOPT_TIMEOUT, 60);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
   }
}
function read ($length='255') 
{ 
   if (!isset ($GLOBALS['StdinPointer'])) 
   { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 

echo "_____.___.                   _________            .___      
\__  |   |____ ______________\_   ___ \  ____   __| _/____  
 /   |   \__  \\_  __ \___   /    \  \/ /  _ \ / __ |/ __ \ 
 \____   |/ __ \|  | \//    /\     \___(  <_> ) /_/ \  ___/ 
 / ______(____  /__|  /_____ \\______  /\____/\____ |\___  >
 \/           \/            \/       \/            \/    \/ \n";
echo "Airy Voucher Extrap\n";

echo "Jumlah Loop: ";
$loop = read();
$ahyar = new AiryExtrap();
for($i=1; $i<$loop+1; $i++) {
	$extrap = $ahyar->extrap();
	$resp = json_decode($extrap, true);

	if($resp['status'] == false) {
		echo "\033[91m$i. DIE => ".$resp['voucher']." \n";
	} else {
$fh = fopen("liveairy.txt", 'a');
       $txt = "".$resp['voucher']."\n";
fwrite($fh, $txt);
fclose($fh);
		echo "\033[92m$i. LIVE => ".$resp['voucher']." \n";		
	}
}