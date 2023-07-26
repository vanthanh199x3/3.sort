@extends('layout')
@section('content')
@foreach($product_details as $key => $value)

  <input type="hidden" id="product_viewed_id" value="{{$value->product_id}}">



  <input type="hidden" id="viewed_productname{{$value->product_id}}" value="{{$value->product_name}}">
  <input type="hidden" id="viewed_producturl{{$value->product_id}}" value="{{url('/chi-tiet/'.$value->product_slug)}}">
  
  <input type="hidden" id="viewed_productimage{{$value->product_id}}" value="{{asset('public/uploads/product/'.$value->product_image)}}">
    <input type="hidden" id="viewed_productprice{{$value->product_id}}" value="{{number_format($value->product_price,0,',','.')}}VNĐ">
<link rel="stylesheet" href="{{asset('public/frontend/css/product-detail.css')}}" >

	<!--=== BEGIN: CONTENT ===-->
<div id="vnt-content" class="container-fluid">
  <!--===BEGIN: BREADCRUMB===-->
  <div class="breadcrumb col-md-12 col-xs-12 col-sm-12">
      <div class="navation">
        <nav aria-label="breadcrumb">
						  <ol class="breadcrumb"  style="background: none;">
						    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
						    <li class="breadcrumb-item"><a href="{{url('/danh-muc/'.$cate_slug)}}">{{$product_cate}}</a></li>
						    <li class="breadcrumb-item active" aria-current="page">{{$meta_title}}</li>
						    
					
						  </ol>
	</nav>
  </div>
</div>
<!--===END: BREADCRUMB===-->
<div class="clear"></div>

<div class="wap-product-top row">
<!--===BEGIN: INFO_LEFT===-->

<div class="info_left col-md-6 col-xs-12 col-sm-6">
<div class="slider-detail">
<div id="slider-detail">
<div class="item">
  <div class="img">
  <a class="fancybox" data-fancybox="gallery" href="{{asset('public/uploads/product/'.$value->product_image)}}">
  <img src="{{asset('public/uploads/product/'.$value->product_image)}}" alt="{{$value->product_name}}" /></a>
  </div>
</div><!--END item-->

	@foreach($gallery as $key => $gal)
		<div class="item">
		  <a class="fancybox" data-fancybox="gallery" href="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}">
		<img src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_name}}" />
		  </a>
		</div> <!--END item-->
	 @endforeach


</div>
</div>
<div id="slider-thumbnail">

	<div class="item">
		  <div class="img"><img src="{{asset('public/uploads/product/'.$value->product_image)}}" alt="{{$value->product_name}}" />
		  </div>
		</div> <!--END item-->
	@foreach($gallery as $key => $gal)
		<div class="item">
		  <div class="img"><img src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_name}}" />
		  </div>
		</div> <!--END item-->
	 @endforeach



</div>
</div>
<!--===END: INFO_LEFT===-->

<!--===BEGIN: INFO_RIGHT===-->

<div class="info_right col-md-6 col-xs-12 col-sm-6">
<div class="grid-info">
  <h1>{{$value->product_name}}</h1>
  <p>Số lượng kho còn: {{$value->product_quantity}}</p>
  <p>Danh mục: {{$value->category_name}}</p>


<div class="clear"></div>

  <div class="block-prices block-prices-change mb-1">
    <div class="product-price font-30 mr-2 order-price">{{number_format($value->product_price,0,',','.').'đ'}}</div> 
  </div>
</div><!--END GIRD-INFO-->

<div class="clear"></div>

<form action="{{URL::to('/save-cart')}}" method="POST">
                  @csrf
                  <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                          
                <span>
                  <span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
                
                  <label>Số lượng:</label>
                  <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
                  <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
                </span>
                <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
                </form>

</div><!--===END: INFO_RIGHT===-->

<div class="clear"></div>
</div><!--END wap-product-top-->
<div class="row">
<div class="wap-product-content col-md-12 col-xs-12 col-sm-12">
  <div class="product-detail ">
 {!!$value->product_content!!}
</div> <!--End product-detail-->
<div class="clear"></div>
<div class="product-detail-desc">
  {!!$value->product_desc!!}

</div><!--End product-detail-desc-->
<div class="clear"></div>


  
</div><!--=== END: MD12 ===-->




</div><!--End row-->
@endforeach

<div class="clear"></div>
<section class="vnt-product  vnt-selling ">
    <div class="pf-title col-md-12 col-xs-12 col-sm-12"><h2><span class="title-main">BEST SELLER</span></h2></div>
      <div class="row grid-prod grid-selling">
      	@foreach($relate as $key => $lienquan)
           <div class="item col-md-3 col-xs-6 col-sm-4 col-6">
                <div class="wrap-item">
                  <div class="i-top">
                    <div class="i-image">
                      <a href="product-detail.html">
                        <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="{{$lienquan->product_name}}" title="{{$lienquan->product_name}}"/>
                      </a>
                    </div>
                  </div>

                 <div class="clear"></div>
                  <div class="i-desc">
                      <div class="i-title">
                      <a href="product-detail.html">
                          <h4>{{$lienquan->product_name}}</h4>
                        </a>
                      </div> 
                      <div class="clear"></div>
                 <div class="i-price">
                         {{number_format($lienquan->product_price,0,',','.').' '.'đ'}} 
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
  {{--   <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$relate->links()!!}
                      </ul> --}}
  
</div>
<!--=== END: CONTENT ===-->
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
 <script src="{{asset('public/frontend/slideSlick/js/jquery.easing.1.3.js')}}"></script>
 <script src="{{asset('public/frontend/slideSlick/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
 <script src="{{asset('public/frontend/js/product.js')}}"></script>

@endsection


