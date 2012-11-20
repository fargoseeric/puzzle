<?php 
$final_result = array();
$handle = @fopen("dict.txt", "r");
if ($handle) {
    while (($buffer_original = fgets($handle)) !== false) {
        
        $buffer = strtolower($buffer_original);
        //echo $buffer;
        //echo "<br>";
        $length = strlen($buffer);
        $buffer = str_replace("'","",$buffer);
        //echo $buffer;
        //echo "<br>";
        if($length > 6) {
        	$original = str_split(trim($buffer));
        	$sorted = str_split(trim($buffer));
        	sort($sorted);

        	$result = compareArray($original, $sorted);
			if($result){
				$final_result[] = $buffer_original;
        		//echo "<br>";
			}
        	
        }
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