<?php

class Movement
{
    /**
     * @param $amount
     * @param $from
     * @param $target
     */
    public function __construct(
        protected $amount,
        protected $from,
        protected $target
    )
    {

    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }


}