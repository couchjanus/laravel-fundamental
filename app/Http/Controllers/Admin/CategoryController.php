<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        $title = "Category List";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Category List'=>'/admin/categories'];

        return view('admin.categories.index')
           ->with('categories', $categories)->with('breadcrumbs', $breadcrumbs)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Category";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Category List'=>'/admin/categories', 'New Category'=>'#'];

        return view('admin.categories.create', ['title' => $title, 'breadcrumbs'=>$breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        // $category = Category::create($request->all());

        $category = new Category();
        $category->name = $request->name;

        $category->active = $request->has('active');
        $category->description = $request->description;

        $category->save();

        return redirect(route('categories.index'))->with('success', 'An category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        $title = "Show Category";

        $breadcrumbs = ['Dashboard'=>'/admin', 'Category List'=>'/admin/categories', 'Show Category'=>'#'];

        return view('admin.categories.show')->withCategory($category)->withTitle($title)->withBreadcrumbs($breadcrumbs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        $title = "Edit Category";

        $breadcrumbs = ['Dashboard'=>'/admin', 'Category List'=>'/admin/categories', 'Edit Category'=>'#'];

        return view('admin.categories.edit')->withCategory($category)->withTitle($title)->withBreadcrumbs($breadcrumbs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function update(CategoryFormRequest $request, $id)
    // {
    //
    //
    //     $category = Category::find($id);
    //
    //     // $category->name = $request->input('name');
    //
    //     // $category->description = $request->description;
    //
    //     $category->name = $request->name;
    //
    //     $category->active = $request->has('active');
    // $category->active = $request->active === 'on' ? 1 : 0;
    //     $category->description = $request->has('description');
    //
    //     $category->save();
    //     return redirect(route('categories.index'))->with('message', 'An category has been updated');
    // }


    public function update(CategoryFormRequest $request, $id)
    {
        Category::updateData($id);
        return redirect(route('categories.index'))->with('success', 'An category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect(route('categories.index'))->with('message', 'An category has been deleted');
    }

    public function getOnlyTrashed()
    {
        // Если вы хотите получить только мягко удалённые модели, вызовите метод onlyTrashed():

        $categories = Category::onlyTrashed()
                ->paginate(10);

        $title = "Trashed Category List";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Trashed Category List'=>'#'];
        return view('admin.categories.trashed')
        ->with('categories', $categories)->with('breadcrumbs',$breadcrumbs)->withTitle($title);
    }

    public function restore($id)
    {

        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect(route('categories.index'))->with('message', 'An category has been restored');
    }

    // clear

    public function clear($id)
    {
        // Принудительное удаление одного экземпляра модели...
        $category = Category::withTrashed()->where('id', '=', $id)->first();
        $category->forceDelete();
        return redirect(route('categories.index'))->with('message', 'An category has been deleted');
    }
}
