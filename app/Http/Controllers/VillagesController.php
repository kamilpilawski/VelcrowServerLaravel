<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 19:50
 */

namespace App\Http\Controllers;


use App\Village;
use Illuminate\Http\Request;
use JWTAuth;

class VillagesController extends Controller
{

    public function getVillagesInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' pobiera informacje o wioskach.');

        $villagesInfo = Village::all();

        return response()->json(['villages' => $villagesInfo], 200);
    }

}