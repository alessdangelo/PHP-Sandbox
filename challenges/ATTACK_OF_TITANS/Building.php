<?php

namespace Challenges\ATTACK_OF_TITANS;

use Illuminate\Support\Collection;

class Building
{
    private function __construct(
        public int $height,
        public int $distance) {}

    public function getClosest(int $targetSize, Collection $buildingCollection): Building
    {
        $sorted = $buildingCollection->sortBy('height');
        $highest = $buildingCollection->sortByDesc('height')->first();

        $closest = $sorted->first((function ($value) use ($targetSize) {
            return $value->height > $targetSize;
        }));

        // Return the highest building if no building is higher than the target
        return $closest == null ? $highest : $closest;
    }

    public static function newFromString(string $building): Building
    {
        $building = explode(';', $building);

        return new Building($building[0], $building[1]);
    }
}