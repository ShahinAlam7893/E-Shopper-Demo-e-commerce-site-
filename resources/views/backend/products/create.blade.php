<x-backend.layouts.master>



        <h1 class="h3 mb-3"> Product</h1>

        <div class="card-header">
            Create Product <a class="btn btn-info" href="{{route('products.index')}}">List</a>

        </div>

        <div class="card-body">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputTitle"
                               name="product_name"
                               value="">

                        @error('product_name')
                        <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Title</label>--}}
{{--                    <div class="col-8">--}}
{{--                        <input type="text"--}}
{{--                               class="form-control"--}}
{{--                               id="inputShortTitle"--}}
{{--                               name="product_slug"--}}
{{--                               value="">--}}
{{--                        @error('product_slug')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Product Tags</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="product_tags"
                               value="">
{{--                        @error('product_code')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>


                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">product size</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="product_size"
                               value="">
{{--                        @error('product_code')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Product Color</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="product_color"
                               value="">
{{--                        @error('product_code')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Selling Price</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="selling_price"
                               value="" placeholder="00.00">
                        {{--                        @error('product_code')--}}
                        {{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                </div>



                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Discount Price</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="discount_price"
                               value="" placeholder="00.00">
                        {{--                        @error('product_code')--}}
                        {{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Product Code</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="product_code"
                               value="" placeholder="00.00">
                        {{--                        @error('product_code')--}}
                        {{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                </div>


                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Product Quantity</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="product_qty"
                               value="" placeholder="00.00">
                        {{--                        @error('product_code')--}}
                        {{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductType" class="col-sm-3 col-form-label">Brand</label>
                    <div class="col-8">
                        <select name="brand_id" class="form-select" id="inputProductType">
                            <option></option>
                            <option value="1">OnePlus</option>
                            <option value="2">IPhone</option>
                            <option value="3">Samsung</option>
                            <option value="4">Xiaomi</option>
                            <option value="5">Realme</option>
                            <option value="6">Infinix</option>
                            <option value="7">Vivo</option>

                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputProductType" class="col-sm-3 col-form-label">Product Category</label>
                    <div class="col-8">
                        <select name="category_id" class="form-select" id="inputProductType">
                            <option></option>
                            <option value="1">Smartphone</option>
                            <option value="2">Smartwatch</option>
                            <option value="3">Headphone</option>

                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Description</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="short_description"
                               value="">
{{--                        @error('product_code')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Description</label>
                    <textarea id="mytextarea" name="details">hello world</textarea>
                </div>


                <div class="mb-3">
                    <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                    <div class="col-8">
                        <input type="file"
                               class="form-control"
                               id="inputPicture"
                               name="image"
                               value="">

                        @error('image')
                        <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>

                </div>

            </form>
        </div>



</x-backend.layouts.master>
