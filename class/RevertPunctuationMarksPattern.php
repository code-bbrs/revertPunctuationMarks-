<?php
//==================================================================================//
// File name   : 	RevertPunctuationMarksPattern.php
// Begin       : 	2018-11-17
// Last Update : 	2018-11-17
// Description :	Reverses the order of punctuation marks in a given string
//					according to given or default pattern:
//					- user pattern given in php regular expression format
//					- 1: only ! ?
//					- 2: all non-letter and non-numeric characters excluding underscore
//					- 3: all non-letter and non-numeric characters including underscore
//					- ?: by default reverse only . , ! ?  
// Author: 			Aleksey Baranov
// (c) Copyright:
//					Aleksey Baranov
//					aleksey.v.baranov@ya.ru
//==================================================================================//
Class RevertPunctuationMarksPattern extends RevertPunctuationMarks 
{
	// Inherited Attributes
// protected $inputData;
// protected $reverseType = '/[.,!?]+/u'; 	// reverse only . , ! ?;

	// Inherited Methods
// setInputData($str);
// revertMarksStr();

	// Attributes

	// Methods
// Check and set reverse type
function setReverseType($reverseType) 	{
	  
	//Check input data
		if (!isset($reverseType)) {
		trigger_error ( 'Class "'.get_class($this).'";
		method "'.__FUNCTION__.'( string $var )" : Reverse type parameter is not defined.
		Default value will be used.' , E_USER_NOTICE);
		return false;
		}
		if (!is_string($reverseType)) {
		trigger_error ( 'Class "'.get_class($this).'";
		method "'.__FUNCTION__.'( string $var )" : Reverse type variable type must be STRING.
		Default value will be used.' , E_USER_NOTICE);
		return false;
		}
		if (@preg_match($reverseType, null) === false) { // invalid pattern
			switch ($reverseType) {
				case '1':	$this->reverseType = '/[!?]+/u'; 			// reverse only ! ?
					break;
				case '2':	$this->reverseType = '/[^\d\w\s]+/u'; 		// consider an underscore as a letter
					break;
				case '3':	$this->reverseType = '/[^\d\w\s]|[_]+/u'; 	// consider an underscore as a non-letter
					break;
				default: 	$this->reverseType = '/[.,!?]+/u'; 			// reverse only . , ! ?
			}
		} 
		else { // valid pattern
			$this->reverseType = $reverseType;
		}
	return true;
	}

	function getReverseType() {
		return $this->reverseType;
	}
}
//==================================================================================//
