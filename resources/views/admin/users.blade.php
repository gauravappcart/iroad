@include('admin/header')

<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        .chosen-container .chosen-single{
            height: 35px;
        }

        .chosen-single span{
            margin-top: 4px;
        }
        </style>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Users</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <!-- <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol> -->
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
                                <button type="button" class="btn btn-success btn-sm add-btn" data-toggle="modal" data-target="#scrollmodal"> Add User </button>
                                <button type="button" onclick="history.back()" class="btn btn-success btn-sm pull-right">Back</button>
                                <!-- <strong class="card-title">Data Table</strong> -->
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key=>$user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user['first_name']." ".$user['last_name'] }}</td>
                                            <td>{{ !empty($user['role']) ? $user['role']['role_name'] : ""  }}</td>
                                            <td>{{ !empty($user['designation']) ? $user['designation']['designation_name'] : ""  }}</td>
                                            <td>{{ $user['email_id'] }}</td>
                                            <td>{{ $user['mobile'] }}</td>
                                            <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $user['is_active']==1 ? '#44b749' : '#dc3545'}}" title="{{ $user['is_active']==1 ? 'Active' : 'Inactive' }}" aria-hidden="true"></i></td>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                    <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $user['user_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                    <button type="button" onClick="delete_user({{ $user['user_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
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



        <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <!-- <div class="modal-header"> -->
                        <div class="modal-header" style="display:flex">
                            <h5 class="modal-title" id="scrollmodalLabel">User Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <form id="add_user">
                        @csrf

                        <input type="hidden" value="" id="user_id" name="user_id">

                        <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name" class=" form-control-label">FIRST NAME<span style="color:red">*</span></label>
                                            <input type="text" id="first_name" name="first_name" placeholder="Ex. John,Dave.etc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name" class=" form-control-label">LAST NAME<span style="color:red">*</span></label>
                                            <input type="text" id="last_name" name="last_name" placeholder="Ex. Doe,William.etc" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mobile" class=" form-control-label">PHONE NUMBER<span style="color:red">*</span></label>
                                            <input type="text" id="mobile" name="mobile" placeholder="Ex. 999999999.etc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email_id" class=" form-control-label">EMAIL ID<span style="color:red">*</span></label>
                                            <input type="email" id="email_id" name="email_id" placeholder="Ex. abc@gmail.com.etc" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dept" class=" form-control-label">DEPARTMENT<span style="color:red">*</span></label>
                                            <!-- <input type="text" id="dept" name="dept" placeholder="Ex. 999999999.etc" class="form-control"> -->
                                            <select name="department" id="department" data-placeholder="Please Select Department" class="form-control select2 select2" tabindex="1">
                                                {{-- <option value="" label="Please Select User Type"></option> --}}
                                                @foreach($roles as $role_id=>$role)
                                                <option value="{{ $role['role_id'] }}">{{ $role['role_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="design" class="form-control-label">DESIGNATION<span style="color:red">*</span></label>
                                            <select name="designation" id="designation"  data-placeholder="Please Select User Designation" class="form-control select2 select2" tabindex="1">
                                                {{-- <option value="" label="Please Select User Designation"></option> --}}
                                                @foreach($designations as $design_id=>$design)
                                                <option value="{{ $design['designation_id'] }}">{{ $design['designation_name'] }}</option>
                                                @endforeach
                                            </select>
                                            <!-- <input type="text" id="design" name="design" placeholder="Ex. abc@gmail.com.etc" class="form-control"> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password" class=" form-control-label">PASSWORD<span id="pass_span" style="color:red;display:contents;" >*</span></label>
                                            <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="cpassword" class=" form-control-label">CONFIRM PASSWORD<span id="cpass_span" style="color:red;display:contents;">*</span></label>
                                            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="display:block">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="cpassword" class=" form-control-label">SITES</label><br>

                                            @foreach($sites as $key=>$site)
                                            <label class="switch switch-default switch-primary mr-2">
                                                <input type="checkbox" id="site{{$site['site_id']}}" name="sites[]" value="{{ $site['site_id'] }}" class="switch-input">
                                                <span class="switch-label">{{ $site['site_name'] }}</span><span class="switch-handle"></span>
                                            </label>
                                            @endforeach

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

                                <div class="w-100 text-center"><span class="user-err"></span></div>

                            </div>
                        </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-title">Submit</button>
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
    <script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
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
            $('.user-nav').addClass('active');

          $('#bootstrap-data-table-export').DataTable();

        //   $("#department").select2({
        //     placeholder: "Select Department"
        //     , allowClear: true,
        //     maximumSelectionLength: 1,
        // });

        // $("#designation").select2({
        //     placeholder: "Select Designation"
        //     , allowClear: true,
        //     maximumSelectionLength: 1,
        // });
          jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });

        $(".add-btn").click(function(){
            $('#add_user')[0].reset();
            $('#user_id').val('');

            $("input:checkbox").removeAttr("checked");

            $("#designation").val("");
            $("#designation").trigger('chosen:updated');
            $("#department").val("");
            $("#department").trigger('chosen:updated');

            $('.btn-title').html('Submit');
        });



      } );

      $.validator.setDefaults({ ignore: ":hidden:not(select)" }) //for all select

      $.validator.addMethod(
                    "mobileValidation",
                    function(value, element) {
                        // return !/^\d{8}$|^\d{10}$/.test(value) ? false : true;
                        return !/^\d{10}$|^\d{10}$/.test(value) ? false : true;
                    },
                    "Mobile number invalid"
                );

                jQuery.validator.addMethod("indianMobile", function(value, element) {
                    return this.optional(element) || /^[789]\d{9}$/.test(value.trim());
                    }, "Please enter a valid Indian mobile number.");
                // Add custom validation method to allow only letters
                jQuery.validator.addMethod("lettersonly", function(value, element) {
                                return this.optional(element) || /^[a-zA-Z]+$/.test(value.trim());
                            }, "Please enter only letters");
    $("#add_user").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            first_name: {
             required: true,
             lettersonly: true // Custom rule to allow only letters
            },
            last_name: {
              required: true,
              lettersonly: true // Custom rule to allow only letters
            },
            mobile: {
             required: true,
             mobileValidation: $("#mobile").val(),
             number:true,
             indianMobile:true
            },
            email_id: {
             required: true,
             email:true
            },
            password: {
              minlength:6,
              required: function(element){
                    return $("#user_id").val()=="";
              }
            },
            cpassword: {
                required: function(element){
                    return $("#user_id").val()=="";
              } ,
                equalTo: "#password"
            },
            department: {
              required: true
            },
            designation: {
              required: true
            },
            is_active:{
                required:true
            }

        },
        messages: {

            first_name: {
              required: "Please Enter First Name",
              lettersonly: "Your first name must contain only letters"
            },
            last_name: {
             required: "Please Enter Last Name",
             lettersonly: "Your last name must contain only letters"
            },
            mobile: {
              required: "Please Enter Mobile No",
              indianMobile:"Please enter a valid Indian mobile number."
            },
            email_id: {
               required: "Please Enter Email ID",
            },
            password: {
             required: "Please Enter Password"
            },
            cpassword: {
             required: "Please Enter Confirm Password",
             equalTo: "Confrim Password Does Not Match"
            },
            department: {
             required: "Please Select Department"
            },
            designation: {
              required: "Please Select Designation"
            },
            is_active:{
                required:"Please Select Option"
            }

        },
        submitHandler: function (form, message) {

            redUrl = base_url+'/add-user';

            fd=new FormData(form);

            $.ajax({
                url: redUrl,
                type: 'post',
                data: fd,
                dataType: 'json',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function (res) {

                    if (res.status) {

                        $(".user-err").css("color", "#28a745");
                        $(".user-err").html(res.msg);
                        setTimeout(function () {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".user-err").css("color", "red");
                        $(".user-err").html(res.msg);

                        setTimeout(function () {
                            // location.reload();
                        }, 3000);
                    }

                },
                error: function (xhr, textStatus, errorThrown) {

                }
            });

        }
    });

    var users=JSON.parse('<?php echo json_encode($users) ?>');

    function get_data(user_id)
      {
          var result = users.find(item => item.user_id === user_id);

          console.log(result);
          $("input:checkbox").removeAttr("checked");
          $("#first_name").val(result.first_name);
          $("#last_name").val(result.last_name);
          $("#mobile").val(result.mobile);
          $("#email_id").val(result.email_id);
          $("#designation").val(result.designation_id);
          $("#designation").trigger('chosen:updated');
          $("#department").val(result.user_role);
          $("#department").trigger('chosen:updated');
            $("#pass_span").css('display', 'none');
            $("#cpass_span").css('display', 'none');
          $("#user_id").val(user_id);
          $('.btn-title').html('Update');
          if(result.is_active==1){
              $("#yes").prop('checked',true)
              $("#no").prop('checked',false)
          }
          if(result.is_active==0){
              $("#no").prop('checked',true)
              $("#yes").prop('checked',false)
          }
            $.each(result.users_sites, function (key, val) {
               $("#site"+val.site_id).prop('checked',true)
            });

      }


function delete_user(user_id)
{
    if(confirm("Do you want to delete user ?"))
    {
        redUrl = redUrl =  base_url+'/add-user';
        $.ajax({
              url: redUrl,
              type: 'post',
              data: { _token: "{{ csrf_token() }}", delete:1, user_id:user_id},
              dataType: 'json',
              success: function (res) {

                  if (res.status) {

                      $(".user-err").css("color", "#28a745");
                      $(".user-err").html(res.msg);
                      setTimeout(function () {
                         location.reload();
                      }, 500);


                  } else {
                      // fp1.close();
                      $(".user-err").css("color", "red");
                      $(".user-err").html(res.msg);

                      setTimeout(function () {
                      }, 3000);
                  }


              },
              error: function (xhr, textStatus, errorThrown) {

              }
          });
    }
}

  </script>
<script>
$('#scrollmodal').on('hidden.bs.modal', function(e) {
        // $('#machine_type').val(null).trigger('change'); // specific select2  in the modal
        $('.select2').val(null).trigger('change'); // all select2  in the modal
        document.getElementById("add_user").reset();
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

        var $add_machines = $('#add_user');
        $add_machines.validate().resetForm();
        $add_machines.find('.error').removeClass('error');
        $add_machines.find('.invalid-feedback').remove();
        $add_machines.find('.is-invalid').removeClass('is-invalid');
        $("#add_user").reset();
    })

     // Listen for the select2:select event
  $('#department').on('select2:select', function(e) {
    // Remove the error label
    // $this.removeClass('error');
  });

  $('#department').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });
  $('#designation').on('select2:select select2:unselect', function() {
    $(this).valid(); // Trigger validation
  });

  $('.add-btn').on('click', function () {
    $("#pass_span").css('display', 'contents');
    $("#cpass_span").css('display', 'contents');
            });
</script>

</body>
</html>

