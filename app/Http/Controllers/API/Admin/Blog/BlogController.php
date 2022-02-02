<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Admin\Blog\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support\ImageSupport;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;
use Kamaln7\Toastr\Facades\Toastr;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folderName = 'admin.blog.';
    protected $imageSupport;
    protected $imageWidth = 870;
    protected $imageHeight = 550;

    function __construct(ImageSupport $imageSupport, Blog $blog)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->blog = $blog;
    }
    public function getSlug($toSlug)
    {

        return SlugService::createSlug(Blog::class , 'slug', $toSlug);
    }
    public function getBlogs($n)
    {
        return Blog::orderByDesc('created_at')->paginate($n);


    }
    public function index()
    {
        //
        return view($this->folderName . 'index', [

            'blogs' => $this->getBlogs(10),
            'activePage' => 'blog_list',
            'page' => 'blog',
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

        return view($this->folderName . 'form', [
            'activePage' => 'blog_create',
            'page' => 'blog',
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

        $this->blog->fill($request->all());
        $this->blog->created_by = Auth::user()->id;
        $this->blog->slug = $this->getSlug($this->blog->title);
        $this->blog->image = $this->imageSupport->saveAnyImg($request, 'blog', 'image', $this->imageWidth, $this->imageHeight);
        if ($this->blog->save()) {
            Toastr::success('Successfully 1 blog has created', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('blog.index')->with('success', 'Successfully 1 blog has created');
        }
        else {
            return back()->withInput()->with('error', 'Could not be created please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view($this->folderName . 'show', [
            'blog' => $blog,
            'activePage' => 'blog_list',
            'page' => 'blog',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view($this->folderName . 'form', [
            'blog' => $blog,
            'activePage' => 'blog_ceeate',
            'page' => 'blog',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $this->blog = $blog;
        $this->blog->fill($request->all());
        $this->blog->created_by = Auth::user()->id;
        $this->blog->slug = $this->getSlug($this->blog->title);
        if (!$request->file('image') == '') {
            $this->imageSupport->deleteImg('blog', $this->blog->image);
            $this->blog->image = $this->imageSupport->saveAnyImg($request, 'blog', 'image', $this->imageWidth, $this->imageHeight);
        }
        if ($this->blog->save()) {
            Toastr::success('Successfully 1 blog has updated', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('blog.index')->with('success', 'Successfully 1 blog has updated');
        }
        else {
            return back()->withInput()->with('error', 'Could not be updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        if ($blog->delete()) {
            Toastr::success('Successfully 1 blog has deleted', 'Success !!!', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('blog.index')->with('success', 'Successfully 1 blog has deleted');
        }
    }


}
