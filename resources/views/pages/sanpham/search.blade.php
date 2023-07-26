@extends('layout')
@section('content')


 <section class="vnt-product container vnt-selling ">
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
      <div class="row grid-prod ">

          @foreach($search_product as $key => $product)
           <div class="item col-md-3 col-xs-6 col-sm-4">
                <div class="wrap-item">
                  <div class="i-top">
                    <div class="i-image">
                      <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                 <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="{{$product->product_name}}" title="{{$product->product_name}}"/>

                      </a>
                    </div>
                  </div>

                 <div class="clear"></div>
                  <div class="i-desc">
                      <div class="i-title">
                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                          <h4>{{$product->product_name}}</h4>
                        </a>
                      </div> 
                      <div class="clear"></div>
               <input class='rating rating-loading' data-min='0' data-max='5'  value='5'/>
                <span class="i-rating"> Sold 4  </span>
                  <div class="clear"></div>
                 <div class="i-price">
                        {{number_format($product->product_price,0,',','.').' '.'₫'}} 
                  </div><!--END i-price-->
                   <div class="i-saleoff">
                           23% 
                    </div>
                    <div class="clear"></div>
                  </div> <!--END i-desc-->

              </div>
            </div><!--END Item-->
            @endforeach
          

    </div>
   
  </section>
@endsection