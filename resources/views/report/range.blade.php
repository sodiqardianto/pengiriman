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
                                    <label for="end_date">End Date</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="from_date" id="from_date">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="end_date" id="end_date">
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
                        <tfoot>
                            <tr>
                                <th colspan="4"></th>
                                <th style="text-align:right">Total Surat Jalan:</th>
                                <th></th>
                                <th style="text-align:right">Total Biaya:</th>
                                <th></th>
                            </tr>
                        </tfoot>
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
    function loadDataTable(from_date = '', to_date = '',tipe='range') {
        $(document).ready(function() {
            $('#responsive-datatable').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                lengthChange: true,
                dom:
                "<'row'<'col-sm-1'l><'col-sm-8 pb-3 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons:[{extend: 'excel',title:"<center>Data Harian</center>", footer: true},
                {extend: 'pdf',title:"<center>Data Harian</center>", footer: true},
                {extend: 'print',title:"<center>Data Harian</center>", footer: true}],
                lengthMenu: [10, 25, 50, 100],
                ajax: {
                    url: "{{ ('dataReport') }}",
                    type: "GET",
                    data:{from_date:from_date, to_date:to_date, tipe:tipe}
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
                ],
                
                    "footerCallback": function (row, data){
                        var api = this.api(),data;
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\Rp. ,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };

                        total = api.column(7)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                        totalsurat = api.column(5)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0)

                        for(let j=0;j<4;j++){
                            $(api.column(j).footer()).html(
                            ""
                        )
                        }
                        $(api.column(5).footer()).html(
                            totalsurat
                        )
                        $(api.column(7).footer()).html(
                            "Rp. "+total
                        )
                            },
                

                order: [
                    [0, 'asc']
                ],
            });
        });
    }
    
    $(document).ready(function(){
            
            $('#from_date').change(function(){ 
                let from_date =new Date($('#from_date').val());
                from_date.setDate(from_date.getDate()+6); 
                // let minggu = from_date.add(7).day();
                newdate = new Date(from_date)
                $('#end_date').val(newdate.toISOString().split('T')[0]);

            });


            
            $('#filter').click(function(){  
                var from_date = $('#from_date').val();
                var to_date = $('#end_date').val();
                if(from_date != '' &&  to_date != '')
                {
                $('#responsive-datatable').DataTable().destroy();
                loadDataTable(from_date, to_date);
                }
                else
                {
                alert('Both Date is required');
                }

            });

            $('#reset').click(function(){
                $('#from_date').val("");
                $('#end_date').val("");
                $('#responsive-datatable').DataTable().destroy();
                loadDataTable();
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