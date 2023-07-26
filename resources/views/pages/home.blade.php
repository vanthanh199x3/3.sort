
@extends('layout')

@section('content')

<!--===BEGIN SLIDER ===---->
test
<section class="wap_slider">
    <div class="vnt-banner">

           @foreach($slider as $key => $slide)

          <div class="item">
              <div class="img">
              <img src="{{URL::to('public/uploads/slider/'.$slide->slider_image)}}" alt="{{$slide->slider_desc}}">
              </div>
          </div><!---END item-->
          @endforeach

        </div>

</section>
  <!--===END SLIDER ===---->



<section class="vnt-product container vnt-selling ">
    <div class="pf-title"><h2><span class="title-main">FEATURE PRODUCT</span></h2></div>
    <div class="link-detail"><a href="#"><span>View all</span></a></div>
      <div class="row grid-prod ">

          @foreach($all_product as $key => $product)
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
  <div class="clear"></div>

<?php 
                   foreach ($category as $key =>$v) { 
                           $id= $v->category_id;
                $cate_by_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.category_id',$id)->where('tbl_product.product_status','1')->get(); ?>
<section class="vnt-product container vnt-product-new">
    <div class="pf-title"><h2><span class="title-main">{{$v->category_name}}</span></h2></div>
    <div class="link-detail"><a href="{{URL::to('/danh-muc/'.$v->slug_category_product)}}"><span>View all</span></a></div>
      <div class="row grid-prod ">
     
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="row">
             @foreach($cate_by_product as $key => $product)
           <div class="item col-md-3 col-xs-6 col-6 col-sm-4">
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
         
          </div><!--END md-8-->
        </div><!--Row-->

          
    </div>
   
  </section>
<?php }?>
  <div class="clear"></div>


  @endsection