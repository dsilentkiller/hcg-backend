<?php

namespace App\Http\Controllers\Admin\Setting;
// use Illuminate\Support\Facades\Route;

use App\Models\Admin\Setting\Setting;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Http\Controllers\Controller;
use Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folderName = 'admin.setting.';
    protected $imageSupport;
    protected $setting;
    protected $iconHeight = 80;
    protected $iconWidth = 90;
    protected $logoWidth = 90;
    protected $logoHeight = 90;

    function __construct(ImageSupport $imageSupport, Setting $setting)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->setting = $setting;
    }
    public function index()
    {
        //
        $setting = Setting::find(1);
        if (!$setting) {
            return view($this->folderName . 'form', [
                'activePage' => 'setting',
                'title' => 'setting'
            ]);
        }
        else {
            return view($this->folderName . 'form', [
                'activePage' => 'setting',
                'setting' => $setting,
                'title' => 'setting'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->setting = Setting::find(1);
        if ($this->setting) {
            return redirect()->route('setting.index');
        }
        return view($this->folderName . 'form', [
            'activePage' => 'setting',
            'title' => 'setting'
        ]);
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
        $this->setting->fill($request->all());
        $logo = $this->imageSupport->saveAnyImg($request, 'setting', 'logo', $this->logoWidth, $this->logoHeight);
        $icon = $this->imageSupport->saveAnyImg($request, 'setting', 'icon', $this->iconWidth, $this->iconHeight);
        $this->setting->icon = $icon;
        $this->setting->logo = $logo;
        $this->setting->updated_by = Auth::user()->id;
        if ($this->setting->save()) {
            Toastr::success('Successfully Setting Has Created', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('setting.index')->with('success', 'Successfully Setting Has Created');
        }
        else {
            return back()->withInput()->with('error', 'Could not be save please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
        return view($this->folderName . 'form', [
            'setting' => $setting,
            'activePage' => 'setting',
            'title' => 'setting'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //  
        $this->setting = $setting; //setting variable declartaion
        $this->setting->fill($request->all());
        //logo file check
        if (!$request->file('logo') === '') {
            $this->imageSupport->deleteImg('setting', $this->seting->logo);
            $logo = $this->imageSupport->saveAnyImg($request, 'setting', 'logo', $this->logoWidth, $this->logoHeight);
            $this->setting->logo = $logo;
        }

        // icon file check
        if (!$request->file('icon') == '') {
            $this->imageSupport - deleteImg('setting', $this->setting->icon);
            $icon = $this->imageSupport->saveAnyImg($request, 'setting', 'icon', $this->iconWidth, $this->iconHeight);
            $this->setting->icon = $icon;
        }

        //user updated 

        $this->setting->updated_by = Auth::user()->id;
        //setting file save
        if ($this->setting->save()) {
            Toastr::success('Successfully Setting Has updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('setting.index')->with('success', 'Successfully Setting Has Update');
        }
        else {
            return back()->withInput()->with('error', 'Could not be save please try again later');
        }
    }
}