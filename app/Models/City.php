<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'zona_id',
        'kota',
        'km',
    ];

    public function zona(){
        return $this->belongsTo(Zona::class);
    }
}
