<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable = [
        'admin_id',
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_phone'];
    protected $primaryKey = 'admin_id';
    protected $table = 'tbl_admin';
}
