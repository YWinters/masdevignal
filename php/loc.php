<?php
if (isset($key))
{
	include('database/connection.php');

	$key 
	$lang = $_POST["lang"];

	echo "key: ".$key . " lang: ".$lang;
	if (strlen($lang)<=0)
		$lang = "nl";

	$query = "SELECT ".$lang." FROM reserveringen where key like ".$key;

    $result = $conn->query($query);
    if ($result = $conn->query($query)) {
    	while($row = $result->fetch_row()){
    		echo $row[$lang];
    	}
    }
}
?>