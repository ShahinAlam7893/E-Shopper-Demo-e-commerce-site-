<x-backend.layouts.master>


    <div class="col-12 col-lg-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <li class ="breadcrumb-item active" aria-current="page">All Product <span class ="badge rounded-pill bg-danger">{{count($products)}}</span></li>
            <div class="card-header">

                Create Product <a class="btn btn-info" href="{{route('products.create')}}">Add New Product</a>
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert"></span>
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
               <table class="table table-hover my-0">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>DiscountPrice</th>
                    <th>QTY</th>
                    <th>Status</th>
                    <th>Discount%</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($products as $key =>$product)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->product_qty}}</td>
                    <td>{{$product->status}}</td>

                    <td>
                        @if($product->discount_price == NULL)
                            <span class = "badge rounded-pill bg-info">No Discount</span>
                        @else
                        @php
                        $amount = $product->discount_price;
                        $discount = ($amount/$product ->selling_price)*100;
                        @endphp
                            <span class = "badge rounded-pill bg-danger">{{round($discount)}}%</span>
                            @endif
                    </td>


                    <td>
                        @if($product->status==1)
                        <span class="badge rounded-pill bg-success">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                            @endif
                    </td>
                   <td>
                       <div>
                       <a class="btn btn-light btn-sm"
                          href="{{route('products.show',['product'=>$product->id])}}">
                           <i class="fa-solid fa-eye fa-lg text-primary"></i>
                       </a>

                       <a class="btn btn-light btn-sm"
                          href="{{route('products.edit',['product'=>$product->id])}}">
                           <i class = "fa-solid fa-pen-to-square fa-lg text-dark"></i>
                       </a>

                       <form style="display:inline"
                             action="{{ route('products.destroy', ['product' => $product->id]) }}"
                             method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-light btn-sm"
                                   onclick="return confirm('are sure want delete?')" style="font-size: 11px">
                               <i class = "fa-solid fa-trash-can fg-lg text-danger"></i></button>
                       </form>

                       @if($product->status==1)
                           <a href="{{route('product.inactive',$product->id)}}" class ="btn btn-light btn-sm" title = "active">
                               <i class = "fa-solid fa-thumbs-up fa-lg text-success"></i>
                           </a>
                       @else
                           <a href="{{route('product.active',$product->id)}}" class="btn btn-light btn-sm" title = "inactive">
                               <i class="fa-solid fa-thumbs-down fa-lg text-danger"></i>
                           </a>
                       @endif
                       </div>

                   </td>

                </tr>

                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>


</x-backend.layouts.master>

