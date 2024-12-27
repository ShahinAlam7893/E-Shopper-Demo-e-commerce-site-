<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return View ('backend.sliders.index',['sliders'=>$sliders]);
    }

    public function create()
    {
//        $this->authorize('create.slider');
        return View('backend.sliders.create');
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
                'slider_title' => ['required', 'min:3'],
                'short_title' => ['required', 'min:5'],
                'slider_image' => ['required']
            ]);

//            $image = $request->file('slider_image');
//            $fileName = hexdec(uniqid()) . '.' .
//                $image->getClientOriginalExtension();
//            Image::make($image)->resize(2376, 807)->save('upload/slider/' . $fileName);
//            $save_url = 'upload/slider/' . $fileName;

            Slider::create([
                'slider_title' => $request->slider_title,
                'short_title' => $request->short_title,
                'slider_image'=> $this->uploadImage(request()->file('slider_image'))
            ]);

            return redirect()->route('sliders.index')->withMessage('Slider add created successfully');

        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return View('backend.sliders.show',['slider'=>$slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return View('backend.sliders.edit',['slider'=>$slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
//        $image = $request->file('slider_image');
//        $fileName = hexdec(uniqid()) . '.' .
//            $image->getClientOriginalExtension();
//        Image::make($image)->resize(2376, 807)->save('upload/slider/' . $fileName);
//        $save_url = 'upload/slider/' . $fileName;

        $requestData=[
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
        ];

        if($request->hasfile('slider_image'))
        {
            $requestData['slider_image']=$this->uploadImage(request()->file('slider_image'));
        }
        $slider->update($requestData);

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index');
    }

    public function uploadImage($file)
    {
        $fileName = time().''.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(40,100)
            ->save(storage_path().'/app/public/sliders/' . $fileName);
        return $fileName;
    }
}
