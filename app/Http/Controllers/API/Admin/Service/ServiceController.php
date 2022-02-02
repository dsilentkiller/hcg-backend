<?php

namespace App\Http\Controllers\Admin\Service;


use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
// use App\Models\Admin\Service\Service; //model path diretory
use App\Support\ImageSupport;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;





use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $imageSupport; //image
    protected $folderName = 'admin.service.'; //service directory
    protected $imageHeight = 450;
    protected $imageWidth = 750;
    function __construct(ImageSupport $imageSupport, Service $service)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->service = $service;
    }
    public function index()
    {
        //
        return view($this->folderName . 'index', [
            'page' => 'service',
            'n' => 1,
            'activePage' => 'sevice_list',
            'services' => $this->getServices(10),
        ]);
    }

    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Service::class , 'slug', $toSlug);
    }
    public function getServices($n)
    {
        return Service::orderByDesc('created_at')->paginate($n);
    }
    public function getPackageCategories()
    {
        return PackageCategory::orderByDesc('created_at')->get();
    }
    public function create()
    {
        //

        return view($this->folderName . 'form', [
            'page' => 'service',
            'activePage' => 'service_create',
            'serviceCategories' => $this->getServiceCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        //
        $this->service->fill($request->all());
        $this->service->service_category_id = $request->service_category;
        $this->service->created_by = Auth::user()->id;
        if (!$request->file('image') == '') {
            $image = $this->imageSupport->saveAnyImg($request, 'service', 'image', $this->imageWidth, $this->imageHeight);
            $this->service->image = $image;
        }
        if ($this->service->save()) {
            if (!$request->file('images') == '') {
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'service', $this->imageWidth, $this->imageHeight);
                    DB::table('images')->insert([
                        ['serviceid' => $this->service->id, 'image' => $image, 'created_at' => \Carbon\Carbon::now()],
                    ]);
                }
            }
            Toastr::success('Successfully Service Created', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('service.index')->with('success', 'Successfully Package Created');
        }
        else {
            return back()->withInput()->with('error', 'Service Could not be created please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return view($this->folderName . 'show', [
            'page' => 'service',
            'activePage' => 'service_list',
            'service' => $service,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view($this->folderName . 'form', [
            'page' => 'service',
            'activePage' => 'service_create',
            'serviceCategories' => $this->getServiceCategories(),
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $this->service = $service;
        $this->service->fill($request->all());
        $this->service->service_category_id = $request->service_category;
        $this->service->created_by = Auth::user()->id;
        $this->service->slug = $this->getSlug($this->service->name);
        $this->service->slug = $this->getSlug($this->service->name);
        if (!$request->file('image') == '') {
            $this->imageSupport->deleteImg('service', $service->image);
            $image = $this->imageSupport->saveAnyImg($request, 'service', 'image', $this->imageWidth, $this->imageHeight);
            $this->service->image = $image;
        }
        if ($this->service->save()) {
            if (!$request->file('images') == '') {
                foreach ($this->service->images as $img) {
                    $this->imageSupport->deleteImg('service', $img->image);
                    $this->service->images()->delete();
                }
                $this->service->images()->delete();
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'service', $this->imageWidth, $this->imageHeight);
                    DB::table('images')->insert([
                        ['service_id' => $this->service->id, 'image' => $image, 'updated_at' => \Carbon\Carbon::now()],
                    ]);
                }
            }
            Toastr::success('Successfully service Updates', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('service.index')->with('success', 'Successfully service Created');
        }
        else {
            return back()->withInput()->with('error', 'service Could not be created please try again later');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //

        $service->images->delete();
        if ($service->delete()) {
            Toastr::success('Successfully 1 service Deleted', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('service.index')->with('success', 'Successfully 1 service Deleted');
        }
        else {
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
