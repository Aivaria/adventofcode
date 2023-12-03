<?php

class numbercalc
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
            preg_match_all('[\d]', $line, $data);
            $data = $data[0];
            $return += intval($data[0] . $data[count($data) - 1]);
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