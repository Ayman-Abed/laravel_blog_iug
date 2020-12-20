<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        $posts = Post::paginate(10);
        return $this->sendResponse(paginate($posts));
    }

    public function postsSlider()
    {
        $postsSlider = Post::where('slider', 1)->get();
        return $this->sendResponse($postsSlider);
    }
}
