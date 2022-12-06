<?php

class message
{
    protected $message;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $this->message = $file;
    }

    public function getMessageArea($length = 4)
    {
        $split = str_split($this->message);
        for ($i = 0; $i < (count($split) - ($length - 1)); $i++) {
            $res = [];
            for ($a = 0; $a < $length; $a++) {
                $res[] = $split[$i + $a];
            }
            $count = array_count_values($res);
            if (count($count) == $length) {
                return $i + $length;
            }
        }
    }
}