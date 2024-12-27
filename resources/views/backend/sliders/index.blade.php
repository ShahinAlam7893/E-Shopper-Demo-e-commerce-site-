<x-backend.layouts.master>


    <div class="col-12 col-lg-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
{{--                @can('create.slider')--}}
                Create Slider <a class="btn btn-info" href="{{route('sliders.create')}}">Add New Slider</a>
{{--                    @endcan--}}
            </div>
            <div class="card-body">
                @if(session('message'))
                     <div class="alert alert-success">
                        <span class ="close" data-dismiss="alert"></span>
                        <strong>{{session('message')}}</strong>
                     </div>
                @endif

               <table class="table table-hover my-0">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $key =>$slider)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$slider->slider_title}}</td>
                    <td>{{$slider->short_title}}</td>
                    <td><img src="/storage/sliders/{{($slider->slider_image)}}" width="1170px" height="240"></td>
                   <td>
                       <a class="btn btn-light btn-sm"
                          href="{{route('sliders.show',['slider'=>$slider->id])}}">
                           <i class="fa-solid fa-eye fa-lg text-primary"></i>
                       </a>

                       <a class="btn btn-light btn-sm"
                          href="{{route('sliders.edit',['slider'=>$slider->id])}}">
                           <i class = "fa-solid fa-pen-to-square fa-lg text-dark"></i>
                       </a>


                       <form style="display:inline"
                             action="{{ route('sliders.destroy', ['slider' => $slider->id]) }}"
                             method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-light btn-sm"
                                   onclick="return confirm('are sure want delete?')" style="font-size: 11px">
                               <i class = "fa-solid fa-trash-can fg-lg text-danger"></i></button>
                       </form>
                   </td>

                </tr>

                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>


</x-backend.layouts.master>

