<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all_products(Request $request)
    {
        $all_products = DB::table('product')
            ->get();

        if ($all_products) {

            return $message = array(
                'status' => 1,
                'message' => 'all product json for test',
                'data' => $all_products
            );
        } else {
            return $message = array(
                'status' => 0,
                'message' => 'error in all_products',
                'data' => null
            );
        }
    }

    public function cat_products(Request $request)
    {
        $cat_products = DB::table('products')
            ->where("category_id", $request->id)
            ->get();
            
        if (count($cat_products)!== 0) {

            return $message = array(
                'status' => 1,
                'message' => 'all product that have same category id',
                'data' => $cat_products
            );
        } else {
            return $message = array(
                'status' => 0,
                'message' => 'no product exist for this category',
                'data' => null
            );
        }
    }
    
    public function add_product(Request $request)
    {
        $cat_products = DB::table('products')
            ->where("category_id", $request->id)
            ->get();
            
        if (count($cat_products)!== 0) {

            return $message = array(
                'status' => 1,
                'message' => 'all product that have same category id',
                'data' => $cat_products
            );
        } else {
            return $message = array(
                'status' => 0,
                'message' => 'no product exist for this category',
                'data' => null
            );
        }
    }
}
