<?php

namespace Challenges\NOEL_2023_2;

use Challenges\NOEL_2023_2\Kid;
use Challenges\NOEL_2023_2\Grinch;

class GrinchGame
{
    public string $answer = '';
    public object $grinch;
    public array $kidsObjects = [];

    public function __construct(public int $time, public array $kids, public int $grinchFear)
    {
        if (!empty($kids)) {
            $this->formatKids($kids);
        } else {
            $this->kids = [new Kid('John', 1)];
        }
        $this->grinch = new Grinch($grinchFear);
    }

    function formatKids($kidsCodeArray): void
    {
        foreach ($kidsCodeArray as $kidCode) {
            $this->kidsObjects[] = Kid::generateKid($kidCode);
        }
    }

    public function start(): void
    {
        foreach ($this->kidsObjects as $kid) {
            if ($this->time > 0 && $this->time - 3 >= 0 || $this->time - 5 >= 0) {
                if ($this->grinch->fear > $kid->fear) {
                    $this->answer .= ucfirst($kid->letter);
                    $this->time -= 3;
                } elseif ($kid->fear >= $this->grinch->fear) {
                    $this->time -= 5;
                }
            } elseif (empty($this->answer)) {
                $this->answer = 'GRINCH';
            }
        }
    }
}