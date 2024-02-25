<div class="container mt-5"><div class="row">
    <div class="col-md-12">
        <swiper-container class="mySwiper" scrollbar-hide="true">
            @foreach ($sliders as $slider)
           
            <swiper-slide><img src="{{ asset($slider->slider_image ) }}" alt=""></swiper-slide>
            
            
            @endforeach
          </swiper-container>
        </div></div></div>