@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Tambah Acara</h1>
    <form action="{{url('admin/tambah-acara')}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama_events">Nama Acara</label>
            <input type="text" name="nama_events" class="form-control" value="{{ old('nama_events') }}" id="nama_events" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" id="lokasi" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="tipe">tipe</label>
            <input type="text" name="tipe" class="form-control" value="{{ old('tipe') }}" id="tipe" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="deskripsi">deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ old('deskripsi') }}" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="tanggal_mulai">tanggal_mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" id="tanggal_mulai" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="tanggal_selesai">tanggal_selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" id="tanggal_selesai" placeholder="name@example.com">
        </div>
        <button class="btn btn-md btn-success" type="submit">Tambah</button>
    </form>
</div>

@endsection