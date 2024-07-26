@include('admin/header')

<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
    tfoot {
        display: table-header-group;
    }

    .searchInp {
        width: 65px
    }

</style>
<?php $prefix= $profile_data['prefix'];?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Assets List</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Asset </button> --}}

                        <a href="{{ $prefix.'/add-asset'}}" class="btn btn-success btn-sm m-2">Add Asset</a> &nbsp;
                        {{-- <a href="{{ $prefix.'/import-designations'}}" class="btn btn-danger m-2">Import Assets</a> &nbsp; --}}
                        {{-- <a href="{{ $prefix.'/dashboard'}}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp; --}}
                        <a href="{{ $prefix.'/dashboard' }}" class="btn btn-success btn-sm pull-right m-2">Back</a> &nbsp;
                        <!-- <strong class="card-title">Data Table</strong> -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#commonModal" class="btn btn-danger btn-sm m-2">Import Asset</a>
                        {{-- <a href="{{ url('/admin/add-asset') }}" class="btn btn-sm btn-icon"> <i class="ri-add-line"></i>Add Asset</a> --}}
                        <div class=" d-flex justify-content-end mb-3 {{ !empty($mobile) ? 'hide_field' : '' }}">
                            @if($errors->any())
                            <div class="alert alert-danger" style="margin-right:15px">
                                {{$errors->first()}}
                            </div>
                            @endif

                            @if(session()->has('msg'))
                            <div class="alert alert-success" style="margin-right:15px">
                                {{ session()->get('msg') }}
                            </div>
                            @endif

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                {{-- <tfoot hidden> --}}
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Asset Name</th>
                                    <th class="d-none">Supplier Name</th>
                                    <th>Asset Image</th>
                                    <th>Asset Group</th>
                                    <th class="d-none">Asset Sub Group</th>
                                    <th>Put To Use</th>
                                    <th>Asset Life</th>
                                    <th>End Life Date</th>
                                    <th>Asset Quantity</th>
                                    <th>Asset Location</th>
                                    <th>Job Assigned</th>
                                    <th style="mso-number-format:'\@'">Purchase Amount</th>
                                    <th hidden>Purchase Description</th>
                                    <th hidden>Gross Value as on 01-04-2022</th>
                                    <th hidden>Additions during the Year</th>
                                    <th hidden>Deletions during the year</th>
                                    <th hidden>Gross Value as on 31-03-2023</th>
                                    <th hidden>Accu. Dep. as on 01-04-2022</th>
                                    <th hidden>Accu. Dep. as on 31-03-2023</th>
                                    <th hidden>Net Block as on 31-03-2023</th>
                                    <th>Action</th>
                                </tr>
                            {{-- </tfoot> --}}
                            </thead>
                            <tbody>
                                @foreach($assets as $akey=>$asset)
                    <tr>
                        <td>{{ $akey+1 }}</td>
                        <td>{{ $asset['asset_group']==7 ? ($asset['vehicle_details']['vehicle_no'] ?? '') : $asset['asset_name'] }}</td>
                        <td hidden>{{ $asset['supplier']['supplier_name'] ?? '' }}</td>
                        {{-- <td>{{$asset['asset_photo']}}</td> --}}
                        <td><img width="70" height="45" src="{{ url('') }}/{{ $asset['asset_photo']!='' ? $asset['asset_photo'] : 'public/assets/img/asset.png'  }}"></td>
                        <td>{{ $asset['group_name'] }}</td>
                        <td hidden>{{ $asset['sub_group']['sub_group_name'] ?? '' }}</td>
                        <td>{{ $asset['put_to_use'] }}</td>
                        <td>{{ $asset['asset_life_years'] }} Year</td>
                        <td>{{ $asset['end_life_date'] }}</td>
                        <td>{{ $asset['asset_quantity'] }}</td>
                        <td>{{ $asset['location'] }}</td>
                        <td>{{ !empty($asset['vehicle_details']['job_details']) ? 'Yes' : 'No' }}</td>
                        <!-- <td>₹ {{ $asset['purchase_value'] }}</td> -->
                        <td>{{ $asset['purchase_value'] }}</td>
                        <td hidden>{{ $asset['purchase_description'] }}</td>
                        <td hidden>{{ $asset['first_gross_value'] ?? '' }}</td>
                        <td hidden>{{ $asset['addition_during_period'] ?? '' }}</td>
                        <td hidden>{{ $asset['deduction'] ?? '' }}</td>
                        <td hidden>{{ $asset['second_gross_value'] ?? '' }}</td>
                        <td hidden>{{ $asset['acc_dep'] ?? '' }}</td>
                        <td hidden>{{ $asset['acc_dep2'] ?? '' }}</td>
                        <td hidden>{{ $asset['net_block'] ?? '' }}</td>
                        <td>

                            <!-- <a class="icon" href="{{ url('/admin/view-asset') }}"><i class="ri-eye-line"></i></a> -->
                            <a class="icon" title="Edit Asset" href="{{ url('/admin/edit-asset') }}?asset_id={{ $asset['id'] }}"><i class="ri-pencil-line"></i></a>
                            @if($asset['account_no'])<a class="icon" title="Loan Rescheduling" href="{{ url('/admin/loan-repayment-schedule') }}?asset_id={{ $asset['id'] }}"><i class="ri-history-line"></i></a>@endif
                            <a href="#" title="Delete Asset" class="icon delete-asset" asset-id="{{ $asset['id'] }}"><i class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



  <!--Start-End Time Modal -->
  <div class="modal fade" id="commonModal" tabindex="-1" aria-labelledby="commonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="post" action="{{ url('/admin/import-asset') }}" enctype="multipart/form-data" >
                @csrf
                <div class="modal-header " style="display:flex">
                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Import Asset</h1> --}}
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Import Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <div class="form-label">Asset Excel</div>
                            <div class="custom-file-upload">
                                <input name="import_asset" type="file" accept=".csv, .xlsx, .xls" class="form-control" id="real-file" />
                                <div class="custom-file-input">
                                    <span id="custom-text">No File Choosen</span>
                                    <button type="button" class="brn btn-sm" id="custom-button"><i class="ri-folder-open-line icon"></i> Choose File</button>
                                    {{-- <p id="errorMessage" style="color: red;"></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ asset('/assets/files/Fixed_Assets_List_import_sample.xlsx') }}" class="me-2"> <i class="ri-download-2-line"></i> Download Sample File</a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="clearfix"></div>

