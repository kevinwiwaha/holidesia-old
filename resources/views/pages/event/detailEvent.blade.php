@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Detail</h1>

    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <th class="text-right" scope="row"><b>Nama Event</b></th>
                        <td>{{$event->nama_events}}</td>

                    </tr>
                    <tr>
                        <th class="text-right" scope="row"><b>Lokasi</b></th>
                        <td>{{$event->lokasi}}</td>

                    </tr>
                    <tr>
                        <th class="text-right" scope="row"><b>deskripsi</b></th>
                        <td>{{$event->deskripsi}}</td>

                    </tr>
                    <tr>
                        <th class="text-right" scope="row"><b>Tanggal Mulai</b></th>
                        <td>{{$event->tanggal_mulai}}</td>

                    </tr>
                    <tr>
                        <th class="text-right" scope="row"><b>Tanggal selesai</b></th>
                        <td>{{$event->tanggal_selesai}}</td>

                    </tr>
                    <tr>
                        <th class="text-right" scope="row"><b>Penulis</b></th>
                        <td style="text-transform: capitalize;">
                            <button style="text-transform: capitalize;" type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                                {{$event->user->name}}
                            </button> | {{$event->created_at->diffForHumans()}}
                        </td>

                    </tr>
                    <tr>
                        <th class="text-right" scope="row"><b>Dokumentasi</b></th>
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

    <!-- Modal -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="modal fade" style="margin-top:30vh" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="text-transform: capitalize;"><b>Name : </b>{{$event->user->name}}</p>
                        <p style="text-transform: capitalize;"><b>username : </b>{{$event->user->username}}</p>
                        <p style="text-transform: capitalize;"><b>id : </b>{{$event->user->id}}</p>
                        <p style="text-transform: capitalize;"><b>email : </b>{{$event->user->email}}</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection