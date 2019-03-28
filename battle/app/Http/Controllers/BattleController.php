<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/27
 * Time: 6:58 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Algorithm\Dice;

class BattleController extends Controller
{

    protected $battleAlgorithm = null;
    protected function setBattleAlgorithm()
    {
        $this->battleAlgorithm = new Dice();
    }





    public function duel(Request $request)
    {
        $this->setBattleAlgorithm();
        $duelResult = $this->battleAlgorithm->fight();
        return response()->json(
            [
                'player1'     => $request->input('userA'),
                'player2'     => $request->input('userB'),
                'duelResults' => $duelResult
            ] );
    }


}