<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_password'
    ];

    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customer';
}
