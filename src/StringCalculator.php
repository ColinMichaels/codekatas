<?php

class StringCalculator
{
	const MaxNumberAllowed = 1000;

	public function add($numbers)
    {

	    $numbers  = $this->parseNumbers( $numbers );
	    $solution = 0;

	    foreach($numbers as $number){

		    $this->guardAgainstInvalidNumber( $number );
		    if( $number >= self::MaxNumberAllowed ) continue;

	    	$solution += (int) $number;
	    }

        return $solution;
    }

	/**
	 * @param $number
	 */
	protected function guardAgainstInvalidNumber( $number ): void {
		if ( $number < 0 ) {
			throw new InvalidArgumentException( 'Invalid number provided: ' . $number );
		}
	}

	/**
	 * @param $numbers
	 *
	 * @return array[]|false|string[]
	 */
	protected function parseNumbers( $numbers ) {

		return  array_map('intval', preg_split( '/\s*(,|\\\n)\s*/', $numbers ));

	}
}
