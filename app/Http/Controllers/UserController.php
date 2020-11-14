<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;

use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->validationRules["email"] = 'required|email|unique:users,email';
        $this->validationRules["password"] = 'required|min:6';
        $this->validationRules["name"] = 'required';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.user.index');
    }

    public function getUserData(Request $request)
    {

        $data = User::latest();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })

            ->addColumn('action', function ($row) {
                $btn = "
                <a href=" . route('user.edit', $row->id) . "   class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-edit'></i></a>
                <button type='button' name='delete' id='$row->id'  class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-delete-1'></button>";
                return $btn;
            })

            ->rawColumns(['action', 'user_leave', 'user_hour', 'user_salary', 'department', 'timeDate'])
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
        return view('Manager.dashboard.user.add')->with('validator', $validator);
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

        User::create($data);


        Toastr::success("تم إضافة العنصر بنجاح");

        return redirect()->route('user.index');
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
        $user = User::find($id);
        if (!$user) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('user.index');
        }

        $this->validationRules["email"] = 'required|email|unique:users,email,' . $user->id;
        $this->validationRules["password"] = 'nullable|min:6';


        $validator = JsValidator::make($this->validationRules, $this->validationMessages);



        return view("Manager.dashboard.user.edit")->with('user', $user)->with('validator', $validator);
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
        $user = User::find($id);
        if (!$user) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('user.index');
        }
        $this->validationRules["email"] = 'required|email|unique:users,email,' . $user->id;
        $this->validationRules["password"] = 'nullable|min:6';

        $request->validate($this->validationRules);

        $user = User::find($id);
        if (!$user) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('user.index');
        }

        $data = $request->all();
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $user->password;

        $user->update($data);


        Toastr::success("تم تحديث العنصر بنجاح");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            Toastr::error("العنصر غير متوفر");
            return redirect()->route('user.index');
        }
        $user->delete();

        Toastr::success("تم حذف العنصر بنجاح");
        return redirect()->route('user.index');
    }
}
