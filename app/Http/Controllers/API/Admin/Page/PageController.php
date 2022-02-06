<?php

namespace App\Http\Controllers\Admin\Page;


use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\Page\Page;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PageController extends Controller
{
    protected $imageSupport;
    protected $page;
    protected $imageWidth = 502;
    protected $imageHeight = 683;
    protected $folderName = 'admin.page.';
    function __construct(ImageSupport $imageSupport, Page $page)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->page = $page;
    }
    public function getPages($n)
    {
        return Page::orderByDesc('created_at')->paginate($n);
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
            'activePage' => 'page_list',
            'page' => 'page',
            'n' => 1,
            'pages' => $this->getPages(10),
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
            'page' => 'page',
            'activePage' => 'page_create',
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
        $this->page->fill($request->all());
        $this->page->created_by = Auth::user()->id;
        if (!$request->file('image') == '') {
            $image = $this->imageSupport->saveAnyImg($request, 'page', 'image', $this->imageWidth, $this->imageHeight);
            $this->page->image = $image;
        }
        if ($this->page->save()) {
            Toastr::success('Successfully 1 page has added', 'Success !!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('page.index')->with('success', 'Successfully 1 page has added');
        }
        else {
            return back()->with('error', 'Could not be added please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
        return view($this->folderName . 'form', [
            'page' => 'page',
            'activePage' => 'page_create',
            'page1' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
        $this->page = $page;
        $this->page->fill($request->all());
        $this->page->created_by = Auth::user()->id;
        if (!$request->file('image') == '') {
            $this->imageSupport->deleteImg('page', $this->page->image);
            $image = $this->imageSupport->saveAnyImg($request, 'page', 'image', $this->imageWidth, $this->imageHeight);
            $this->page->image = $image;
        }
        if ($this->page->save()) {
            Toastr::success('Successfully 1 page has Updated', 'Success !!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('page.index')->with('success', 'Successfully 1 page has Updated');
        }
        else {
            return back()->with('error', 'Could not be updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Page\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
        if ($page->delete()) {
            Toastr::success('Successfully 1 page has Deleted', 'Success !!!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('page.index')->with('success', 'Successfully 1 page has Deleted');
        }
        else {
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
