<?php

class accessCalc
{
    protected $groups;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');

        $groups = [];
        $elfen = explode(PHP_EOL, $file);
        foreach ($elfen as $elfe) {
            $groups[] = explode(',', $elfe);
        }
        $this->groups = $groups;
    }

    public function getDoubleAccess()
    {
        $count = 0;
        foreach ($this->groups as $group) {

            $access1 = explode('-', $group[0]);
            $access2 = explode('-', $group[1]);

            if (($access1[0] <= $access2[0] && $access1[1] >= $access2[1]) || ($access2[0] <= $access1[0] && $access2[1] >= $access1[1])) {
                $count++;
            }
        }
        return $count;
    }

    public function getOverleapAccess()
    {
        $count = 0;
        foreach ($this->groups as $group) {

            $access1 = explode('-', $group[0]);
            $access2 = explode('-', $group[1]);

            $range1 = range($access1[0], $access1[1]);
            $range2 = range($access2[0], $access2[1]);

            if(array_intersect($range1, $range2)){
                $count++;
            }
        }
        return $count;
    }
}