<?php
declare(strict_types=1);

use Challenges\PIERRE_FEUILLE_CISEAUX\PIERRE_FEUILLE_CISEAUX;
use PHPUnit\Framework\TestCase;


final class Pierre_feuille_ciseauxTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	// TES METHODES DE TEST ---------------------
    public function testPierre_Feuille(): void
    {
        $coups = 'P';
        $game = new PIERRE_FEUILLE_CISEAUX($coups);
        $this->assertEquals('F', $game->answer);
    }

    public function testVide(): void
    {
        $coups = '';
        $game = new PIERRE_FEUILLE_CISEAUX($coups);
        $this->assertEquals('', $game->answer);
    }
}