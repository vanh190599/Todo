<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable = [
        'news_id',
        'news_category_id',
        'news_title',
        'news_desc',
        'news_content',
        'news_hot',
        'news_status',
        'news_image'
    ];

    protected $primaryKey = 'news_id';
    protected $table = 'tbl_news';
}
