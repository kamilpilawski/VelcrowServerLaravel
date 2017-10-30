<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Village;
use Illuminate\Http\Request;
use JWTAuth;

class SettingsController extends Controller
{
    public function getSettings(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce pobrać informacje o ustawieniach.');

        $settingsInfo = Village::where('user_id', $user['id']);

        return response()->json(['village_name' => $settingsInfo], 200);
    }

    public function setPassword(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce zmienić hasło.');

        //todo logika zmiany hasła


        return response()->json(['data' => 'Hasło zmienione'], 200);

    }

    public function setVillageName(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce zmienić nazwe wioski.');

        $village = Village::where('user_id', $user['id']);
        $village->name = $request['new_village_name'];
        $village->save();

        return response()->json(['data' => 'Nazwa wioski zmieniona'], 200);
    }

}