<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageCategoryRequest;
use App\Http\Requests\PackageCategoryUpdateRequest;
use App\Models\Admin\Category\Category;
use App\Models\Admin\Package\PackageCategory;
use App\Support\ImageSupport;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class PackageController extends Controller
{
    protected $folderName = 'admin.package.category.';
    protected $imageSupport;
    protected $packageCategory;
    protected $imageHeight = 720;
    protected $imageWidth = 1200;

    function __construct(ImageSupport $imageSupport, PackageCategory $packageCategory)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->packageCategory = $packageCategory;
    }

    public function getPackageCategories($n)
    {
        return PackageCategory::orderByDesc('created_at')->paginate($n);
    }
    public static function getSlug($toSlug)
    {
        $slug = SlugService::createSlug(PackageCategory::class , 'slug', $toSlug);
        return $slug;
    }
    public function getDestinationCategory()
    {
        $id = Category::where('name', 'Nepal')->orWhere('name', 'nepal')->first()->id;
        return $id;
    }

    public function index()
    {
        //

        return view($this->folderName . 'index', [
            'page' => 'package_category',
            'activePage' => 'package_category_list',
            'n' => 1,
            'packageCategories' => $this->getPackageCategories(10),
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
            'page' => 'package_category',
            'activePage' => 'package_category_create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageCategoryRequest $request)
    {
        //
        $this->packageCategory->fill($request->all());
        $this->packageCategory->created_by = Auth::user()->id;
        $this->packageCategory->slug = $this->getSlug($request->name);
        $this->packageCategory->category_id = $this->getDestinationCategory();
        if (!$request->file('image') == '') {
            $image = $this->imageSupport->saveAnyImg($request, 'package_category', 'image', $this->imageWidth, $this->imageHeight);
            $this->packageCategory->image = $image;
        }
        if ($this->packageCategory->save()) {
            Toastr::success('Successfully 1 Package Category Added', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('package_category.index');
        }
        else {
            return back()->withInput('error', 'Could not be Added New PAckage Category Please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(PackageCategory $packageCategory)
    {
        //
        return view($this->folderName . 'show', [
            'page' => 'package_category',
            'activePage' => 'package_category_list',
            'packageCategory' => $packageCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageCategory $packageCategory)
    {
        //

        return view($this->folderName . 'form', [
            'page' => 'package_category',
            'activePage' => 'package_category_create',
            'packageCategory' => $packageCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
        $this->packageCategory = $packageCategory;
        $this->packageCategory->fill($request->all());
        $this->packageCategory->created_by = Auth::user()->id;
        $this->packageCategory->slug = $this->getSlug($request->name);
        if (!$request->file('image') == '') {
            $this->imageSupport->deleteImg('package_category', $this->packageCategory->image);
            $image = $this->imageSupport->saveAnyImg($request, 'package_category', 'image', $this->imageWidth, $this->imageHeight);
            $this->packageCategory->image = $image;
        }
        if ($this->packageCategory->save()) {
            Toastr::success('Successfully 1 Package Category Updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('package_category.index');
        }
        else {
            return back()->withInput('error', 'Could not be Added New Package Category Please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
        if ($packageCategory->delete()) {
            Toastr::success('Successfully 1 Package Category Deleted', 'Success !!!', ['optionClass' => 'toast-bottom-right']);
            return redirect()->route('package_category.index');
        }
        else {
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
