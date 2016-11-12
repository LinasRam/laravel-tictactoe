<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{

    public function index($id)
    {
        return view('game');
    }

    public function move($id, $button)
    {
        $user = Auth::user();
        $game = Game::find($id);

        if ($game->turn_user_id == $user->id) {
            switch ($button) {
                case 1:
                    if ($game->button1 == null) {
                        $game->button1 = 'X';
                        $game->moves = $game->moves + 1;
                        $game->save();
                        break;
                    }
            }
        }
    
        return response()->json($game);
    }

}
