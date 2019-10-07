<?php

class BowlingScore {

	protected $rolls = [];

	public function roll( $pins ) {

		if($pins < 0)
		{
			throw new InvalidArgumentException;
		}
		$this->rolls[] = $pins;

	}

	public function score() {

		$score = 0;
		$roll  = 0;

		for ( $frame = 1; $frame <= 10; $frame++ ) {

			if( $this->isStrike( $roll ) ){

				$score = $this->strikeBonus( $roll, $score );
				$roll++;
				continue;
			}

			if ( $this->isSpare( $roll ) ) {
				$score = $this->spareBonus( $roll, $score );

			} else {
				$score += $this->getDefaultFrameScore( $roll);
			}

			$roll  += 2;

		}

		return $score;
	}

	/**
	 * @param int $roll
	 *
	 * @return bool
	 */
	protected function isSpare( int $roll ): bool {
		return $this->getDefaultFrameScore( $roll ) == 10;   
	}

	/**
	 * @param int $roll
	 *
	 * @return mixed
	 */
	protected function getDefaultFrameScore( int $roll ): int {
		return $this->rolls[ $roll ] + $this->rolls[ $roll + 1 ];
	}

	/**
	 * @param int $roll
	 *
	 * @return bool
	 */
	protected function isStrike( int $roll ): bool {
		return $this->rolls[ $roll ] == 10;
	}

	/**
	 * @param int $roll
	 * @param int $score
	 *
	 * @return int|mixed
	 */
	protected function strikeBonus( int $roll, int $score ) {
		$score += 10 + $this->rolls[ $roll + 1 ] + $this->rolls[ $roll + 2 ];

		return $score;
	}

	/**
	 * @param int $roll
	 * @param int $score
	 *
	 * @return int|mixed
	 */
	protected function spareBonus( int $roll, int $score ) {
		$score += 10 + $this->rolls[ $roll + 2 ];

		return $score;
	}

}
