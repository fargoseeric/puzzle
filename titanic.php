<?php

$inputs = array(5, 12, 17, 100);



foreach($inputs as $input) {
    //$input = 5;

    if($input <= 1000000000) {

        $input_array = array();
        for($i=1; $i<=$input; $i++){
            $input_array[$i] = $i; 
        } 
            
        if(count($input_array) > 1) {
            $result = removeOdd($input_array);
                   
            for($j = 0; $j < count($input_array); $j++){
                $result = removeOdd($result); 
                if(count($result) <= 1){
                    if($result[1]) {
                        echo $result[1];                    
                        echo "<br>";
                    }
                }
                        
            }
        
        } else {
            echo "confusion";
        }
        
        
    }
}

function removeOdd($input){

    foreach($input as $key => $value) {
        if($key&1) {
            unset($input[$key]);
        }
    } 
    
    $i = 1;
    foreach($input as $key => $val) {
        $result[$i] = $val;     
        $i++;
    }
    
    return($result);
}




?>
