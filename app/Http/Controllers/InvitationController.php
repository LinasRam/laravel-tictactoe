<?php

namespace App\Http\Controllers;

use App\Game;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendInvitation($invitedUser)
    {
        $user = Auth::user()->id;

        $invitation = new Invitation();
        $invitation->user1_id = $user;
        $invitation->user2_id = $invitedUser;
        $invitation->save();

        return response()->json([]);
    }

    public function lookForInvitation()
    {
        $user = Auth::user()->id;

        $invitation = Invitation::where('user2_id', $user)->first();

        if (!collect($invitation)->isEmpty()) {
            return response()->json(array(
                'invitation' => true,
                'inviting_user_id' => $invitation->user1_id,
            ));
        }
        return response()->json(array(
            'invitation' => false,
        ));
    }

    public function decline()
    {
        $user = Auth::user()->id;

        $invitation = Invitation::where('user2_id', $user)->delete();

        return response()->json();
    }

    public function accept()
    {
        $user = Auth::user()->id;

        $invitation = Invitation::where('user2_id', $user)->first();
        $user1 = $invitation->user1_id;
        $user2 = $invitation->user2_id;

        $previousGames = Game::where('user1_id', $user)->orWhere('user2_id', $user)->delete();

        $game = new Game();
        $game->user1_id = $invitation->user1_id;
        $game->user2_id = $invitation->user2_id;
        $game->turn_user_id = $invitation->user1_id;
        $game->save();

        $gameId = Game::where('user2_id', $user)->first()->id;

        $invitation = Invitation::where('user2_id', $user)->delete();

        return response()->json(array(
            'user1' => $user1,
            'user2' => $user2,
            'game_id' => $gameId,
        ));
    }


}
