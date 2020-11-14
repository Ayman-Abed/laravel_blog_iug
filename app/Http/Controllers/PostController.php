<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->validationRules["image"] = 'required|image';
        $this->validationRules["title"] = 'required';
        $this->validationRules["category_id"] = 'required|exists:categories,id';
        $this->validationRules["tag_id"] = 'required|exists:tags,id|min:1';
        $this->validationRules["content"] = 'required';
        $this->validationRules["status"] = 'in:0,1';
        $this->validationRules["slider"] = 'in:0,1';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.post.index');
    }

    public function getPostData(Request $request)
    {

        $data = Post::latest();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })

            ->addColumn('image', function ($row) {
                $btn = "<img width='70' height='70' src='" . $row->image . "'>";
                return $btn;
            })

            ->addColumn('category_name', function ($row) {
                $btn = "<span class='badge badge-primary'>" . $row->category->name . "</span>";
                return $btn;
            })
            ->addColumn('tags_count', function ($row) {
                $btn = "<span class='badge badge-primary'>" . $row->tags->count() . "</span>";
                return $btn;
            })

            ->addColumn('status_value', function ($row) {
                if ($row->status == 1) {
                    $btn = "<span class='badge badge-success'>" . $row->status_value . "</span>";
                } else {
                    $btn = "<span class='badge badge-danger'>" . $row->status_value . "</span>";
                }
                return $btn;
            })

            ->addColumn('slider_value', function ($row) {
                if ($row->slider == 1) {
                    $btn = "<span class='badge badge-success'>" . $row->slider_value . "</span>";
                } else {
                    $btn = "<span class='badge badge-danger'>" . $row->slider_value . "</span>";
                }
                return $btn;
            })

            ->addColumn('action', function ($row) {
                $btn = "
                <a href=" . route('post.edit', $row->id) . "   class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-edit'></i></a>
                <button type='button' name='delete' id='$row->id'  class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-delete-1'></button>";
                return $btn;
            })

            ->rawColumns(['action', 'status_value', 'slider_value', 'image', 'category_name', 'tags_count', 'timeDate'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $categories = Category::all();
        $tags = Tag::all();
        return view('Manager.dashboard.post.add')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('validator', $validator);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->validationRules);


        $post =  Post::create([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', $request->title),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => $this->uploadImage($request->image, 'posts'),
            'status' => $request->get('status', 0),
            'slider' => $request->get('slider', 0)
        ]);

        $tag_id = $request->get('tag_id', []);
        $post->tags()->sync($tag_id);

        Toastr::success("تم إضافة العنصر بنجاح");

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('post.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $categories = Category::all();
        $tags = Tag::all();



        return view("Manager.dashboard.post.edit")
            ->with('post', $post)
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('validator', $validator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validationRules["image"] = 'nullable|image';
        $request->validate($this->validationRules);

        $post = Post::find($id);
        if (!$post) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('post.index');
        }

        $post->update([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', $request->title),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => $request->file('image') ? $this->uploadImage($request->image, 'posts') : $post->image,
            'status' => $request->get('status', 0),
            'slider' => $request->get('slider', 0)

        ]);

        $tag_id = $request->get('tag_id', []);
        $post->tags()->sync($tag_id);


        Toastr::success("تم تحديث العنصر بنجاح");
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('post.index');
        }
        $post->delete();

        Toastr::success("تم حذف العنصر بنجاح");
        return redirect()->route('post.index');
    }
}
