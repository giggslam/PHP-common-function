<?php

/*	Remove Hyperlink from html entities, 2018-07-31
	e.g. HtmlExtractHyperlink("test<a href="https://www.google.com/">Text</a>123");

    test 123
*/
function HtmlRemoveHyperlink ($html) {
	$pattern = '/(<a href.*\/a>)/';
	return preg_replace($pattern, '', $html);
} // END OF -function HtmlRemoveHyperlink ($html) {-
/*
$string = 'PHPZAG PHP <a href="https://www.phpzag.com/">TUTORIALS</a> AND ARTICLES.';
$b = HtmlRemoveHyperlink($string);
print($b); exit;
*/

/*	Extract Hyperlink from html entities, 2018-07-31
    e.g. HtmlExtractHyperlink("test<a href="https://www.google.com/">Text</a>123");

    Array ( [Name] => Text [URL] => "https://www.google.com/" )
*/
function HtmlExtractHyperlink ($html) {
	$pattern = '/<a href=(.*)>([^>]*)<\/a>/';

	preg_match($pattern, $html, $matches);

	return array('Name'=>$matches[2], 'URL'=>$matches[1]);
} // END OF -function HtmlExtractHyperlink ($html) {-
/*
// e.g.
$string = 'PHPZAG PHP <a href="https://www.google.com/">Text</a> AND ARTICLES.';
$Link = HtmlExtractHyperlink($string);
print_r($Link); exit;
*/

/*  multidimensional array search by value, 2018-07-30
    Return: array()
*/
function SearchArrayByValue ($SearchArray, $SearchKey, $SearchValue) {
    $k = array_search($SearchValue, array_column($SearchArray, $SearchKey));
    if ( !($k === false) ) { // prevent index $k = 0 issue
        return $SearchArray[$k];
    } else {
        return NULL;
    }
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



/*	Extract Button from html entities, 2018-08-31
    e.g. HtmlExtractHyperlink("test<button>TextButton</button>123");

    Array [ TestButton ] ]
*/
function HtmlExtractButton ($html) {
	$pattern = "/<button>([^<]+)<\/button>/";

	preg_match_all("/<button>([^<]+)<\/button>/", $html, $matches);

	if ( $matches ) {
		return $matches[1];

	} else {
		return NULL;
	}
} // END OF -function HtmlExtractButton ($html) {-

$html = "這是測試<button>button1</button>\n<button>button2</button>\n<button>button3</button>\n<button>button4</button>\n<button>button5</button>\n<button>按鍵6</button>完成測試";
$buttons = HtmlExtractButton($html);
print_r($buttons);
// Array ( [0] => button1 [1] => button2 [2] => button3 [3] => button4 [4] => button5 [5] => 按鍵6 )

?>