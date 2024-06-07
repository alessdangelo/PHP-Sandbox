<?php

namespace Challenges\NOEL_2023_2;

use Challenges\NOEL_2023_2\Kid;
use Challenges\NOEL_2023_2\Grinch;
use Illuminate\Support\Collection;

class GrinchGame
{
    private const TIME_TO_SCARE = 3;
    private const TIME_LOST = 5;
    private Collection $kidsCollection;
    public Grinch $grinch;
    public string $answer = '';

    public function __construct(
        public int   $time,
        public array $kids,
        public int   $grinchFear
    )
    {
        $this->kidsCollection = collect($this->formatKids($kids));
        $this->grinch = new Grinch($grinchFear);
    }

    private function formatKids($kidsEncodedCollection): array
    {
        $kids = collect($kidsEncodedCollection);
        $kids->transform(function ($item) {
            return Kid::generateKid($item);
        });

        return $kids->all();
    }

    public function start(): void
    {
        $this->kidsCollection->transform(function ($item) {
            if ($this->time <= 0) {
                return;
            }
            if ($this->time - self::TIME_TO_SCARE < 0) {
                return;
            }

            if ($this->grinch->fear > $item->fear) {
                $this->answer .= $item->letter;
                $this->time -= self::TIME_TO_SCARE;

                return;
            }
            $this->time -= self::TIME_LOST;
        });

        if (empty($this->answer)) {
            $this->answer = 'GRINCH';
        }
    }
}