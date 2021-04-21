<?php


namespace App\Services;

use App\Model\introduce;

class introduceService
{
    private $introduce;

    public function __construct(introduce $introduce)
    {
        $this->introduce = $introduce;
    }

    public function create($data)
    {
        $introduce = $this->introduce;
        foreach ($data as $key => $value) {
            $introduce->$key = $value;
        }
        $introduce->save();
        return $introduce;
    }

    public function edit($introduce, $data)
    {
        foreach ($data as $key => $value) {
            $introduce->$key = $value;
        }
        $introduce->save();
        return $introduce;
    }

//    public function first($id){
//        $introduce = $this->introduce->where('id', $id)->first();
//        return $introduce;
//    }

    public function isExits(){
        $data = $this->introduce->get();
        return sizeof($data) > 0 ? true : false;
    }

    public function first(){
        $introduce = $this->introduce;
        return $introduce->get()->first();
    }
}
