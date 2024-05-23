<?php
namespace Challenges\FOOTBALL_1;

use Tainix\Html;

// ECHANTILLON ------------------------
$joueurs = [32, 34, 12, 16, 14, 2, 20, 10, 35, 26, 5, 36, 31, 3, 29, 33, 24, 22, 38, 15, 28];

Html::debug($joueurs, '$joueurs');

// CODE DU CHALLENGE ------------------
$football = new Football($joueurs);
echo $football->answer;


// REPONSE ATTENDUE -------------------
Html::debug('18-11-8-1-15-0-12-14-20-9-16', 'Réponse attendue', 'success');