<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 18:43
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Village;

class VillageController extends Controller
{
    public function getVillageInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        error_log('User ' . $user['email'] . ' pobiera informacje o wioskach.');


        error_log('jest user: ' . $user);
        $village = Village::where('user_id', $request->user()['id']);
        return response()->json(['data' => $village], 200);

    }

    public function villageAttack(Request $request)
    {
        //todo logika ataku
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce zaatakować wioskę.');

        error_log('request ataku: ' . $request);
        return response()->json(['data' => 'Atakujesz wioskę'], 200);

    }
}