<?php

namespace Challenges\ATTACK_OF_TITANS;

use Tainix\Html;

// ECHANTILLON ------------------------
$titans = ['20;7;1261', '25;10;2255', '11;10;999', '24;10;2160'];
$habitations = ['23;20', '19;39', '12;48'];
$gaz = 1070;
//$titans = ['22;9;1787', '15;8;1089', '16;9;1298', '19;7;1198', '17;5;767', '4;6;216'];
//$habitations = ['21;33', '8;50', '30;45'];
//$gaz = 1268;

Html::debug($titans, '$titans');
Html::debug($habitations, '$habitations');
Html::debug($gaz, '$gaz');

// CODE DU CHALLENGE ------------------
//$titanCollection = collect($titans)->map(function ($titan) {
//    $titan = explode(';', $titan);
//
//    return new Titan($titan[0], $titan[1], $titan[2]);
//})->sortByDesc('size');
//
//$buildingCollection = collect($habitations)->map(function ($habitation) {
//    $habitation = explode(';', $habitation);
//
//    return new Building($habitation[0], $habitation[1]);
//})->sortBy([
//    ['height', 'desc'],
//    ['distance', 'asc'],
//
//]);
////Html::debug($buildingCollection->toArray(), '$habitations');
//
////function getHighestTitan($titanCollection)
////{
////    return $titanCollection->max(function ($titan) {
////        return $titan;
////    });
////}
//
////$maxHeightTitan = getHighestTitan($titanCollection);
//$maxHeightTitan = $titanCollection->first();
////$higherBuildings = $buildingCollection->filter(function ($building) use ($maxHeightTitan) {
////    return $building->height > $maxHeightTitan->size;
////});
////
////if ($higherBuildings->isEmpty()) {
////    $nearestHigherBuilding = $buildingCollection->max(function ($building) {
////        return $building;
////    });
////} else {
////    $nearestHigherBuilding = $higherBuildings->min(function ($building) {
////        return $building;
////    });
////}
////

//Html::debug($titanCollection->toArray(), '$titanCollection');
//Html::debug($buildingCollection->toArray(), '$buildingCollection');

//$levi = new Player(
//    0,
//    $titanCollection->first(),
//    $buildingCollection->first(),
//    $gaz);
//
//while ($levi->gaz > 0 && !$titanCollection->isEmpty()) {
//    if ($levi->target->health <= 0) {
//        $levi->score += 100;
//        $titanCollection->shift();
//        if ($titanCollection->isEmpty()) {
//            return;
//        }
//        $levi->target = $titanCollection->first();
//        $buildingCollection->push($buildingCollection->shift());
//        $levi->building = $buildingCollection->first();
//    }
//    $levi->attack();
//}
//echo $levi->score;

$titanFight = new Battle($titans, $habitations, $gaz);

$titanFight->start();
$titanFight->fight();
html::debug($titanFight->getScore(), 'Score');
// REPONSE ATTENDUE -------------------
Html::debug('158', 'Réponse attendue', 'success');