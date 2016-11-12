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
        $invitation->accepted = false;
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
        Invitation::where('user2_id', $user)->update(['accepted' => true]);

        $previousGames = Game::where('user1_id', $user)->orWhere('user2_id', $user)->delete();

        $game = new Game();
        $game->user1_id = $invitation->user1_id;
        $game->user2_id = $invitation->user2_id;
        $game->turn_user_id = $invitation->user1_id;
        $game->save();

        $gameId = Game::where('user2_id', $user)->first()->id;

        return response()->json(array(
            'game_id' => $gameId,
        ));
    }

    public function cancel()
    {
        $user = Auth::user()->id;

        $invitation = Invitation::where('user1_id', $user)->delete();

        return response()->json();
    }

    public function lookForResponse()
    {
        $user = Auth::user()->id;

        $invitation = Invitation::where('user1_id', $user)->first();

        if (!collect($invitation)->isEmpty()) {
            if ($invitation->accepted == true) {
                $invitation = Invitation::where('user1_id', $user)->delete();
                $gameId = Game::where('user1_id', $user)->first()->id;
                return response()->json(array(
                    'accepted' => true,
                    'game_id' => $gameId,
                ));
            }
        }
        return response()->json(array(
            'accepted' => false,
        ));
    }


}
