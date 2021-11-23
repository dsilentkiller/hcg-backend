<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Admin\Category\Category;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Support\ImageSupport;
// use App\Support\Slug;
use Auth;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    protected $folderName = 'admin.category.';
    protected $category;
    protected $ImageSupport;
    protected $imageHeight = 720;
    protected $imageWidth = 1200;
    function __construct(ImageSupport $ImageSupport, Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
        $this->ImageSupport = $ImageSupport;
    }

    public function getCategories($n)
    {
        return Category::orderByDesc('created_at')->paginate($n);
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
            'categories' => $this->getCategories(10),
            'n' => 1,
            'page' => 'category',
            'activePage' => 'category_list',
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
            'page' => 'category',
            'activePage' => 'category_create',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $this->category->fill($request->all());
        if (!$request->file('image') == '') {
            $image = $this->ImageSupport->saveAnyImg($request, 'destination_category', 'image', $this->imageWidth, $this->imageHeight);
            $this->category->image = $image;
        }
        $this->category->created_by = Auth::user()->id;
        // $this->category->slug = Slug::getSlug($this->category->name);
        if ($this->category->save()) {
            Toastr::success('Successfully 1 destination category has addded', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('category.index')->with('success', 'Successfully 1 destination category has addded');
        }
        else {
            return back()->withInput()->with('error', 'Could not be destination category added please try again later');
        }
    }

    public function show(Category $category)
    {
        return view($this->folderName . 'show', [
            'category' => $category,
            'page' => 'category',
            'activePage' => 'category_list',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view($this->folderName . 'form', [
            'category' => $category,
            'page' => 'category',
            'activePage' => 'category_create',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        //
        $this->category = $category;
        $this->category->fill($request->all());
        if (!$request->file('image') == '') {
            $this->ImageSupport->deleteImg('destination_category', $this->category->image);
            $image = $this->ImageSupport->saveAnyImg($request, 'destination_category', 'image', $this->imageWidth, $this->imageHeight);
            $this->category->image = $image;
        }
        $this->category->created_by = Auth::user()->id;
        $this->category->slug = Slug::getSlug($this->category->name);
        if ($this->category->save()) {
            Toastr::success('Successfully 1 destination category has updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('category.index')->with('success', 'Successfully 1 destination category has updated');
        }
        else {
            return back()->withInput()->with('error', 'Could not be destination category updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if ($category->delete()) {
            Toastr::success('Successfully 1 destination category has deleted you can restore again from trash list', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('category.index')->with('success', 'Successfully 1 destination category has deleted you can restore again from trash list');
        }
        else {
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
