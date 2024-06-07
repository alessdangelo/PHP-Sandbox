<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\NOEL_2023_2\GrinchGame;

final class Noel_2023_2Test extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	// TES METHODES DE TEST ---------------------

    public function test_with_small_dataset()
    {
        $data = ["Aline_4", "Selim_6", "Bob_8"];
        $grinchGame = new GrinchGame(100, $data, 5);
        $grinchGame->start();
        $expected = 'A';
        $this->assertEquals($expected, $grinchGame->answer);
    }

    public function test_with_empty_array()
    {
        $data = [];
        $grinchGame = new GrinchGame(0, $data, 0);
        $grinchGame->start();
        $expected = 'GRINCH';
        $this->assertEquals($expected, $grinchGame->answer);
    }

    function testUpperCase()
    {
        $data = ["aline_4", "selim_6", "bob_8"];
        $grinchGame = new GrinchGame(34, $data, 5);
        $grinchGame->start();
        $expected = strtoupper($grinchGame->answer);
        $this->assertEquals($expected, $grinchGame->answer);
    }

    function testLowerCase()
    {
        $data = ["aline_4", "selim_6", "bob_8"];
        $grinchGame = new GrinchGame(34, $data, 5);
        $grinchGame->start();
        $expected = strtolower($grinchGame->answer);
        $this->assertNotEquals($expected, $grinchGame->answer);
    }

}