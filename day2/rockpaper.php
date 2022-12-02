<?php
include "WLD.php";
include "RPS.php";

class rockpaper
{
    protected $choises;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $lines = explode(PHP_EOL, $file);
        $scores = [];
        foreach ($lines as $line) {
            $partial = explode(" ", $line);
            $other = match ($partial[0]) {
                'A' => RPS::ROCK,
                'B' => RPS::PAPER,
                'C' => RPS::SCISSOR
            };

            $scores[] = ['choosen' => $partial[1], 'other' => $other];
        }
        $this->scores = $scores;
    }

    public function getScoreP1()
    {
        $scoreSum = 0;
        foreach ($this->scores as $score) {
            $scoreSum += match ($score['choosen']) {
                'X' => 1,
                'Y' => 2,
                'Z' => 3,
            };
            $scoreSum += $score['other']->getWLDP1($score['choosen'])->score();
        }
        return $scoreSum;
    }

    public function getScoreP2()
    {
        $scoreSum = 0;
        foreach ($this->scores as $score) {
            $WLD = match ($score['choosen']) {
                'X' => WLD::LOOSE,
                'Y' => WLD::DRAW,
                'Z' => WLD::WIN,
            };

            $scoreSum += $score['other']->getWLDP2($WLD)->score();
            $scoreSum += $WLD->score();
        }
        return $scoreSum;
    }
}