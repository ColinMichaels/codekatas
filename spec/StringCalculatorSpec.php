<?php

namespace spec;

use http\Exception\InvalidArgumentException;
use StringCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class StringCalculatorSpec
 * @package spec
 *
 * StringCalculator::add('1,2,3,1000') => 6
 */

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(StringCalculator::class);
    }

    function it_translates_an_empty_string_into_zero(){

    	$this->add('')->shouldEqual(0);
    	
    }

    function it_should_find_the_sum_of_one_number(){

    	$this->add('5')->shouldEqual(5);

    }

    function it_should_find_the_sum_of_two_numbers(){

    	$this->add('2,3')->shouldEqual(5);
    }

    function it_should_find_the_sum_of_any_amount_of_numbers(){

    	$this->add('1,2,3,4,5')->shouldEqual(15);

    }

    function it_disallows_negative_numbers(){

    	   $this->shouldThrow(new \InvalidArgumentException('Invalid number provided: -2'))->duringAdd('-2,2,4');
	}

	function it_ignores_any_number_1000_or_greater(){

    	$this->add('1,2,3,4,1000')->shouldEqual(10);

	}

	function it_allows_for_new_line_delimiters(){

    	$this->add('2,2\n2')->shouldEqual(6);
	}

}
