@extends('layouts.main')
@section('title', 'Users')

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
                <a href="{{ 'users/create' }}" type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" width="50px">No</th>
                                <th class="wd-15p border-bottom-0">Nama Lengkap</th>
                                <th class="wd-15p border-bottom-0">Jabatan</th>
                                <th class="wd-15p border-bottom-0">No. Telepon</th>
                                <th class="wd-15p border-bottom-0">Alamat</th>
                                <th class="wd-20p border-bottom-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ ucwords($item->name) }}</td>
                                <td>{{ ucwords($item->jabatan) }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ ucwords($item->alamat) }}</td>
                                <td>
                                    <a href="{{ route('editZona', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    @can('delete-zona')
                                        <button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{ $item->id }})"><i class="fa fa-trash"></i> Hapus</button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @push('after-script')
<script>
    function deleteConfirmation(id, name) {
        Swal.fire({
            title: "Hapus Zona?",
            icon: 'error',
            text: "Apakah kamu ingin menghapus zona! ",
            showCancelButton: !0,
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                $.ajax({
                    url: "{{url('/deleteZona')}}/" + id,
                    type: 'POST',
                    data: {_token: CSRF_TOKEN},
                    dataType: 'json',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire(
                                'Deleted!',
                                'Zona berhasil dihapus.',
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
@endpush --}}
@endsection