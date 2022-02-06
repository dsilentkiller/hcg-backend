<?php

namespace App\Http\Controllers\API\Admin\Project;

use Illuminate\Http\Request;

use App\Support\ImageSupport;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\projectCategoryRequest;
use App\Models\Admin\Project\projectCategory;
use App\Http\Requests\projectCategoryUpdateRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class projectCategoryController extends Controller
{
    protected $folderName='admin.Project.category.';
    protected $imageSupport;
    protected $projectCategory;
    protected $imageHeight=720;
    protected $imageWidth=1200;
    function __construct(ImageSupport $imageSupport, projectCategory $projectCategory)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->projectCategory = $projectCategory;
    }
    public function getProjectCategories($n)
    {
        return projectCategory::orderByDesc('created_at')->paginate($n);
    }
    public static function getSlug($toSlug)
    {
        $slug = SlugService::createSlug(projectCategory::class, 'slug', $toSlug);
        return $slug;
    }
    // public function getDestinationCategory()
    // {
    //     $id = Category::where('name', 'Nepal')->orWhere('name', 'nepal')->first()->id;
    //     return $id;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName.'index', [
            'page'=>'project_category',
            'activePage'=>'project_category_list',
            'n'=>1,
            'ProjectCategories'=>$this->getProjectCategories(10),
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
        return view($this->folderName.'form', [
            'page'=>'project_category',
            'activePage'=>'project_category_create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(projectCategoryRequest $request)
    {
        //
        // return $request;
        $this->projectCategory->fill($request->all());
        $this->projectCategory->created_by = Auth::user()->id;
        $this->projectCategory->slug = $this->getSlug($request->name);
        // $this->projectCategory->category_id = $this->getDestinationCategory();
        if(!$request->file('image')==''){
            $image = $this->imageSupport->saveAnyImg($request, 'project_category', 'image', $this->imageWidth, $this->imageHeight);
            $this->projectCategory->image = $image;
        }
        if($this->projectCategory->save()){
            Toastr::success('Successfully 1 Project Category Added', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('project_category.index');
        }else{
            return back()->with('error', 'Could not be Added New Project Category Please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Project\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show(projectCategory $projectCategory)
    {
        //
        return view($this->folderName.'show', [
            'page'=>'project_category',
            'activePage'=>'project_category_list',
            'projectCategory'=>$projectCategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Project\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(projectCategory $projectCategory)
    {
        //
        return view($this->folderName.'form', [
            'page'=>'project_category',
            'activePage'=>'project_category_create',
            'projectCategory'=>$projectCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Project\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(projectCategoryUpdateRequest $request, projectCategory $projectCategory)
    {
        //
        $this->projectCategory = $projectCategory;
        $this->projectCategory->fill($request->all());
        $this->projectCategory->created_by = Auth::user()->id;
        $this->projectCategory->slug = $this->getSlug($request->name);
        if(!$request->file('image')==''){
            $this->imageSupport->deleteImg('project_category', $this->projectCategory->image);
            $image = $this->imageSupport->saveAnyImg($request, 'project_category', 'image', $this->imageWidth, $this->imageHeight);
            $this->projectCategory->image = $image;
        }
        if($this->projectCategory->save()){
            Toastr::success('Successfully 1 Project Category Updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('project_category.index');
        }else{
            return back()->with('error', 'Could not be Added New Project Category Please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Project\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(projectCategory $projectCategory)
    {
        //
        if($projectCategory->delete()){
            Toastr::success('Successfully 1 Project Category Deleted', 'Success !!!', ['optionClass'=>'toast-bottom-right']);
            return redirect()->route('project_category.index');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
