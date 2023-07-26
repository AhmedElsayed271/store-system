<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        // dd(Gate::allows('categories.view'));
        // if (Gate::denies('categories.view')) {
        //     abort(403);
        // }

        // Gate::authorize('categories.view');

        // $categories = Category::withCount(['products' => function ($query) {
        //     $query->where('status', '=', 'active');
        // },])->with(['products','parent','children'])->dd();
        // return $categories;
        $query = Category::query();
        $name = $request->query('name');
        $status = $request->query('status');
        if ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status) {
            $query->whereStatus($status);
        }

        $categories = $query->leftJoin('categories as parents', 'categories.id', '=', 'parents.parent_id')->select(['categories.*', 'parents.name as parent_name'])->paginate(3);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function trash()
    {
        // return "test";
        $categories = Category::onlyTrashed()->Paginate();
        return view('dashboard.categories.trash', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "test";
        $categories = Category::all();
        $category = new Category();

        return view('dashboard.categories.create', compact('categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $request->request->remove('_token');

        $data = $request->toArray();

        if ($request->hasfile('photo')) {
            $path = $request->file('photo')->store('categories', 'upload');

            $data['photo'] = $path;
        }

        $data['slug'] = Str::slug($request->name);

        $request->merge([]);

        Category::create($data);

        return Redirect::route('categories.index')->with(['success' => "Category Created!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {   
        
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::findOrFail($id);

        $categories = Category::where('id', "<>", $id)->where(function ($query) use ($id) {
            $query->whereNull("parent_id")->orWhere('parent_id', "<>", $id);
        })
            ->get();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {

        $category = Category::findOrFail($id);

        $oldImage = $category->photo;

        $request->request->remove('_token');

        $data = $request->toArray();

        $data['photo'] = "";

        if ($request->hasfile('photo')) {
            $path = $request->file('photo')->store('categories', 'upload');

            $data['photo'] = $path;
        }

        $data['slug'] = Str::slug($request->name);

        $category->update($data);

        if ($oldImage != $data['photo']) {
            Storage::disk('upload')->delete($oldImage);
        }

        return Redirect::route('categories.index')->with(['success' => "Category updated!"]);
    }
    public function restore(string $id)
    {
        $category = Category::onlyTrashed()->find($id)->restore();
        return Redirect::route('categories.trash')->with(['success' => "Category Restred!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        $category->delete();
        return Redirect::route('categories.index')->with(['success' => "Category Deleted!"]);
    }
    public function forceDelete($id)
    {   
        $category = Category::onlyTrashed()->find($id);

        $photo = $category->photo;
        
        $category->forceDelete();
        
        Storage::disk('upload')->delete($photo);
        return Redirect::route('categories.trash')->with(['success' => "Category Deleted forever!"]);
    }
}
