<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function all_markets(Request $request)
    {
        $all_markets = DB::table('market')
            ->get();

        return $message = array(
            'status' => 1,
            'message' => 'all markets json for test',
            'data' => $all_markets
        );
    }
}
