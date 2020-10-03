<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_category extends Model
{
    protected $fillable = [
        'news_category_id',
        'news_category_name',
        'news_category_desc',
        'news_category_status'
    ];

    protected $primaryKey = 'news_category_id';
    protected $table = 'tbl_news_category';
}
