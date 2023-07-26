<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\OneNews;
session_start();
class OneNewsController extends Controller
{
    
    public function add_one_news(){
        return view('admin.one_news.add_one_news');

    }
    public function save_one_news(Request $request){
    	$data = $request->all();
    	$one_news = new OneNews();

    	$one_news->one_news_title = $data['one_news_title'];
    	$one_news->one_news_slug = $data['one_news_slug'];
    	$one_news->one_news_desc = $data['one_news_desc'];
    	$one_news->one_news_content = $data['one_news_content'];
    	$one_news->one_news_meta_desc = $data['one_news_meta_desc'];
    	$one_news->one_news_meta_keywords = $data['one_news_meta_keywords'];
    	$one_news->one_news_status = $data['one_news_status'];

        $get_image = $request->file('one_news_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/one_news',$new_image);

            $one_news->one_news_image = $new_image;

        }
            $one_news->save();
       Session::put('message','Thêm bài viết thành công');
         return redirect('all-one_news');

       
    }
    public function all_one_news(){
        
        $all_one_news= OneNews::orderBy('one_news_id')->get();
       
    	return view('admin.one_news.list_one_news')->with(compact('all_one_news',$all_one_news));

    }
    public function delete_one_news($one_news_id){
        $one_news = OneNews::find($one_news_id);
        $one_news_image = $one_news->one_news_image;

        if($one_news_image){
        	$path ='public/uploads/one_news/'.$one_news_image;
        	unlink($path);
        }
        $one_news->delete();
        
       
        Session::put('message','Xóa bài viết thành công');
        return redirect()->back();
    }
    
   	public function edit_one_news($one_news_id){
   		$one_news = OneNews::find($one_news_id);
   		return view('admin.one_news.edit_one_news')->with(compact('one_news'));
   	}
   	public function update_one_news(Request $request,$one_news_id){
    	$data = $request->all();
    	$one_news = OneNews::find($one_news_id);

    	$one_news->one_news_title = $data['one_news_title'];
    	$one_news->one_news_slug = $data['one_news_slug'];
    	$one_news->one_news_desc = $data['one_news_desc'];
    	$one_news->one_news_content = $data['one_news_content'];
    	$one_news->one_news_meta_desc = $data['one_news_meta_desc'];
    	$one_news->one_news_meta_keywords = $data['one_news_meta_keywords'];
    	$one_news->one_news_status = $data['one_news_status'];

        $get_image = $request->file('one_news_image');
      
        if($get_image){
        	//xoa anh cu
        	$one_news_image_old = $one_news->one_news_image;
        	$path ='public/uploads/one_news/'.$one_news_image_old;
        	unlink($path);
        	//cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/one_news',$new_image);
            $one_news->one_news_image = $new_image; 
        }

        $one_news->save();
        Session::put('message','Cập nhật bài viết thành công');
         return redirect('all-one_news');
   	}

     public function one_bai_viet(Request $request,$one_news_slug){


        $one_news_by_id = OneNews::where('one_news_status',1)->where('one_news_slug',$one_news_slug)->take(1)->get();
         $category=DB::table('tbl_category_product')->where('category_status','1')->get(); 

        foreach($one_news_by_id as $key => $p){
            //seo 
            $meta_desc = $p->one_news_meta_desc; 
            $meta_keywords = $p->one_news_meta_keywords;
            $meta_title = $p->one_news_title;
            $url_canonical = $request->url();
            //--seo
        }
   
       
        return view('pages.1baiviet.1baiviet')->with('category',$category)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('one_news_by_id',$one_news_by_id);
    }
   
    
}
