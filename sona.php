<?php
$input = array('1','3','2','4','9');

$initial_value[1] = $input[0];
$slot1 = $input[1];
$slot2 = $input[2];

$k = $input[3];

$last_year = $input[4];

$slot_1_val = calc_slot1($slot1, $initial_value, $last_year);

$slot_2_val = calc_slot2($slot2, $slot_1_val, $last_year);

$next = calc_next($k, $slot_2_val, $last_year);

function calc_slot1($slot1, $initial_value, $last_year) {
	$value = $initial_value[1];
	for($i = 1; $i <= $slot1; $i++) {
		$value = $value + 1;
		$initial_value[] = $value;
		if(isset($initial_value[$last_year])) {
			echo $initial_value[$last_year];
			exit;
		}
	}
	return $initial_value; 
}

function calc_slot2($slot2, $slot_1_val, $last_year) {
	$value = end($slot_1_val); 
	for($i = 1; $i <= $slot2; $i++) {
		$value = $value * 2;
		$slot_1_val[] = $value;
		if(isset($slot_1_val[$last_year])) {
			echo $slot_1_val[$last_year];
			exit;
		}
	}
	return $slot_1_val;
}

function calc_next($k, $slot_2_val, $last_year) {
	for($i = 1; $i <= $last_year; $i++) {
		$t_value = array_slice($slot_2_val, -$k);
		$value = array_product($t_value);
		$slot_2_val[] = $value;
		if(isset($slot_2_val[$last_year])) {
			$t = (double)$slot_2_val[$last_year];
			echo $t; 
			//echo  154618822656 % 100000007;
			exit;
		}	
	}
	
}


?>