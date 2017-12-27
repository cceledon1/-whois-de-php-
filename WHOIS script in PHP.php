<?php

if(isset($_POST['domain'])){ 
$domainname = $_POST['domain'];
$server = "whois.crsnic.net";
$port=43;

if(($whoisinfo = fsockopen($server,$port)) == true)
	{
		$output = "";
		fputs($whoisinfo,"$domainname\r\n");
		while(!feof($whoisinfo)) 
			$output .= fgets($whoisinfo,128); 
		fclose($whoisinfo);
	}
}
?>
<html>
<head>
<title>   DOB   </title>

<meta name="keywords" content="whois,lookup,domain">
</head>
<body>
<div class="container">

<br>
<hr>
<br>

<form action="" method="post">
<div id="lookup_form">
<input type="text" name="domain" value="">
<select name="extension">
<option value=""></option>
</select>
<input type="submit" value="Perform lookup">
</div>
</form>
<?php 	if(isset($output)){ echo "<pre>" . $output . "</pre>"; } ?>

</div>
</body>
</html>