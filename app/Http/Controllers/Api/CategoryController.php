<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function all_Categories(Request $request)
    {
        $all_categories = DB::table('categories')
            ->get();

        return $message = array(
            'status' => 1,
            'message' => 'all categories json for test',
            'data' => $all_categories
        );
    }
}
