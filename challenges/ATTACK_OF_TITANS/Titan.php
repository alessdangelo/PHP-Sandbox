<?php

namespace Challenges\ATTACK_OF_TITANS;

class Titan
{
    private function __construct(
        public int $size,
        public int $speed,
        public int $health) {}

    public static function newFromString(string $titan): Titan
    {
        $titan = explode(';', $titan);

        return new Titan($titan[0], $titan[1], $titan[2]);
    }
}