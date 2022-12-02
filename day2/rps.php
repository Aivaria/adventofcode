<?php

enum RPS
{
    case ROCK;
    case PAPER;
    case SCISSOR;

    public function getWLDP1($other)
    {
        switch ($this) {
            case self::ROCK:
                return match ($other) {
                    'X' => WLD::DRAW,
                    'Y' => WLD::WIN,
                    'Z' => WLD::LOOSE,
                };
                break;
            case self::PAPER:
                return match ($other) {
                    'X' => WLD::LOOSE,
                    'Y' => WLD::DRAW,
                    'Z' => WLD::WIN,
                };
                break;
            case self::SCISSOR:
                return match ($other) {
                    'X' => WLD::WIN,
                    'Y' => WLD::LOOSE,
                    'Z' => WLD::DRAW,
                };
        };
    }

    public function getWLDP2($other)
    {
        switch ($this) {
            case self::ROCK:
                return match ($other) {
                    WLD::DRAW => RPS::ROCK,
                    WLD::WIN => RPS::PAPER,
                    WLD::LOOSE => RPS::SCISSOR,
                };
            case self::PAPER:
                return match ($other) {
                    WLD::DRAW => RPS::PAPER,
                    WLD::WIN => RPS::SCISSOR,
                    WLD::LOOSE => RPS::ROCK,
                };
            case self::SCISSOR:
                return match ($other) {
                    WLD::DRAW => RPS::SCISSOR,
                    WLD::WIN => RPS::ROCK,
                    WLD::LOOSE => RPS::PAPER,
                };
        };

    }

    public function score()
    {
        return match ($this) {
            self::ROCK => 1,
            self::PAPER => 2,
            self::SCISSOR => 3
        };
    }

}