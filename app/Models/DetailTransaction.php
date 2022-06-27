<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "transaction_datas";

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function zona(){
        return $this->belongsTo(Zona::class,'zona_id');
    }
}
