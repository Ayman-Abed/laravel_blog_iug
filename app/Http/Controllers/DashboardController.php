<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        $contacts = Contact::all();

        // Latest Post
        $latest_posts = Post::where('status', 1)->orderBy('created_at', 'desc')->take(6)->get();
        $latest_contacts = Contact::orderBy('created_at', 'desc')->take(6)->get();
        return view('Manager.dashboard.index')
            ->with('posts', $posts)
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('users', $users)
            ->with('contacts', $contacts)
            ->with('latest_posts', $latest_posts)
            ->with('latest_contacts', $latest_contacts);
    }


    public function userProfile()
    {
        $user = auth()->user();
        return view('Manager.dashboard.profile.index')->with('user', $user);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = auth()->user();


        if (trim($request->password) != '') {
            $user->password = bcrypt($request->password);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        Toastr::success("تم تحديث البيانات بنجاح");

        return view('Manager.dashboard.profile.index')->with('user', $user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
