@extends('layouts.main')
@section('title', 'Transaksi')

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
                <a href="{{ 'createTransaction' }}" type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah Transaksi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                            <th class="wd-15p border-bottom-0" width="50px">No</th>
                                <th class="wd-15p border-bottom-0">Customer</th>
                                <th class="wd-15p border-bottom-0">No Telpon</th>
                                <th class="wd-15p border-bottom-0">Kelurahan</th>
                                <th class="wd-15p border-bottom-0">Surat Jalan</th>
                                <th class="wd-15p border-bottom-0">Total Muatan</th>
                                <th class="wd-15p border-bottom-0">Total Biaya</th>
                                <th class="wd-20p border-bottom-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $no => $item)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ ucwords($item->nama) }}</td>
                                <td>{{ ucwords($item->city->kelurahan->name) }}</td>
                                <td>{{ ucwords($item->no_telp) }}</td>
                                <td>
                                    <?php
                                    $muatan=0;
                                    $biaya=0;
                                    $surat=0;
                                        foreach ($item->details as $details ) {
                                            $muatan += $details->muatan;
                                            if($details->muatan==25){
                                                $biaya +=$item->city->zona->harga25;
                                            }else if($details->muatan==50){
                                                $biaya +=$item->city->zona->harga50;
                                            }else{
                                                $biaya +=$item->city->zona->harga100;
                                            }
                                            $surat++;
                                        }
                                        
                                        echo $surat; 
                                    ?>
                                    
                                </td>
                                <td>{{ $muatan." %" }}</td>
                                <td>{{ 'Rp. '.number_format($biaya) }}</td>
                                <td>
                                    <a href="{{ route('editRole', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('inputBarang', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-credit-card"></i> Input Barang
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{ $item->id }})"><i class="fa fa-trash"></i> Hapus</button>
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
@push('after-script')
<script>
    function deleteConfirmation(id, name) {
        Swal.fire({
            title: "Hapus Transaksi?",
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
                    url: "{{url('/deleteTransaksi')}}/" + id,
                    type: 'POST',
                    data: {_token: CSRF_TOKEN},
                    dataType: 'json',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire(
                                'Deleted!',
                                'Transaksi berhasil dihapus.',
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