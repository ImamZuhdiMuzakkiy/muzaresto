@extends('admin.layouts.master')
@section('title', 'Tambah Karyawan')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Karyawan</h3>
                <p class="text-subtitle text-muted">Silahkan isi data karyawan yang ingin ditambahkan</p>
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
                <form class="form" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fullname">Nama Karyawan</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan Nama Karyawan" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan No. Telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role_id" required>
                                    <option value="">Pilih Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                                <small><a href="#" class="toggle-password" data-target="#password">Lihat Password</a></small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                <small><a href="#" class="toggle-password" data-target="#password_confirmation">Lihat Password</a></small>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                <a href="{{ route('users.index') }}" type="submit" class="btn btn-danger me-1 mb-1">Batal</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const togglePassword = document.querySelectorAll(".toggle-password");
                togglePassword.forEach((toggle) => {
                    toggle.addEventListener("click", function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.dataset.target);
                        if (target.type === "password") {
                            target.type = "text";
                            this.textContent = "Sembunyikan Password";
                        } else {
                            target.type = "password";
                            this.textContent = "Lihat Password";
                        }
                    });
                });
            });
        </script>
@endsection