<?php
function pretty_print($ugly_string) {

	if (strpos($ugly_string, "randRange(") !== false ) {
		//It should return something like "0, 10)"
		preg_match('/[a-zA-Z0-9_]+\((.*?)\)/', $ugly_string, $matches);
		$array = explode(", ", $matches[1]);
		echo "Random Number from ". $array[0] . " to " . $array[1];
	}
	if (strpos($ugly_string, "person(") !== false ) {
		//It should return something like "0, 10)"
		preg_match('/[a-zA-Z0-9_]+\((.*?)\)/', $ugly_string, $matches);
		echo "Random person name with seed ". $matches[1];
	}

}


?>