<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model implements HasMedia
{
    use HasFactory, Sluggable, SluggableScopeHelpers, InteractsWithMedia;

    protected $fillable = ['user-id', 'title', 'content', 'category', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function getCreatedAtAttribute($value)
    {
        return date("d F Y H:i", strtotime($value));
    }



    /*
    public function setTitleAttribute($value)
    {
        function setSlugAttribute($value) : string
        {
            $slug = explode(' ', $value);
            return $slug = implode('-', $slug);
        }
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = setSlugAttribute($value);
    }
    */

}
