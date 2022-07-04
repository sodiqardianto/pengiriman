@extends('layouts.main')
@section('title', 'Report Mingguan')

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
<div class="row">
    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="from_date">From Date</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="from_date">End Date</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="from_date" id="from_date">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="from_date" id="from_date">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <button type="button" name='filter' id='filter' class="btn btn-success">Filter</button>
                                    <button type="button" name='reset' id='reset' class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap key-buttons border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" width="50px">No</th>
                                <th class="wd-15p border-bottom-0">Customer</th>
                                <th class="wd-15p border-bottom-0">No Telpon</th>
                                <th class="wd-15p border-bottom-0">Kelurahan</th>
                                <th class="wd-15p border-bottom-0">Petugas Input</th>
                                <th class="wd-15p border-bottom-0">Surat Jalan</th>
                                <th class="wd-15p border-bottom-0">Total Muatan</th>
                                <th class="wd-15p border-bottom-0">Total Biaya</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('after-script')
<script src="{{ asset('/assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/assets/js/select2.js') }}"></script>
<script type="text/javascript">
        (function() {
        loadDataTable();
    })();
    function loadDataTable(from_date = '', to_date = '') {
        $(document).ready(function() {
            $('#responsive-datatable').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                ajax: {
                    url: "{{ ('dataReport') }}",
                    type: "GET",
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },

                    {
                        data: 'no_telp',
                        name: 'no_telp'
                    },
                    {
                        data: 'kelurahan',
                        name: 'kelurahan'
                    },
                    {
                        data: 'petugas',
                        name: 'petugas'
                    },

                    {
                        data: 'surat',
                        name: 'surat'
                    },


                    {
                        data: 'muatan',
                        name: 'muatan'
                    },

                    {
                        data: 'biaya',
                        name: 'biaya'
                    }
                    // ,
                    // {
                    //     data: 'id',
                    //     name: 'id',
                    //     render: function(value, param, data) {
                    //         return '<div class="btn-group">' +
                    //             '<a class="btn btn-sm btn-primary" href="/editCity/' + value +
                    //             '"><i class="fa fa-edit"></i></a> ' +

                    //             '<button class="btn btn-sm btn-danger" type="button" onClick="deleteConfirmation(' +
                    //             value + ')"><i class="fa fa-trash"></i></button>' +
                    //             '</div> ';
                    //     },
                    //     orderable: false,
                    // }

                ],
                order: [
                    [0, 'asc']
                ],
            });
        });
    }
    
    $(document).ready(function(){
            $('#pilihfilter').change(function(){  
                // alert('oke')
                let filter = $('#pilihfilter').val();
                if(filter=='range'){
                    document.getElementById("harian").style.display='none'; 
                    document.getElementById("range").style.display='block';
                    document.getElementById("bulan").style.display='none'; 
                }else if(filter=='harian'){
                    document.getElementById("harian").style.display='block'; 
                    document.getElementById("range").style.display='none';
                    document.getElementById("bulan").style.display='none';  
                }else if(filter=='bulan'){
                    document.getElementById("bulan").style.display='block';
                    document.getElementById("range").style.display='none';
                    document.getElementById("harian").style.display='none'; 
                }else{
                    document.getElementById("bulan").style.display='none';
                    document.getElementById("range").style.display='none';
                    document.getElementById("harian").style.display='none'; 
                }
                
            });
            
            $('#filterharian').click(function(){  
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' &&  to_date != '')
                {
                $('#table').DataTable().destroy();
                load_data(from_date, to_date);
                }
                else
                {
                alert('Both Date is required');
                }

            });

            $('#reset').click(function(){
                $('#pilihfilter').val("").trigger('change');
                $('#responsive_table').DataTable().destroy();
                // load_data();
            });
    })
    

</script>
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