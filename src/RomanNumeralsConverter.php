<?php

/**
 * Class RomanNumeralsConverter
 *
 *  1   = I
 *  2   = II
 *  3   = III
 *  4   = IV
 *  5   = V
 *  6   = VI
 *  7   = VII
 *  8   = VIII
 *  9   = IX
 *  10  = X
 *  11  = XI
 */

class RomanNumeralsConverter {

	protected static $lookup = [
		1000 => 'M',
		900  => 'CM',
		500  => 'D',
		400  => 'CD',
		100  => 'C',
		90   => 'XC',
		50   => 'L',
		40   => 'XL',
		10   => 'X',
		9    => 'IX',
		5    => 'V',
		4    => 'IV',
		1    => 'I'
	];

    public function convert($number)
    {
    	$solution = '';

    	foreach(static::$lookup as $limit => $glyph){

		    while($number >= $limit) {
			    $solution .= $glyph;
			    $number -= $limit; 
		    }
	    }

        return $solution;
    }


}
