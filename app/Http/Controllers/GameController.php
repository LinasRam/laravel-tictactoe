<?php

namespace App\Http\Controllers;

use App\Game;
use App\TicTacToe\GameRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private $gameRules;

    public function __construct(GameRules $gameRules)
    {
        $this->gameRules = $gameRules;
    }

    public function index($id)
    {
        return view('game');
    }

    public function move($id, $button)
    {
        $user = Auth::user();
        $game = Game::find($id);

        $this->gameRules->makeMove($game, $user, $button);

        if ($this->gameRules->isGameOver($game)) {
            $game->over = true;
        } else {
            $game->over = false;
        }
        $game->current_user_id = $user->id;

        return response()->json($game);
    }

    public function status($id)
    {
        $user = Auth::user();
        $game = Game::find($id);

        if ($this->gameRules->isGameOver($game)) {
            $game->over = true;
        } else {
            $game->over = false;
        }
        $game->current_user_id = $user->id;

        return response()->json($game);
    }

}
