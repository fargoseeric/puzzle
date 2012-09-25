<?php 
// eric
// pls add the values of $x as 'amount to be withdrawn' and $y as 'available balance'
/// input ////////
$x = 30;
$y = 120;
$bank_charges = 0.5;

/////////////////////


function check_validity($t) {
    if($t < 1 || $t > 2000 ) {
        return $t." is not valid";
    } 
}

function check_multiple_of_five($t) {
    $multiple_of_five = $t % 5;    
    if($multiple_of_five != 0) {
        return true;
    }
}

function check_if_charges_extra($x, $y, $bank_charges) {
    if(($x + $bank_charges) > $y) {
        return true;
    }
}

function calculate_op($x, $y, $bank_charges) {
    $output = $y - $x - $bank_charges;
    return $output;
}
 

if(check_validity($x)) {
    echo check_validity($x);
    exit;
}

if(check_validity($y)) {
    echo check_validity($y);
    exit;
}

if(check_multiple_of_five($x)) {
    echo "Balance :". $y;
    exit;
}


if(check_if_charges_extra($x, $y, $bank_charges)) {
    echo "Balance :". $y;
    exit;
}

echo "Remaining Balance : " . calculate_op($x, $y, $bank_charges);

exit;




?>
