@include('admin/header')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Project Components</h1>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Material</a></li>
                                    <li class="active">Material List</li>
                                </ol>
                            </div>
                        </div>
                    </div> --}}
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Component </button>
                        <button type="button" onclick="history.back()" class="btn btn-success btn-sm pull-right">Back</button>
                        <!-- <strong class="card-title">Data Table</strong> -->
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Component Name</th>
                                    <th>Project Type</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projectComponents as $key=>$value)
                                <tr>
                                    <td>{{ $value['component_name'] }}</td>
                                    <td>{{ $value['project_type_name'] }}</td>
                                    {{-- <td>{{ $value['material_unit'] }}</td>
                                    <td>{{ $value['material_cost'] }}</td> --}}
                                    <td>{{ date('Y-m-d',strtotime($value['created_at'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['updated_at'])) }}</td>

                                    {{-- <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $value['is_active']==1 ? '#44b749' : '#dc3545'}}" title="{{ $value['is_active']==1 ? 'Active' : 'Inactive' }}" aria-hidden="true"></i></td> --}}
                                    <td class="text-center">

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $value['component_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil "></i></button>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" onclick="delete_material({{ $value['component_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button>
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



<div class="modal fade" id="scrollmodal" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
            <div class="modal-header" style="display:flex">
                <h5 class="modal-title" id="scrollmodalLabel">Component Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="add_component">

                @csrf
                <input type="hidden" value="" id="component_id" name="component_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="project_type" class=" form-control-label">PROJECT TYPE<span style="color:red">*</span></label>
                                        <select class="form-control select2 project_type" id="project_type" name="project_type" multiple="multiple"  style="width: 100%">
                                            {{-- <option value="">Select</option> --}}

                                            @foreach ($projectTypes as $options)
                                            <option value="{{$options->project_type_id}}" {{$selectedProjectTypes==$options->project_type_id?'selected':''}}>{{$options->project_type_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monitering_activity" class=" form-control-label">Monitoring Activity<span style="color:red">*</span></label>
                                        <select class="form-control select2 monitering_activity" id="monitering_activity" name="monitering_activity[]"  multiple="multiple" style="width: 100%;" >
                                            {{-- <option value="">Select</option> --}}
                                            @foreach ($monitoringActivities as $options)

                                            @if(in_array($options->activity_id, $selectedActivityId))
                                            <option value="{{$options->activity_id}}" selected="true">{{$options->activity_name}}</option>
                                            @else
                                            <option value="{{$options->activity_id}}">{{$options->activity_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="component_name" class=" form-control-label">COMPONENT NAME<span style="color:red">*</span></label>
                                        <input type="text" id="component_name" name="component_name" placeholder="Ex.Cement,Steel.etc" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label class=" form-control-label">Component Icon <span style="color:red">*</span></label>
                                    <input type="file" class="form-control" name="component_icon_file" id="component_icon_file" value="" accept="image/*" data-msg-accept="{{config('constants.IMAGE_FILE_TYPE_MSG')}}" onchange="readURL(this);">
                                    @error('component_icon_file')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <img class="mg-fluid rounded px-1 icon" id="img_upload" src="" width="90px">
                                    {{-- <img class="mg-fluid img-thumbnail rounded px-1 icon" id="img_upload" src="" width="90px"> --}}

                                </div>
                                </div>
                            </div>

                            <div class="mb-2 " id="inputContainer"></div>
                            <button class="btn btn-sm btn-success" type="button" id="addInputBtn">Add Extra Field</button>

                            {{-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Dimentions Type<span style="color:red">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox" type="checkbox" name='dimentionstype[]' value="1" id="heightwidth">
                                            <label class="form-check-label" for="heightwidth">
                                                Height & Width
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox" type="checkbox" name='dimentionstype[]' value="2" id="chainage">
                                            <label class="form-check-label" for="chainage">
                                                Chainage
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="row">
                                    <div class="col-lg-6">
                                        <label for="is_active" class="form-control-label">Is Active ?</label>
                                        <div class="form-group">

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="yes" type="radio" name="is_active" id="inlineRadio1" checked value="Yes">
                                        <label class="form-check-label"  for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="no" type="radio" name="is_active" id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>

                                        </div>
                                    </div>
                                </div> --}}

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



<div class="modal fade" id="import_modal" tabindex="-1" role="dialog" aria-labelledby="import_modalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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

                        <div class="row clearfix">
                            <div class="col-md-4 col-sm-6"></div>
                            <div class="col-md-4 col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <!-- <label>Upload File</label>  -->
                                    <input type="file" accept=".xls,.xlsx,.xlsm" id="userfile" name="userfile" data-placeholder="Upload File" class="form-control">
                                </div>
                            </div> <!-- /.col-md-4 -->
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-8 col-sm-8">
                                <p style="font-size:13px; color: #000;">
                                    Note*- To upload file please ensure that your columns names are spelt the same as the headers given below. You must have all these headers in your import file to successfully import Material. If you do not have information to populate specific columns, you may leave them blank but do not remove whole column.</p>
                            </div>
                        </div>


                        <p class="text-center">Excel Import Layout <a href="{{asset('assets/files/add_material_sample_file.xlsx')}}" download="" style="color:black"> <u>Download Template</u></a><br>

                        </p>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary upload-btn">Upload</button>
            </div>
        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/common.js')}}"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_upload').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.material-nav').addClass('active');


        $("#project_type").select2({
            placeholder: "Select type"
            , allowClear: true,
            maximumSelectionLength: 1,
        });
        // $('.project_type').select2({
        //     // data: JSON.parse('<?php echo json_encode(array_column($projectTypes, 'project_type_name')) ?>'),
        //     // tags: true,
            // maximumSelectionLength: 1,
        //     // tokenSeparators: [',', ' '],
        //     // minimumInputLength: 3,
        //     allowClear: true,
        //     placeholder: "Select Type",
        // });
        $('.monitering_activity').select2({
            // data: JSON.parse('<?php echo json_encode(array_column($projectTypes, 'project_type_name')) ?>'),
            // tags: true,
            // maximumSelectionLength: 1,
            // // tokenSeparators: [',', ' '],
            // minimumInputLength: 3,
            allowClear: true
            , placeholder: "Select activity"
        , });


        // $(".upload-btn").click(function() {

        //     var fd = new FormData();
        //     var files = $('#userfile')[0].files;

        //     redUrl = base_url + '/material-import';

        //     // Check file selected or not
        //     if (files.length > 0) {
        //         fd.append('file', files[0]);
        //         fd.append('_token', "{{ csrf_token() }}");

        //         $.ajax({
        //             url: redUrl
        //             , type: 'post'
        //             , data: fd
        //             , contentType: false
        //             , processData: false
        //             , success: function(response) {
        //                 if (response != 0) {
        //                     $("#img").attr("src", response);
        //                     $(".preview img").show(); // Display image element
        //                 } else {
        //                     alert('file not uploaded');
        //                 }
        //             }
        //         , });

        //     } else {
        //         alert("Please select a file.");
        //     }
        // });

    });



    function add_data() {
        var inputContainer = $('#inputContainer')
        inputContainer.empty();
        $('#add_component')[0].reset();
        $('#component_id').val('');
        $('#project_type').val(null).trigger('change');
        $('#monitering_activity').val(null).trigger('change');
        $('#btn_title').html('Submit');
    }
    var projectComponents = JSON.parse('<?php echo json_encode($projectComponents) ?>');
    var monitoringActivities = JSON.parse('<?php echo json_encode($monitoringActivities) ?>');
    var units = JSON.parse('<?php echo json_encode($units) ?>');
    var app_base_url={!!json_encode(url('/')) !!}
    function get_data(component_id) {
        $("#component_id").val(component_id);
        // alert(component_id);
        var result = projectComponents.find(item => item.component_id === component_id);
        var selectedOptions = [];
        //   console.log(result);
        if (result.component_icon_file) {
            image_url = app_base_url + '/public/' + result.component_icon_file;
            document.getElementById("img_upload").src = image_url
        }
        result.associated_monitering_activity.forEach(element => {
            selectedOptions.push(element.monitoring_activity_id)
        });
        $('#inputContainer').empty();
        result.associated_extra_fields.forEach(element => {
            createInputGroup(element.component_extra_field_id,element.field_name,element.unit)
        });
        $("#component_name").val(result.component_name);
        $('#project_type').val(result.project_type_id).trigger('change');
        $('#btn_title').html('Update');
        $('#monitering_activity').trigger('change');
        $('#monitering_activity').find('option').each(function(i, e) {
            if ($.inArray(parseInt($(e).val()), selectedOptions) !== -1) {
                $(e).prop('selected', true);
                $(e).prop('selectedIndex', $(e).val());
            }
        });
        $('#monitering_activity').trigger('change');


        // selectedcheckboxvalue=result.dimentionstype.split(",")
        // selectedcheckboxvalue.forEach(element => {
        //     $(".checkbox").each(function() {
        //     var checkboxValue = $(this).val();
        //     // Check the checkbox if its value matches any value in the array
        //     if (element==checkboxValue) {
        //         $(this).prop("checked", true);
        //     }
        // });
        // });
        // $(result.is_active == 1 ? '#yes' : '#no').prop("checked", true);
    }


    $("#add_component").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            component_name: {
                required: true
            }
            , project_type: {
                required: true
            }
            , 'monitering_activity[]': {
                required: true
            }
            , component_icon_file: {
                required: function(element) {
                    if ($("#img_upload").attr('src') !== '') {
                        return false;
                    } else {
                        return true;
                    }
                },
                extension: '{{config('constants.IMAGE_FILE_TYPE')}}',

            },
            "dimentionstype[]":{
                required:true
            }

        }
        , messages: {
            component_name: {
                required: "Please Enter Component Name"
            }
            , project_type: {
                required: "Please Select Project Type"
            },
            'monitering_activity[]': {
                required: "Please Select Monitoring Activity "
            },
            component_icon_file:{
                required:"Please Select Icon Image",
                extension:'{{config('constants.IMAGE_FILE_TYPE_MSG')}}',
            }


        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-component';

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
                        }, 2000);


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


    function delete_material(component_id) {
        if (confirm("Do you want to delete component ?")) {
            redUrl = base_url + '/add-component';

            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , component_id: component_id
                }
                , dataType: 'json'
                , success: function(res) {

                    if (res.status) {

                        $(".material-err").css("color", "#28a745");
                        $(".material-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 2000);


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

    $('#scrollmodal').on('hidden.bs.modal', function(e) {
        document.getElementById("add_component").reset();
        $(this)
            .find("textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end()
            .find("img")
            .prop("src", "")
            .end();

        var $add_component = $('#add_component');
        $add_component.validate().resetForm();
        $add_component.find('.error').removeClass('error');
    })



     // Append input box to the modal
     $('#addInputBtn2').click(function() {
        //     $('#inputContainer').append(
        //         `<div class="row col"><div class="form-group m-2"><input class="form-control mb-2" type="text" name="dynamicInput[]" placeholder="Enter new field name" required></div>
        //         <div class="form-group m-2"><input class="form-control mb-2" type="text" name="dynamicInputUnit[]" placeholder="Enter unit" required> </div><div><button type="button">X</button></div></div><br>`);
        // });


        var inputGroup = $('<div class="input-group "></div>');
            var newInput = $('<div class="row"><div class="form-group m-2"><input class="form-control" type="text" name="dynamicInput[]" placeholder="Enter field name"></div>');


            // var newInputUnit = $('<div class="form-group m-2"><input class="form-control" type="text" name="dynamicInputUnit[]" placeholder="Enter unit"></div>');
            var n=$('<div class="form-group m-2">');
            var newInputUnit = $('<select class="select2 form-control" name="dynamicInputUnit[]" style="width: 200px;"></select>');
                    // Populate the select element with options
                    units.forEach(function(option) {
                        var optionElement = $('<option></option>').attr('value', option.unit_id).text(option.unit_name);
                        newInputUnit.append(optionElement);
                    });
                    var m=$('</div>');
            var removeButton = $('<div class="form-group m-2"><button type="button">Remove</button></div></div>');
        removeButton.click(function() {
                inputGroup.remove();
            });

            inputGroup.append(newInput);
            inputGroup.append(n);
            inputGroup.append(newInputUnit);
            inputGroup.append(m);
            inputGroup.append(removeButton);
            $('#inputContainer').append(inputGroup);
        })






        // Append input box to the modal
     $('#addInputBtn').click(function() {
        //     $('#inputContainer').append(
        //         `<div class="row col"><div class="form-group m-2"><input class="form-control mb-2" type="text" name="dynamicInput[]" placeholder="Enter new field name" required></div>
        //         <div class="form-group m-2"><input class="form-control mb-2" type="text" name="dynamicInputUnit[]" placeholder="Enter unit" required> </div><div><button type="button">X</button></div></div><br>`);
        // });


        var inputGroup = $('<div class="input-group "></div>');
            var newInput = $('<div class="row"><div class="form-group m-2"><input class="form-control" type="text" name="dynamicInput[]" placeholder="Enter field name"></div>');


            // var newInputUnit = $('<div class="form-group m-2"><input class="form-control" type="text" name="dynamicInputUnit[]" placeholder="Enter unit"></div>');
            var n=$('<div class="form-group m-2">');
            var newInputUnit = $('<select class="select2 form-control" name="dynamicInputUnit[]" style="width: 200px;"></select>');
                    // Populate the select element with options
                    units.forEach(function(option) {
                        var optionElement = $('<option></option>').attr('value', option.unit_id).text(option.unit_name);
                        newInputUnit.append(optionElement);
                    });
                    var m=$('</div>');
            var removeButton = $('<div class="form-group m-2"><button class="btn btn-sm btn-danger" type="button">Remove</button></div></div>');
        removeButton.click(function() {
                inputGroup.remove();
            });

            inputGroup.append(newInput);
            n.append(newInputUnit);
            inputGroup.append(n);
            m.append(newInputUnit);
            inputGroup.append(removeButton);
            $('#inputContainer').append(inputGroup);
        })




        function createInputGroup(component_extra_field_id,field_name,unit) {

          var inputGroup = $('<div class="input-group "></div>');
            var newInput = $('<div class="row"><div class="form-group m-2"><input class="form-control" type="text" name="dynamicInput[]" value="' + field_name + '" placeholder="Enter field name"></div>');
            // var newInputUnit = $('<div class="form-group m-2"><input class="form-control" type="text" name="dynamicInputUnit[]" value="' + unit + '" placeholder="Enter unit"><input class="form-control" type="text" name="component_extra_field_id[]" value="' + component_extra_field_id + '" hidden></div>');
            var n=$('<div class="form-group m-2"> ');
            var newInputUnit = $('<select class="select2 form-control" name="dynamicInputUnit[]" style="width: 200px;"></select>');
                    // Populate the select element with options
                    units.forEach(function(option) {
                        var optionElement = $('<option></option>').attr('value', option.unit_id).text(option.unit_name);

                        if (option.unit_id == unit) {
                            optionElement.attr('selected', 'selected');
                        }
                        newInputUnit.append(optionElement);
                    });
                    var m=$('</div><input class="form-control" type="text" name="component_extra_field_id[]" value="' + component_extra_field_id + '" hidden>');


            var removeButton = $('<div class="form-group m-2"><button class="btn btn-sm btn-danger" onclick="removeSavedExtraField('+component_extra_field_id+')" type="button">Remove</button>');

        // removeButton.click(function() {
        //         inputGroup.remove();
        //     });

            inputGroup.append(newInput);
            n.append(newInputUnit);
            inputGroup.append(n);
            inputGroup.append(m);
            inputGroup.append(removeButton);
            $('#inputContainer').append(inputGroup);
    }
    var csrfToken = $('input[name="_token"]').attr('value');
    function removeSavedExtraField(component_extra_field_id){

        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/remove-component-extra-field';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    // , delete: 1
                    , component_extra_field_id: component_extra_field_id
                }
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , success: function(res) {
                    if (res.status) {
                        $(".material-err").css("color", "#28a745");
                        $(".material-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 2000);


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

    $('#project_type').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });
  $('#monitering_activity').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });
</script>



</body>
</html>
