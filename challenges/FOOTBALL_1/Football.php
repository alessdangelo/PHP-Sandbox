<?php

namespace Challenges\FOOTBALL_1;
//$dataExemple = [32, 34, 12, 16, 14, 2, 20, 10, 35, 26, 5, 36, 31, 3, 29, 33, 24, 22, 38, 15, 28];
class Football
{
    public string $answer = '';

    /**
     * @param array<int> $data
     */
    public function __construct(array $data)
    {
        arsort($data, SORT_NUMERIC);
        $this->answer = implode('-', array_slice(array_keys($data), 0, 11));
    }
}