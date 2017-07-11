<?php
/*
 * This part is a bit of a hack job.
 * Please don't hate me for it :D
 */
function list_issues_func(){
  $url = "https://api.github.com/repos/finlaydag33k/Wordpress-Theme/issues";
  // Hash the URL
	$cachetime = 300; // Cache expiry time in seconds
	$where = "cache"; // Directory for cache

  // Check if $where is a directory
	if ( ! is_dir($where)) {
		mkdir($where);
	}

	$hash = md5($url); // hash the url
	$file = "$where/$hash.cache"; // the complete cache location

	// check the bloody cache
	$mtime = 0;
	if (file_exists($file)) {
		$mtime = filemtime($file);
	}
	$filetimemod = $mtime + $cachetime;

	// if the renewal date is smaller than now, return true; else false (no need for update)
	if ($filetimemod < time()) {
		$ch = curl_init($url);
		curl_setopt_array($ch, array(
			CURLOPT_HEADER         => FALSE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_USERAGENT => "FinlayDaG33k Wordpress",
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_MAXREDIRS      => 5,
			CURLOPT_CONNECTTIMEOUT => 15,
			CURLOPT_TIMEOUT        => 30,
		));
		$data = curl_exec($ch);
		curl_close($ch);

		// save the file if there's data, or else, do nothing
		if ($data) {
			file_put_contents($file, $data); // save cache to file
		}
	} else {
		$data = file_get_contents($file); // load up the cached file
	}

  // We can now display the issues
  $issues = json_decode($data,true); // load the issues from JSON into an array

  // check if the amount of issues is bigger than 0
	if(count($issues) > 0){
    // more than 0 issues have been found!
		$issuesList = "<ul>";
    // loop through all issues
		foreach($issues as $issue => $value){
			$issuesList .= "<li><a href=\"".htmlentities($value['html_url'])."\" target=\"_blank\">#".htmlentities($value['number'])."</a>: ".htmlentities($value['title'])." (by ".htmlentities($value['user']['login']).")</li>"; // add the issue to the list
		}
		$issuesList .= "</ul>";
		return $issuesList; // return all issues
	}else{
    // No issues have been found
		return "No issues found! (whoop!)";
	}
}
add_shortcode( 'list_issues', 'list_issues_func' );
