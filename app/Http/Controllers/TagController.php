<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->validationRules["name"] = 'required';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.tag.index');
    }

    public function getTagData(Request $request)
    {

        $data = Tag::latest();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })

            ->addColumn('action', function ($row) {
                $btn = "
                <a href=" . route('tag.edit', $row->id) . "   class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-edit'></i></a>
                <button type='button' name='delete' id='$row->id'  class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-delete-1'></button>";
                return $btn;
            })

            ->rawColumns(['action', 'timeDate'])
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
        return view('Manager.dashboard.tag.add')->with('validator', $validator);
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
        $data = $request->all();

        $data['password'] = bcrypt($request->password);
        $data['slug'] = str_replace(' ', '-', $data['name']);

        Tag::create($data);


        Toastr::success("تم إضافة العنصر بنجاح");

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('tag.index');
        }

        $this->validationRules["name"] = 'required';


        $validator = JsValidator::make($this->validationRules, $this->validationMessages);



        return view("Manager.dashboard.tag.edit")->with('tag', $tag)->with('validator', $validator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('tag.index');
        }

        $this->validationRules["name"] = 'required';


        $request->validate($this->validationRules);

        $tag = Tag::find($id);
        if (!$tag) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('tag.index');
        }

        $data = $request->all();

        $data['slug'] = str_replace(' ', '-', $data['name']);

        $tag->update($data);


        Toastr::success("تم تحديث العنصر بنجاح");
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('tag.index');
        }
        $tag->delete();

        Toastr::success("تم حذف العنصر بنجاح");
        return redirect()->route('tag.index');
    }
}
