<?php

/*  multidimensional array search by value, 2018-05-20
    Return: array()
*/
function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {
    $k = array_search($SearchValue, array_column($SearchArray, $SearchKey));
    if ($k) return $SearchArray[$k];
} // END OF -function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {-
// $Result = SearchArrayByValue($CustArray, 'ID', '001');

// e.g.
$userdb = array(
    array(
        'uid' => '100',
        'name' => 'Sandra Shush',
        'pic_square' => 'urlof100'
    ),
    array(
        'uid' => '5465',
        'name' => 'Stefanie Mcmohn',
        'pic_square' => 'urlof100'
    ),
    array(
        'uid' => '40489',
        'name' => 'Michael',
        'pic_square' => 'urlof40489'
    )
);

$Result = SearchArrayByValue($userdb, 'uid', '40489');
if( empty($Result) ) {
    print "No result match";
} else {
    print_r($Result);
}

?>