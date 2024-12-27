<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view ('backend.categories.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view ('backend.categories.create');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_name' => ['required', 'min:3'],
                'category_slug' => ['required', 'min:5'],
                'category_image' => ['required']
            ]);
//
//            $image = $request->file('category_image');
//            $fileName = hexdec(uniqid()) . '.' .
//                $image->getClientOriginalExtension();
//            Image::make($image)->resize(2376, 807)->save('upload/category/' . $fileName);
//            $save_url = 'upload/category/' . $fileName;

            Category::create([
                'category_name' => $request->category_name,
                'category_slug' => $request->category_slug,
                'category_image'=> $this->uploadImage(request()->file('category_image'))
            ]);

            return redirect()->route('categories.index')->withMessage('Category add created successfully');

        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


    public function show(Category $category)
    {
        return View('backend.categories.show',['category'=>$category]);
    }


    public function edit(Category $category)
    {
        return View('backend.categories.edit',['category'=>$category]);
    }


    public function update(Request $request, Category $category)
    {
//        $image = $request->file('category_image');
//        $fileName = hexdec(uniqid()) . '.' .
//            $image->getClientOriginalExtension();
//        Image::make($image)->resize(2376, 807)->save('upload/category/' . $fileName);
//        $save_url = 'upload/category/' . $fileName;

        $requestData=[
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
        ];

        if($request->hasfile('category_image'))
        {
            $requestData['category_image']=$this->uploadImage(request()->file('category_image'));
        }

        $category->update($requestData);


        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function uploadImage($file)
    {
        $fileName = time().''.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(800,800)
            ->save(storage_path().'/app/public/categories/' . $fileName);
        return $fileName;
    }
}
