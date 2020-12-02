<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Post;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class UIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sliders = Post::where('slider', 1)->where('status', 1)->get();
        // For Menu
        $categories = Category::orderBy('created_at', 'desc')->take(6)->get();
        $first_post = Post::where('status', 1)->first();
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->take(6)->get();

        $categories_posts = Category::orderBy('created_at', 'desc')->get();

        return view('UI.index')
            ->with('categories_posts', $categories_posts)
            ->with('first_post', $first_post)
            ->with('posts', $posts)
            ->with('categories', $categories)
            ->with('sliders', $sliders);
    }


    public function showCategory($id, $slug)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('UI.index');
        }
        // For Menu
        $categories = Category::orderBy('created_at', 'desc')->take(6)->get();

        return view('UI.categories')
            ->with('category', $category)
            ->with('categories', $categories);
    }

    public function showPost($id, $slug)
    {
        $post = Post::where('status', 1)->where('id', $id)->first();
        if (!$post) {
            return redirect()->route('UI.index');
        }
        // For Menu
        $categories = Category::orderBy('created_at', 'desc')->take(6)->get();
        $latest_posts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('UI.singlePost')
            ->with('latest_posts', $latest_posts)
            ->with('post', $post)
            ->with('categories', $categories);
    }




    public function showContact(Request $request)
    {
        // For Menu
        $categories = Category::orderBy('created_at', 'desc')->take(6)->get();

        // For Validate
        $this->validationRules["first_name"] = 'required';
        $this->validationRules["last_name"] = 'required';
        $this->validationRules["email"] = 'required|email';
        $this->validationRules["mobile"] = 'required|numeric';
        $this->validationRules["message"] = 'required|max:255';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);

        return view('UI.contact')
            ->with('validator', $validator)
            ->with('categories', $categories);
    }


    public function contact(Request $request)
    {

        $request->validate($this->validationRules);

        $data =  $request->all();

        Contact::create($data);

        Toastr::success("تم إرسال رسالة التواصل بنجاح");
        return redirect()->back();
    }






    public function search(Request $request)
    {
        $search = $request->get('search', '');
        $categories = Category::orderBy('created_at', 'desc')->take(6)->get();
        $post = Post::where('title', 'like', '%' . $search . '%')->get();
        return view('UI.search')
            ->with('search', $search)
            ->with('post', $post)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
