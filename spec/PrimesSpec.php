<?php

namespace spec;

use Primes;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Primes::class);
    }


    function it_should_return_an_empty_array_for_1(){

    	$this->generate(1)->shouldReturn([]);

    }

	function it_computes_primes_2(){

		$this->generate(2)->shouldReturn([2]);

	}

	function it_computes_primes_of_3(){

		$this->generate(3)->shouldReturn([3]);


	}

	function it_computes_primes_of_4(){

		$this->generate(4)->shouldReturn([2, 2]);

	}

	function it_computes_primes_of_5(){

		$this->generate(5)->shouldReturn([5]);

	}

	function it_computes_primes_of_6() {

		$this->generate( 6 )->shouldReturn([2, 3]);
	}
	
	function it_returns_2_2_2_for_8(){
    	
    	$this->generate( 8)->shouldReturn( [2,2,2]);
	}

	function it_returns_3_3_for_9(){

    	$this->generate( 9)->shouldReturn( [3,3]);
	}

	function it_returns_2_2_5_5_for_100(){

    	$this->generate( 100)->shouldReturn([2,2,5,5]);

	}


}
