<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;//buat delete sementara dan masuk ke field deleted_at
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];//buat menghidden, tapi kalau ditampilkan langsung di index masih bisa tampil juga
    public function edulevel(){
        return $this->belongsTo('App\Models\Edulevel');//Belongs to karena dari table foreign key mau kita relasikan ke table primary key maka itu inverse, tapi kalau sebaliknya bisa pake relasi kardinalitas
    }
}
