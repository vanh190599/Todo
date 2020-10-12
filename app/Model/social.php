<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'provider_user_id',  'provider',  'user'
    ];
    protected $primaryKey = 'user_id';
    protected $table = 'tbl_social';

    //Khi cập nhật 1 belongsTo relationship, bạn có thể sử dụng associate method. Method này sẽ set foreign key trên model con.
    // modulde con là admin
    public function admin(){
        return $this->hasMany('App\admin', 'user');
    }
}
