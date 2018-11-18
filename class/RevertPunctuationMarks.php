<?php
//==================================================================================//
// File name   : 	RevertPunctuationMarks.php
// Begin       : 	2018-11-17
// Last Update : 	2018-11-17
// Description :	Reverses the order of four punctuation marks only  .,!? 
//					in a given string
// Author: 			Aleksey Baranov
// (c) Copyright:
//					Aleksey Baranov
//					aleksey.v.baranov@ya.ru
//==================================================================================//
Class RevertPunctuationMarks
{
	// Attributes
protected $inputData;
protected $reverseType = '/[.,!?]+/u'; 	// reverse only . , ! ?;

	// Methods
// Check and set input data
function setInputData($str) 	{
	  
	//Check input data
		if (!isset($str)) {
			trigger_error ( 'Class "'.get_class($this).'";
			method "'.__FUNCTION__.'( string $var)" : Input data is not defined',
			E_USER_WARNING);
			return false;
		}
		if (!is_string($str)) {
			trigger_error ( 'Class "'.get_class($this).'";
			method "'.__FUNCTION__.'( string $var)" : Input data type must be STRING ',
			E_USER_WARNING);
			return false;
		}
		if (empty($str)) {
			trigger_error ( 'Class "'.get_class($this).'";
			method "'.__FUNCTION__.'( string $var)" : Input string must be not EMPTY',
			E_USER_WARNING);
			return false;
		}
		$this->inputData = $str;
	return true;
	}

// Revert punctuations marks
function revertMarksStr()	{ 
	//
		if (!isset ($this->inputData) ) {
		trigger_error ( 'Class "'.get_class($this).'";
		method "'.__FUNCTION__.'( )" : Input string must be defined via 
		setInputData( string $var) method for each call to avoid using the outdated data.',
		E_USER_WARNING);
		return false;
		} else {
			$str = $this->inputData;
			unset($this->inputData); // avoid using the outdated data
			}

	// Regular expression to filter marks
	$regExpr = $this->reverseType;

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
}
//==================================================================================//
