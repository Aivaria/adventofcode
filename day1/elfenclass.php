<?php

class elfenrechner
{
    protected $elfen;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');

        $elfen = explode(PHP_EOL . PHP_EOL, $file);
        for ($i = 0; $i < count($elfen); $i++) {
            $elfe = explode(PHP_EOL, $elfen[$i]);
            $calories = 0;

            foreach ($elfe as $calorie) {
                $calories += intval($calorie);
            }
            $elfen[$i] = $calories;
        }
        sort($elfen);
        $elfen = array_reverse($elfen);
        $this->elfen = $elfen;
    }

    public function getTopCalorie()
    {
        return $this->elfen[0];
    }

    public function getTopTree()
    {
        $sum = 0;
        for ($i = 0; $i < 3; $i++) {
            $sum += $this->elfen[$i];
        }
        return $sum;
    }

}