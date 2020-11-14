<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DataTables;

use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class CategoryController extends Controller
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
        return view('Manager.dashboard.category.index');
    }

    public function getCategoryData(Request $request)
    {

        $data = Category::latest();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })
            ->addColumn('posts_count', function ($row) {
                $btn = "<span class='badge badge-primary'>" . $row->posts->count() . "</span>";
                return $btn;
            })

            ->addColumn('action', function ($row) {
                $btn = "
                <a href=" . route('category.edit', $row->id) . "   class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-edit'></i></a>
                <button type='button' name='delete' id='$row->id'  class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-delete-1'></button>";
                return $btn;
            })

            ->rawColumns(['action', 'posts_count', 'timeDate'])
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
        return view('Manager.dashboard.category.add')->with('validator', $validator);
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

        Category::create($data);


        Toastr::success("تم إضافة العنصر بنجاح");

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('category.index');
        }

        $this->validationRules["name"] = 'required';


        $validator = JsValidator::make($this->validationRules, $this->validationMessages);



        return view("Manager.dashboard.category.edit")->with('category', $category)->with('validator', $validator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('category.index');
        }

        $this->validationRules["name"] = 'required';


        $request->validate($this->validationRules);

        $category = Category::find($id);
        if (!$category) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('category.index');
        }

        $data = $request->all();

        $data['slug'] = str_replace(' ', '-', $data['name']);

        $category->update($data);


        Toastr::success("تم تحديث العنصر بنجاح");
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('category.index');
        }
        $category->delete();

        Toastr::success("تم حذف العنصر بنجاح");
        return redirect()->route('category.index');
    }
}
