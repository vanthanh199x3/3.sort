<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OneNews extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'one_news_title', 'one_news_desc', 'one_news_content','one_news_meta_desc','one_news_meta_keywords','one_news_status','one_news_image','cate_one_news_id','one_news_slug','one_news_views'
    ];
    protected $primaryKey = 'one_news_id';
 	protected $table = 'tbl_one_news';

 	
}
