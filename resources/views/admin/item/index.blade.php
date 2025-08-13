@extends('admin.layouts.master')
@section('title', 'Menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Menu</h3>
                <p class="text-subtitle text-muted">Berbagai menu makanan</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <a href="{{ route('items.create') }}" class="btn btn-primary float-start float-lg-end">
                            <i class="bi bi-plus-lg"></i>
                            Tambah Menu
                        </a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>
                            <i class="bi bi-check-circle"></i>
                            <strong>{{ session('success') }}</strong>
                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Item</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('img_item_upload/' . $item->image) }}" width="50px" class="rounded-top" alt="" onerror="this.onerror=null; this.src='{{ $item->image }}';">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ Str::limit($item->description, 15) }}</td>
                                <td>{{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ $item->category->cat_name == 'Makanan' ? 'bg-warning' : 'bg-info' }}">
                                        {{ $item->category->cat_name }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $item->is_active == 1 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $item->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                        Ubah
                                    </a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/admin/static/js/pages/simple-datatables.js') }}"></script>
@endsection