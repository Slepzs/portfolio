<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    protected $fillable = ['title', 'content', 'category', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
