<?php

namespace spec;

use BowlingScore;
use http\Exception\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * 10 frames
 * 1 or 2 shots
 * - Spares
 * shot 1 + 2 = 10 => spares 3 shots
 *
 * - Strikes
 * strike 4 shots
*/

class BowlingScoreSpec extends ObjectBehavior
{
	/**
	 *
	 */
	function it_is_initializable()
    {
        $this->shouldHaveType(BowlingScore::class);
    }

    function it_scores_a_gutter_returns_0(){

	    $this->rollTimes(20,0);
	    $this->score()->shouldBe(0);

    }
    
    function it_returns_the_sum_of_all_knocked_down_pins(){

    	$this->rollTimes(20,1);
    	$this->score()->shouldBe( 20);
    }


    function it_awards_a_one_roll_bonus_for_every_spare(){

	    $this->rollSpare();
	    $this->roll(5);
	    $this->rollTimes(17,0);
	    $this->score()->shouldBe( 20);
    }
    
    function it_awards_a_two_roll_bonus_for_a_strike_in_the_previous_frame(){

    	$this->roll(10);
    	$this->roll(7);
    	$this->roll(2);

    	$this->rollTimes(17,0);
    	$this->score()->shouldBe( 28);
    }

    function it_scores_a_perfect_game(){
    	
    	$this->rollTimes(12,10);
    	$this->score()->shouldBe( 300);
    	
    }

    function it_takes_exception_with_invalid_rolls(){

		$this->shouldThrow('InvalidArgumentException')->duringRoll(-10);
    }

	protected function rollSpare(): void {
		$this->roll( 2 );
		$this->roll( 8 );
	}

	protected function rollTimes($count, $pins): void {
		for ( $i = 0; $i < $count; $i ++ ) {
			$this->roll( $pins );
		}
	}
}
