<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//csrf_token();

class category extends Model
{
    protected $fillable = [ 'category_id','category_name', 'category_description', 'category_status'];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category';
}
