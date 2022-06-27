<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'user_id',
        'city_id',
    ];

    public function details(){
        return $this->hasMany(DetailTransaction::class,'transaction_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function zona(){
        return $this->belongsTo(Zona::class,'zona_id');
    }
}
