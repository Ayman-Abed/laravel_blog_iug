<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'logo',
        'miniLogo',
        'phone',
        'facebook',
        'twitter',
        'whatsapp',
        'instagram',
        'linkedin',
        'email',
        'blog_name',
        'description',
        'keywords',
        'address',
    ];


    public function getLogoAttribute($image)
    {
        return is_null($image) ? null : asset($image);
    }

    public function getMiniLogoAttribute($image)
    {
        return is_null($image) ? null : asset($image);
    }



}
