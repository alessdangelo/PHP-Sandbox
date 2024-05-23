<?php

namespace Challenges\NOEL_2023_2;

class Kid
{
    public string $name;
    public int $fear;
    public string $letter;

    public function __construct(string $name, int $fear)
    {
        $this->name = $name;
        $this->fear = $fear;
        $this->letter = $name[0];
    }
}

