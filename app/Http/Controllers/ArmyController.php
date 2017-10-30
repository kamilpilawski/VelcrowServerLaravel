<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 19:34
 */

namespace App\Http\Controllers;

use App\Fight;
use App\Village;
use Illuminate\Http\Request;
use JWTAuth;


class ArmyController extends Controller
{

    public function getFights(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce pobrac informacje o walkach.');

        $fights = Fight::where('user_id', $user['id']);

        return response()->json(['data' => $fights], 200);
        //todo zwracac walki z paginacja?
    }


    public function getVillagesInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce pobrac informacje o walkach.');

        $villages = Village::where('name', $request['village_name']);

        return response()->json(['data' => $villages], 200);
        //todo zwracac ile informacji o wioskach?
    }

}