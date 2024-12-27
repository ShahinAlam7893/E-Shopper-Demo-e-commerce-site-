@php

$sliders = App\Models\Slider::orderBy('slider_title','ASC')->get();
@endphp

<div class="wrap-main-slide">
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">

    @foreach($sliders as $slider)
        <div class="item-slide">
            <img src="storage/sliders/{{$slider->slider_image}}" alt="" class="img-slide"
                 style="height: 240px ; width: 1170px;">
            <div class="slide-info slide-1">
                <h2 class="f-title">{{($slider->slider_title)}}</h2>
                <p class="sale-info">{{($slider->short_title)}}</p>
                <a href="#" class="btn-link">Shop Now</a>
            </div>
        </div>
       @endforeach
    </div>
</div>
