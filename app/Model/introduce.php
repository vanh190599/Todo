<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class introduce extends Model
{
    protected $fillable = [
        'id',
        'content',
    ];

    protected $primaryKey = 'id';
    protected $table = 'tbl_introduce';
}
