<?php

class treehouse
{
    protected $trees;

    public function __construct()
    {
        $trees = [];
        $file = file_get_contents('inputfile.txt');
        $lines = explode(PHP_EOL, $file);
        $this->rawTrees = $lines;
        foreach ($lines as $key => $line) {
            $trees[] = array_map(array($this, 'mapper'), str_split($line));
        }
        $this->trees = $trees;
        $this->indexTrees();
    }

    protected function indexTrees()
    {
        $trees = $this->trees;
        for ($y = 0; $y < count($trees); $y++) {
            $trees[$y] = $this->markVisible($trees[$y], 'right');
            $trees[$y] = array_reverse($this->markVisible(array_reverse($trees[$y]), 'left'));
            $newTrees = [];

            for ($x = 0; $x < count($trees[$y]); $x++) {
                $newTrees[] = $trees[$x][$y];
            }

            $newTrees = $this->markVisible($newTrees, 'down');
            $newTrees = array_reverse($this->markVisible(array_reverse($newTrees), 'up'));
            for ($x = 0; $x < count($trees[$y]); $x++) {
                $trees[$x][$y] = $newTrees[$x];
            }
        }

        $this->trees = $trees;

    }

    public function getVisibleTrees()
    {
        $count = 0;
        foreach ($this->trees as $treerow) {
            $value = array_column($treerow, 'visible');
            $count += count(array_filter($value));
        }
        return $count;
    }

    public function getScenicScore()
    {
        $scenicScores = [];
        foreach ($this->trees as $key => $treerow) {
            $value = array_column($treerow, 'scenic');
            foreach ($value as $partkey => $entry) {
                $score = $entry['up'] * $entry['down'] * $entry['left'] * $entry['right'];
                $scenicScores[] = $score;
            }
        }
        return max($scenicScores);
    }


    protected function markVisible($array, $dir)
    {
        $value = -1;
        $arrayValue = array_column($array, 'value');
        for ($i = 0; $i < count($array); $i++) {
            $counter = 0;
            for ($x = $i + 1; $x < count($array); $x++) {
                $counter++;
                if ($arrayValue[$x] >= $arrayValue[$i]) {
                    break;
                }
            }
            $array[$i]['scenic'][$dir] = $counter;
            if ($arrayValue[$i] > $value) {
                $value = $arrayValue[$i];
                $array[$i]['visible'] = true;
            }
        }
        return $array;
    }

    protected function mapper($value)
    {
        return ['visible' => false, 'value' => $value, 'scenic' => ['left' => 0, 'right' => 0, 'up' => 0, 'down' => 0]];
    }

}