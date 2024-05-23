<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\FOOTBALL_1\Football;
final class Football_1Test extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	// TES METHODES DE TEST ---------------------
    public function test_constructor_sorts_and_formats_output_correctly()
    {
        $data = [32, 34, 12, 16, 14, 2, 20, 10, 35, 26, 5, 36, 31, 3, 29, 33, 24, 22, 38, 15, 28];
        $football = new Football($data);
        $expected = '18-11-8-1-15-0-12-14-20-9-16';
        $this->assertEquals($expected, $football->answer);
    }

    public function test_constructor_with_small_dataset()
    {
        $data = [10, 20, 5];
        $football = new Football($data);
        $expected = '1-0-2';
        $this->assertEquals($expected, $football->answer);
    }

    public function test_constructor_with_empty_array()
    {
        $data = [];
        $football = new Football($data);
        $expected = '';
        $this->assertEquals($expected, $football->answer);
    }
}