<?php


namespace App\Helpers;


use Carbon\Carbon;

class Helpers
{

    static function formatDate($format, $date)
    {
        return date($format, strtotime(Carbon::parse($date)));
    }

    static function accessToken($user, $tokenName)
    {
        $tokenResult = $user->createToken($tokenName);

        $token = $tokenResult->token;

        $token->save();

        return $tokenResult->accessToken;
    }
}
