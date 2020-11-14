<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Toastr;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Manager.dashboard.setting.index");
    }


    // For make Yajara Datatable
    public function getSettingData(Request $request)
    {
        $data = Setting::take(1)->get();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('logo', function ($row) {

                $btn = $row->logo;
                if ($btn == null) {
                    $btn = null;
                } else {
                    $btn = "<img width='70' height='70' src='" . $row->logo  . "'>";
                }

                return $btn;
            })
            ->addColumn('action', function ($row) {
                $btn = "<a href=" . route('setting.edit', $row->id) . "   class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'><i class='flaticon-edit'></i></a>";
                return $btn;
            })
            ->rawColumns(['action', 'logo', 'timeDate'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Manager.dashboard.setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->logo) {
            $logo = $request->logo;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move("uploads/setting", $logo_new_name);
            $data['logo'] = 'uploads/setting/' . $logo_new_name;
        }

        if ($request->miniLogo) {
            $miniLogo = $request->miniLogo;
            $miniLogo_new_name = time() . $miniLogo->getClientOriginalName();
            $miniLogo->move("uploads/setting", $miniLogo_new_name);
            $data['miniLogo'] = 'uploads/setting/' . $miniLogo_new_name;
        }


        Setting::create($data);
        Toastr::success("تم إضافة العنصر بنجاح");

        return redirect()->route('setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return redirect()->route('setting.index');
        }
        return view("Manager.dashboard.setting.edit")->with('setting', $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return redirect()->route('setting.index');
        }




        $data = $request->all();


        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move("uploads/setting", $logo_new_name);
            $data['logo'] = 'uploads/setting/' . $logo_new_name;
        }

        if ($request->hasFile('miniLogo')) {
            $miniLogo = $request->miniLogo;
            $miniLogo_new_name = time() . $miniLogo->getClientOriginalName();
            $miniLogo->move("uploads/setting", $miniLogo_new_name);
            $data['miniLogo'] = 'uploads/setting/' . $miniLogo_new_name;
        }

        $setting->update($data);


        Toastr::success("تم تحديث العنصر بنجاح");
        return redirect()->route('setting.index');
    }
}
