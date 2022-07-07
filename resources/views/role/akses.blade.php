@extends('layouts.main')
@section('title', 'Role Akses')

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
                <form class="form-horizontal" action="{{ route('storeRole') }}" method="POST">
                    @csrf
                    <div class=" row mb-4">
                        <label for="inputName" class="col-md-3 form-label">Nama Role</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" id="inputName" name="name" placeholder="Nama Role" value="{{ old('name', $role->name) }}" readonly>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('updateRole', $role->id) }}" method="POST">
                    @csrf
                    <div class=" row mb-4">
                        <label for="inputName" class="col-md-12 form-label">Permission</label>
                    </div>
                    <div class="row">
                        @forelse ($permissions as $item)
                        <div class="col-md-3 my-5">
                            @foreach ($item as $v)
                            <label>
                                <input type="checkbox"
                                class="form-checked"
                                name="permission[]"
                                value="{{ $v->name }}" {{ in_array($v->name, $rolePermissions) ? "checked" : null }}> {{ $v->name }}
                            </label>
                            <br/>
                            @endforeach
                        </div>
                        @empty
                            
                        @endforelse
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Perbarui Permission</button>
                            <a href="/role" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection