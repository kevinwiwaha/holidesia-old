@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <d class="d-flex justify-content-between">
        <h1>Galeri</h1>
        <a href="{{url('galeri/tambah-galeri')}}" class="align-self-center btn btn-md btn-primary"><i class="fas fa-fw fa-image mr-1"></i>Tambah Galeri</a>
    </d>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>

            </tr>
        </thead>
        <tbody>
            @forelse($event as $e)
            <tr>
                <td>1</td>
                <td>{{$e->image}}</td>
                <td>{{$e->image}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Kosong</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection