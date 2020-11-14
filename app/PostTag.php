<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'post_id',
        'tag_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
