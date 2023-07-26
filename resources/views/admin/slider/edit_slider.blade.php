@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật slider
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
                                <form role="form" action="{{URL::to('/update-slider/'.$slider->slider_id)}}" method="post" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slider</label>
                                    <input type="text" name="slider_name" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control"  value="{{$slider->slider_name}}" placeholder="Tên slider">
                                </div>
                                
                                <div class="form-group">
                                    <label >Mô tả slider</label>
                                    <textarea style="resize: none" rows="8"  class="form-control" name="slider_desc"  placeholder="Mô tả">{{$slider->slider_desc}}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh </label>
                                    <input type="file" name="slider_image" class="form-control">
                                    <img src="{{asset('public/uploads/slider/'.$slider->slider_image)}}" height="100" width="100">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="slider_status" class="form-control input-sm m-bot15">
                                        @if($slider->slider_status==1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif

                                            
                                    </select>
                                </div>
                                <button type="submit"  class="btn btn-info">Cập nhật </button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection