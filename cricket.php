<?php

$score = array(
//	1, 3, 5, 4, 2, 6, 7, 8, 9, 10, 11,
	2, 5, 1, 2, 4, 1, 6, 5, 2, 2, 1,
//	6,6,6,6,
	);
$players = 6;

sort($score);
$t = "-".$players;
$output = array_slice($score, $t);



function array_count_values_of($value, $array) {
    $counts = array_count_values($array);
    return $counts[$value];
}

$out = array_unique($output);

foreach($out as $op) {
	$r[] = array_count_values_of($op, $output);

	$n[] = array_count_values_of($op, $score);
}

$total_result = 1;
for($i = 0; $i < count($r); $i++){
	$result = ncr($n[$i], $r[$i]);
	$total_result = $result * $total_result;
}

echo $total_result;
exit;

function nCr($n, $k){
   if ($k > $n)
     return NaN;
   if (($n - $k) < $k)
     return nCr($n, ($n - $k));
   $return = 1;
   for ($i=0; $i<$k; $i++){
     $return *= ($n - $i) / ($i + 1);
   }
   return $return;
} 



//echo $result;

?>