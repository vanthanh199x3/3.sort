<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{$meta_title}}</title>
  <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">

    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/home_product.css')}}" >
    <link rel="stylesheet" href="{{asset('public/frontend/slideSlick/css/slick.css')}}" >

    <link rel="stylesheet" href="{{asset('public/frontend/slideSlick/css/slick-theme.css')}}" >
    <link rel="stylesheet" href="{{asset('public/frontend/font-awesome-4.7.0/css/font-awesome.min.css')}}" >
    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}" >

       <script src="{{asset('public/frontend/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public//frontend/js/style.js')}}"></script>
    <script src="{{asset('public/frontend/js/home_product.js')}}"></script>
    <script src="{{asset('public/frontend/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/slideSlick/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>


</head>
<body>
  

  <div id="vnt-wrapper">
    <div id="vnt-container">
  <header>
<!--===BEGIN HEADER TOP===---->
      <div class="header_main container-fluid">
          <div class="row">
             <div class="col-md-2 col-xs-12 col-sm-2">
         <div class="vnt-logo">
               @foreach($contact_footer as $key => $logo)
                <a class="img_home" href="{{URL::to('/')}}" ><img alt="logo" src="{{URL::to('public/uploads/logo/'.$logo->info_logo)}}"></a>
                 @endforeach
            </div>
          </div><!--END col-md-2-->
             <div class="vnt-search col-md-6 col-xs-12 col-sm-6">
              <form action="{{URL::to('/tim-kiem')}}" method="POST" class="box_search">
                            {{csrf_field()}}
              <div class="input-group">
               <input name="keywords_submit"  type="text" class="text_search form-control" placeholder="Search..." value="">
               <span class="input-group-btn"><button  type="submit" class="btn" value=""><i class="fa fa-search"></i></button></span>
                              </div>
                            <div class="clear"></div>
                          </form>
                </div><!--END vnt-search-->

         <div class="col-md-4 col-xs-12 col-sm-4">
        <div class="vnt-acount">
                                 <div class="aTitle">Sign In/ Sign Up <span>Account</span></div>
                                    <div class="aContent">
                                        <ul class="linkAcount">
              <li><a href="login_member.html">Đăng nhập</a></li>
              <li><a href="register_member.html">Đăng ký</a></li>
            </ul>
                                    </div>
                 </div><!--END vnt-acount-->

            <div class="vnt-cart">
                <a href="#"><span class="count show-cart">
        </span></a>
            </div><!--END vnt-cart-->
          </div><!--END col-md-4-->
           
        
</div><!--END row-->
 </div><!--===END  HEADER TOP===---->

 <!--===BEGIN HEADER BOTTOM===---->
 <div class="header-bottom container-fluid">
  <div class="row">
  <div class="vnt-super-meaket col-md-3 col-xs-12 col-sm-4">
         
            <div class="meaket"><span>SUPER MARKET</span></div>
        </div><!--END vnt-super-meaket-->

 <div class="vnt-menutop col-md-9 col-xs-12 col-sm-8">
               <ul class="get_menu">
      <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
      <li><a href="{{URL::to('/1-bai-viet/gioi-thieu')}}">Giới thiệu</a></li>

      @foreach($category as $key => $v)
               <li><a href="{{URL::to('/danh-muc/'.$v->slug_category_product)}}">{{$v->category_name}}</a></li>
        @endforeach

        @foreach($category_blog as $key =>$blog)
  <li><a href="{{URL::to('/danh-muc-bai-viet/'.$blog->cate_post_slug)}}">{{$blog->cate_post_name}}</a></li>
         @endforeach


      <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>

   </ul>
                <div class="clear"></div>
                   
        </div><!--END vnt-menutop-->

        <div class="menu_mobile">
          <div class="icon_menu"><span class="style_icon"></span></div>
          <div class="divmm">
            <div class="mmContent">
              <div class="mmMenu">
                 <ul class="set_menu"></ul>
             </div>
             <div class="close-mmenu"></div>
           </div>
           <div class="divmmbg"></div>
         </div>
         <div class="clear"></div>
       </div>
  </div>
</div>
  <!--===BEGIN HEADER BOTTOM===---->


</header>

<div class="clear"></div>

  
     

<!---====== BEGIN CONTENT ===============-->
       @yield('content')

<!---====== END CONTENT ===============-->


<section class="bg_regiter">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12 vnt-newsletter">
         <div class="pf-title"><h2>Join our newsletter and get...</h2></div>
      <div class="desc">Join our email subscription now to get updates on promotions and coupons.</div>
        <div id="newsletter">
         <div class="wrap_newsletter">
      <div class="clear"></div>
      <form action="dang-ky-nhan-mail.html"  method="post" class="form-resgiter row">
       <!-- Text input-->
        <div class="form-group col-md-4 col-xs-12 col-sm-12">
          <input required="" name="email" type="email" placeholder="Email" class="form-control name_last">
           <!-- Button -->
        <div class="button">
            <button id="sEND" name="sEND" class="btn btn-sENDinfor">Subscribe</button>
        </div>
        </div>
       
        </form>
      </div>
    </div><!--END newsletter-->
      </div><!--END md12-->
    </div>
  </div>
</section>
  <div class="clear"></div>

<section class="chinhsachhome">

    <div class="container">

        <div class="row">

            <div class="col-md-3 chinhsach-item col-xs-6 col-6">
                <div class="chinhsach-item-img">
               <img src="{{asset('public/frontend/images/icon_transport/ic_order-tracking.svg')}}" alt="" title=""/>
               </div>
                <div class="chinhsach-item-name">ORDER TRACKING</div>
            </div><!--END md-3-->

            <div class="col-md-3 chinhsach-item col-xs-6 col-6">
                <div class="chinhsach-item-img"> 
               <img src="{{asset('public/frontend/images/icon_transport/ic_fast-shipping.svg')}}" alt="" title=""/>
               </div>
                <div class="chinhsach-item-name">FAST SHIPPING</div>
            </div><!--END md-3-->

            <div class="col-md-3 chinhsach-item col-xs-6 col-6">
                <div class="chinhsach-item-img">
                   <img src="{{asset('public/frontend/images/icon_transport/ic_service-247.svg')}}" alt="" title=""/>

               </div>
                <div class="chinhsach-item-name">24/7 SERVICE</div>
            </div><!--END md-3-->

            <div class="col-md-3 chinhsach-item col-xs-6 col-6">
                <div class="chinhsach-item-img"> 
                  <img src="{{asset('public/frontend/images/icon_transport/ic_free-return.svg')}}" alt="" title=""/>
               </div>
                <div class="chinhsach-item-name">FREE RETURN</div>
            </div><!--END md-3-->
          
            </div>

        </div>

    </section>

<!---====== BEGIN FOOTER ===============-->

<footer>

    <div class="container">
        <div class="row footer_row_bottom">

               <div class="col-md-3  col-sm-6 col-xs-12 footer_col1 ">
                        <div class="footer_p">
                      <div class="title-footer">SUPER MARKET</div>
                        <div class="panel-collapse">
                          <ul class="footer_box">
                             @foreach($post_footer1 as $key => $post_foot)
                              <li><a href="{{url('/bai-viet/'.$post_foot->post_slug)}}">{{$post_foot->post_title}}</a></li>
                                @endforeach
                             </ul>

                         </div>
                        </div>

             </div><!--END md3-->

               <div class="col-md-3  col-sm-6 col-xs-12 footer_col1 ">
                        <div class="footer_p">
                      <div class="title-footer">VOUCHER</div>
                        <div class="panel-collapse">
                            <ul class="footer_box">
                             @foreach($post_footer2 as $key => $post_foot)
                              <li><a href="{{url('/bai-viet/'.$post_foot->post_slug)}}">{{$post_foot->post_title}}</a></li>
                                @endforeach
                             </ul>

                         </div>
                        </div>

             </div><!--END md3-->
               <div class="col-md-3  col-sm-6 col-xs-12 footer_col1 ">
                        <div class="footer_p">
                      <div class="title-footer">SUPPORT</div>
                        <div class="panel-collapse">
                            <ul class="footer_box">
                             @foreach($post_footer3 as $key => $post_foot)
                              <li><a href="{{url('/bai-viet/'.$post_foot->post_slug)}}">{{$post_foot->post_title}}</a></li>
                                @endforeach
                             </ul>

                         </div>
                        </div>

             </div><!--END md3-->

               <div class="col-md-3  col-sm-6 col-xs-12 footer_col1 ">
                        <div class="footer_p">
                      <div class="title-footer">FOLLOW US</div>
                        <div class="panel-collapse">
                           <ul class="navbar-social socialtop">
                                   @foreach($icons as $key => $ico)
                                    <li class="social">
                                        <a href="{{$ico->link}}" rel="nofollow" target="_blank"><i class="fa fa-{{$ico->name}}"></i></a>
                                    </li>
                                 @endforeach
                            </ul>

                         </div>
                     
             </div><!--END md3-->
                      


       </div>
     </div> 

   </footer>
        <!---====== END FOOTER ===============-->


 </div><!--END Wap_ketnoi-->
    <div class="footer-botom">
    <div class="container">
    <div class="row">
        <div class="footer-Copyright col-md-12 col-xs-12">
            <div class="footer-address">
               © 2020 - 2021 Vera VDT. All rights reserved. 
            </div>
        </div>
    </div>
</div>
</div><!--END footer-bottom-->


 
<div id="bttop" href="#">
  <img src="{{asset('public/frontend/images/top.svg')}}" alt="" title=""/>

</div>
  <script type="text/javascript">
        $(document).ready(function(){
        show_cart();
       
            //show cart quantity
            function show_cart(){
                  $.ajax({
                    url:'{{url('/show-cart')}}',
                    method:"GET",
                    success:function(data){
                        $('.show-cart').html(data);
                       
                    }

                }); 
            }

            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });

                        }

                    });
                }

                
            });
        });
    </script>

</body>

</html>