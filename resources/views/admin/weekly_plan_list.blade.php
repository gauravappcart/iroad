@include('admin/header')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<?php $prefix= $profile_data['prefix'];?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="text-success">Site Name</span> - <a href="{{$prefix.'/add-project-details?site_id='.$site_id}}"><span class="text-primary">{{ $site['site_name'] }}</span> </a> -Weekly Plan List</h1>
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

                    <br>
                    <a href="{{ $prefix.'/add-weekly-plan'.'?site_id='.($site_id).'&chainage_id='.($chainage_id) }}" class="btn btn-danger m-2">Add Weekly Plan</a>&nbsp;
                        {{-- <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Weekly Plan </button> --}}
                        <a href="{{ $prefix.'/add-project-details'.'?site_id='.$site_id }}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;
                        <!-- <strong class="card-title">Data Table</strong> -->

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Component Name</th>
                                    <th>Chainage</th>
                                    <th>Weekly Plan Start Date</th>
                                    <th>Weekly Plan End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weeklyplan_data as $key=>$value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$value['component_name']}}</td>
                                    <td>{{$value['chainage_from_length']}} To {{$value['chainage_to_length']}}</td>
                                    <td>{{$value['plan_start_date']}}</td>
                                    <td>{{$value['plan_end_date']}}</td>
                                    <td> <a href="{{ $prefix.'/view-weekly-plan'.'?site_id='.($site_id).'&chainage_id='.($chainage_id)."&site_weekly_plan_id=".($value['site_weekly_plan_id']) }}" class="btn btn-danger m-2">View Weekly Plan</a></td>

                                    {{-- <td>
                                        @foreach ($value['associated_monitering_tenders'] as $rowData)

                                       {{$data= $rowData['tender_item_id'] }},
                                        @endforeach

                                    </td>
                                    <td>{{ $value['monitored_tender_item'] }}</td>

                                    <td class="text-center">

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $value['component_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil "></i></button>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" onclick="delete_record({{ $value['monitor_tender_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>

                                    </td> --}}

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
                <h5 class="modal-title" id="scrollmodalLabel">Attach Tender Items To Monitering Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="add_tender_item_activity">

                @csrf

                {{-- <input type="hidden" value="{{$component_id}}" id="component_id" name="component_id">
                <input type="hidden" value="{{$chainage_id}}" id="chainage_id" name="chainage_id">
                <input type="hidden" value="{{$site_id}}" id="site_id" name="site_id">
                <input type="hidden" value="" id="monitor_tender_id" name="monitor_tender_id"> --}}

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monitering_activity" class=" form-control-label">Monitoring Activity</label>
                                        <select class="form-control select2 monitering_activity" id="monitering_activity" name="monitering_activity" multiple="multiple"  style="width: 100%" required>
                                            {{-- <option value="">Select</option> --}}

                                            {{-- @foreach ($activity_list as $options)
                                            <option value="{{$options->activity_id}}" {{$selectedActivityId==$options->activity_id?'selected':''}}>{{$options->activity_name}}</option>
                                            @endforeach --}}
                                        </select>

                                    </div>
                                </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tender_items" class=" form-control-label">Tender Items</label>
                                    <select class="form-control select2 tender_items" id="tender_items" name="tender_items[]"  multiple="multiple" style="width: 100%;" required>
                                        {{-- <option value="">Select</option> --}}
                                        {{-- @foreach ($tender_items_info as $options)
                                            @if(in_array($options->tender_item_id, $selectedTenderItemId))
                                                <option value="{{$options->tender_item_id}}" selected="true">{{$options->tender_item_info}}</option>
                                            @else
                                                 <option value="{{$options->tender_item_id}}">{{$options->tender_item_info}}</option>
                                            @endif
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>


                            <div class="row">
                                    <div class="col-lg-6">
                                        <label for="is_active" class="form-control-label">Is Active ?</label>
                                        <div class="form-group">

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

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                    <label for="radio-container" class=" form-control-label">Monitoring Items</label>
                                    <br>
                                    <div id="radio-container"></div>
                                </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monitor_item_unit" class=" form-control-label">Monitor Items Unit</label>
                                        <select class="form-control select2 monitor_item_unit" id="monitor_item_unit" name="monitor_item_unit"  multiple="multiple" style="width: 100%;" required>
                                            {{-- <option value="">Select</option> --}}
                                            {{-- @foreach ($monitoer_units as $options)
                                                @if(in_array($options->unit_id, $selectedTenderItemId))
                                                    <option value="{{$options->unit_id}}" selected="true">{{$options->unit_name}}</option>
                                                @else
                                                     <option value="{{$options->unit_id}}">{{$options->unit_name}}</option>
                                                @endif
                                            @endforeach --}}
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

      $('#items_table').DataTable({
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.material-nav').addClass('active');


        $("#monitering_activity").select2({
            placeholder: "Select activity"
            , allowClear: true,
            maximumSelectionLength: 1,
        });
        $("#monitor_item_unit").select2({
            placeholder: "Select unit"
            , allowClear: true,
            maximumSelectionLength: 1,
        });

        $('#tender_items').select2({
              allowClear: true
            , placeholder: "Select tender items"
        , });


                 // Handle the selection event
                 $('#tender_items').on('select2:select', function(e) {
                var selectedValue = e.params.data.id;
                var selectedText = e.params.data.text;

                // Check if the radio button already exists
                if ($('#radio-' + selectedValue).length === 0) {
                    // Append a new radio button
                    $('#radio-container').append(
                        '<div id="radio-container-' + selectedValue + '"><input type="radio" name="monitor_item" id="radio-' + selectedValue + '" value="' + selectedValue + '"> ' + selectedText + '</div>'
                    );
                }
            });

            // Handle the unselect event
            $('#tender_items').on('select2:unselect', function(e) {
                var unselectedValue = e.params.data.id;

                // Remove the associated radio button
                $('#radio-container-' + unselectedValue).remove();
            });
// --------------------------------------------------------------------

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
        $('#add_tender_item_activity')[0].reset();
        $('#component_tender_id').val('');
        $('#tender_items').val(null).trigger('change');
        $('#monitering_activity').val(null).trigger('change');
        $('#monitor_item_unit').val(null).trigger('change');
        $('#btn_title').html('Submit');
    }
    var tender_items = "";

    console.log(tender_items)
    var app_base_url={!!json_encode(url('/')) !!}
    function get_data(component_id) {
        $("#component_id").val(component_id);
        // console.log(component_id);
        var result = tender_items.find(item => item.component_id === component_id);
        console.log(result);
        var selectedOptions = [];
        result.associated_unit_type.forEach(element => {
            selectedOptions.push(element.unit_id)
        });
        $("#tender_item_info").val(result.tender_item_info);
        $("#tender_item_info").text=result.tender_item_info
        $("#tender_item_qty").val(result.tender_item_qty);
        $("#tender_item_cost").val(result.tender_item_cost);
        $('#tender_items').val(result.tender_items).trigger('change');
        $('#btn_title').html('Update');
        $(result.is_active == 1 ? '#yes' : '#no').prop("checked", true);
    }
    $("#add_tender_item_activity").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            monitering_activity: {
                required: true
            },
            monitor_item_unit: {
                required: true
            }
            , "tender_items[]": {
                required: true
            },
            is_active:{
                required:true
            },
            'monitored_tender_item':{
                required:true
            }


        }
        , messages: {

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/attach-tender-items-to-monitoring-activity';
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


    function delete_record(monitor_tender_id) {
        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/attach-tender-items-to-monitoring-activity';

            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , monitor_tender_id: monitor_tender_id
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

    $('#scrollmodal').on('hidden.bs.modal', function(e) {
        document.getElementById("add_tender_item_activity").reset();
        $('.select2').val(null).trigger('change');
        $('#add_tender_item_activity')[0].reset();
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
        var $add_tender_item_activity = $('#add_tender_item_activity');
        $add_tender_item_activity.validate().resetForm();
        $add_tender_item_activity.find('.error').removeClass('error');

    })

</script>



</body>
</html>
