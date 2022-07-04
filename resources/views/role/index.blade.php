@extends('layouts.main')
@section('title', 'Role Management')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="form-group">
                    @can('create-role')
                    <a href="{{ 'createRole' }}" type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah Role</a>
                    @endcan
                    <a href="{{ 'createPermission' }}" type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah Permission</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" width="50px">No</th>
                                <th class="wd-15p border-bottom-0">Nama Role</th>
                                <th class="wd-20p border-bottom-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($role as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('editRole', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('aksesRole', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-credit-card"></i> Akses
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{ $item->id }})"><i class="fa fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>No Data Availabel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('after-script')
<script>
    function deleteConfirmation(id, name) {
        Swal.fire({
            title: "Hapus role?",
            icon: 'error',
            text: "Apakah kamu ingin menghapus role! ",
            showCancelButton: !0,
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                $.ajax({
                    url: "{{url('/deleteRole')}}/" + id,
                    type: 'POST',
                    data: {_token: CSRF_TOKEN},
                    dataType: 'json',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire(
                                'Deleted!',
                                'Role berhasil dihapus.',
                                'success'
                            )
                            // refresh page after 2 seconds
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        } else {
                            Swal.fire("Error!", results.message, "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        }
    )}
</script>
@endpush
@endsection