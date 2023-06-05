<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
            public function __construct()
        {
            
            $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        }


    public function index()
    {
        return view('test.index',[
            'posts' => Post::get()
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pagina.create',[
            'post' => new Post()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {   
        $request->validated();

        Post::create([
            'title'=> $request->title,
            'is_published'=> $request->is_published === 'on',
            'body'=> $request->body,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view ('pagina.show',[
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('pagina.edit',[
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {


        $request->validated();

        Post::where('id', $id)->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'is_published'=> $request->is_published === 'on',
        ]);
        return redirect()->route('pagina.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy ('id', $id);

        return redirect()->route('pagina.index')->with('message', 'Post deleted successfully');
    }
}
