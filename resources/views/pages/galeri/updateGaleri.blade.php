@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Tambah Acara</h1>
    <form action="{{url('galeri/update-galeri',$event->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{$event->name}}" id="name" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control" value="{{$event->image}}" id="image" placeholder="name@example.com">
        </div>

        <button class="btn btn-md btn-success" type="submit">Tambah</button>
    </form>
</div>

@endsection