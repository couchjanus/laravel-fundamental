<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(10);

        $title = "Tag List";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Tag List'=>'#'];

        return view('admin.tags.index')
           ->with('tags', $tags)->with('breadcrumbs', $breadcrumbs)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Tag";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Tag List'=>'/admin/tags', 'New Tag'=>'#'];

        return view('admin.tags.create', ['title' => $title, 'breadcrumbs'=>$breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Проверка запроса...
        // Передаем экземпляр с данными HTTP запроса и правила валидации:
        $this->validate(
            $request, [
                'name' => 'required|unique:tags|max:25',
            ]
        );

        // name прошло проверку, сохранение в БД...

        // $name = $request->input('name');
        // $description = $request->input('description', 'Default Value');
        
        $tag = new Tag;
        // $tag->name = $name;
        
        $tag->name = $request->name;
        
        if ($request->has('description') && $request->description != '') {
            $tag->description = $request->description;
        } else {
            $tag->description = 'Default Value';
        }
       
        $tag->save();

        return redirect(route('tags.index'))->with('success', 'An tag has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $title = "Show Tag";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Tag List'=>'/admin/tags', 'Show Tag'=>'#'];
        return view('admin.tags.show')->withTag($tag)->withTitle($title)->withBreadcrumbs($breadcrumbs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        $title = "Edit Tag";
  
        $breadcrumbs = ['Dashboard'=>'/admin', 'Tag List'=>'/admin/categories', 'Edit Tag'=>'#'];
  
        return view('admin.tags.edit')->withTag($tag)->withTitle($title)->withBreadcrumbs($breadcrumbs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        

        // Optional Fields

// By default, Laravel includes the TrimStrings and ConvertEmptyStringsToNull middleware in your application's global middleware stack. These middleware are listed in the stack by the App\Http\Kernel class. Because of this, you will often need to mark your "optional" request fields as nullable if you do not want the validator to consider null values as invalid. For example:

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ]);

// In this example, we are specifying that the publish_at field may be either null or a valid date representation. If the nullable modifier is not added to the rule definition, the validator would consider null an invalid date.
    }
}
