<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'adverts';

    protected $fillable=[
        "title","content","partner_id"
    ];
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function skills()
    {
        return $this->belongsToMany(advert_skills::class);
    }



    // public function adverts()
    // {
    //     return $this->hasMany(Advert::class);
    // }

}
