<?php 
//==================================================================================//
// Manual unit test for "RevertPunctuationMarksPattern" class
//==================================================================================//
	// Include autoload
include_once 'autoload.php';
	// Output test name
echo 'Manual unit test for "RevertPunctuationMarksPattern" class OUTPUT';

	// Experimental data:
// sentences
$ini =
$Input[] = 'Salut! Comment ça va? Je pense à propos de cette émoticône  
			envoyé pour moi  =) avec 2 étoiles **. Tu la connais? 
			écris-moi la réponse à ce e-mail : lo-gin_369@sobaka.com' ;
// patterns
$pattern[] = '1'; 			// reverse only ! ?
$pattern[] = '2'; 			// reverse only ! ?
$pattern[] = '3'; 			// reverse only ! ?
$pattern[] = '/[_@]+/u';	// reverse only _ @ 
$pattern[] = 369;			// set to default = '1'  

	// Testing:
		// Instantiate object
	$rev = new RevertPunctuationMarksPattern;

	$i = 1; echo '<hr>';
	foreach ($pattern as $pat) {
		echo 'Test number ', $i++, '<br>';
		$rev->setInputData($ini);
		if( $rev->setReverseType($pat) ) {
			echo 'Initial string : ', $ini, '<br>';
			echo 'Inverted marks : ', $rev->revertMarksStr(), '<br>';}
				echo 'Input pattern : ', $pat, '<br>';
				echo 'Output pattern : ', $rev->getReverseType(), '<br>';
			echo '<hr>';
	}

		//undefined reverse type
	echo 'Test number ', $i++, '<br>';
	$rev->setInputData($ini);
	echo 'If data is not defined we get the correct hint about it';
		if( $rev->setReverseType($pat0) ) {
			echo 'Initial string : ', $ini, '<br>';
			echo 'Inverted marks : ', $rev->revertMarksStr(), '<br>';}
				echo 'Input pattern : ', $pat, '<br>';
				echo 'Output pattern : ', $rev->getReverseType(), '<br>';
			echo '<hr>';

//==================================================================================//
/*
Manual unit test for "RevertPunctuationMarksPattern" class OUTPUT

* Test number 1
Initial string : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais? écris-moi la réponse à ce e-mail : lo-gin_369@sobaka.com
Inverted marks : Salut? Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais! écris-moi la réponse à ce e-mail : lo-gin_369@sobaka.com
Input pattern : 1
Output pattern : /[!?]+/u

* Test number 2
Initial string : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais? écris-moi la réponse à ce e-mail : lo-gin_369@sobaka.com
Inverted marks : Salut. Comment ça va@ Je pense à propos de cette émoticône envoyé pour moi -: avec 2 étoiles --? Tu la connais. écris*moi la réponse à ce e*mail ) lo=gin_369?sobaka!com
Input pattern : 2
Output pattern : /[^\d\w\s]+/u

* Test number 3
Initial string : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais? écris-moi la réponse à ce e-mail : lo-gin_369@sobaka.com
Inverted marks : Salut. Comment ça va@ Je pense à propos de cette émoticône envoyé pour moi _- avec 2 étoiles :-- Tu la connais? écris.moi la réponse à ce e*mail * lo)gin=369?sobaka!com
Input pattern : 3
Output pattern : /[^\d\w\s]|[_]+/u

* Test number 4
Initial string : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais? écris-moi la réponse à ce e-mail : lo-gin_369@sobaka.com
Inverted marks : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais? écris-moi la réponse à ce e-mail : lo-gin@369_sobaka.com
Input pattern : /[_@]+/u
Output pattern : /[_@]+/u

* Test number 5
Notice: Class "RevertPunctuationMarksPattern"; method "setReverseType( string $var )" : Reverse type variable type must be STRING. Default value will be used. in /var/www/html/roistat/class/RevertPunctuationMarksPattern.php on line 44
Input pattern : 369
Output pattern : /[_@]+/u

* Test number 6
If data is not defined we get the correct hint about it
Notice: Undefined variable: pat0 in /var/www/html/roistat/class/test_RevertPunctuationMarksPattern.php on line 43
Notice: Class "RevertPunctuationMarksPattern"; method "setReverseType( string $var )" : Reverse type parameter is not defined. Default value will be used. in /var/www/html/roistat/class/RevertPunctuationMarksPattern.php on line 38
Input pattern : 369
Output pattern : /[_@]+/u
*/
