<?php

/*  multidimensional array search by value, 2018-05-20
    Return: array()
*/
function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {
    $k = array_search($SearchValue, array_column($SearchArray, $SearchKey));
    if ($k) return $SearchArray[$k];
} // END OF -function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {-
/*
// e.g.
$CustArray = array(
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
//print_r($CustArray);
$Result = SearchArrayByValue($CustArray, 'name', 'Stefanie Mcmohn');
print_r($Result); exit;
*/


/*	multidimensional array sort by value, 2018-06-04
	Return: sorted array()
*/
function SortArrayByValue ($SortArray, $SortKey, $SortOrder='SORT_ASC') {
    // Obtain a list of columns
    foreach ($SortArray as $key => $row) {
        $Sort[$key] = $row[$SortKey];
    }
    if ( $SortOrder == 'SORT_ASC' ) {
    	array_multisort($Sort, SORT_ASC, $SortArray);
    } elseif ( $SortOrder == 'SORT_DESC' ) {
    	array_multisort($Sort, SORT_DESC, $SortArray);
    }
    return $SortArray;
} // END OF -function SortArrayByValue ($SortArray, $SortKey, $SortValue) {-
// $Result = SortArrayByValue($CustArray, 'name');

/* To diff between n-dimensional array, 2018-06-04
    Return: array1 that removed elements from array2
*/
function array_diff_values($array1, $array2) {
    $result = array();
    foreach($array1 as $values) if(! in_array($values, $array2)) $result[] = $values;
    return $result;
}
//$Result = array_diff_values($SourceArray, $diffArray);


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


/* convert string for MSSQL, 2018-07-27
    Return: add single quote ' before single quote '
*/
function ConvertString4MSSQL($str) {
    $result = str_replace("'", "''" , $str);
    return $result;
} // END OF -function ConvertString4MSSQL($str) {-

?>