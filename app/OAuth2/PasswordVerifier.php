<?php
/**
 * Created by PhpStorm.
 * User: pdayvson
 * Date: 28/12/15
 * Time: 09:57
 */

namespace CodeDelivery\OAuth2;


use Illuminate\Support\Facades\Auth;

class PasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}