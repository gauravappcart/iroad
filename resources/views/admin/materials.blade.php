@include('admin/header')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />


<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<?php $prefix= $profile_data['prefix'];?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Material</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        {{-- <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Material</a></li>
                            <li class="active">Material List</li>
                        </ol> --}}
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
                        <button type="button" onclick="add_data()" class="btn btn-success btn-sm m-2" data-toggle="modal" data-target="#scrollmodal"> Add Material </button>
                        {{-- <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#import_modal"> Import Material </button> --}}
                        <a href="{{ $prefix.'/import-materials'}}" class="btn btn-sm btn-danger m-2">Import Material</a> &nbsp;
                        <button type="button" onclick="add_data()" class="btn btn-primary btn-sm m-2" data-toggle="modal" data-target="#copyMaterialModal"> Copy Material </button>

                        {{-- <button type="button" onclick="history.back()" class="btn btn-success btn-sm pull-right">Back</button> --}}
                        <a href="{{ $prefix.'/dashboard' }}" class="btn btn-success btn-sm pull-right m-2">Back</a> &nbsp;
                        <!-- <strong class="card-title">Data Table</strong> -->
                    </div>
                    <div class="card-body">
                        {{-- <div class="filter-container">
                            <label for="filter-name">Site Name:</label>
                            <select class="filter-input select2 material_site" id="material_site" name="material_site" multiple="multiple" style="width: 100%">
                                @foreach ($sites as $options)
                                <option value="{{$options->site_id}}" {{$selectedSitetId==$options->site_id?'selected':''}}>{{$options->site_name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Material Name</th>
                                    <th>Material Type</th>
                                    <th>Material Unit</th>
                                    <th>Material Cost</th>
                                    <th>Site Name</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materials as $key=>$material)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $material['material_name'] }}</td>
                                    <td>{{ $material['material_type'] }}</td>
                                    <td>{{ $material['unit_name'] }}</td>
                                    <td>{{ $material['material_cost'] }}</td>
                                    <td>{{$material['material_site_id']==0 ? "Common Material":$material['site_name']}}
                                    <td>{{ date('Y-m-d',strtotime($material['updated_at'])) }}</td>
                                    <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $material['is_active']==1 ? '#44b749' : '#dc3545'}}" title="{{ $material['is_active']==1 ? 'Active' : 'Inactive' }}" aria-hidden="true"></i></td>

                                    <td class="text-center">

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $material['material_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil "></i></button>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" onclick="delete_material({{ $material['material_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>

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


{{-- Start Add Material Model --}}
<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
            <div class="modal-header" style="display:flex">
                <h5 class="modal-title" id="scrollmodalLabel">Material Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="add_materials">

                @csrf
                <input type="hidden" value="" id="material_id" name="material_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_type" class=" form-control-label">MATERIAL TYPE<span style="color:red">*</span></label>
                                        <select class="form-control select2" id="material_type" name="material_type" multiple="multiple" style="width: 100%;"></select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_name" class=" form-control-label">MATERIAL NAME<span style="color:red">*</span></label>
                                        <input type="text" id="material_name" name="material_name" placeholder="Ex.Cement,Steel.etc" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="material_unit" class=" form-control-label">MATERIAL UNIT</label>
                                            <input type="text" id="material_unit" name="material_unit" placeholder="Ex.No,Kg. etc" class="form-control">
                                        </div>
                                    </div> --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_unit" class=" form-control-label">Unit TYPE<span style="color:red">*</span></label>
                                        <select class="form-control select2 material_unit" id="material_unit" name="material_unit" multiple="multiple" style="width: 100%">
                                            @foreach ($units as $options)
                                            <option value="{{$options->unit_id}}" {{$selectedUnitId==$options->unit_id?'selected':''}}>{{$options->unit_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_unit" class=" form-control-label">Site List<span style="color:red">*</span></label>
                                        <select class="form-control select2 material_site" id="material_site" name="material_site" multiple="multiple" style="width: 100%">
                                            @foreach ($sites as $options)
                                            <option value="{{$options->site_id}}" {{$selectedSitetId==$options->site_id?'selected':''}}>{{$options->site_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_cost" class="form-control-label">MATERIAL COST<span style="color:red">*</span></label>
                                        <input type="number" id="material_cost" name="material_cost" placeholder="Ex.100,1000. etc" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="is_active" class="form-control-label">Is Active ?<span style="color:red">*</span></label>
                                    <div class="">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="yes" type="radio" name="is_active" id="inlineRadio1" value="Yes">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="no" type="radio" name="is_active" id="inlineRadio2" value="No">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="w-100 text-center"><span class="material-err"></span></div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                </div>

            </form>

        </div>
    </div>
</div>
{{-- End Add Material Model --}}

{{-- Start Copy Material Model --}}
<div class="modal fade" id="copyMaterialModal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
            <div class="modal-header" style="display:flex">
                <h5 class="modal-title" id="scrollmodalLabel">Copy Materials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="copy_materials">

                @csrf
                <input type="hidden" value="" id="material_id" name="material_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">



                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_unit" class=" form-control-label">From Site List<span style="color:red">*</span></label>
                                        <select class="form-control select2 from_site" id="from_site" name="from_site" multiple="multiple" style="width: 100%">
                                            @foreach ($sites_having_data as $options)
                                            <option value="{{$options->site_id}}" {{$selectedSitetId==$options->site_id?'selected':''}}>{{$options->site_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="material_unit" class=" form-control-label">To Site List<span style="color:red">*</span></label>
                                        <select class="form-control select2 to_site" id="to_site" name="to_site" multiple="multiple" style="width: 100%">
                                            @foreach ($sites as $options)
                                            <option value="{{$options->site_id}}" {{$selectedSitetId==$options->site_id?'selected':''}}>{{$options->site_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>


                            <div class="w-100 text-center"><span class="material-err"></span></div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                </div>

            </form>

        </div>
    </div>
</div>
{{-- End Copy Material Model --}}




<div class="modal fade" id="import_modal" tabindex="-1" role="dialog" aria-labelledby="import_modalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {{-- <form action="{{ $prefix.'/material-import' }}" method="POST" enctype="multipart/form-data">
            @csrf --}}
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
            <div class="modal-header" style="display:flex">
                <h5 class="modal-title" id="import_modalLabel">Material Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="row ">
                            <div class="col-md-4 col-sm-6"></div>
                            <div class="col-md-4 col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <!-- <label>Upload File</label>  -->
                                    <input type="file" accept=".xls,.xlsx,.xlsm" id="userfile" name="userfile" data-placeholder="Upload File" class="form-control">
                                </div>
                            </div> <!-- /.col-md-4 -->
                        </div>

                        <div class="row ">
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-8 col-sm-8">
                                <p style="font-size:13px; color: #000;">
                                    Note*- To upload file please ensure that your columns names are spelt the same as the headers given below. You must have all these headers in your import file to successfully import Material. If you do not have information to populate specific columns, you may leave them blank but do not remove whole column.</p>
                            </div>
                        </div>


                        @if (session('success'))
                        <p style="color: green;" id="success-message">{{ session('success') }}</p>
                        @endif

                        @if (session('error'))
                        <p style="color: red;">{{ session('error') }}</p>
                        @endif
                        @if (session('failures'))
                        <div style="color: red;">
                            <h3>Import Failures:</h3>

                            <ul>
                                @foreach (session('failures') as $failure)
                                <li>
                                    Row {{ $failure->row() }}: {{ $failure->errors()[0] }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <a href="{{ $prefix.'/export-material' }}" class="btn btn-danger m-2 float-right">Download Sample Template</a>
                        {{-- <p class="text-center">Excel Import Layout <a href="{{asset('assets/files/add_material_sample_file.xlsx')}}" download="" style="color:black"> <u>Download Template</u></a><br> --}}
                        {{-- </p> --}}

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{-- <button type="submit" class="btn btn-primary upload-btn">Upload</button> --}}
                <button type="button" class="btn btn-primary upload-btn">Upload</button>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>

<div class="clearfix"></div>

@include('admin/footer')

</div><!-- /#right-panel -->

<!-- Right Panel -->


<script src="{{asset('assets/js/jquery.min.js')}}"></script>
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
<script src="{{asset('assets/js/common.js')}}"></script>



<script type="text/javascript">
    $(document).ready(function() {

        $('.material-nav').addClass('active');

        $("#material_unit").select2({
            placeholder: "Select type"
            , allowClear: true
            , maximumSelectionLength: 1
        , });
        $("#from_site").select2({
            placeholder: "Select site"
            , allowClear: true
            , maximumSelectionLength: 1
        , });
        $("#to_site").select2({
            placeholder: "Select site"
            , allowClear: true
            , maximumSelectionLength: 1
        , });
        $("#material_site").select2({
            placeholder: "Select site"
            , allowClear: true
            , maximumSelectionLength: 1
        , });

        $('#material_type').select2({
            data: JSON.parse('<?php echo json_encode(array_column($material_types, 'material_type')) ?>')
            , tags: true
            , maximumSelectionLength: 1
            , maximumInputLength: 10,
            // tokenSeparators: [',', ' '],
            placeholder: "Select or type keywords"
        , });


        $(".upload-btn").click(function() {

            var fd = new FormData();
            var files = $('#userfile')[0].files;

            redUrl = base_url + '/material-import';

            // Check file selected or not
            if (files.length > 0) {
                fd.append('file', files[0]);
                fd.append('_token', "{{ csrf_token() }}");

                $.ajax({
                    url: redUrl
                    , type: 'post'
                    , data: fd
                    , contentType: false
                    , processData: false
                    , success: function(response) {
                        if (response != 0) {
                            $("#img").attr("src", response);
                            $(".preview img").show(); // Display image element
                        } else {
                            alert('file not uploaded');
                        }
                    }
                , });

            } else {
                alert("Please select a file.");
            }
        });

    });

    var materials = JSON.parse('<?php echo json_encode($materials) ?>');

    function add_data() {
        $('#add_materials')[0].reset();
        $('#material_id').val('');
        $('#material_type').val(null).trigger('change');
        $('#material_unit').val(result.null).trigger('change');
        $('#btn_title').html('Submit');
    }


    function get_data(material_id) {
        var result = materials.find(item => item.material_id === material_id);
        console.log(result);
        $("#material_name").val(result.material_name);
        $("#material_cost").val(result.material_cost);
        $('#material_type').val(result.material_type).trigger('change');
        // $("#material_unit").val(result.material_unit);
        $('#material_unit').val(result.material_unit).trigger('change');
        $("#material_id").val(material_id);
        $('#btn_title').html('Update');

        $(result.is_active == 1 ? '#yes' : '#no').prop("checked", true);
    }


    $("#add_materials").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            material_name: {
                required: true
            }
            , material_type: {
                required: true
            }
            , material_unit: {
                required: true
            }
            , material_cost: {
                required: true,
                // number: true,
                //  minStrict: 0
            },
            material_site:{
                required:true,
            },
            is_active:{
                required:true
            }

        }
        , messages: {
            material_name: {
                required: "Please Enter Material Name"
            }
            , material_type: {
                required: "Please Select Material Type"
            }
            , material_unit: {
                required: "Please Enter Material Unit"
            }
            , material_cost: {
                required: "Please Enter Material Cost",
                // minStrict: "Material Cost must not be 0"
            },
            material_site:{
                required: "Please Select Site",
            },
            is_active:{
                required:"Please Select Option"
            }

        }
        , submitHandler: function(form, message) {

            redUrl = base_url + '/add-materials';

            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {

                    if (res.status) {

                        $(".material-err").css("color", "#28a745");
                        $(".material-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);


                    } else {
                        // fp1.close();
                        $(".material-err").css("color", "red");
                        $(".material-err").html(res.msg);

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


    function delete_material(material_id) {
        if (confirm("Do you want to delete material ?")) {
            redUrl = base_url + '/add-materials';

            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , material_id: material_id
                }
                , dataType: 'json'
                , success: function(res) {

                    if (res.status) {

                        $(".material-err").css("color", "#28a745");
                        $(".material-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);


                    } else {
                        // fp1.close();
                        $(".material-err").css("color", "red");
                        $(".material-err").html(res.msg);

                        setTimeout(function() {
                            // location.reload();
                        }, 3000);
                    }


                }
                , error: function(xhr, textStatus, errorThrown) {

                }
            });
        }
    }








</script>
<script>


        $('#from_site').on('change', function() {
            // Get the selected value from the first dropdown
            var selectedValue = $(this).val();

            // Enable all options in the second dropdown
            $('#to_site option').prop('disabled', false);

            // Disable the selected option in the second dropdown
            if (selectedValue) {
                $('#to_site option[value="' + selectedValue + '"]').prop('disabled', true);
            }

            // Refresh the second dropdown to apply the changes
            $("#to_site").select2({
            placeholder: "Select site"
            , allowClear: true
            , maximumSelectionLength: 1
        , });
        });


        $('#to_site').on('change', function() {
            // Get the selected value from the first dropdown
            var selectedValue = $(this).val();

            // Enable all options in the second dropdown
            $('#from_site option').prop('disabled', false);

            // Disable the selected option in the second dropdown
            if (selectedValue) {
                $('#from_site option[value="' + selectedValue + '"]').prop('disabled', true);
            }

            // Refresh the second dropdown to apply the changes
            $("#from_site").select2({
            placeholder: "Select site"
            , allowClear: true
            , maximumSelectionLength: 1
        , });
        });


        $("#copy_materials").validate({
            errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            from_site: {
                required: true
            }
            , to_site: {
                required: true
            }


        }
        , messages: {
            from_site: {
                required: "Please Select From Site Name"
            }
            , to_site: {
                required: "Please Select To Site Name"
            }


        }
        , submitHandler: function(form, message) {

            redUrl = base_url + '/copy-site-materials';

            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {

                    if (res.status) {
                        $(".material-err").css("color", "#28a745");
                        $(".material-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);


                    } else {
                        // fp1.close();
                        $(".material-err").css("color", "red");
                        $(".material-err").html(res.msg);

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
</script>
<script>
    $('#scrollmodal').on('hidden.bs.modal', function(e) {
            // $('#machine_type').val(null).trigger('change'); // specific select2  in the modal
            $('#btn_title').html('Submit');

            $('.select2').val(null).trigger('change'); // all select2  in the modal
            document.getElementById("add_materials").reset();
            $(this)
                .find("textarea,select,select2")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end()
                .find("img")
                .prop("src", "")
                .end();

            var $add_machines = $('#add_materials');
            $add_machines.validate().resetForm();
            $add_machines.find('.error').removeClass('error');
            $add_machines.find('.invalid-feedback').remove();
            $add_machines.find('.is-invalid').removeClass('is-invalid');
            $("#add_materials").reset();
        })


        $('#material_type').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });
  $('#material_unit').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });
  $('#material_site').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });
        </script>


<script>
    $('#copyMaterialModal').on('hidden.bs.modal', function(e) {
            // $('#machine_type').val(null).trigger('change'); // specific select2  in the modal
            $('#btn_title').html('Submit');

            $('.select2').val(null).trigger('change'); // all select2  in the modal
            document.getElementById("copy_materials").reset();
            $(this)
                .find("textarea,select,select2")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end()
                .find("img")
                .prop("src", "")
                .end();

            var $add_machines = $('#copy_materials');
            $add_machines.validate().resetForm();
            $add_machines.find('.error').removeClass('error');
            $add_machines.find('.invalid-feedback').remove();
            $add_machines.find('.is-invalid').removeClass('is-invalid');
            $("#add_materials").reset();
        })


        $('#from_site').on('select2:select select2:unselect', function() {
            $(this).valid(); // Trigger validation
        });
        $('#to_site').on('select2:select select2:unselect', function() {
            $(this).valid(); // Trigger validation
        });

        </script>
</body>
</html>
