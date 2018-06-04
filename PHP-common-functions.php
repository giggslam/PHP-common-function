<?php

/*  multidimensional array search by value, 2018-05-20
    Return: array()
*/
function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {
    $k = array_search($SearchValue, array_column($SearchArray, $SearchKey));
    if ($k) return $SearchArray[$k];
} // END OF -function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {-
// $Result = SearchArrayByValue($CustArray, 'ID', '001');


/*	multidimensional array sort by value, 2018-06-04
	$SortOrder='SORT_DESC'
	Return: sorted array()
*/
function SortArrayByValue ($SortArray, $SortKey, $SortOrder='SORT_ASC') {
    // Obtain a list of columns
    foreach ($SortArray as $key => $row) {
        $Sort[$key] = $row[$SortKey];
    }
    array_multisort($Sort, $SortOrder, $SortArray);
    return $SortArray;
} // END OF -function SortArrayByValue ($SortArray, $SortKey, $SortValue) {-
// $Result = SortArrayByValue($CustArray, 'name');



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

/*
$Result = SearchArrayByValue($userdb, 'uid', '40489');
if( empty($Result) ) {
    print "No result match";
} else {
    print_r($Result);
}
*/
print_r($userdb);

print_r(SortArrayByValue($userdb, 'name'));


?>