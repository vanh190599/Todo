<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $fillable = [ 'brand_id','brand_name', 'brand_description', 'brand_status'];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';
}