@include('admin/footer')

{{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script> -->
<script src="{{ asset('js/jquery.dataTables1_13_7.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/jQuery.print.js') }}"></script>


<!-- <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script> -->
<script src="{{ asset('js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script> --}}

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/init/datatables-init.js')}}"></script>
<script src="{{asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/script.js')}}"></script>

<script>
    $(".fixed-assets").addClass("selected");
    // $(".page-title").html("Fixed Assets Register");
    $(".page-title").html("Assets List");

    flatpickr('#calendar_tomorrow', {
        mode: "range"
        , dateFormat: "Y-m-d"
        , disable: [
            function(date) {
                // disable every multiple of 8
                return !(date.getDate() % 8);
            }
        ]
    });

    $(document).ready(function() {

        $(".alert-danger , .alert-success").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert-danger").slideUp(500);
            $(".alert-success").slideUp(500);
        });

        var columnDefs = [];

        if ("{{ !empty($mobile) ? true : false }}") {
            columnDefs.push({
                "targets": -1, // Target the last column
                "visible": false, // Hide the column
                "searchable": false // Optional: Make the column not searchable
            });
        }

        var exampleDataTable = $('#assetRegister').DataTable({
            dom: 'Bfrtip'
            , select: true
            , buttons: [
                'pageLength'
                , {
                    extend: 'excel'
                    , filename: 'Fixed Asset Register List',
                    // text: 'Custom Excel Button Name',
                    exportOptions: {
                        columns: [1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19], // Specify columns to include in the export
                    }
                }
            ]
            , initComplete: function() {

                var table = this.api();
                // Define an array of column indices you want to filter
                // var columnsToFilter = [11]; // Example: Filter columns 1 and 2 (index starts from 0)
                var allColumnIndexes = table.columns().indexes();
                var visibleColumnIndexes = [];

                // Iterate over each <th> element in the table header
                $('#assetRegister thead th').each(function(index) {
                    // Check if the column is hidden
                    if (!$(this).is(':hidden')) {
                        // Add the index of the visible column to the array
                        visibleColumnIndexes.push(index);
                    }
                });
                console.log(visibleColumnIndexes);

                // Iterate over each column index in the array
                var headerRow = $('<tr>').appendTo($('#assetRegister thead'));

                $.each(visibleColumnIndexes, function(index, columnIndex) {
                    var column = table.column(columnIndex); // Target the specific column
                    if (columnIndex == 4 || columnIndex == 11 || columnIndex == 10) {
                        var select = $('<select><option value="">- Select -</option></select>')
                            // .appendTo($(column.header()).empty())
                            .appendTo($('<th>').appendTo(headerRow))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    } else {

                        // $('<input type="text" placeholder="Filter Office">')
                        // .appendTo($(column.header()).empty())
                        // .appendTo($('<th>').appendTo(headerRow))
                        // .on('keyup', function () {
                        //     column.search($(this).val()).draw();
                        // });
                        if (columnIndex != 0 && columnIndex != 21) {
                            var select = $('<input class="searchInp" type="text" placeholder="' + 'Enter Here' + '">')
                                .appendTo($('<th>').appendTo(headerRow)).on('keyup', function() {
                                    column.search($(this).val()).draw();
                                });
                        } else {
                            var select = $('')
                                .appendTo($('<th>').appendTo(headerRow));
                        }
                    }

                });
            }
            , "columnDefs": columnDefs
            , paging: true, // Enable pagination
            searching: true, // Enable search
            ordering: true, // Enable sorting
            info: true, // Show table information (records per page, etc.)
            responsive: true, // Enable responsiveness
            // Add more options based on your requirements
            "language": {
                "search": ''
                , "searchPlaceholder": "Search Here"
            , }


        });

        $(exampleDataTable.columns(1).footer()).find('select').on('change', function() {
            var nextSelect = $(exampleDataTable.columns(2).footer()).find('select');
            var nextColumn = exampleDataTable.column(2);
            var nextColumnResults = exampleDataTable.column(2, {
                search: 'applied'
            });
            nextColumn.search('').draw();
            nextSelect.empty();
            nextSelect.append('<option value=""></option>');
            nextColumnResults.data().unique().sort().each(function(d, j) {
                nextSelect.append('<option value="' + d + '">' + d + '</option>')
            });
        });


        // $('.delete-asset').click(function(){
        $(document).on('click', '.delete-asset', function() {
            if (confirm("Do you want to delete asset ?")) {
                redUrl = base_url + '/delete-asset';

                $.ajax({
                    url: redUrl
                    , type: 'get'
                    , data: {
                        asset_id: $(this).attr('asset-id')
                    }
                    , dataType: 'json'
                    , success: function(res) {

                        if (res.status) {

                            $(".form-err").css("color", "#28a745");
                            $(".form-err").html(res.msg);
                            setTimeout(function() {
                                location.reload();
                            }, 1000);

                        } else {
                            // fp1.close();
                            $(".form-err").css("color", "red");
                            $(".form-err").html(res.msg);

                            setTimeout(function() {
                                // location.reload();
                            }, 3000);
                        }

                    }
                    , error: function(xhr, textStatus, errorThrown) {

                    }
                });
            }
        });

    });



</script>

</body>

</html>
