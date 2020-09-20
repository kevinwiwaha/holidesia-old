<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Gallery::all();
        $user = Auth::user();
        return view('pages.galeri.indexGaleri', ['user' => $user, 'event' => $event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {




        $user = Auth::user();
        return view('pages.galeri.createGaleri', ['user' => $user, 'event' => Event::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('galeri', 'public');
        $data['user_id'] = Auth::user()->id;
        $event = Event::findOrFail($request->event_id);
        $event->gallery()->create($data);
        return redirect('/galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        dd($gallery->event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $event = $gallery;
        return view('pages.galeri.updateGaleri', ['user' => Auth::user(), 'event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

        $data = $request->all();
        $data['image'] = $request->file('image')->store('galeri', 'public');

        Gallery::findOrFail($gallery->id)->update($data);

        return redirect('/galeri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Gallery::where('image', $request->image)->delete();
        return redirect('/galeri');
    }
}
