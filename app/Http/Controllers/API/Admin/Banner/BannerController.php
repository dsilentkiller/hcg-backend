<?php

namespace App\Http\Controllers\API\Admin\Banner;

use Illuminate\Http\Request;

use App\Support\ImageSupport;
use Kamaln7\Toastr\Facades\Toastr;
use App\Models\Admin\Banner\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Auth;


class BannerController extends Controller
{
    protected $folderName = 'admin.banner.'; //folder directoery
    protected $imageSupport;
    protected $imageWidth = 1920;
    protected $imageHeight = 890;
    protected $banner; //banner variable created
    function __construct(ImageSupport $imageSupport, Banner $banner)
    {

        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->banner = $banner;
    }

    public function getBanners()
    {
        return Banner::orderbyDesc('created_at')->get();
    }
    public function index()
    {
        return view($this->folderName . 'form', [
            'activePage' => 'banner_create',
            'banners' => $this->getBanners(),
            'n' => 1,
        ]);
    }

    public function create()
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'banner_create',
            'page'=>'banner',
        ]);
    }



    public function store(BannerRequest $request)
    {
        //

        // $this->validate($request,[
        //     'title'=>'string|required|max:50',
        //     // 'description'=>'string|nullable',
        //     'image'=>'string|required',
        //     // 'status'=>'required|in:active,inactive',
        // ]);
        $this->banner->fill($request->all());
        $image = $this->imageSupport->saveAnyImg($request, 'banners', 'image', $this->imageWidth, $this->imageHeight);
        $this->banner->created_by = Auth::user()->id;
        $this->banner->image = $image;
        if ($this->banner->save()) {
            Toastr::success('Successfullly 1 banner has created', 'success!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'successfully 1 banner created.');

        }
        else {
            return back()->withInput()->with('error', 'couldnot be banner created,please try agian later');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
        return view($this->folderName . 'show', [
            'activePage' => 'setting',
            'banner' => $banner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
        return view($this->folderName . 'form', [
            'activePage' => 'site_setting',
            'banners' => $this->getBanners(),
            'banner' => $banner,
            'n' => 1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //

        // $request->validate([
        //     'title'=>'string|required|max:50',
        //     // 'description'=>'string|nullable',
        //     'image'=>'string|required',
        //     // 'status'=>'required|in:active,inactive',
        // ]);
        $this->banner = $banner;
        $this->banner->fill($request->all());
        $this->banner->created_by = Auth::user()->id;
        if (!$request->file('image') == '') {
            $this->imageSupport->deleteImg('banner', $this->banner->image);
            $image = $this->imageSupport->saveAnyImg($request, 'banners', 'image', $this->imageWidth, $this->imageHeight);
            $this->banner->image = $image;
        }
        if ($this->banner->save()) {
            Toastr::success('Successfully 1 banner has updated', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has updated');
        }
        else {
            return back()->withInput()->with('error', 'Could not be banner updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //

        //
        if ($banner->delete()) {
            Toastr::success('Successfully 1 banner has deleted', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has deleted');
        }
        else {
            return back()->with('error', 'Could not be deleted please try again later');
        }

    }
}
