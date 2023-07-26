<?php

namespace App\Providers;
use App\Models\Contact;
use App\Models\Post;
use App\Models\CatePost;
use App\Models\Icons;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view) {
            //get information 
            $contact_footer = Contact::where('info_id',1)->get();
            $post_footer1 = Post::where('cate_post_id',8)->get();
            $post_footer2 = Post::where('cate_post_id',9)->get();
            $post_footer3 = Post::where('cate_post_id',10)->get();
            $category_blog=DB::table('tbl_category_post')->where('cate_post_id',12)->where('cate_post_status',1)->get(); 

            $icons = Icons::where('category','icons')->orderBy('id_icons','asc')->get();
            $view->with('contact_footer',$contact_footer)->with('post_footer1',$post_footer1)->with('post_footer2',$post_footer2)->with('post_footer3',$post_footer3)->with('icons',$icons)->with('category_blog',$category_blog);

        });
    }
}
