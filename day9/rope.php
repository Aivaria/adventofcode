<?php

class rope
{
    protected $steps;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $lines = explode(PHP_EOL, $file);
        $this->steps = $lines;
    }

    public function calcSteps($length = 2)
    {
//        $input = array_map("unserialize", array_unique(array_map("serialize", $testvalue)));
        $knots = [];
        for ($i = 0; $i < $length; $i++) {
            $knots[$i] = ['x' => 0, 'y' => 0];
        }
        $touched = [];

        foreach ($this->steps as $key => $step) {
            for ($i = 0; $i < explode(' ', $step)[1]; $i++) {
                $knots[0]['x'] += match ($step[0]) {
                    'R' => 1,
                    'L' => -1,
                    default => 0,
                };
                $knots[0]['y'] += match ($step[0]) {
                    'U' => 1,
                    'D' => -1,
                    default => 0,
                };
                for ($knot = 0; $knot < $length - 1; $knot++) {
                    if ((($knots[$knot]['x'] <=> $knots[$knot + 1]['x']) != ($knots[$knot]['x'] - $knots[$knot + 1]['x']))
                        || (($knots[$knot]['y'] <=> $knots[$knot + 1]['y']) != ($knots[$knot]['y'] - $knots[$knot + 1]['y']))) {
                        $knots[$knot + 1]['x'] += ($knots[$knot]['x'] <=> $knots[$knot + 1]['x']);
                        $knots[$knot + 1]['y'] += ($knots[$knot]['y'] <=> $knots[$knot + 1]['y']);
                    }

                }
                $touched['x' . $knots[$length - 1]['x'] . 'y' . $knots[$length - 1]['y']] = 1;
            }
        }
        return count($touched);
    }
}