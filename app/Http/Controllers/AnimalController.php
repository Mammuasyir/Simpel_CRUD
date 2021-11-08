<?php

namespace App\Http\Controllers;

use App\Models\animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Animal Home";
        $animal = animal::all();
        $i = 1;
        return view('index', compact('title', 'i', 'animal'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create";
        return view('create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        animal::create([
            'nama_hewan' => $request->nama_hewan,
            'lokasi' => $request->lokasi,
            'image' => $request->file('image')->store('image-animal'),
        ]);
        return redirect()->route('animal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit";
        $anim= animal::findOrFail($id);
        return view('edit', compact('title', 'anim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $animal = animal::findOrfail($id);
        Storage::delete($animal->image);
        $animal->update([

            'nama_hewan' => $request->nama_hewan,
            'lokasi' => $request->lokasi,
            'image' => $request->file('image')->store('image-animal'),
        ]);

        return redirect()->route('animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = animal::findOrFail($id);
        Storage::delete($animal->image);
        $animal->delete();
        return redirect()->route('animal.index');
    }
}
