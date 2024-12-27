<?php

namespace App\Http\Controllers\Backend;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return View ('backend.brands.index',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'brand_name' => ['required', 'min:3'],
                'brand_slug' => ['required', 'min:5'],
                'brand_image' => ['required']
            ]);

//            $image = $request->file('brand_image');
//            $fileName = hexdec(uniqid()) . '.' .
//                $image->getClientOriginalExtension();
//            Image::make($image)->resize(2376, 807)->save('upload/brand/' . $fileName);
//            $save_url = 'upload/brand/' . $fileName;

            Brand::create([
                'brand_name' => $request->brand_name,
                'brand_slug' => $request->brand_slug,
                'brand_image'=> $this->uploadImage(request()->file('brand_image'))
            ]);

            return redirect()->route('brands.index')->withMessage('Brand add created successfully');

        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return View('backend.brands.show',['brand'=>$brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return View('backend.brands.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Brand $brand)
    {
//        $image = $request->file('brand_image');
//        $fileName = hexdec(uniqid()) . '.' .
//            $image->getClientOriginalExtension();
//        Image::make($image)->resize(2376, 807)->save('upload/brand/' . $fileName);
//        $save_url = 'upload/brand/' . $fileName;

        $requestData=[
            'brand_name' => $request->brand_name,
            'brand_slug' => $request->brand_slug,
        ];
        if($request->hasfile('brand_image'))
        {
            $requestData['brand_image']=$this->uploadImage(request()->file('brand_image'));
        }
        $brand->update($requestData);

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }

    public function uploadImage($file)
    {
        $fileName = time().''.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(500,500)
            ->save(storage_path().'/app/public/brands/' . $fileName);
        return $fileName;
    }
}
