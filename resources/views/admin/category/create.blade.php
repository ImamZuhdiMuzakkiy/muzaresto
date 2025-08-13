@extends('admin.layouts.master')
@section('title', 'Tambah Kategori Menu')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Kategori Menu</h3>
                <p class="text-subtitle text-muted">Silahkan isi data kategori menu yang ingin ditambahkan</p>
            </div>
        </div>
    </div>
    <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading">Submit Error!</h5>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="form" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_name">Nama Kategori</label>
                                <input type="text" class="form-control" id="category_name" name="cat_name" placeholder="Masukkan Nama Kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi" required></textarea>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                <a href="{{ route('categories.index') }}" type="submit" class="btn btn-danger me-1 mb-1">Batal</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection