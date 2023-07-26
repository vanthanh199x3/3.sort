@extends('layout')

@section('content')
       
                        <h2 class="title text-center">{{$meta_title}} </h2>

                       
                      	 	<div class="vnt-news container">
                            <div class="row">
                               @foreach($post_cate as $key => $p)
                        <div class="col-md-3 col-xs-12 col-sm-3">
                            <a  href="{{url('/bai-viet/'.$p->post_slug)}}">
                          <img  src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" /> </a>
                         </div> <!--End md3-->
                           <div class="col-md-9 col-xs-12 col-sm-9">
                           <h4 style="color:#000;padding: 5px;">{{$p->post_title}}</h4>
                                     <p >{!!$p->post_desc!!}</p>
                          <a  href="{{url('/bai-viet/'.$p->post_slug)}}" class="btn btn-default btn-sm">Xem bài viết</a>

                         </div> <!--End md 9-->
                         <div class="clearfix"></div>
                        @endforeach
                      </div><!--End row-->
                           </div><!--End vnt-news-->
                        
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        
                       {!!$post_cate->links()!!}
                      
                      </ul>
        <!--/recommended_items-->
@endsection