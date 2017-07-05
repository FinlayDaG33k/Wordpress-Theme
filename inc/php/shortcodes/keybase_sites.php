<?php
function keybase_sites_func($atts, $content = null){
	$kburl = "https://keybase.io/_/api/1.0/user/lookup.json?usernames=";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $kburl . $content);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$data = json_decode(curl_exec($ch),1);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	$sites = $data['them'][0]['proofs_summary']['by_proof_type']['generic_web_site'];

	$return = "";
	if(count($sites) > 0){
		$return .= "<ul>";
		foreach($sites as $site => $val){
			$return .= "<li><a href=\"".$val['service_url']."\" target=\"_blank\">".$val['service_url']."</a> (<a href=\"".$val['proof_url']."\" target=\"_blank\">Proof</a>)</li>";
		}
		$return .= "</ul>";

		return $return;
	}else{
		return;
	}
}
add_shortcode( 'keybase_sites', 'keybase_sites_func' );
