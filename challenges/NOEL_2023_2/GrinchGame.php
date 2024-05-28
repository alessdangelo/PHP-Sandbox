<?php

namespace Challenges\NOEL_2023_2;

use Challenges\NOEL_2023_2\Kid;
use Challenges\NOEL_2023_2\Grinch;

class GrinchGame
{
    private const TIME_TO_SCARE = 3;
    private const TIME_LOST = 5;
    public string $answer = '';
    public Grinch $grinch;
    public array $kidsCollection = [];

    public function __construct(public int $time, public array $kids, public int $grinchFear)
    {
        $this->kidsCollection = $this->formatKids($kids);
        $this->grinch = new Grinch($grinchFear);
    }

    private function formatKids($kidsCodeArray): array
    {
        $kids = [];
        foreach ($kidsCodeArray as $kidCode) {
            $kids[] = Kid::generateKid($kidCode);
        }

        return $kids;
    }

    public function start(): void
    {
        foreach ($this->kidsCollection as $kid) {
            if ($this->time <= 0) {
                return;
            }

            if ($this->time - self::TIME_TO_SCARE < 0) {
                return;
            }

            if ($this->grinch->fear > $kid->fear) {
                $this->answer .= $kid->letter;
                $this->time -= self::TIME_TO_SCARE;
                continue;
            }

            $this->time -= self::TIME_LOST;
        }

        if (empty($this->answer)) {
            $this->answer = 'GRINCH';
        }
    }
}