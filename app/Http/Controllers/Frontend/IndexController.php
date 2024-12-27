<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductDetails($id,$slug)
    {
        $product = Product::findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',',$color);
        $size = $product->product_size;
        $product_size = explode(',',$size);
        return view('frontend.product.product_details',
            compact('product','product_color','product_size'));
    }

}
