<html>
<head>
	<title>Tab Bundler</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

<?php
if(array_key_exists("data", $_REQUEST)){
	$data = base64_decode($_REQUEST["data"]);
	$data = str_replace("\n", "", $data);
	$data = str_replace("\r", "", $data);
	$data = str_replace(" ", "", $data);
	$urls = explode(",", $data);
	$flag = count($urls);
	//$flag = 1
	echo "Loading...";
	foreach($urls as $url){
		if($flag > 1){
			$script = "<script type=\"text/javascript\">window.open('".$url."','_blank');</script>";
			echo $script;
			$flag -= 1;
		}
		else{ //because we can't close tab bundler
			$script = "<script type=\"text/javascript\">window.location.href=\"".$url."\";</script>";
			echo $script;
		}
	}
}
else if(array_key_exists("url", $_REQUEST)){
	$data = base64_encode($_REQUEST["url"]);
	$urlprefix = "http://localhost/tabBundler/";
	$url = "tab.php?data=".$data;			
	echo "Your tabBundler link: ";
	echo "<a href=\"".$url."\">".$urlprefix.$url."<a>";
}
else{
    echo "<h1 class=\"title\">TabBundler</h1>";
	echo "Enter a comma separated list of URLS:<br>";
	echo "<form action=\"tab.php\"><textarea class=\"hidden\" name=\"url\"></textarea><br>";
    echo "<ul class=\"urls\"><li><input></input></li></ul>";
    echo "<button class=\"new-url\">Add URL</button>";
	echo "<button type=\"submit\">Bundle!</button></form>";
}

?>

</body>
</html>

<script type="text/javascript">

</script>
