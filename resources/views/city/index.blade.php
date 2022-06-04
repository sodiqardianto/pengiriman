@extends('layouts.main')
@section('title', 'Kota')

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
                <a href="{{ 'createCity' }}" type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah Kota</a>
            </div>
            <div class="card-body">
                <div>
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" width="50px">No</th>
                                <th class="wd-15p border-bottom-0">Zona</th>
                                <th class="wd-15p border-bottom-0">Provinsi</th>
                                <th class="wd-15p border-bottom-0">Kecamatan</th>
                                <th class="wd-15p border-bottom-0">Kabupaten</th>
                                <th class="wd-15p border-bottom-0">Kelurahan</th>
                                <th class="wd-15p border-bottom-0">KM</th>
                                <th class="wd-20p border-bottom-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($city as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ ucwords($item->zona->zona) }}</td>
                                <td>{{ ucwords($item->kelurahan->district->regency->province->name) }}</td>
                                <td>{{ ucwords($item->kelurahan->district->regency->name) }}</td>
                                <td>{{ ucwords($item->kelurahan->district->name) }}</td>
                                <td>{{ ucwords($item->kelurahan->name) }}</td>
                                <td>{{ $item->km }} KM</td>
                                <td>
                                    <a href="{{ route('editCity', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{ $item->id }})"><i class="fa fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('after-script')
<script type="text/javascript">
        (function() {
        loadDataTable();
    })();
    function loadDataTable() {
        $(document).ready(function() {
            $('#responsive-datatable').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('dataCity') }}",
                    type: "GET",
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'zona',
                        name: 'zona'
                    },

                    {
                        data: 'province',
                        name: 'province'
                    },

                    {
                        data: 'regency',
                        name: 'regency'
                    },

                    {
                        data: 'district',
                        name: 'district'
                    },


                    {
                        data: 'kelurahan',
                        name: 'kelurahan'
                    },

                    {
                        data: 'km',
                        name: 'km'
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(value, param, data) {
                            return '<div class="btn-group">' +
                                '<a class="btn btn-sm btn-primary" href="/categories/' + value +
                                '/edit"><i class="fas fa-edit"></i></a> ' +

                                '<button class="btn btn-sm btn-danger" type="button" onClick="deleteConfirm(' +
                                value + ')"><i class="fas fa-trash"></i></button>' +
                                '</div> ';
                        }
                    }

                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
    }
</script>
<script>
    function deleteConfirmation(id, name) {
        Swal.fire({
            title: "Hapus Kota  ?",
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
                    url: "{{url('/deleteCity')}}/" + id,
                    type: 'POST',
                    data: {_token: CSRF_TOKEN},
                    dataType: 'json',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire(
                                'Deleted!',
                                'Kota berhasil dihapus.',
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