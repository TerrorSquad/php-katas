<?php

declare(strict_types=1);

namespace App;

class TennisMatch
{

    const POINTS = [
        0 => 'love',
        1 => 'fifteen',
        2 => 'thirty',
        3 => 'forty',
    ];

    private $playerOnePoints = 0;

    private $playerTwoPoints = 0;

    public function score()
    {
        if ($this->hasWinner()) {
            return 'player ' . $this->leadingPlayer() . ' wins';
        }

        if ($this->playerHasAdvantage()) {
            return 'player ' . $this->leadingPlayer() . ' advantage';
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return self::POINTS[$this->playerOnePoints] . '-' . self::POINTS[$this->playerTwoPoints];
    }

    private function hasWinner()
    {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByTwo();
    }

    private function hasEnoughPointsToWin()
    {
        return max([$this->playerOnePoints, $this->playerTwoPoints]) >= 4;
    }

    private function isLeadingByTwo()
    {
        return abs($this->playerOnePoints - $this->playerTwoPoints) >= 2;
    }

    private function leadingPlayer()
    {
        return $this->playerOnePoints > $this->playerTwoPoints ? 'one' : 'two';
    }

    private function playerHasAdvantage()
    {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByOne();
    }

    private function isLeadingByOne()
    {
        return abs($this->playerOnePoints - $this->playerTwoPoints) == 1;
    }

    private function isDeuce()
    {
        return $this->hasEnoughPointsToWin() && $this->playerOnePoints == $this->playerTwoPoints;
    }

    public function pointToPlayerOne()
    {
        $this->playerOnePoints++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwoPoints++;
    }

}
