<?php

declare(strict_types=1);

use App\TennisMatch;

class TennisMatchTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    public function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch();

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->pointToPlayerOne();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $match->pointToPlayerTwo();
        }

        $this->assertEquals($score, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [4, 0, 'player one wins'],
            [4, 1, 'player one wins'],
            [4, 2, 'player one wins'],
            [4, 3, 'player one advantage'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [6, 6, 'deuce'],
            [7, 7, 'deuce'],
            [5, 4, 'player one advantage'],
            [6, 4, 'player one wins'],
            [4, 5, 'player two advantage'],
            [4, 6, 'player two wins'],
            [0, 4, 'player two wins'],
            [1, 4, 'player two wins'],
            [2, 4, 'player two wins'],
            [3, 4, 'player two advantage'],
        ];
    }
}
