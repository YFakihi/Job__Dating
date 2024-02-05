<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'partners';

    protected $fillable=[
        "name","description","industry","size","location"
    ];


    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }


    public static function boot(){
        parent::boot();
        static::deleting(function(partner $partner){
            $partner->adverts()->delete();
        });
    }
}
