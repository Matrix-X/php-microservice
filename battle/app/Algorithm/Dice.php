<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/27
 * Time: 7:18 PM
 */

namespace App\Algorithm;


class Dice
{

    const TOTAL_ROUNDS = 3;
   const MIN_DICE_VALUE = 1;
   const MAX_DICE_VALUE = 6;
   public function fight()
   {
       $totalRoundsWin = [
           'player1' => 0,
           'player2' => 0
       ];
       for ($i = 0; $i < self::TOTAL_ROUNDS; $i++) {
           $player1Result = rand(
               self::MIN_DICE_VALUE,
               self::MAX_DICE_VALUE
           );
           $player2Result = rand(
               self::MIN_DICE_VALUE,
               self::MAX_DICE_VALUE
           );
           $roundResult = ($player1Result <=> $player2Result);
           if ($roundResult === 1) {
               $totalRoundsWin['player1'] =
               $totalRoundsWin['player1'] + 1;
           } else if ($roundResult === -1) {
               $totalRoundsWin['player2'] =
               $totalRoundsWin['player2'] + 1;
           }
       }
       return $totalRoundsWin;
   }

}