<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return View ('backend.products.index',compact('products'));
    }

    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        return View('backend.products.create',compact('brands','categories'));

    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'product_name' => ['required', 'min:3'],
//                'product_slug' => ['required', 'min:5'],
                'brand_id' => ['required'],
                'category_id' => ['required'],
                'product_code' => ['required'],
                'product_qty' => ['required'],
                'product_tags' => ['required'],
                'product_size' => ['required'],
                'product_color' => ['required'],
                'selling_price' => ['required'],
                'short_description' => ['required'],
                'details' => ['required'],
                'image' => ['required'],
            ]);

//            $image = $request->file('image');
//            $fileName = hexdec(uniqid()) . '.' .
//                $image->getClientOriginalExtension();
//            Image::make($image)->resize(2376, 807)->save('storage/products/' . $fileName);
//            $save_url = 'storage/products/' . $fileName;

            Product::create([
                'brand_id' =>$request->brand_id,
                'category_id' =>$request->category_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('','_', $request->product_name)),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags' => $request->product_tags,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_description' =>$request->short_description,
                'details' =>$request->details,
                'status' =>1,
                'image'=> $this->uploadImage(request()->file('image'))
            ]);

            return redirect()->route('products.index')->withMessage('Product add created successfully');

        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Product $product)
    {
        $products = Product::all();
        return View('backend.products.show',['product'=>$product]);
    }

    public function edit(Product $product)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        return View('backend.products.edit',['product'=>$product], compact('brands','categories'));
    }
    public function update(Request $request, Product $product)
    {
        $requestData=[
                'brand_id' =>$request->brand_id,
                'category_id'=>$request->category_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('','_', $request->product_name)),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags' => $request->product_tags,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_description' =>$request->short_description,
                'details' =>$request->details,
                'status' =>1,
        ];

        if($request->hasfile('image'))
        {
            $requestData['image']=$this->uploadImage(request()->file('image'));
        }
            $product->update($requestData);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);
        return redirect()->route('products.index')->withMessage('product Inactive successfully');

    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);
        return redirect()->route('products.index')->withMessage('product Active successfully');

    }

    public function uploadImage($file)
    {
        $fileName = time().''.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(800,800)
            ->save(storage_path().'/app/public/products/' . $fileName);
        return $fileName;
    }

}
