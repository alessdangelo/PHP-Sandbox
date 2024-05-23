<?php

namespace Challenges\PIERRE_FEUILLE_CISEAUX;

class PIERRE_FEUILLE_CISEAUX
{
    private const WHO_WINS = [
        "F"  => "C",
        "P"  => "F",
        "C"  => "P",
    ];
    public string $answer = '';

    public function __construct(string $coups)
    {
        foreach (str_split($coups) as $coup) {
            array_key_exists($coup, self::WHO_WINS) ? $this->answer .= self::WHO_WINS[$coup] : '';
        }
    }
}