<?php 

$original = "isthebananaofthegreatfruitlikepapayabutfruitofbraziliansoftheworldisineastwestnorthsouththegreatindiasealikn";
$sort_arrays = array();
$len = strlen($original);
for($i=0; $i<=$len; $i++) {
	for($j=1; $j<=$len; $j++) {
		if($i != $j){
			$sub = substr($original, $i, $j);
			$sub_len = strlen($sub);
			if($sub_len > 1){			
				$cnt = substr_count($original, $sub);
				if($cnt > 1) {
					$sort_arrays[$sub] = $cnt;
					//echo $sub."-->".$cnt;//."--->".$sub_len;
					//echo "<br>";
				}
			}
		}
	}

}
$new_array = array();
foreach($sort_arrays as $key=>$val) {
	$key_len = strlen($key);
	$new_array[$key] = $key_len;
}


echo array_search(max(array_values($new_array)), $new_array) ." -->" . max(array_values($new_array));
exit;


?>