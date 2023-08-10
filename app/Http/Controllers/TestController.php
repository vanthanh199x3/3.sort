<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use Session;


class SliderController extends Controller
{
	
    public function manage_slider(){
    	$all_slide = Slider::orderBy('slider_id','DESC')->paginate(2);
    	return view('admin.slider.list_slider')->with(compact('all_slide'));
    }
    public function add_slider(){
    	return view('admin.slider.add_slider');
    }
    public function unactive_slide($slide_id){
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>0]);
        Session::put('message','Không kích hoạt slider thành công');
        return Redirect::to('manage-slider');

    }
    public function active_slide($slide_id){
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt slider thành công');
        return Redirect::to('manage-slider');

    }

    public function insert_slider(Request $request){
    	

   		$data = $request->all();
       	$get_image = request('slider_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider', $new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
           	$slider->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('add-slider');
        }else{
        	Session::put('message','Làm ơn thêm hình ảnh');
    		return Redirect::to('add-slider');
        }
       	
    }

        public function edit_slider($slider_id){
        $slider = Slider::find($slider_id);
        return view('admin.slider.edit_slider')->with(compact('slider'));
    }
       
    public function update_slider(Request $request,$slider_id){
        $data = $request->all();
        $slider = Slider::find($slider_id);

            $slider->slider_name = $data['slider_name'];
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];

        $get_image = $request->file('slider_image');
      
        if($get_image){
            //xoa anh cu
            $slider_image_old = $slider->slider_image;
            $path ='public/uploads/slider/'.$slider_image_old;
            unlink($path);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $slider->slider_image = $new_image; 
        }

        $slider->save();
        Session::put('message','Cập nhật slider thành công');
        return redirect()->back();
    }
    public function delete_slide(Request $request, $slide_id){
        $slider = Slider::find($slide_id);
        $slider->delete();
        Session::put('message','Xóa slider thành công');
        return redirect()->back();

    }
}
