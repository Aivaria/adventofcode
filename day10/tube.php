<?php

class tube
{
    protected $steps;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $lines = explode(PHP_EOL, $file);
        $this->steps = $lines;
    }

    public function sumSignalStrength()
    {
        $cycles = [20, 60, 100, 140, 180, 220];
        $cycle = 0;
        $signalStrength = 0;
        $X = 1;
        foreach ($this->steps as $step) {
            $adder = 0;
            switch ($step[0]) {
                case 'a':
                    $adder = explode(' ', $step)[1];
                    $cycle++;
                case 'n':
                    $cycle++;
                    break;
            }
            if (in_array($cycle, $cycles)) {
                $signalStrength += $cycle * $X;
            }
            if (in_array($cycle - 1, $cycles)) {
                $signalStrength += ($cycle - 1) * $X;
            }
            $X += $adder;
        }
        return $signalStrength;
    }

    public function drawLetter()
    {
        $rows = [];
        $currentRow = 0;
        $cycles = [40, 80, 120, 160, 200, 240];
        $row = '';
        $X = 1;
        $adder = 0;
        $step = 0;
        $position =0;

        for ($cycle = 0; $cycle <= 240; $cycle++) {
            if (in_array($cycle, $cycles)) {
                $currentRow++;
                $position=0;
                $rows[] = $row;
                $row='';
            }

            if(in_array($position, range($X-1, $X+1))){
                $row.='#';
            }else{
                $row.='.';
            }

            $position++;

            if ($adder == 0) {
                switch (@$this->steps[$step][0]) {
                    case 'a':
                        $adder = explode(' ', $this->steps[$step])[1];
                        $step++;
                        continue 2;
                        break;
                    case 'n':
                        $step++;
                        break;
                }
            }else{
                $X+=$adder;
                $adder=0;
            }
        }
        return $rows;

    }
}