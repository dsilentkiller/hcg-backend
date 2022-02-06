<?php

namespace App\Http\Controllers\API\Admin\Project;

use App\Support\ImageSupport;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectRequest;
use App\Models\Admin\Project\Project;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Admin\Project\ProjectCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectController extends Controller
{
    protected $imageSupport;
    protected $folderName = 'admin.Project.';
    protected $thumbHeight=239;
    protected $thumbWidth=358;
    protected $imageHeight=450;
    protected $imageWidth=750;
    function __construct(ImageSupport $imageSupport, Project $project)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->Project = $project;
    }
    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Project::class, 'slug', $toSlug);
    }
    public function getProjects($n)
    {
        return Project::orderByDesc('created_at')->paginate($n);
    }
    public function getProjectCategories()
    {
        return ProjectCategory::orderByDesc('created_at')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName.'index', [
            'page'=>'Project',
            'n'=>1,
            'activePage'=>'Project_list',
            'Projects'=>$this->getProjects(10),
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
            'page'=>'Project',
            'activePage'=>'project_create',
            'ProjectCategories'=>$this->getProjectCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //
        $this->Project->fill($request->all());
        $this->Project->Project_category_id = $request->Project_category;
        $this->Project->created_by = Auth::user()->id;
        if(!$request->file('thumbnail') == ''){
            $thumbnail = $this->imageSupport->saveAnyImg($request, 'Project', 'thumbnail', $this->thumbWidth, $this->thumbHeight);
            $this->Project->thumbnail = $thumbnail;
        }
        if($this->Project->save()){
            if(!$request->file('images')==''){
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'Project', $this->imageWidth, $this->imageHeight);
                    // DB::table('thumbnails')->insert([
                    //     ['Project_id'=>$this->Project->id, 'image' => $image, 'created_at'=>\Carbon\Carbon::now()],
                    // ]);
                }
            }
            Toastr::success('Successfully Project Created', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('Project.index')->with('success', 'Successfully Project Created');
        }else{
            return back()->withInput()->with('error', 'Project Could not be created please try again later');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Project\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $Project)
    {
        //
         return view($this->folderName.'show', [
            'page'=>'Project',
            'activePage'=>'Project_list',
            'Project'=>$Project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Project\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $Project)
    {
        //
        return view($this->folderName.'form', [
            'page'=>'Project',
            'activePage'=>'Project_create',
            'ProjectCategories'=>$this->getProjectCategories(),
            'Project'=>$Project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Project\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, Project $Project)
    {
        //
        $this->Project= $Project;
        $this->Project->fill($request->all());
        $this->Project->Project_category_id = $request->Project_category;
        $this->Project->created_by = Auth::user()->id;
        $this->Project->slug = $this->getSlug($this->Project->name);
        // $this->Project->slug = $this->getSlug($this->Project->name);
        if(!$request->file('thumbnail') == ''){
            $this->imageSupport->deleteImg('Project', $Project->thumbnail);
            $thumbnail = $this->imageSupport->saveAnyImg($request, 'Project', 'thumbnail', $this->thumbWidth, $this->thumbHeight);
            $this->Project->thumbnail = $thumbnail;
        }
        if($this->Project->save()){
            if(!$request->file('images')==''){
                foreach($this->Project->thumbnails as $img){
                    $this->imageSupport->deleteImg('Project', $img->image);
                    $this->Project->thumbnails()->delete();
                }
                $this->Project->thumbnails()->delete();
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'Project', $this->imageWidth, $this->imageHeight);
                    // DB::table('thumbnails')->insert([
                    //     ['Project_id'=>$this->Project->id, 'image' => $image, 'updated_at'=>\Carbon\Carbon::now()],
                    // ]);
                }
            }
            Toastr::success('Successfully Project Updates', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('Project.index')->with('success', 'Successfully Project Created');
        }else{
            return back()->withInput()->with('error', 'Project Could not be created please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Project\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $Project)
    {
        //
        $Project->images->delete();
        if($Project->delete()){
            Toastr::success('Successfully 1 Project Deleted', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('Project.index')->with('success', 'Successfully 1 Project Deleted');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
