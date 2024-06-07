<?php

namespace Challenges\ATTACK_OF_TITANS;

class Gaz
{
    public function __construct(
        private int $value
    ) {}

    public function getValue(): int
    {
        return $this->value;
    }

    public function consume(int $value): void
    {
//        if ($this->value - $value > 0) {
//            $this->value -= $value;
//            return;
//        }
//        $this->value = 0;
        $this->value - $value > 0 ? $this->value -= $value : $this->value = 0;
    }
}