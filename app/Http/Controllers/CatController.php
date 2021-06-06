<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatRequest;
use App\Models\Breed;
use App\Models\Cat;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::paginate(15);
        return response()->view('cats.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::all();
        return response()->view('cats.create', compact('breeds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCatRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCatRequest $request)
    {
        $cat = new Cat($request->validated());
        $breed = Breed::where('name', $request->validated()['breed'])->first();
        if(!$breed){
            $breed = new Breed();
            $breed->name = $request->validated()['breed'];
            $breed->save();
        }
        $cat->breed_id = $breed->id;

        $cat->save();

        foreach ($request->validated()['tags'] as $selected_tag) {
            $tag = Tag::where('tag', $selected_tag)->firstOrFail();
            $cat->tags()->attach($tag->id);
        }

        if ($request->file('images')) {
            foreach($request->file('images') as $uploadedFile) {
                $image = new Image();
                $image->path = $uploadedFile->store('images', 'public');
                //dd(Storage::disk('public')->url($path));
                $image->cat_id = $cat->id;
                $image->save();
            }
        }

        return response()->redirectToRoute('cats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        return response()->view('cats.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        $breeds = Breed::all();
        return response()->view('cats.edit', compact('cat', 'breeds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateCatRequest $request
     * @param \App\Models\Cat $cat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateCatRequest $request, Cat $cat)
    {
        $cat->fill($request->validated());
        $cat->save();
        return response()->redirectToRoute('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
        return response()->redirectTo(url()->previous());
    }
}
