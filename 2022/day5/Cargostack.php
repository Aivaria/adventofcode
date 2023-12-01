<?php

class Cargostack
{
    protected $myStack;

    public function __construct()
    {
        $this->myStack = [];
    }

    public function addOnTop($item)
    {
        $this->myStack[] = $item;
    }

    public function addBelow($item)
    {
        array_unshift($this->myStack, $item);
    }

    public function getTopElement()
    {
        return end($this->myStack);
    }

    public function getAndRemoveTopElement()
    {
        return array_pop($this->myStack);
    }
}