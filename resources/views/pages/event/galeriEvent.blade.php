@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Tambah Gambar</h1>
    <form action="{{url('admin/tambah-galeri')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="event">Event</label>
            <input type="hidden" name="id" value="{{$event->id}}">
            <input type="hidden" name="slug" value="{{$event->slug}}">
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control" value="{{ old('image') }}" id="image" placeholder="name@example.com">
        </div>

        <button class="btn btn-md btn-success" type="submit">Tambah</button>
    </form>
</div>

@endsection