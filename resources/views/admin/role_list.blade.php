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
                        <h1>Role/Department List</h1>
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
                        <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Role/Department </button>
                        {{-- <button type="button" onclick="{}" class="btn btn-success btn-sm pull-right">Back</button> --}}
                        <a href="{{ $prefix.'/import-roles'}}" class="btn btn-danger m-2">Import Roles/Departments</a> &nbsp;
                        <a href="{{ $prefix.'/dashboard'}}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;
                        <!-- <strong class="card-title">Data Table</strong> -->

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Role/Department Name</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key=>$value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value['role_name'] }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['created_at'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['updated_at'])) }}</td>
                                    <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $value['is_active']==1 ? '#44b749' : '#dc3545'}}" aria-hidden="true"></i></td>
                                    {{-- <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $value['deleted_at']==NULL ? '#44b749' : '#dc3545'}}" aria-hidden="true"></i></td> --}}


                                    <td class="text-center">

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $value['role_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil "></i></button>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" onclick="delete_role({{ $value['role_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title" id="scrollmodalLabel">Role/Department Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="add_role">

                @csrf

                <input type="hidden" value="" id="role_id" name="role_id">


                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="role_name" class=" form-control-label">Role/Department Name<span style="color: red">*</span></label>
                                        <input type="text" id="role_name" name="role_name" placeholder="Enter Role/Department Name" class="form-control">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="is_active" class="form-control-label">Is Active ?<span style="color: red">*</span></label>
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




                            <div class="w-100 text-center"><span class="role-err"></span></div>

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
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.material-nav').addClass('active');

    });
    function add_data() {
        $('#add_role')[0].reset();
        $('#role_id').val('');
        $('#btn_title').html('Submit');
    }
    var rolesData = JSON.parse('<?php echo json_encode($roles) ?>');

    var app_base_url={!!json_encode(url('/')) !!}
    function get_data(role_id) {
        $("#role_id").val(role_id);
        // console.log(role_id);
        var result = rolesData.find(item => item.role_id === role_id);
        console.log(result);

        $("#role_name").val(result.role_name);

        $('#btn_title').html('Update');
        $(result.is_active == 1 ? '#yes' : '#no').prop("checked", true);

    }
    $("#add_role").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            role_name: {
                required: true
            }
           ,
            is_active:{
                required:true
            },


        }
        , messages: {
            role_name: {
                required: "Please Enter Role/Department Name"
            }
           ,
            is_active:{
                required:"Please Select Option"
            },
        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-roles';
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
                        $(".role-err").css("color", "#28a745");
                        $(".role-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".role-err").css("color", "red");
                        $(".role-err").html(res.msg);
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


    function delete_role(role_id) {
        if (confirm("Do you want to delete role ?")) {
            redUrl = base_url + '/add-roles';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , role_id: role_id
                }
                , dataType: 'json',
                headers: {'X-CSRF-TOKEN': csrfToken}
                , success: function(res) {
                    if (res.status) {
                        $(".role-err").css("color", "#28a745");
                        $(".role-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        // fp1.close();
                        $(".role-err").css("color", "red");
                        $(".role-err").html(res.msg);
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
    //     document.getElementById("add_role").reset();
    //     $(this)
    //         .find("textarea,select")
    //         .val('')
    //         .end()
    //         .find("input[type=checkbox], input[type=radio]")
    //         .prop("checked", "")
    //         .end()
    //         .find("img")
    //         .prop("src", "")
    //         .end();

    //     var $add_role = $('#add_role');
    //     $add_role.validate().resetForm();
    //     $add_role.find('.error').removeClass('error');
    // })



    $('#scrollmodal').on('hidden.bs.modal', function(e) {
        // $('#machine_type').val(null).trigger('change'); // specific select2  in the modal
        $('.select2').val(null).trigger('change'); // all select2  in the modal
        document.getElementById("add_role").reset();
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
        var $add_role = $('#add_role');
        $add_role.validate().resetForm();
        $add_role.find('.error').removeClass('error');
        $add_role.find('.role-err').text('');
        $add_role.find('.invalid-feedback').remove();
        $add_role.find('.is-invalid').removeClass('is-invalid');
        $("#add_role").reset();
    })

</script>



</body>
</html>
