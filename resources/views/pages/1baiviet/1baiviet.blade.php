@extends('layout')
@section('content')


                      <div class="container">
                      <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-12">
                     
                        <h2 class="title text-center">{{$meta_title}}</h2>
                           
                       
                            @foreach($one_news_by_id as $key => $p)
                                     {!!$p->one_news_content!!}
                                     
                           @endforeach
                        </div>
                      </div>
                    </div>
              
                
                      
  @endsection