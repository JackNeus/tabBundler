<html>
<head>
	<title>
		Tab Bundler
	</title>
</head>
<body>

<?php
if(array_key_exists("data", $_REQUEST)){
	$data = base64_decode($_REQUEST["data"]);
	$urls = explode(",", $data);
	$flag = count($urls);
	echo $flag;
	foreach($urls as $url){
		echo $url;
		echo "<br>";
		if($flag > 1){
			echo "<script type=\"text/javascript\">window.open('".$url."','_blank');</script>";
			$flag -= 1;
		}
		else{
			echo "<script type=\"text/javascript\">window.location.href='".$url."';</script>";
		}
	}
	echo $flag;
	//echo "<script type=\"text/javascript\">window.open('', '_self', '');window.close();</script>";
}
else if(array_key_exists("url", $_REQUEST)){
	$data = base64_encode($_REQUEST["url"]);
	header("Location: tab.php?data=" . $data);
}
else{
	echo "Enter a comma separated list of URLS:<br>";
	echo "<form action=\"tab.php\"><textarea name=\"url\"></textarea><br>";
	echo "<button type=\"submit\">Bundle!</button></form>";
}

?>

</body>
</html>