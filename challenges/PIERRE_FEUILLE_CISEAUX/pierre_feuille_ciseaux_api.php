<?php
namespace Challenges\PIERRE_FEUILLE_CISEAUX;

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

$calc = new PIERRE_FEUILLE_CISEAUX($coups);
echo $calc->answer;

// REPONSE ----------------------------
 $game->output(['data' => $calc->answer]);