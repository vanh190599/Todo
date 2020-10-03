<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_id',
        'brand_id',
        'category_id',
        'product_name',
        'product_price',
        'product_sale_price',
        'product_image',
        'product_status',
        'product_desc',
        'product_uu_dai',
        'product_so_luong',
        'product_so_luong_ban',
        'product_bao_hanh'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
