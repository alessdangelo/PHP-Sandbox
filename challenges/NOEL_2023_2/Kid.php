<?php

namespace Challenges\NOEL_2023_2;

class Kid
{
    public string $letter;

    public function __construct(public string $name, public int $fear)
    {
        $this->letter = ucfirst($name[0]);
    }

    // Fonction statique qui genere un objet Kid à partir d'une string
    public static function generateKid(string $code): Kid
    {
        [$name, $fear] = explode('_', $code);

        return new Kid($name, (int)$fear);
    }
}

