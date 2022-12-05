<?php
include 'Cargostack.php';
include 'Movement.php';

class Cargo
{
    protected $cargo;
    protected $movements;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $cargo_movement = explode(PHP_EOL . PHP_EOL, $file);
        $this->cargo = $this->parseCargo($cargo_movement[0]);
        $this->movements = $this->parseMovement($cargo_movement[1]);
    }

    protected function parseCargo($cargo)
    {
        $forReturn = [];
        $rows = explode(PHP_EOL, $cargo);
        array_pop($rows);
        foreach ($rows as $row){

            $cargo_replaced = preg_replace('/(^|\s)(\s{3})/m', '$1[ ]', $row);
            $rowExploded = explode("] [", $cargo_replaced);
            for($i = 0; $i<count($rowExploded); $i++){
                if(!isset($forReturn[$i])){
                    $forReturn[$i] = new Cargostack();
                }
                $letter = str_replace(['[',']'], '', $rowExploded[$i]);
                if($letter != ' ') {
                    $forReturn[$i]->addBelow($letter);
                }
            }
        }
        return $forReturn;
    }

    protected function parseMovement($rawMovement)
    {
        $forReturn = [];
        $rows = explode(PHP_EOL, $rawMovement);
        foreach ($rows as $row){
            $parts = explode(' ', $row);
            $forReturn[] = new Movement($parts[1], ($parts[3]-1), ($parts[5]-1));

        }
        return $forReturn;
    }

    protected function executePart1(){
        /**
         * @var Movement $movement
         */
        foreach ($this->movements as $movement){
            for ($i=0; $i<$movement->getAmount(); $i++){
                $removedCargo = $this->cargo[$movement->getFrom()]->getAndRemoveTopElement();
                $this->cargo[$movement->getTarget()]->addOnTop($removedCargo);
            }
        }
    }

    protected function executePart2(){
        /**
         * @var Movement $movement
         */

        foreach ($this->movements as $movement){
            $stack = [];
            for ($i=0; $i<$movement->getAmount(); $i++){
                $removeElement = $this->cargo[$movement->getFrom()]->getAndRemoveTopElement();
                $stack[] = $removeElement;
            }
            while (count($stack)>0){
                $this->cargo[$movement->getTarget()]->addOnTop(array_pop($stack));
            }
        }

    }

    public function getCargoLetter($part=1){
        if($part==1){
            $this->executePart1();
        }else{
            $this->executePart2();
        }
        $forReturn = '';
        foreach ($this->cargo as $cargo){
            $forReturn .= $cargo->getTopElement();
        }
        return $forReturn;
    }


}