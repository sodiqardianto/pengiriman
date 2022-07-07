@extends('layouts.main')
@section('title', 'Tambah Users')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/users">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md-12 col-xl-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="/users" method="POST">
                    @csrf
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control @error('email') is-invalid state-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control @error('no_telp') is-invalid state-invalid @enderror" id="no_telp" name="no_telp" placeholder="No. Telepon" value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                        </div>
                        <div class="col-md-9">
                            <select name="jabatan" class="form-control form-select select2 @error('jabatan') is-invalid state-invalid @enderror">
                                <option value="" selected disabled>-- Pilih Jabatan --</option>
                                <option value="user" @if (old('jabatan') == "user") {{ 'selected' }} @endif>User</option>
                                <option value="finance" @if (old('jabatan') == "finance") {{ 'selected' }} @endif>Finance</option>
                            </select>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" class="form-control @error('password') is-invalid state-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid state-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <div class="col-md-3">
                            <label for="alamat" class="form-label">Alamat</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4 @error('alamat') is-invalid state-invalid @enderror" name="alamat" placeholder="Alamat" rows="4">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9">
                            <button class="btn btn-primary">Tambah User</button>
                            <a href="/users" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2.js') }}"></script>
@endpush