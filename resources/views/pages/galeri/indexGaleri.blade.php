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
                <th scope="col">Nama</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @forelse($event as $e)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$e->name}}</td>
                <td>

                    <img class="img-fluid " style="width: 200px;" src="{{Storage::url($e->image)}}" alt="">
                </td>
                <td>{{$e->image}}</td>
                <td>
                    <div class="d-flex">
                        <a href="<?= $e->slug; ?>" class="btn btn-md btn-info"><i class="fas fa-fw fa-book"></i>Detail</a>
                        <a href="galeri/edit/<?= $e->id; ?>" class="btn btn-md btn-warning  "><i class="fas fa-fw fa-pen"></i>Edit</a>
                        <form action="{{'/galeri'}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="image" value="{{$e->image}}">
                            <button class="btn btn-md btn-danger"><i class="fas fa-fw fa-trash"></i>Hapus</button>
                        </form>
                    </div>
                </td>
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