<?php 
	
	function isPrime($number)
	{
        if ($number < 2) {
            return false;
        }
        for ($i=2; $i<=($number / 2); $i++) {
            if($number % $i == 0) { 
                    return false;
            }
	    }
        return true;
	}


function calculate($n){	
	for($j=1; $j<=1000; $j++) {
		$i = $j;
		$count = 1;
		$total = 0;
		$result = array();
		while($count <= $n) {
			$isP = isPrime($i);
			if($isP){
				$result[$count] = $i;
				//echo $count."--".$i;
				$total = $total + $i;
				//echo "<br>";
				$count++;
			}
			$i++;	
			
		}	
		$isTotalPrime = isPrime($total);
		if($isTotalPrime){
			return $total;
			break;
		}

	}
}

function calc41($original,$n) {
	for($j=1; $j<=1000; $j++) {
		$i = $j;
		$count = 1;
		$total = 0;
		$result = array();
		while($count <= $n) {
			$isP = isPrime($i);
			if($isP){
				$result[$count] = $i;
				//echo $count."--".$i;
				$total = $total + $i;
				//echo "<br>";
				$count++;
			}
			$i++;	
			
		}	
		$isTotalPrime = isPrime($total);
		if($isTotalPrime && $total == $original){
			return $total;
			break;
		}

	}
}

$first541 = calculate(541);
echo $first541;

exit;
?>