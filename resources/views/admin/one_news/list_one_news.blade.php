@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      1 Bài viết
    </div>
    <div class="row w3-res-tb">

    <div class="col-sm-4" style="margin-bottom: 20px;">
         <a href="{{URL::to('/add-one_news')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm bài viết  </a>
      </div>
      <div class="clear"></div>

     
    </div> 
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Từ khóa</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_one_news as $key => $one_news)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="one_news[]"><i></i></label></td>
            <td>{{ $one_news->one_news_title }}</td>
            <td>{{ $one_news->one_news_slug }}</td>
            <td>{!! $one_news->one_news_desc !!}</td>
            <td>{{ $one_news->one_news_meta_keywords }}</td>
            <td>
              @if($one_news->one_news_status==1)
                Hiển thị
              @else 
                Ẩn
              @endif
            </td>

            <td>
              <a href="{{URL::to('/edit-one_news/'.$one_news->one_news_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                
              <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')" href="{{URL::to('/delete-one_news/'.$one_news->one_news_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
   {{--  <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_one_news->links()!!}
          </ul>
        </div>
      </div>
    </footer> --}}
  </div>
</div>
@endsection