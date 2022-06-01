<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    // public function provinsi()
    // {
    //     return $this->belongsTo(Province::class);
    // }

    // public function kabupaten()
    // {
    //     return $this->belongsTo(Regency::class);
    // }

    // public function kecamatan()
    // {
    //     return $this->belongsTo(District::class);
    // }

    public function kelurahan()
    {
        return $this->belongsTo(Village::class,'village_id');
    }
}
