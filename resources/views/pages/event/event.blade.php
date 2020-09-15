@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <div class="d-flex justify-content-between">
        <h1>Daftar Event</h1>
        <a href="{{url('admin/tambah-acara')}}" class="btn btn-md btn-primary align-self-center">
            <i class="fas fa-fw fa-calendar mr-1"></i>Tambah Event</a>
    </div>


    <!-- Tabel -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Acara</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event as $e)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$e->nama_events}}
                    @if($e->tanggal_selesai < $date) <div class="badge badge-success float-right">SELESAI
</div>
@endif
</td>
<td>{{$e->lokasi}}</td>
<td>{{$e->tanggal_mulai}}</td>
<td>{{$e->tanggal_selesai}}</td>
<td>
    <div class="d-flex">
        <a href="edit/<?= $e->slug; ?>" class="btn btn-md btn-warning"><i class="fas fa-fw fa-trash mr-1"></i>Edit</a>
        <form action="{{'tambah-acara'}}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{$e->id}}">
            <button class="mx-2 btn btn-md btn-danger"><i class="fas fa-fw fa-trash mr-1"></i>Hapus</button>
        </form>
    </div>
</td>

</tr>


@endforeach
</tbody>
</table>
</div>
<!-- /.container-fluid -->
@endsection