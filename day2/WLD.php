<?php

enum WLD
{
    case WIN;
    case LOOSE;
    case DRAW;

    public function score()
    {
        return match ($this) {
            self::WIN => 6,
            self::LOOSE => 0,
            self::DRAW => 3
        };
    }
}