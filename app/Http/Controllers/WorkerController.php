<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 19:42
 */

namespace App\Http\Controllers;


use App\Resource;
use Illuminate\Http\Request;
use JWTAuth;


class WorkerController extends Controller
{
    public function getStats(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        error_log('User ' . $user['email'] . ' chce pobrać informacje o pracownikach.');

        $stats = Resource::where('user_id', $request->user()['id']);

        return response()->json(['data' => $stats], 200);

        //todo obsluga bledow jak nie znajdzie czy jakis inny blad?

    }

    public function assignWorkers(Request $request)
    {
        $user = JWTAuth::parsetoken()->toUser();
        error_log('User ' . $user['email'] . ' chce przydzielic pracowników.');

        error_log('taki request przydzialu pracownikow: ' . $request);

        //todo update pewnych rekordow w tabeli revenues?

        return response()->json(['data' => 'ok'], 200);

    }

}