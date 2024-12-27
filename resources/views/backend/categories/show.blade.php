<x-backend.layouts.master>


    <div class="col-12 col-lg-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                show Category <a class="btn btn-info" href="{{route('categories.index')}}">List</a>
            </div>

            <h2> Title:{{$category->category_name}}</h2>
            <h2> Description:{{$category->category_slug}}</h2>
            <h2>Image  <img src="/storage/categories/{{($category->category_image)}}" width="200px" height="300"></h2>
        </div>
    </div>

</x-backend.layouts.master>


