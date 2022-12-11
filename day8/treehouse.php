<?php

class treehouse
{
    protected $trees;

    public function __construct()
    {
        $trees = [];
        $file = file_get_contents('inputfile.txt');
        $lines = explode(PHP_EOL, $file);
        foreach ($lines as $key => $line) {
            $row = [];
            foreach (str_split($line) as $letter) {
                $row[] = ['value' => $letter, 'visible' => false];
            }
            $trees[] = $row;
        }
        $this->trees = $trees;
    }

    public function countTrees()
    {
        $trees = $this->trees;
        for ($y = 0; $y < count($trees); $y++) {
            $trees[$y] = $this->markVisible($trees[$y]);
            $trees[$y] = array_reverse($this->markVisible(array_reverse($trees[$y])));
        }

        for ($y = 0; $y < count($trees); $y++) {
            $newTrees = [];
            for ($x = 0; $x < count($trees[$y]); $x++) {
                $newTrees[] = $trees[$x][$y];
            }
            $newTrees = $this->markVisible($newTrees);
            $newTrees = array_reverse($this->markVisible(array_reverse($newTrees)));

            for ($x = 0; $x < count($trees[$y]); $x++) {
                $trees[$x][$y] = $newTrees[$x];
            }
        }
        $count = 0;
        foreach ($trees as $treerow) {

            foreach ($treerow as $tree) {
                if ($tree['visible']) {
                    $count++;
                }
            }
        }

        return $count;
    }

    protected function markVisible($array)
    {
        $value = -1;
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]['value'] > $value) {
                $value = $array[$i]['value'];
                $array[$i]['visible'] = true;
            }
        }
        return $array;

    }

}