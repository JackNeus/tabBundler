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
	echo "<p id=\"enter\">Enter your URLs below</p>";
    echo "<ul id=\"urls\"><li><input placeholder=\"http://www.google.com\"></input></li></ul>";
    echo "<button id=\"new-url\">Add URL</button>";
	echo "<form action=\"tab.php\"><textarea id=\"hidden\" name=\"url\"></textarea>";
	echo "<button type=\"submit\" id=\"submit\">Bundle!</button></form>";
}

?>


</body>
</html>

<script type="text/javascript">
    var newURL = document.getElementById("new-url");
    newURL.addEventListener("click", function() {
        var urls = document.getElementById("urls");
        var li = document.createElement('li');
        li.innerHTML += "<input />";
        urls.appendChild(li);
    });
</script>

<script type="text/javascript">
    var bundle = document.getElementById("submit");
    bundle.addEventListener("click", function() {
        var urls = document.getElementById("urls");
        var hidden = document.getElementById("hidden");
        var children = urls.children;
        for (var i = 0; i < children.length; i++) {
            var tempURL = children[i].children[0].value;
            if (!(tempURL === "")) {
                if (i > 0 && hidden.innerHTML != "") {
                    hidden.innerHTML += ",";
                }
                hidden.innerHTML += tempURL;
            }
        }
    });
</script>
