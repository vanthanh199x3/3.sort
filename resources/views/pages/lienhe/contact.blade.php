@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-12">
                        <h2 class="title text-center">Liên hệ với chúng tôi</h2>
                            @foreach($contact as $key => $cont)
                                {!!$cont->info_contact!!}
                                
                                <h4>Bản đồ</h4>
                                {!!$cont->info_map!!}
                        @endforeach
                        
                 </div>
          </div>
     </div>  
                 
@endsection