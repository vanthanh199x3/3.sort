@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật 1 bài viết
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-one_news/'.$one_news->one_news_id)}}" method="post" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="one_news_title" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control" onkeyup="ChangeToSlug();" value="{{$one_news->one_news_title}}" id="slug" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="one_news_slug" value="{{$one_news->one_news_slug}}" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="8"  class="form-control" name="one_news_desc" id="ckeditor1" placeholder="Mô tả danh mục">{{$one_news->one_news_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="one_news_content" id="my-editor"  placeholder="Nội dung">{{$one_news->one_news_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta từ khóa</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="one_news_meta_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$one_news->one_news_meta_keywords}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Meta nội dung</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="one_news_meta_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$one_news->one_news_meta_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" name="one_news_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{asset('public/uploads/one_news/'.$one_news->one_news_image)}}" height="100" width="100">
                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="one_news_status" class="form-control input-sm m-bot15">
                                        @if($one_news->one_news_status==1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif


                                    </select>
                                </div>
                                <button type="submit"  class="btn btn-info">Cập nhật bài viết</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection