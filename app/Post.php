<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'category_id', 'title', 'slug', 'content', 'image', 'status', 'slider'
    ];
    protected $appends = ['status_value', 'slider_value'];

    protected $with = ['tags'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset($image);
    }

    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case '1':
                return 'فعال';
            case '0':
                return 'غير فعال';
            default:
                '';
        }
    }

    public function getSliderValueAttribute()
    {
        switch ($this->slider) {
            case '1':
                return 'فعال';
            case '0':
                return 'غير فعال';
            default:
                '';
        }
    }


    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
