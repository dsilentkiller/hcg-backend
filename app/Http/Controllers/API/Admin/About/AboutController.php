<?php
namespace App\Http\Controllers\API\Admin\About;




use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\About\About;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    protected $folderName ='admin.about.';
    protected $imageSupport;
    protected $imageHeight = 350;
    protected $imageWidth = 500;
    protected $about;

    function __construct(ImageSupport $imageSupport, About $about)
    {
            $this->middleware('auth');
            $this->about = $about;
            $this->imageSupport = $imageSupport;
    }
    public function getabouts($n){
        return About::orderByDesc('created_at')->paginate($n);
    }

    public function index()
    {
        return view($this->folderName.'form',[
            'abouts' => $this->getAbouts(10),
            'activePage' => 'About_list',
            'page' => 'about',
            'n' => 1,
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
            'activePage' =>'about_create',
            'page' =>'about',
            // $about =About::all(),
            // return $about;

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
        $this->about->fill($request->all());
        $image = $this->imageSupport->saveAnyImg($request,'about','image', $this->imageWidth, $this->imageHeight);
        $this->about->image = $image;
        $this->about->created_by = Auth::user()->id;
        if($this->about->save()){
            Toastr::success('Successfully 1 about has added','Success!!!',['positionClass'=>'toast-bottom-right']);
            return redirect()->route('about.index')->with('success', 'Successfully 1 about has added.');
        }else{
            return back()->withInput()->with('error','Couldnot be about created, please try again later!!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return view($this->folderName.'show',[
            'activePage' =>'about',
            'about'=>$about,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view($this->folderName.'form',[
            'activePage' => 'about',
            'Abouts' => $this->getAbouts(10),
            'n'=>1,
            'about' => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $this->about = $about;
        $this->about->fill($request->all());
        $this->about->created_by = Auth::User()->id;

        if(!$request->file('image')== ''){
            $this->imageSupport->deleteImg('about',$this->about->image);
            $image = $this->imageSupport->saveAnyImg($request, 'about', 'image',$this->imageWidth, $this->imageHeight);
            $this->about->image = $image;
        }

        if($this->about->save()){
            Toastr::success('Successfully 1 about has added','Success!!!', ['positionClass' => 'toastr-bottom-right']);
            return redirect()->route('about.index')->with('success','Successfully 1 about has added.');
        }else{
            return back()->withInput()->with('error','Couldnot be saved , please try again later!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if($about->delete()){
            Toastr::success('Successfully 1 about has deleted!', 'Success!!!',['positionClass'=>'toast-bottom-right']);
            return redirect()->route('about.index')->with('success','Successfully 1 about has deleted!');

        }else{
            return back()->with('error','Couldnot be deleted, please try again later');
        }
    }
}
