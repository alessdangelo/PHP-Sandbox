<?php

namespace Challenges\ATTACK_OF_TITANS;

class Player
{
    private int $power;
    private int $consumedGaz = 0;

    public function __construct(
        public Titan    $target,
        public Building $building,
        public Gaz      $gaz,
        public int      $score = 0) {}

    public function attack(): void
    {
        // Player is higher than the titan
        if ($this->building->height > $this->target->size) {
            $this->power = ($this->building->height - $this->target->size) * 10 + $this->building->distance * 2 - $this->target->speed;
            $this->consumedGaz = ($this->building->height - $this->target->size + $this->building->distance);
        }

        // Player is lower than the titan
        if ($this->building->height <= $this->target->size) {
            $this->power = abs($this->building->height - $this->target->size) * 5 + $this->building->distance * 2 - $this->target->speed;
            $this->consumedGaz = abs($this->building->height - $this->target->size + $this->building->distance);
        }
        //Check if player has gas left
        if ($this->gaz->getValue() - $this->consumedGaz < 0) {
            echo "Je n'ai plus de gaz, je ne peux plus attaquer.<br>";
            $this->gaz->consume($this->gaz->getValue());

            return;
        }

        // Attack the titan, consume gas and update score
        $this->score += 1;
        $this->gaz->consume($this->consumedGaz);
        $this->target->health -= $this->power;
        echo " Je frappe le Titan avec mes épées, il perd " . $this->power . " (+ 1pt). Cette frappe me coute " . $this->consumedGaz . " de gaz. Restant : " . $this->gaz->getValue() . "<br>";
    }
}