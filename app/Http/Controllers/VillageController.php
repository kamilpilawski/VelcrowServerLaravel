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
use App\Market;
use App\Resource;

class VillageController extends Controller
{
    public function getVillageInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        error_log('User ' . $user['email'] . ' pobiera informacje o wioskach.');

        $market = Market::all();

        $resources = Resource::where(['user_id' => $user->id])->get()->map(function ($res, $key) use ($market) {

            $resName = $market->first(function ($item, $key) use ($res) {
                return $item['id'] == $res['market_id'];
            });
            $res->setAttribute('name', $resName['name']);
            $res->setAttribute('price', $resName['price']);
            return $res;

        });

        error_log('jest user: ' . $user);

        return response()->json(['data' => $resources], 200);

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