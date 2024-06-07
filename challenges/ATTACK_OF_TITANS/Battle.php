<?php

namespace Challenges\ATTACK_OF_TITANS;

use Illuminate\Support\Collection;
use Tainix\Html;
use function PHPUnit\Framework\isEmpty;

class Battle
{
    private Collection $titanCollection;
    private Collection $buildingCollection;
    private Player $levi;

    public function __construct(
        public array $titans,
        public array $buildings,
        public int   $gaz
    )
    {
        $this->titanCollection = collect($titans)->map(function ($titan) {
            return Titan::newFromString($titan);
        })->sortByDesc('size');

        $this->buildingCollection = collect($buildings)->map(function ($building) {
            return Building::newFromString($building);
        })->sortBy([
            ['height', 'desc'],
            ['distance', 'asc'],
        ]);
    }

    public function start(): void
    {
        $this->levi = new Player(
            $this->titanCollection->first(),
            $this->buildingCollection->first(),
            new Gaz($this->gaz));

        html::debug($this->titanCollection, 'Titans');
        html::debug($this->buildingCollection, 'Buildings');
        $closest = $this->levi->building->getClosest($this->levi->target->size, $this->buildingCollection);
        $this->levi->building = $closest;
        echo "Bâtiment : " . $this->levi->building->height . "," . $this->levi->building->distance . "<br>";

        echo "Deplacement: gaz passe de " . $this->levi->gaz->getValue() . " à ";
        $this->levi->gaz->consume($this->levi->building->height);
        echo $this->levi->gaz->getValue() . "<br>";
    }

    public function fight(): void
    {
        while ($this->levi->gaz->getValue() > 0 && !$this->titanCollection->isEmpty()) {
            if ($this->levi->target->health > 0) {
                $this->levi->attack();
                echo "<br>Vie du titan : " . $this->levi->target->health . "<br>";

                continue;
            }

            echo "Titan abattu<br>";
            $this->levi->score += 100;
            $this->titanCollection->shift();
            if ($this->titanCollection->isEmpty()) {
                echo $this->levi->gaz->getValue() . ": Plus de titan<br>";

                return;
            }
            $this->levi->target = $this->titanCollection->first();
            $closest = $this->levi->building->getClosest($this->levi->target->size, $this->buildingCollection);

            if ($this->levi->building->height != $closest->height || $this->levi->building->distance != $closest->distance) {
                echo "<br>Changement de batiment : " . $this->levi->building->height . "," . $this->levi->building->height . "<br>";
                $gazToConsume = abs($closest->height - $this->levi->building->height);
                $this->levi->gaz->consume($gazToConsume);
                $this->levi->building = $closest;
            }
        }
    }

    public function getScore(): int
    {
        return $this->levi->score;
    }

}