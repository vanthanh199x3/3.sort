@extends('layout')
@section('content')


                     
                      <div class="container">
                      <div class="row">
                        <div class="vnt-related col-md-12 col-xs-12 col-sm-12">
                     
                        <h2 class="title text-center">{{$meta_title}}</h2>
                           
                            @foreach($post_by_id as $key => $p)
                                     {!!$p->post_content!!}
                           @endforeach
                            
                      <h2  class="title text-center">Bài viết liên quan</h2>
                      <ul class="post_relate">
                        @foreach($related as $key => $post_relate)
                          <li><a href="{{url('/bai-viet/'.$post_relate->post_slug)}}">{{$post_relate->post_title}}</a></li>
                        @endforeach

                      </ul>

                        </div>

                      </div>
                    </div>
              
                      
@endsection