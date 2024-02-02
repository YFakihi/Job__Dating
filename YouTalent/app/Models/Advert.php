<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $table = 'adverts';

    protected $fillable=[
        "title","content","partner_id"
    ];
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }


    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

}
