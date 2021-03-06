<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 19:17
 */

namespace App\Http\Controllers;


use App\Market;
use App\Resource;
use Illuminate\Http\Request;
use JWTAuth;


class MarketController extends Controller
{

    public function getMarketInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' pobiera informacje o wartościach na rynku.');

        $markets=Market::all();

        error_log('pobralem market info dla usera: ' . $user->id . ' takie: ' . $markets);

        return response()->json(['data' => $markets], 200);

    }

    public function buyResources(Request $request)
    {
        //todo logika kupowania
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' pobiera informacje o wartościach na rynku.');

        error_log('Taki jest request do kupienia rzeczy: ' . $request);

        return response()->json(['data' => 'ok'], 200);

    }

}