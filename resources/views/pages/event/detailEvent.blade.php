@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Detail</h1>

    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <th scope="row"><b>Nama Event</b></th>
                        <td>{{$event->nama_events}}</td>

                    </tr>
                    <tr>
                        <th scope="row"><b>Lokasi</b></th>
                        <td>{{$event->lokasi}}</td>

                    </tr>
                    <tr>
                        <th scope="row"><b>deskripsi</b></th>
                        <td>{{$event->deskripsi}}</td>

                    </tr>
                    <tr>
                        <th scope="row"><b>Tanggal Mulai</b></th>
                        <td>{{$event->tanggal_mulai}}</td>

                    </tr>
                    <tr>
                        <th scope="row"><b>Tanggal selesai</b></th>
                        <td>{{$event->tanggal_selesai}}</td>

                    </tr>
                    <tr>
                        <th scope="row"><b>Dokumentasi</b></th>
                        <td>
                            <div class="d-flex">
                                @foreach($gallery as $g)
                                <img src="{{Storage::url($g->image)}}" style="width:300px" class="img-fluid align-self-center" alt="">

                                @endforeach
                            </div>
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection