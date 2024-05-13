<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function home()
    {
        $labels = [];
        $data = [];
        $bgColors = ['red','yellow','green','violet','black','grey','orange','blue'];
        // Có bao nhiêu loại productLine
        $productLines = DB::table('productlines')->get();
        # Tính số lượng sản phẩm thuộc mỗi productlines
        foreach ($productLines as $productLine) {
            $count = DB::table('products')->where('productLine', '=',
                $productLine->productLine)->count();
            array_push($labels, $productLine->productLine);
            array_push($data, $count);
        }


        return view('home', ['data' => $data, 'labels' => $labels,'bgColors'=> $bgColors ]);
    }
}
