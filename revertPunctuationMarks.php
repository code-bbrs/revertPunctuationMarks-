<?php
//==================================================================================//
// File name   : 	revertPunctuationMarks.php
// Begin       : 	2018-11-17
// Last Update : 	2018-11-17
// Description :	Reverses the order of all punctuation marks 
//					(all non-letter and non-numeric characters) in a string
// Author: 			Aleksey Baranov
// (c) Copyright:
//					Aleksey Baranov
//					aleksey.v.baranov@ya.ru
//==================================================================================//
function revertPunctuationMarks($str) 
	{
	// check the input data

		if (!isset($str)) {
			trigger_error ('Function "'.__FUNCTION__.'( string $var)" : 
			Input data is not defined', E_USER_WARNING);
			return false;
		}
		if (!is_string($str)) {
			trigger_error ('Function "'.__FUNCTION__.'( string $var)" : 
			Input data type must be STRING', E_USER_WARNING);
			return false;
		}
		if (empty($str)) {
			trigger_error ('Function "'.__FUNCTION__.'( string $var)" : 
			Input string must be not EMPTY', E_USER_WARNING);
			return false;
		}

	// Regular expression to filter marks
		//$regExpr = '/[.,!?]+/u'; 		// reverse only . , ! ?  
		//$regExpr = '/[^\d\w\s]+/u'; 		// consider an underscore as a letter 
		$regExpr = '/[^\d\w\s]|[_]+/u'; 	// consider an underscore as a non-letter

	// convert string to array and create array $arrPM containing punctuation marks
		$arrAll = preg_split('//u', $str, 0, PREG_SPLIT_NO_EMPTY); $indexPM = -1;
		foreach ($arrAll as $symbol) {
			if (preg_match($regExpr, $symbol)) {$arrPM[] = $symbol; $indexPM++;
			}
		} 

	// invert the order of punctuation marks in $arrPM
		while($indexPM >= 0) {
			$arrPM_Inverse[] = $arrPM[$indexPM--];
		} $indexPM++;

	// replace punctuation marks in the array $arr All on the inverted 
		foreach ($arrAll as $symbol) {
			if (preg_match($regExpr, $symbol)) 	{
				$arrAll_Inv[] = $arrPM_Inverse[$indexPM++];} 
				else {$arrAll_Inv[] = $symbol;}
		} 

	// Convert the array $arrAll_Inv[] to a string and return it 
	return implode ($arrAll_Inv);
}
//==================================================================================//
