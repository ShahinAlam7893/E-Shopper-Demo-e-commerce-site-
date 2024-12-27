<x-backend.layouts.master>



    <h1 class="h3 mb-3"> Slider</h1>

    <div class="card-header">
        Create Slider <a class="btn btn-info" href="{{route('sliders.index')}}">List</a>

    </div>

    <div class="card-body">
        <form action="{{route('sliders.update',['slider'=>$slider->id])}}" method="post"       enctype="multipart/form-data">

            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>
                <div class="col-8">
                    <input type="text"
                           class="form-control"
                           id="inputTitle"
                           name="slider_title"
                           value="{{old('slider_title',$slider->slider_title)}}">

                </div>
            </div>
            <div class="mb-3">
                <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Title</label>
                <div class="col-8">
                    <input type="text"
                           class="form-control"
                           id="inputShortTitle"
                           name="short_title"
                           value="{{old('short_title',$slider->short_title)}}">
                </div>
            </div>


            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Image</label>
                <div class="col-8">
                    <p class="fw-lighter">Previous Image: <img src="/storage/sliders/{{ $slider->slider_image }}"
                                                               style="width:70px; height:70px"> </p>
                    <input type="file" class="form-control mt-3" id="inputPicture" name="image"
                           value="{{ old('slider_image', $slider->slider_image) }}">
                    <span>
                                {{$slider->slider_image}}
                            </span>
                    <input type="hidden" name="old_picture" value=" {{ old('slider_image', $slider->slider_image) }}">

                </div>
            </div>

            <div class="mb-3">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">update</button>
                </div>

            </div>

        </form>
    </div>



</x-backend.layouts.master>

