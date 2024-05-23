<?php

namespace Challenges\NOEL_2023_2;
use Challenges\NOEL_2023_2\Kid;
use Challenges\NOEL_2023_2\Grinch;
class GrinchGame
{
    public string $answer = '';
    public int $time;
    public array $kids;
    public $grinch;

    public function __construct(int $time, array $kids, $grinchFear)
    {
        $this->time = $time;
        if (!empty($kids)) {
            $this->formatKids($kids);
        } else {
            $this->kids = [new Kid('John', 1)];
        }
        $this->grinch = new Grinch($grinchFear);
    }

    function formatKids($kidsArray)
    {
        foreach ($kidsArray as $kid) {
            $kid = explode('_', $kid);
            $this->kids[] = new Kid($kid[0], $kid[1]);
        }
    }

    public function start()
    {
        $this->process();
    }

    function process()
    {
        foreach ($this->kids as $kid) {
            if ($this->time > 0 and ($this->time - 3 >= 0) or ($this->time - 5 >= 0)) {
                if ($this->grinch->fear > $kid->fear) {
                    $this->answer .= ucfirst($kid->letter);
                    $this->time -= 3;
                } else if ($kid->fear >= $this->grinch->fear) {
                    $this->time -= 5;
                }
            }
            elseif (empty($this->answer)) {
                $this->answer = 'GRINCH';
            }
        }
    }
}