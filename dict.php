<?php 
$final_result = array();
$handle = @fopen("dict.txt", "r");
if ($handle) {
    while (($buffer_original = fgets($handle)) !== false) {
        
        $buffer = strtolower($buffer_original);
        //echo $buffer_original;
        //echo "<br>";

        $find_a = 'a';
		$pos_a = strpos($buffer, $find_a);
		$count = substr_count($buffer, $find_a);
		if ($pos_a !== false && $count == 1) {
			$vov_a = $pos_a;
		}
		//echo $vov_a;
        //echo "<br>";

		$find_e = 'e';
		$pos_e = strpos($buffer, $find_e);
		$count = substr_count($buffer, $find_e);
		if ($pos_e !== false && $count == 1) {
			$vov_e = $pos_e;
		}

		//echo $vov_e;
        //echo "<br>";
 
		$find_i = 'i';
		$pos_i = strpos($buffer, $find_i);
		$count = substr_count($buffer, $find_i);
		if ($pos_i !== false && $count == 1) {
			$vov_i = $pos_i;
		}

		//echo $vov_i;
        //echo "<br>";
 
		$find_o = 'o';
		$pos_o = strpos($buffer, $find_o);
		$count = substr_count($buffer, $find_o);
		if ($pos_o !== false && $count == 1) {
			$vov_o = $pos_o;
		}

		//echo $vov_o;
        //echo "<br>";
 
 		$find_u = 'u';
		$pos_u = strpos($buffer, $find_u);
		$count = substr_count($buffer, $find_u);
		if ($pos_u !== false && $count == 1) {
			$vov_u = $pos_u;
		}

		//echo $vov_u;
        //echo "<br>";

 		if(isset($vov_a) && isset($vov_e) && isset($vov_i) && isset($vov_o) && isset($vov_u)) {
			$check_array = array($vov_a, $vov_e, $vov_i, $vov_o, $vov_u);
			$original_array = array($vov_a, $vov_e, $vov_i, $vov_o, $vov_u);
			
			sort($check_array);
			//echo "<pre>"; 
			//print_r($check_array);
			//echo "<pre>"; 
			//print_r($original_array);

			$result = compareArray($check_array, $original_array);
			if($result){
				$final_result[] = $buffer_original;
        		//echo "<br>";
			}
			
		}
		unset($vov_a);
		unset($vov_e);
		unset($vov_i);
		unset($vov_o);
		unset($vov_u);
		//exit;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
    $output = array_unique($final_result);
    echo "<pre>"; 
    print_r($output);
    exit;
}

function compareArray ($array1, $array2)
{
  foreach ($array1 as $key => $value)
  {
    if ($array2[$key] != $value)
    {
      return false;
    }
  }

  return true;
}

?>