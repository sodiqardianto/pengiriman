@extends('layouts.main')
@section('title', 'Tambah Permission')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/role">Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('insertPermission') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Permission</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text"
                            class="form-control @error('permission') is-invalid state-invalid @enderror"
                            name="permission"
                            placeholder="Permission"
                            value="{{ old('permission') }}">
                            @error('permission')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Tambah Permission</button>
                            <a href="/role" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection