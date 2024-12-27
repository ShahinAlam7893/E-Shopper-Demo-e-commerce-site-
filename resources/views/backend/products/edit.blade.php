{{--<x-backend.layouts.master>--}}

{{--    <h1 class="h3 mb-3"> product</h1>--}}

{{--    <div class="card-header">--}}
{{--        Create product <a class="btn btn-info" href="{{route('products.index')}}">List</a>--}}

{{--    </div>--}}

{{--    <div class="card-body">--}}
{{--        <form action="{{route('products.update',['product'=>$product->id])}}" method="post"--}}
{{--              enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @method('patch')--}}
{{--            <div class="mb-3">--}}
{{--                <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="text"--}}
{{--                           class="form-control"--}}
{{--                           id="inputTitle"--}}
{{--                           name="product_name"--}}
{{--                           value="{{old('product_name',$product->product_name)}}">--}}
{{--                    @error('product_name')--}}
{{--                    <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Title</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="text"--}}
{{--                           class="form-control"--}}
{{--                           id="inputShortTitle"--}}
{{--                           name="product_slug"--}}
{{--                           value="{{old('product_slug',$product->product_slug)}}">--}}
{{--                    @error('product_slug')--}}
{{--                    <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="file"--}}
{{--                           class="form-control"--}}
{{--                           id="inputPicture"--}}
{{--                           name="image"--}}
{{--                           value="{{old('image',$product->image)}}">--}}
{{--                    @error('image')--}}
{{--                    <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mb-3">--}}
{{--                <div class="col-sm-8">--}}
{{--                    <button type="submit" class="btn btn-info">update</button>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </form>--}}
{{--    </div>--}}



{{--</x-backend.layouts.master>--}}

<x-backend.layouts.master>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Dashboard</h1>
        <div class="card-header">
            Edit Product <a class="btn btn-info" href="{{ route('products.index') }}">List</a>
        </div>

        <div class="card-body">
            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="inputProductType" class="col-sm-3 col-form-label">Product Brand</label>
                    <div class="col-8">
                        <select class="form-select" aria-label="Default select example" name="brand_id"
                                id="inputProductType">
                            <option></option>
                            @foreach ($brands as $brand)
{{--                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>--}}
                                <option value="{{ $brand->id }}">{{ $brand->id==$product->brand_id? 'selected':'' }}>{{$brand->brand_name}}</option>
                            @endforeach
                            @error('brand_id')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror

                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductType" class="col-sm-3 col-form-label">Product Category</label>
                    <div class="col-8">
                        <select class="form-select" aria-label="Default select example" name="category_id"
                                id="inputProductType">
                            <option></option>
                            @foreach ($categories as $category)
{{--                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>--}}
                                <option value="{{ $category->id }}">{{ $category->id==$product->category_id? 'selected':'' }}>{{$category->category_name}}</option>
                            @endforeach
                            @error('category_id')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror

                        </select>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="inputName" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputName" placeholder="ProductName"
                               name="product_name" value="{{ old('product_name', $product->product_name) }}">
{{--                        @error('product_name')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                {{-- <div class="mb-3">
                    <label for="inputProductSlug" class="col-sm-3 col-form-label">Product Slug</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputProductSlug" placeholder="ProductSlug"
                            name="product_slug" value="{{ old('product_slug', $product->product_slug) }}">
                    </div>
                </div> --}}

                <div class="mb-3">
                    <label for="inputCode" class="col-sm-3 col-form-label">Code</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputCode" placeholder="ProductCode"
                               name="product_code" value="{{ old('product_code', $product->product_code) }}">
{{--                        @error('product_code')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductQuantity" class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputProductQuantity"
                               placeholder="ProductQuantity" name="product_qty"
                               value="{{ old('product_qty', $product->product_qty) }}">
{{--                        @error('product_qty')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputTags" class="col-sm-3 col-form-label">Tags</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputTags" placeholder="ProductTags"
                               name="product_tags" value="{{ old('product_tags', $product->product_tags) }}">
{{--                        @error('product_tags')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductSize" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputProductSize" placeholder="ProductSize"
                               name="product_size" value="{{ old('product_size', $product->product_size) }}">
{{--                        @error('product_size')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputColor" class="col-sm-3 col-form-label">Color</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputColor" placeholder="ProductColor"
                               name="product_color" value="{{ old('product_color', $product->product_color) }}">
{{--                        @error('product_color')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductSellingPrice" class="col-sm-3 col-form-label">Selling Price</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputProductSellingPrice"
                               placeholder="ProductSellingPrice" name="selling_price"
                               value="{{ old('selling_price', $product->selling_price) }}">
{{--                        @error('selling_price')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputDiscountPrice" class="col-sm-3 col-form-label">Discount Price</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputDiscountPrice"
                               placeholder="ProductDiscountPrice" name="discount_price"
                               value="{{ old('discount_price', $product->discount_price) }}">
{{--                        @error('discount_price')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductShortDescp" class="col-sm-3 col-form-label">Short Description</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputProductShortDescp"
                               placeholder="ProductShortDescp" name="short_description"
                               value="{{ old('short_description', $product->short_description) }}">
{{--                        @error('short_description')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductDetails" class="col-sm-3 col-form-label">Details</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="inputProductDetails"
                               placeholder="ProductDetails" name="details"
                               value="{{ old('details', $product->details) }}">
{{--                        @error('details')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">

                    <label for="inputPicture" class="col-sm-3 col-form-label">Image</label>
                    <div class="col-8">
                        <p class="fw-lighter">Previous Image: <img src="/storage/products/{{ $product->image }}"
                                                                   style="width:70px; height:70px"> </p>
                        <input type="file" class="form-control mt-3" id="inputPicture" name="image"
                               value="{{ old('image', $product->image) }}">
                        <span>
                                {{$product->image}}
                            </span>
                        <input type="hidden" name="old_picture" value=" {{ old('image', $product->image) }}">
{{--                        @error('image')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                {{-- <div class="mb-3">
                    <label for="inputProductStatus" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-8">
                        <input type="checkbox" class="form-control" id="inputProductStatus" placeholder="ProductStatus"
                            name="status" value="{{old('status',$product->status)}}">

                    </div>
                </div> --}}

                <div class="mb-3">
                    <div class="col-8">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-backend.layouts.master>
