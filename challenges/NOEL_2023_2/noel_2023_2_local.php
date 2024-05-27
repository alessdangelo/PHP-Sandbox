<?php

namespace Challenges\NOEL_2023_2;

use Tainix\Html;

// ECHANTILLON ------------------------
$kids = ['Juliette_8', 'Chloe_9', 'Nathan_1', 'Lina_3', 'Gabin_2', 'Henri_10', 'Leon_1'];
$fear = 5;
$time = 38;
Html::debug($kids, '$kids');
Html::debug($fear, '$fear');
Html::debug($time, '$time');

// CODE DU CHALLENGE ------------------
$grinchGame = new GrinchGame($time, $kids, $fear);
$grinchGame->start();
Html::debug($grinchGame->answer, '$game->answer');

// REPONSE ATTENDUE -------------------
Html::debug('NLGL', 'Réponse attendue', 'success');