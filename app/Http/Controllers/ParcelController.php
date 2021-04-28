<?php

namespace App\Http\Controllers;

use App\Models\parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if(isset($request->post_id) && $request->post_id !== 0)
            $parcels = \App\Models\parcel::where('post_id', $request->post_id)->orderBy('weight', 'asc')->get();
        else
            $parcels = \App\Models\parcel::orderBy('weight', 'asc')->get();
            $posts =\App\Models\post::orderBy('town', 'asc')->get();
        return view('parcels.index', ['parcels' => $parcels, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = \App\Models\Post::orderBy('town')->get();
        return view('parcels.create', ['posts' => $posts]);
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
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:100',
            'surname' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:150',
            'bet' => 'required|gt:0',
            'horse_id' => 'required'
        ];

    	$customMessages = [
    		'name.required' => 'Please, insert your name.',
    		'surname.required' => 'Please, insert your surname.',
        	'bet.required'  => 'You must choose bet amount!',
            'horse_id.required' => 'Please, select horse',
    	];

    	$this->validate($request, $rules, $customMessages);

        $parcel = new parcel();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $parcel->fill($request->all());
        $parcel->save();
        return redirect()->route('parcels.index')->with('message', 'Added successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(parcel $parcel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parcel $parcel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(parcel $parcel)
    {
        //
    }
}
