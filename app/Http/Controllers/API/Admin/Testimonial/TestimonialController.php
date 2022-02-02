<?php
namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
// use App\Models\Admin\Testimonial\Testimonial;
use App\Support\ImageSupport;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Route;
use App\Models\Admin\Banner\Banner;
// use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Requests\Request;
use Auth;


class TestimonialController extends Controller
{
    protected $folderName = 'admin.testimonial.';
    protected $imageWidth = 250;
    protected $imageHeight = 250;
    protected $imageSupprot;
    protected $testimonial;
    function __construct(ImageSupport $imageSupprot, Testimonial $testimonial)
    {
        $this->middleware('auth');
        $this->testimonial = $testimonial;
        $this->imageSupprot = $imageSupprot;
    }
    public function getTestimonials($n)
    {
        return Testimonial::orderByDesc('created_at')->paginate($n);
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
            'testimonials' => $this->getTestimonials(10),
            'activePage' => 'testimonial_list',
            'page' => 'testimonial',
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
        return view($this->folderName . 'form', [
            'activePage' => 'testimonial_create',
            'page' => 'testimonial',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        //
        $this->testimonial->fill($request->all());
        if (!$request->file('image') == '') {
            $this->testimonial->image = $this->imageSupprot->saveAnyImg($request, 'testimonial', 'image', $imageWidth, $imageHeight);
        }
        if (!$request->has('status')) {
            $this->testimonial->status = false;
        }
        if ($this->testimonial->save()) {
            Toastr::success('Successfully 1 Testimonial has added', 'Success !!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('testimonial.index')->with('success', 'Successfully 1 Testimonial has added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Testimonial\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Testimonial\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
        return view($this->folderName . 'form', [
            'activePage' => 'testimonial_create',
            'page' => 'testimonial',
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Testimonial\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        //
        $this->testimonial = $testimonial;
        $this->testimonial->fill($request->all());
        if (!$request->file('image') == '') {
            $this->imageSupprot->deleteImg('testimonial', $this->testimonial->image);
            $this->testimonial->image = $this->imageSupprot->saveAnyImg($request, 'testimonial', 'image', $imageWidth, $imageHeight);
        }
        if (!$request->has('status')) {
            $this->testimonial->status = false;
        }
        if ($testimonial->save()) {
            Toastr::success('Successfully 1 Testimonial has updated', 'Success !!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('testimonial.index')->with('success', 'Successfully 1 Testimonial has updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Testimonial\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        if ($testimonial->delete()) {
            Toastr::success('Successfully 1 Testimonial has deleted', 'Success !!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('testimonial.index')->with('success', 'Successfully 1 Testimonial has deleted');
        }
    }
}
