<?php

class elfenrechner
{
    protected $calories;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $elfen = explode(PHP_EOL . PHP_EOL, $file);
        foreach ($elfen as $elfe) {
            $elfecalories = explode(PHP_EOL, $elfe);
            $this->calories[] = array_sum($elfecalories);
        }
    }

    public function getTopCalorie()
    {
        return max($this->calories);
    }

    public function getTopTree()
    {
        $calories = $this->calories;
        rsort($calories);
        return $calories[0] + $calories[1] + $calories[0];
    }

}