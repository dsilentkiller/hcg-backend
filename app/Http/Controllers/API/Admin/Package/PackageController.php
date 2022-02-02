<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Models\Admin\Package\Package;
use App\Models\Admin\Package\PackageCategory;
use App\Support\ImageSupport;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;

class PackageController extends Controller
{
    protected $imageSupport;
    protected $folderName = 'admin.package.';
    protected $thumbHeight = 239;
    protected $thumbWidth = 358;
    protected $imageHeight = 450;
    protected $imageWidth = 750;
    function __construct(ImageSupport $imageSupport, Package $package)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->package = $package;
    }
    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Package::class , 'slug', $toSlug);
    }
    public function getPackages($n)
    {
        return Package::orderByDesc('created_at')->paginate($n);
    }
    public function getPackageCategories()
    {
        return PackageCategory::orderByDesc('created_at')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName . 'index', [
            'page' => 'package',
            'n' => 1,
            'activePage' => 'package_list',
            'packages' => $this->getPackages(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->folderName . 'form', [
            'page' => 'package',
            'activePage' => 'package_create',
            'packageCategories' => $this->getPackageCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        //
        $this->package->fill($request->all());
        $this->package->package_category_id = $request->package_category;
        $this->package->created_by = Auth::user()->id;
        if (!$request->file('thumbnail') == '') {
            $thumbnail = $this->imageSupport->saveAnyImg($request, 'package', 'thumbnail', $this->thumbWidth, $this->thumbHeight);
            $this->package->thumbnail = $thumbnail;
        }
        if ($this->package->save()) {
            if (!$request->file('images') == '') {
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'package', $this->imageWidth, $this->imageHeight);
                    DB::table('thumbnails')->insert([
                        ['package_id' => $this->package->id, 'image' => $image, 'created_at' => \Carbon\Carbon::now()],
                    ]);
                }
            }
            Toastr::success('Successfully Package Created', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('package.index')->with('success', 'Successfully Package Created');
        }
        else {
            return back()->withInput()->with('error', 'Package Could not be created please try again later');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Package\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
        return view($this->folderName . 'show', [
            'page' => 'package',
            'activePage' => 'package_list',
            'package' => $package,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Package\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
        return view($this->folderName . 'form', [
            'page' => 'package',
            'activePage' => 'package_create',
            'packageCategories' => $this->getPackageCategories(),
            'package' => $package,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Package\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageUpdateRequest $request, Package $package)
    {
        //
        $this->package = $package;
        $this->package->fill($request->all());
        $this->package->package_category_id = $request->package_category;
        $this->package->created_by = Auth::user()->id;
        $this->package->slug = $this->getSlug($this->package->name);
        $this->package->slug = $this->getSlug($this->package->name);
        if (!$request->file('thumbnail') == '') {
            $this->imageSupport->deleteImg('package', $package->thumbnail);
            $thumbnail = $this->imageSupport->saveAnyImg($request, 'package', 'thumbnail', $this->thumbWidth, $this->thumbHeight);
            $this->package->thumbnail = $thumbnail;
        }
        if ($this->package->save()) {
            if (!$request->file('images') == '') {
                foreach ($this->package->thumbnails as $img) {
                    $this->imageSupport->deleteImg('package', $img->image);
                    $this->package->thumbnails()->delete();
                }
                $this->package->thumbnails()->delete();
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'package', $this->imageWidth, $this->imageHeight);
                    DB::table('thumbnails')->insert([
                        ['package_id' => $this->package->id, 'image' => $image, 'updated_at' => \Carbon\Carbon::now()],
                    ]);
                }
            }
            Toastr::success('Successfully Package Updates', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('package.index')->with('success', 'Successfully Package Created');
        }
        else {
            return back()->withInput()->with('error', 'Package Could not be created please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Package\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
        $package->images->delete();
        if ($package->delete()) {
            Toastr::success('Successfully 1 Package Deleted', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('package.index')->with('success', 'Successfully 1 Package Deleted');
        }
        else {
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
