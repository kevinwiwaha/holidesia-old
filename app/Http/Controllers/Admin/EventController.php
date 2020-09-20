<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->format('yy-m-d');
        $event = Event::with([
            'user'
        ])->get();
        $user = Auth::user();

        return view('pages.event.event', ['user' => $user, 'event' => $event, 'date' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('pages.event.createEvent', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_events' => 'required',

            'lokasi' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->nama_events);


        Auth::user()->events()->create($input);

        return redirect('admin/daftar-acara');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user = Auth::user();
        $gallery = $event->gallery;

        return view('pages.event.detailEvent', ['user' => $user, 'event' => $event, 'gallery' => $gallery]);
    }
    public function galeri(Request $request)
    {

        $event = (int)$request->id;
        return view('pages.event.galeriEvent', ['user' => Auth::user(), 'event' => $request]);
    }
    public function gambar(Request $request)
    {

        $url = '/admin/' . $request->slug;
        $data = $request->only('image', 'user_id', 'name');
        $data['image'] = $request->file('image')->store('galeri', 'public');
        $data['user_id'] = Auth::user()->id;
        $event = Event::findOrFail($request->id);
        $event->gallery()->create($data);
        return redirect($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        return view('pages.event.editEvent', ['user' => Auth::user(), 'event' => $event]);
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
        Event::where('id', $id)->update([
            'nama_events' => $request->nama_events,
            'slug' => Str::slug($request->nama_events),
            'lokasi' => $request->lokasi,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);
        return redirect('/admin/daftar-acara');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Event::findOrFail($request->id)->delete();
        return redirect()->route('event');
    }
    public function hapus(Request $request)
    {
        $url = 'admin/' . $request->slug;
        Gallery::where('image', $request->image)->delete();
        return redirect()->route('detail-event', $request->slug);
    }
}
