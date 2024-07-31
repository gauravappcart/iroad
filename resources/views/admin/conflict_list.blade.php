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
                        <h1>Conflict List</h1>
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
                        {{-- <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Unit </button> --}}
                        {{-- <button type="button" onclick="{}" class="btn btn-success btn-sm pull-right">Back</button> --}}
                        <a href="{{ $prefix.'/dashboard'}}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;
                        <!-- <strong class="card-title">Data Table</strong> -->

                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger" id="error-alert">
                            {{ $errors->first() }}
                        </div>
                         @endif
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Site Name</th>
                                    <th>Conflicts Title</th>
                                    <th>Conflicts Description</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Resolved/Unresolved</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conflicts as $key=>$value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value['sites']['site_name'] }}</td>
                                    <td>{{ $value['subject'] }}</td>
                                    <td>{{$value['conflict_description'] }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['created_at'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['updated_at'])) }}</td>
                                    <td class="text-center">{{ $value['is_active']==1 ? 'Resolved' : 'Unresolved' }}</i></td>
                                    {{-- <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $value['deleted_at']==NULL ? '#44b749' : '#dc3545'}}" aria-hidden="true"></i></td> --}}


                                    <td class="text-center">

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                {{-- <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $value['conflict_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil "></i></button> --}}
                                                <a href="{{ $prefix.'/get-conflicts-details/?id='.$value['conflict_id']}}" class="btn btn-success btn-sm pull-right">View</a> &nbsp;

                                            </div>
                                        </div>
                                        {{-- <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" onclick="delete_unit({{ $value['unit_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div> --}}

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



{{-- <div class="modal fade" id="scrollmodal" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
            <div class="modal-header" style="display:flex">
                <h5 class="modal-title" id="scrollmodalLabel">Units Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="add_units">

                @csrf

                <input type="hidden" value="" id="unit_id" name="unit_id">


                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="unit_name" class=" form-control-label">Unit Name<span style="color:red">*</span></label>
                                        <input type="text" id="unit_name" name="unit_name" placeholder="Enter Measuring Unit Name" class="form-control">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="unit_for" class="form-control-label">Unit For<span style="color:red">*</span></label>
                                    <div class="form-group">

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="tender_item_unit_radio" type="radio" name="unit_for" id="inlineRadio1" value="1">
                                    <label class="form-check-label"  for="inlineRadio1">Tender Items</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="monitor_activity_unit_radio" type="radio" name="unit_for" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Monitor Activity</label>
                                    </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="is_active" class="form-control-label">Is Active ?<span style="color:red">*</span></label>
                                        <div class="">

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="yes" type="radio" name="is_active" id="inlineRadio1" value="1">
                                        <label class="form-check-label"  for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="no" type="radio" name="is_active" id="inlineRadio2" value="0">
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
</div> --}}

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
      var csrfToken = $('input[name="_token"]').attr('value');

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 2000); // 2000 milliseconds = 2 seconds
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.material-nav').addClass('active');


        $("#tender_item_unit").select2({
            placeholder: "Select type"
            , allowClear: true,
            maximumSelectionLength: 1,
        });

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
        $('#add_units')[0].reset();
        $('#unit_id').val('');
        $('#tender_item_unit').val(null).trigger('change');
        $('#monitering_activity').val(null).trigger('change');
        $('#btn_title').html('Submit');
    }
    //  var unitsData = JSON.parse('');
    // <?php echo json_encode('') ?>
    //$units
    console.log('Units Data');
    console.log(unitsData)
    var app_base_url={!!json_encode(url('/')) !!}
    function get_data(unit_id) {
        $("#unit_id").val(unit_id);
        // console.log(unit_id);
        var result = unitsData.find(item => item.unit_id === unit_id);
        console.log(result);

        $("#unit_name").val(result.unit_name);

        $('#btn_title').html('Update');
        $(result.is_active == 1 ? '#yes' : '#no').prop("checked", true);
        $(result.unit_for == 1 ? '#tender_item_unit_radio' : '#monitor_activity_unit_radio').prop("checked", true);
    }
    $("#add_units").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            unit_name: {
                required: true
            }
           ,
            is_active:{
                required:true
            },
            unit_for:{
                required:true
            }

        }
        , messages: {
            unit_name: {
                required: "Please Enter Unit Name"
            }
           ,
            is_active:{
                required:"Please Select Option"
            },
            unit_for:{
                required:"Please Select Option"
            }
        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-units';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json',
                headers: {'X-CSRF-TOKEN': csrfToken},
                contentType: false, // The content type used when sending data to the server.
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


    function delete_unit(unit_id) {
        if (confirm("Do you want to delete unit ?")) {
            redUrl = base_url + '/add-units';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , unit_id: unit_id
                }
                , dataType: 'json',
                headers: {'X-CSRF-TOKEN': csrfToken}
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

    // $('#scrollmodal').on('hidden.bs.modal', function(e) {

    //     document.getElementById("add_units").reset();
    //     $(this)
    //         .find("textarea,select")
    //         .val('')
    //         .end()
    //         .find("input[type=checkbox], input[type=radio],")
    //         .prop("checked", "")
    //         .end()
    //         .find("img")
    //         .prop("src", "")
    //         .end();

    //     var $add_units = $('#add_units');
    //     $add_units.validate().resetForm();
    //     $add_units.find('.material-err').text('');
    //     $add_units.find('.error').removeClass('error');


    // })

</script>
<script>
    $('#scrollmodal').on('hidden.bs.modal', function(e) {
      document.getElementById("add_units").reset();
      $(this)
          .find("textarea,select,input")
          .val('')
          .end()
          .find("input[type=checkbox], input[type=radio]")
          .prop("checked", "")
          .end()
          .find("img")
          .prop("src", "")
          .end();

      var $add_component = $('#add_units');
      $add_component.validate().resetForm();
      $add_component.find('.error').removeClass('error');
  })
</script>


</body>
</html>
