<?php

namespace spec;

use RecurringPayments;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecurringPaymentsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RecurringPayments::class);
    }

    function it_should_only_return_an_integer(){

    	$this->calculate(22)->shouldBeInteger();
    }

    function it_should_return_a_amount(){

    	$this->calculate(22)->shouldReturn(22);
    }

}
