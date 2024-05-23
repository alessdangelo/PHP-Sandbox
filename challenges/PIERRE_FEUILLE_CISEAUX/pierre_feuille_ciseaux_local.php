<?php
namespace Challenges\PIERRE_FEUILLE_CISEAUX;

use Tainix\Html;
use Challenges\PIERRE_FEUILLE_CISEAUX\PIERRE_FEUILLE_CISEAUX;
// ECHANTILLON ------------------------
$coups = 'FPPPFCCPPFF';

Html::debug($coups, '$coups');

// CODE DU CHALLENGE ------------------

$game = new PIERRE_FEUILLE_CISEAUX($coups);
echo $game->answer;

// REPONSE ATTENDUE -------------------
Html::debug('CFFFCPPFFCC', 'Réponse attendue', 'success');