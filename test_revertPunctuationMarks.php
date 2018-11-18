<?php
//==================================================================================//
// Manual unit test for "revertPunctuationMarks" function
//==================================================================================//
	// Include autoload
include_once 'revertPunctuationMarks.php';
	// Output test name
echo 'Manual unit test for "revertPunctuationMarks" function OUTPUT';

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
	$i = 1; echo '<hr>';
	foreach ($Input as $ini) {
		echo 'Test number ', $i++, '<br>';
		if( $inv = revertPunctuationMarks($ini) ) {
			echo 'Initial string : ' , $ini, '<br>';
			echo 'Inverted marks : ', $inv;}
			echo '<hr>';
	}
		//undefined data case
	echo 'Test number ', $i++, '<br>';
	echo 'If data is not defined we get the correct hint about it';
if( $inv = revertPunctuationMarks($ini0) ) {
			echo 'Initial string : ' , $ini, '<br>';
			echo 'Inverted marks : ', $inv;}
			echo '<hr>';
//==================================================================================//
/*
Manual unit test for "revertPunctuationMarks" function OUTPUT

* Test number 1
Initial string : Привет! как дела? Я вот, думаю, что за смайлик мне прислали =) с 2 звездами **. Не знаешь?
Inverted marks : Привет? как дела. Я вот* думаю* что за смайлик мне прислали )= с 2 звездами ,,? Не знаешь!

* Test number 2
Initial string : Hi! How do you do? I am thinking about that smiley sent to me =) with 2 stars **. Don't you know?
Inverted marks : Hi? How do you do' I am thinking about that smiley sent to me .* with 2 stars *)= Don?t you know!

* Test number 3
Initial string : Salut! Comment ça va? Je pense à propos de cette émoticône envoyé pour moi =) avec 2 étoiles **. Tu la connais?
Inverted marks : Salut? Comment ça va. Je pense à propos de cette émoticône envoyé pour moi ** avec 2 étoiles )=? Tu la connais! 

* Test number 4
Initial string : lo-gin_369@sobaka.com
Inverted marks : lo.gin@369_sobaka-com

* Test number 5
Warning: Function "revertPunctuationMarks( string $var)" : Input data type must be STRING in /var/www/html/roistat/function/revertPunctuationMarks.php on line 24

* Test number 6
Warning: Function "revertPunctuationMarks( string $var)" : Input data type must be STRING in /var/www/html/roistat/function/revertPunctuationMarks.php on line 24

* Test number 7
Warning: Function "revertPunctuationMarks( string $var)" : Input string must be not EMPTY in /var/www/html/roistat/function/revertPunctuationMarks.php on line 29

* Test number 8
If data is not defined we get the correct hint about it
Notice: Undefined variable: ini0 in /var/www/html/roistat/function/test_revertPunctuationMarks.php on line 34
Warning: Function "revertPunctuationMarks( string $var)" : Input data is not defined in /var/www/html/roistat/function/revertPunctuationMarks.php on line 19
*/
