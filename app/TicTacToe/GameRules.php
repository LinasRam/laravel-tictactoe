<?php

namespace App\TicTacToe;


class GameRules
{

    public function makeMove($game, $user, $button)
    {
        $buttonValue = $this->getButtonValue($game);

        if ($game->turn_user_id == $user->id) {
            switch ($button) {
                case 1:
                    if ($game->button1 == null) {
                        $game->button1 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 2:
                    if ($game->button2 == null) {
                        $game->button2 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 3:
                    if ($game->button3 == null) {
                        $game->button3 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 4:
                    if ($game->button4 == null) {
                        $game->button4 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 5:
                    if ($game->button5 == null) {
                        $game->button5 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 6:
                    if ($game->button6 == null) {
                        $game->button6 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 7:
                    if ($game->button7 == null) {
                        $game->button7 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 8:
                    if ($game->button8 == null) {
                        $game->button8 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
                case 9:
                    if ($game->button9 == null) {
                        $game->button9 = $buttonValue;
                        $game->moves = $game->moves + 1;
                        $game = $this->switchTurnUser($game);
                        $game->save();
                    }
                    break;
            }
        }
    }

    public function isGameOver($game)
    {
        if ($this->isHorizontalRowWin($game) || $this->isVerticalRowWin($game) || $this->isDiagonalWin($game)) {
            $game = $this->switchTurnUser($game);
            $game->winner_id = $game->turn_user_id;
            return true;
        } else if ($this->isDraw($game)) {
            return true;
        }
        return false;
    }

    private function getButtonValue($game)
    {
        if ($game->moves % 2 == 0) {
            return 'X';
        } else {
            return 'O';
        }
    }

    private function switchTurnUser($game)
    {
        if ($game->turn_user_id == $game->user1_id) {
            $game->turn_user_id = $game->user2_id;
        } else {
            $game->turn_user_id = $game->user1_id;
        }

        return $game;
    }

    private function isHorizontalRowWin($game)
    {
        if ($game->button1 != null && $game->button2 != null && $game->button3 != null
            && $game->button1 == $game->button2 && $game->button2 == $game->button3
        ) {
            return true;
        } else if ($game->button4 != null && $game->button5 != null && $game->button6 != null
            && $game->button4 == $game->button5 && $game->button5 == $game->button6
        ) {
            return true;
        } else if ($game->button7 != null && $game->button8 != null && $game->button9 != null
            && $game->button7 == $game->button8 && $game->button8 == $game->button9
        ) {
            return true;
        }
        return false;
    }

    private function isVerticalRowWin($game)
    {
        if ($game->button1 != null && $game->button4 != null && $game->button7 != null
            && $game->button1 == $game->button4 && $game->button4 == $game->button7
        ) {
            return true;
        } else if ($game->button2 != null && $game->button5 != null && $game->button8 != null
            && $game->button2 == $game->button5 && $game->button5 == $game->button8
        ) {
            return true;
        } else if ($game->button3 != null && $game->button6 != null && $game->button9 != null
            && $game->button3 == $game->button6 && $game->button6 == $game->button9
        ) {
            return true;
        }
        return false;
    }

    private function isDiagonalWin($game)
    {
        if ($game->button1 != null && $game->button5 != null && $game->button9 != null
            && $game->button1 == $game->button5 && $game->button5 == $game->button9
        ) {
            return true;
        } else if ($game->button3 != null && $game->button5 != null && $game->button7 != null
            && $game->button3 == $game->button5 && $game->button5 == $game->button7
        ) {
            return true;
        }
        return false;
    }

    private function isDraw($game)
    {
        if ($game->moves == 9) {
            return true;
        }
        return false;
    }

}