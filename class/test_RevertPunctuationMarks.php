<?php 
//==================================================================================//
// Manual unit test for "RevertPunctuationMarks" class
//==================================================================================//
	// Include autoload
include_once 'autoload.php';
	// Output test name
echo 'Manual unit test for "RevertPunctuationMarks" class OUTPUT';

	// Experimental data:
$Input[] = 'Привет! как дела? Я вот, думаю, что за смайлик 
			мне прислали =) с 2 звездами **. Не знаешь?' ;
$Input[] = 'Hi! How do you do? I am thinking about that smiley 
			sent to me =) with 2 stars **. Don\'t you know?' ;
$Input[] = 'Salut! Comment ça va? Je pense à propos de cette émoticône  
			envoyé pour moi  =) avec 2 étoiles **. Tu la connais? ' ;
$Input[] = 'lo-gin_369@sobaka.com';
$Input[] = [1, 4,'way', "Вот это новости!!!"] ;
$Input[] = 369;
$Input[] = '';

	// Testing:
		// Instantiate object
	$rev = new RevertPunctuationMarks;
	
	$i = 1; echo '<hr>';
	foreach ($Input as $ini) {
		echo 'Test number ', $i++, '<br>';
		if( $rev->setInputData($ini) ) {
			echo 'Initial string : ', $ini, '<br>';
			echo 'Inverted marks : ', $rev->revertMarksStr();}
			echo '<hr>';
	}

		//undefined data case
	echo 'Test number ', $i++, '<br>';
	echo 'If data is not defined we get the correct hint about it';
		if( $rev->setInputData($ini0) ) {
			echo 'Initial string : ', $ini0, '<br>';
			echo 'Inverted marks : ', $rev->revertMarksStr();}
			echo '<hr>';

		// data not set (reset) case
	echo 'Test number ', $i++, '<br>';
	echo 'If data is not set (reset) we get the correct hint about it';
		//if( $rev->setInputData($ini0) ) {
			echo 'Initial string : ', $ini0, '<br>';
			echo 'Inverted marks : ', $rev->revertMarksStr();//}
			echo '<hr>';
//==================================================================================//
/*
Manual unit test for "RevertPunctuationMarks" class OUTPUT

* Test number 1
Initial string : Привет! как дела? Я вот, думаю, что за смайлик мне прислали =) с 2 звездами **. Не знаешь?
Inverted marks : Привет? как дела. Я вот, думаю, что за смайлик мне прислали =) с 2 звездами **? Не знаешь!

* Test number 2
Initial string : Hi! How do you do? I am thinking about that smiley sent to me =) with 2 stars **. Don't you know?
Inverted marks : Hi? How do you do. I am thinking about that smiley sent to me =) with 2 stars **? Don't you know!

* Test number 3
Initial string : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais?
Inverted marks : Salut? Comment ça va. Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **? Tu la connais! 

* Test number 4
Initial string : lo-gin_369@sobaka.com
Inverted marks : lo-gin_369@sobaka.com

* Test number 5
Warning: Class "RevertPunctuationMarks"; method "setInputData( string $var)" : Input data type must be STRING in /var/www/html/roistat/class/RevertPunctuationMarks.php on line 33

* Test number 6
Warning: Class "RevertPunctuationMarks"; method "setInputData( string $var)" : Input data type must be STRING in /var/www/html/roistat/class/RevertPunctuationMarks.php on line 33

* Test number 7
Warning: Class "RevertPunctuationMarks"; method "setInputData( string $var)" : Input string must be not EMPTY in /var/www/html/roistat/class/RevertPunctuationMarks.php on line 39

* Test number 8
If data is not defined we get the correct hint about it
Notice: Undefined variable: ini0 in /var/www/html/roistat/class/test_RevertPunctuationMarks.php on line 38
Warning: Class "RevertPunctuationMarks"; method "setInputData( string $var)" : Input data is not defined in /var/www/html/roistat/class/RevertPunctuationMarks.php on line 27

* Test number 9
If data is not set (reset) we get the correct hint about it
Initial string :
Notice: Undefined variable: ini0 in /var/www/html/roistat/class/test_RevertPunctuationMarks.php on line 47
Inverted marks :
Warning: Class "RevertPunctuationMarks"; method "revertMarksStr( )" : Input string must be defined via setInputData( string $var) method for each call to avoid using the outdated data. in /var/www/html/roistat/class/RevertPunctuationMarks.php on line 53
*/
