<?php

namespace Challenges\ATTACK_OF_TITANS;

use Illuminate\Support\Collection;
use Tainix\Game;
use Tainix\Html;

// INITIALISATION ---------------------
$game = new Game(
    $_ENV['TAINIX_KEY'],
    basename(__DIR__)
);

$data = $game->input();

// VISUALISATION DES DONNEES ----------
foreach ($data as $name => $value) {
    $$name = $value;
    Html::debug($$name, '$' . $name);
}

// CODE DU CHALLENGE ------------------

$titanFight = new Battle($titans, $habitations, $gaz);

$titanFight->start();
$titanFight->fight();

html::debug($titanFight->getScore(), 'Score');
// REPONSE ----------------------------
$game->output(['data' => $titanFight->getScore()]);