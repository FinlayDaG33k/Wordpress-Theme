<?php
function list_issues_func(){
	// Open a curl session
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://api.github.com/repos/finlaydag33k/Wordpress-Theme/issues");
	curl_setopt($ch, CURLOPT_USERAGENT, "FinlayDaG33k");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$issues = json_decode($result,true);

	if(count($issues) > 0){
		$issuesList = "<ul>";
		foreach($issues as $issue => $value){
			$issuesList .= "<li><a href=\"".htmlentities($value['html_url'])."\" target=\"_blank\">#".htmlentities($value['number'])."</a>: ".htmlentities($value['title'])." (by ".htmlentities($value['user']['login']).")</li>";
		}
		$issuesList .= "</ul>";
		return $issuesList;
	}else{
		return "No issues found! (whoop!)";
	}
}
add_shortcode( 'list_issues', 'list_issues_func' );
