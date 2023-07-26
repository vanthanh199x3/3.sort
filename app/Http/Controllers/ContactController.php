<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Contact;
use App\Models\Icons;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
      public function lien_he(Request $request){
        
        //seo 
        $meta_desc = "Liên hệ"; 
        $meta_keywords = "Liên hệ";
        $meta_title = "Liên hệ chúng tôi";
        $url_canonical = $request->url();
        //--seo

        $contact = Contact::where('info_id',1)->get();
        $category=DB::table('tbl_category_product')->where('category_status','1')->get(); 

        return view('pages.lienhe.contact')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('contact',$contact)->with('category',$category);

    }


    public function information(){
    	$contact = Contact::where('info_id',1)->get();

    	return view('admin.information.add_information')->with(compact('contact'));
    }
    public function update_info(Request $request,$info_id){
    	$data = $request->all();
    	$contact = Contact::find($info_id);
    	$contact->info_contact = $data['info_contact'];	
    	$contact->info_map = $data['info_map'];
    	$get_image = $request->file('info_image');
    	$path = 'public/uploads/logo/';
    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
    	}

    	$contact->save();
    	return redirect()->back()->with('message','Cập nhật thông tin website thành công');
    }

     public function add_nut(Request $request){
        $data = $request->all();
        $icons = new Icons();
        $name = $data['name'];
        $link = $data['link'];
        $get_image = $request->file('file');
      
        $path = 'public/uploads/icons/';
      
        //them hinh anh
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $icons->image = $new_image;
           
        }
        $icons->name = $name;
        $icons->link = $link;
        $icons->category = 'icons';
         
        $icons->save();
        
    }
    public function delete_icons(){
        $id = $_GET['id'];
        $icons = Icons::find($id);
        $icons->delete();
    }

    public function list_nut(){
        $icons = Icons::where('category','icons')->orderBy('id_icons','DESC')->get();
        // dd($icons);
        $output = '';
        $output .= '<table class="table table-hover">
            <thead>
              <tr>
                <th>Tên nút</th>
                <th>Hình ảnh</th>
                <th>Link</th>
                <th>Quản lý</th>
              </tr>
              </tr>
            </thead>
            <tbody>';
            foreach($icons as $ico){

             $output .= ' <tr>
                <td>'.$ico->name.'</td>
                <td><img height="32px" width="32px" src="'.url('/public/uploads/icons/'.$ico->image).'"></td>
                <td>'.$ico->link.'</td>
                 <td><button id="'.$ico->id_icons.'" class="btn btn-danger" onclick="delete_icons(this.id)">Xóa</button></td>
              </tr>';

             }
             $output .= '</tbody>
          </table>';
          echo $output;
    }

  
}
