@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Tambah Acara</h1>
    <form action="{{url('admin/tambah-acara')}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama_events">Nama Acara</label>
            <input type="text" name="nama_events" class="form-control" id="nama_events" value="{{$event->nama_events}}" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="tipe">tipe</label>
            <input type="text" name="tipe" class="form-control" id="tipe" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="de">de</label>
            <input type="text" name="de" class="form-control" id="de" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="tanggal_mulai">tanggal_mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="tanggal_selesai">tanggal_selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai" placeholder="name@example.com">
        </div>
        <button class="btn btn-md btn-success" type="submit">Tambah</button>
    </form>
</div>

@endsection