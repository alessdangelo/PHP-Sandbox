<?php

namespace Challenges\NOEL_2023_2;

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
    ${$name} = $value;
    Html::debug(${$name}, '$' . $name);
}

// CODE DU CHALLENGE ------------------

$grinchGame = new GrinchGame($time, $kids, $fear);
$grinchGame->start();

// REPONSE ----------------------------
$game->output(['data' => $grinchGame->answer]);