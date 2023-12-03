<?php

class gamecalc
{
    protected $lines;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $this->lines = explode(PHP_EOL, $file);

    }

    public function getNumbers()
    {
        $data = [];
        $return = 0;
        foreach ($this->lines as $line) {
            $maxNumbers = [];
            $rowContent = explode(': ', $line); // index 0 spielnummer, index 1 runde
            $roundNumber = str_replace('Game ', '', $rowContent[0]);
            foreach (explode('; ', $rowContent[1]) as $gameRound) {
                $localResult = [];
                preg_match_all('/(\d{1,}) (red|blue|green)/', $gameRound, $localResult); //index 0 gesamt, index 1 number, index 2 string
                for ($i = 0; $i < count($localResult[0]); $i++) {
                    $maxNumbers[$localResult[2][$i]] = max(($maxNumbers[$localResult[2][$i]] ?? 0), $localResult[1][$i]);
                }
            }

//            12 red cubes, 13 green cubes, and 14 blue cubes?
            if (($maxNumbers['red'] ?? 0) <= 12 && ($maxNumbers['green'] ?? 0) <= 13 && ($maxNumbers['blue'] ?? 0) <= 14) {
                $return += $roundNumber;
            }
        }
        return $return;

    }

    public function getNumbersWithString()
    {
        $return = 0;
        foreach ($this->lines as $line) {
            $data = [];
            $line = str_replace(
                ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'],
                ['o1e', 't2o', 't3e', 'f4r', 'f5e', 's6x', 's7n', 'e8t', 'n9e'],
                $line);
            preg_match_all('[\d]', $line, $data);
            $data = $data[0];
            $row = intval($data[0] . $data[count($data) - 1]);
            $return += $row;
        }
        return $return;
    }

}