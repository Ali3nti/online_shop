<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all_products(Request $request)
    {
        $all_products = DB::table('products')
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
    
    public function product(Request $request)
    {
        $product = DB::table('products')
            ->where("id",$request->id)
            ->first();

        if ($product) {

            return $message = array(
                'status' => 1,
                'message' => 'product json returned',
                'data' => $product
            );
        } else {
            return $message = array(
                'status' => 0,
                'message' => 'error in find product',
                'data' => null
            );
        }
    }

    public function cat_products(Request $request)
    {
        $cat_products = DB::table('products')
            ->where("category_id", $request->id)
            ->get();

        if (count($cat_products) !== 0) {

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
        $addProduct = DB::table('products')
            ->insertGetId([
                'name' => $request->name,
                'category_id' => $request->categoryId,
                'price' => $request->price,
                'description' => $request->description,
                'stock_quantity' => $request->stockQuantity,
                'unit' => $request->unit,
                'brand' => $request->brand,
                'is_active' => $request->isActive,
                'weight' => $request->weight,
                'dimensions' => $request->dimensions,
                'color' => $request->color,
                'warranty' => $request->warranty,
                'discount' => $request->discount,
            ]);

        $images = $request->images;

        $filePath = "";
        $path = 'images/products/' . $addProduct . '/';
        $formatType = '.jpg';

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }


        if ($images != null) {
            foreach ($images as $image) {
                if ($image != null) {
                    $counter = '(1)';
                    $fileName = $addProduct .  $counter . $formatType;
                    for ($i = 2; file_exists($path . $fileName); $i++) {
                        $counter = '(' . $i . ')';
                        $fileName = $addProduct . $counter . $formatType;
                    }

                    $filePath = $path . $fileName;
                    $res = file_put_contents($filePath, base64_decode($image));
                } else {
                    $filePath = 'N/A';
                }
            }
        } else {
            $filePath = 'N/A';
        }

        $result = DB::table('products')
        ->where('id',$addProduct)
        ->update(['image' => $path]);

        if ($result) {

            return $message = array(
                'status' => 1,
                'message' => 'ok',
                'data' => $addProduct
            );
        } else {
            return $message = array(
                'status' => 0,
                'message' => 'no',
                'data' => null
            );
        }
    }
}
