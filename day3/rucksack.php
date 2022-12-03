<?php

class rucksack
{
    protected $rucksacks;
    protected $alphabet;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $this->rucksacks = explode(PHP_EOL, $file);
        $this->alphabet = array_merge(range('a', 'z'), range('A', 'Z'));
    }

    public function getCompartmentsScore()
    {
        $score = 0;
        foreach ($this->rucksacks as $rucksack) {
            $compartments = $this->getCompartments($rucksack);
            $result = array_intersect(str_split($compartments[0]), str_split($compartments[1]));
            $result = array_values($result)[0];
            $score += array_search($result, $this->alphabet) + 1;
        }
        return $score;
    }

    public function getGroupScore()
    {
        $score = 0;
        $rucksacks = [];
        foreach ($this->rucksacks as $masterrucksack) {
            $rucksacks[] = $masterrucksack;
            if (count($rucksacks) == 3) {
                $result = array_intersect(str_split($rucksacks[0]), str_split($rucksacks[1]), str_split($rucksacks[2]));
                $result = array_values($result)[0];
                $score += (array_search($result, $this->alphabet) + 1);
                $rucksacks = [];
            }
        }
        return $score;
    }

    protected function getCompartments($line)
    {
        $result = str_split($line, strlen($line) / 2);
        return $result;
    }
}