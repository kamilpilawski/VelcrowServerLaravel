<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 28.10.2017
 * Time: 16:12
 */

namespace App\Http\Controllers;

use App\Market;
use App\Resource;
use App\User;
use App\Village;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions;
use JWTAuth;

class UserController extends Controller
{

    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'villageName' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        error_log('Utworzono usera: ' . $user);

        $village = new Village (['name' => $request->input('villageName')]);

        $user->village()->save($village);

        $market = Market::all()->each(function ($item, $key) use ($user) {
            $resource = new Resource([
                'market_id'=>$item->id,
                'user_id'=>$user->id,
                'amount'=>10
            ]);
            $user->resource()->save($resource);
        });

        error_log('Utworzono wioskę: ' . $village);

        return response()->json([
            'message' => 'Utworzono użytkownika i wioskę: ' . $request->input('name') . ', ' . $request->input('villageName')
        ], 201);
    }

    public function signin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        error_log('Proba logowania dla ' . $credentials['email']);

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                error_log('Nieudane logowanie dla ' . $credentials['email']);
                return response()->json([
                    'error' => 'Niewłaściwe dane logowania'
                ], 401);
            }
        } catch (Exceptions\JWTException $e) {
            error_log('Wyjątek poczas logowania ' . $e);
            return response()->json([
                'error' => 'Nieudane logowanie, błąd serwera'
            ], 500);
        }

        error_log('Udane logowanie dla ' . $credentials['email']);
        return response()->json([
            'token' => $token
        ], 200);
    }

    public function signout(Request $request)
    {
        $token = $request['token'];

        try {
            JWTAuth::invalidate($token);
        } catch (Exceptions\JWTException $e) {
            error_log('zle rzezy : ' + $e);
            return response()->json([
                'error' => 'Nieudane wylogowanie, błąd serwera'
            ], 500);
        }

        return response()->json([
            'message' => 'Wylogowano poprawnie'
        ], 200);
    }
}