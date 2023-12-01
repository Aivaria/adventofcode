<?php

class rockpaper
{
    protected $scores;
    protected $lines;
    protected $rps;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $lines = explode(PHP_EOL, $file);
        $this->lines = $lines;
        $this->rps = ['a' => 1, 'x' => '1', 'b' => 2, 'y' => 2, 'c' => 3, 'z' => 3];
    }

    public function getScoreP1()
    {
        $score = 0;
        foreach ($this->lines as $line) {
            $other = strtolower($line[0]);
            $mine = strtolower($line[2]);

            //draw
            if ($this->rps[$other] == $this->rps[$mine]) {
                $score += 3;
            } elseif (in_array($other . $mine, ['ay', 'bz', 'cx'])) {
                $score += 6;
            }
            $score += $this->rps[$mine];
        }
        return $score;
    }

    public function getScoreP2()
    {
        $score = 0;
        foreach ($this->lines as $line) {
            $other = strtolower($line[0]);
            $mine = strtolower($line[2]);

            if ($mine == 'y') {
                $score += 3;
                $score += $this->rps[$other];
            } elseif ($mine == 'z') {
                $win = match ($other) {
                    'a' => 'y',
                    'b' => 'z',
                    'c' => 'x',
                };
                $score += 6;
                $score += $this->rps[$win];
            } else {
                $lost = match ($other) {
                    'a' => 'z',
                    'b' => 'x',
                    'c' => 'y',
                };
                $score += $this->rps[$lost];
            }
        }
        return $score;
    }
}