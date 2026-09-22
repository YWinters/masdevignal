<?php
function getLocalizedStringForKey($key) {
	echo "test";
	if (isset($key))
	{
		include('database/connection.php');
		$lang = $_POST["lang"];

		echo "key: ".$key . " lang: ".$lang;
		if (strlen($lang)<=0)
			$lang = "nl";

		$query = "SELECT ".$lang." FROM translations where key like ".$key;
		echo $query;
    	$result = $conn->query($query);
    	if ($result = $conn->query($query)) {
    		while($row = $result->fetch_row()){
    			echo $row[$lang];
    		}
    	}
	}
}
?>