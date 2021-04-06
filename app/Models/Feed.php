<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Feed extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'description', 'image', 'user_id'
    ];



    /*
    public function getCreatedAtAttribute($value)
    {
        return date("d F Y H:i", strtotime($value));
    }
    */

    public function getCreatedAtAttribute($value) {
        return Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }




}
