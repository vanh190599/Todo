<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'tbl_order_details';

    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'order_detail_id',
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_sale_qty',
        'date_c',
    ];
}
