<?php 

function square($n){
	return $n*$n;
}

function summation($f, $l) {
	$fs = square($f); 
	$ls = square($l); 

	$val = ( $ls - $fs + $f + $l)/2;
	//(10² - 1² + 10 + 1)/2
	return $val;
}

function getseries($s, $e){
	$temp = array();
	for($i = $s; $i<=$e; $i++){
		$temp[] = $i;

	}
	return $temp;
}

$result = array();
for($s = 1; $s <= 50; $s++){
	for($e = 2; $e <= 50; $e++){
		if($s < $e){
			$temp = summation($s, $e);
			if($temp > 2 && $temp < 100 ) {
				$val = getseries($s, $e);
				$u = implode("+", $val);
				$result[$u] = $temp; 
			}
		}
	}
}
$new_array = array();
foreach($result as $val){
	echo $val. " = " . array_count_this_value($result, $val);  
	echo "<br>";
	//$new_array[array_count_this_value($result, $val)] = $val;  
}

function array_count_this_value($array, $value) { 
  $values=array_count_values($array); 
  return $values[$value]; 
} 
echo "<pre>"; 
print_r($result);
exit;
	
?>