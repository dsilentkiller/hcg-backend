<?php

namespace App\Http\Controllers\API\Admin\Service;



use Illuminate\Http\Request;
use App\Support\ImageSupport;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Service\Service; //model path diretory
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Admin\service\serviceCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;



class ServiceController extends Controller
{
    protected $folderName ='admin.service.';
    protected $imageSupport;
    protected $service;
    protected $imageWidth = 500;
    protected $imageHeight = 600;
    protected $thumbnailWidth = 500;
    protected $thumbnailHeight = 600;

    function  __construct(ImageSupport $imageSupport, service $service){

        $this ->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->service =$service;
    }

    public function getservices($n){
        return service::orderByDesc('created_at')->paginate($n);
    }
    // public function getSlug($toSlug)
    // {

    //     return SlugService::createSlug(service::class , 'slug', $toSlug);
    // }



    public function index()
    {
        //
        return view($this->folderName.'index',[
            'services' =>$this->getservices(10),
            'activePage' =>'service_list',
            'page' =>'service',
            'n' =>1,
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
        return view($this->folderName.'form',[
            'activePage' =>'service_list',
            'page' =>'service',
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

        // $input = $request->all();
        // Auth::user()->save->service($input);
        // $image = $this->imageSupport->saveAnyImg($request, 'service','image', $this->imageWidth,$this->imageHeight);
        // $this->service ->image = $image;
        // $this->service ->thumbnail = $thumbnail;
        $this-> service->fill($request->all());
        $this->service->title_tag = $request->title_tag;
        $this->service->created_by = Auth::user()->id;

        // $this->service->slug =$this->getSlug($this->service->title);

        if(!$request->file('thumbnail') == ''){
            $this->imageSupport->deleteImg('service', $this->service->thumbnail);
            $thumbnail = $this->imageSupport->saveAnyImg($request, 'service', 'thumbnail', $this->thumbnailWidth, $this->thumbnailHeight);
            $this->service->thumbnail = $thumbnail;
        }
        if($this->service->save()){
            if(!$request->file('images')==''){
                foreach($this->service->thumbnails as $img){
                    $this->imageSupport->deleteImg('service', $img->image);
                    $this->service->thumbnails()->delete();
                }
                $this->service->thumbnails()->delete();
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'service', $this->imageWidth, $this->imageHeight);
                    // DB::table('thumbnails')->insert([
                    //     ['service_id'=>$this->service->id, 'image' => $image, 'updated_at'=>\Carbon\Carbon::now()],
                    // ]);
                }
            }
        if ($this->service->save()){
            Toastr::Success('Successfully 1 service has been added','success',['positionClass'=>'toast-bottom-right']);
            return redirect()->route('service.index')->with('success','Successfully i service has been Added');
        }else{
            return back()->withInput()->with('error','Couldnot be saved,please try again later');

        }

        }}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
        // return $service;
        return view($this->folderName.'show',[
            'activePage' =>'service_list',
            'service'=>$service,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'service_create',
            // 'services'=>$this->getservices,
            'n'=>1,
            'service' =>$service,
            'page' => 'service',

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {
        //
        $this->service =$service;
        $this -> service ->fill($request->all());
        $this->service->created_by = Auth::User()->id;
        $this->service->title_tag = $request->title_tag;
        // if(!$request->file('image')==''){
        //     $this->imageSupport->deleteImg('service', $this->service->image);
        // $this->service->slug =$this->getSlug($this->service->title);
        //     $this->service->image = $this->imageSupport->saveAnyImg($request, 'service','image',$this->imageHeight, $this->imageWidth);

        // }

        if(!$request->file('thumbnail') == ''){
            $this->imageSupport->deleteImg('service', $this->service->thumbnail);
            $thumbnail = $this->imageSupport->saveAnyImg($request, 'service', 'thumbnail', $this->thumbnailWidth, $this->thumbnailHeight);
            $this->service->thumbnail = $thumbnail;
        }
        if($this->service->save()){
            if(!$request->file('images')==''){
                foreach($this->service->thumbnails as $img){
                    $this->imageSupport->deleteImg('service', $img->image);
                    $this->service->thumbnails()->delete();
                }
                $this->service->thumbnails()->delete();
                foreach ($request->file('images') as $image) {
                    $image = $this->imageSupport->saveGallery($image, 'service', $this->imageWidth, $this->imageHeight);
                    // DB::table('thumbnails')->insert([
                    //     ['service_id'=>$this->service->id, 'image' => $image, 'updated_at'=>\Carbon\Carbon::now()],
                    // ]);
                }
            }

        }



        if ($this->service->save()){
            Toastr::Success('Successfully 1 service has been added','success',['positionClass'=>'toast-bottom-right']);
            return redirect()->route('service.index')->with('success','Successfully i service has been Added');
        }else{
            return back()->withInput()->with('error','Couldnot be saved,please try again later');

        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
        if($service->delete()){
            return redirect()->route('service.index')->with('success', 'Successfully 1 service has deleted');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
