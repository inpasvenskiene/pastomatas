<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts' => Post::orderBy('code')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'town' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:100',
            'capacity' => 'required|max:10',
            'code' => 'required|max:20'
        ];

    	$customMessages = [
    		'town.required' => 'Please, insert your town.',
    		'capacity.required' => 'Please, insert capacity.',
            'code.required' => 'Please, write code',
    	];

    	$this->validate($request, $rules, $customMessages);

        $post = new Post();
           $post->fill($request->all());
           $post->save();
           return redirect()->route('posts.index')->with('message', 'Added successful!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'town' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:100',
            'capacity' => 'required',
            'code' => 'required|max:20'
        ]);

        $post->fill($request->all());
        $post->save();
        return redirect()->route('posts.index')->with('message', 'Changed successful!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Deleted successful!');
    }
}
