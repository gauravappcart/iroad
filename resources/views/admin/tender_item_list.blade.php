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
                        <h1><span class="text-success">Site Name</span> - <a href="{{$prefix.'/add-project-details?site_id='.$site_id}}"><span class="text-primary">{{ $site['site_name'] }}</span> </a>-Tender Items List</h1>
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
                        <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Tender Item </button>
                        <a href="{{ $prefix.'/import-tender-items'.'?site_id='.$site_id.'&chainage_id='.$chainage_id}}" class="btn btn-danger m-2">Import Tender Item</a> &nbsp;
                        {{-- <button type="button" onclick="{}" class="btn btn-success btn-sm pull-right">Back</button> --}}
                        <a href="{{ $prefix.'/add-project-details'.'?site_id='.$site_id }}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;
                        <!-- <strong class="card-title">Data Table</strong> -->

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Tender Item Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Cost/Unit</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tender_items as $key=>$value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value['tender_item_info'] }}</td>
                                    <td>{{ $value['tender_item_qty'] }}</td>
                                    <td>{{ $value['associated_unit_type'][0]['unit_name'] }}</td>
                                    <td>{{ $value['tender_item_cost'] }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['created_at'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($value['updated_at'])) }}</td>
                                    <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $value['is_active']==1 ? '#44b749' : '#dc3545'}}" aria-hidden="true"></i></td>
                                    {{-- <td class="text-center"><i class="fa fa-circle fa-1" style="font-size :20px; color:{{ $value['deleted_at']==NULL ? '#44b749' : '#dc3545'}}" aria-hidden="true"></i></td> --}}


                                    <td class="text-center">

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" data-toggle="modal" data-target="#scrollmodal" onClick="get_data({{ $value['tender_item_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil "></i></button>
                                            </div>
                                        </div>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                <button type="button" onclick="delete_material({{ $value['tender_item_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title" id="scrollmodalLabel">Tender Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="add_tender_item">

                @csrf
                <input type="hidden" value="" id="tender_item_id" name="tender_item_id">
                <input type="hidden" value="{{$chainage_id}}" id="chainage_id" name="chainage_id">
                <input type="hidden" value="{{$site_id}}" id="site_id" name="site_id">
                <input type="hidden" value="{{$component_id}}" id="component_id" name="component_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tender_item_info" class=" form-control-label">Tender Item Description</label>
                                        <textarea type="text" id="tender_item_info" name="tender_item_info" placeholder="Enter Description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tender_item_qty" class=" form-control-label">Total Quantity</label>
                                        <input type="number" min=0 id="tender_item_qty" name="tender_item_qty" placeholder="Total Quantity" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tender_item_cost" class=" form-control-label">Cost per Unit</label>
                                        <input type="number" min=0 id="tender_item_cost" name="tender_item_cost" placeholder="Enter cost per unit" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tender_item_unit" class=" form-control-label">Unit TYPE</label>
                                        <select class="form-control select2 tender_item_unit" id="tender_item_unit" name="tender_item_unit" multiple="multiple"  style="width: 100%">
                                            {{-- <option value="">Select</option> --}}

                                            @foreach ($units as $options)
                                            <option value="{{$options->unit_id}}" {{$selectedUnitId==$options->unit_id?'selected':''}}>{{$options->unit_name}}</option>
                                            @endforeach
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
      var csrfToken = $('input[name="_token"]').attr('value');
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
        $('#add_tender_item')[0].reset();
        $('#tender_item_id').val('');
        $('#tender_item_unit').val(null).trigger('change');
        $('#monitering_activity').val(null).trigger('change');
        $('#btn_title').html('Submit');
    }
    var tender_items = JSON.parse('<?php echo json_encode($tender_items) ?>');
    console.log(tender_items)
    var app_base_url={!!json_encode(url('/')) !!}
    function get_data(tender_item_id) {
        $("#tender_item_id").val(tender_item_id);
        // console.log(tender_item_id);
        var result = tender_items.find(item => item.tender_item_id === tender_item_id);
        console.log(result);
        var selectedOptions = [];
        result.associated_unit_type.forEach(element => {
            selectedOptions.push(element.unit_id)
        });
        $("#tender_item_info").val(result.tender_item_info);
        $("#tender_item_info").text=result.tender_item_info
        $("#tender_item_qty").val(result.tender_item_qty);
        $("#tender_item_cost").val(result.tender_item_cost);
        $('#tender_item_unit').val(result.tender_item_unit).trigger('change');
        $('#btn_title').html('Update');
        $(result.is_active == 1 ? '#yes' : '#no').prop("checked", true);
    }
    $("#add_tender_item").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            tender_item_info: {
                required: true
            }
            , tender_item_qty: {
                required: true
            }
            , tender_item_cost: {
                required: true
            }
            , tender_item_unit: {
                required: true
            },
            is_active:{
                required:true
            }


        }
        , messages: {

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-tender-item';
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


    function delete_material(tender_item_id) {
        if (confirm("Do you want to delete component ?")) {
            redUrl = base_url + '/add-tender-item';

            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , tender_item_id: tender_item_id
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
        document.getElementById("add_tender_item").reset();
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

        var $add_tender_item = $('#add_tender_item');
        $add_tender_item.validate().resetForm();
        $add_tender_item.find('.error').removeClass('error');
    })

</script>



</body>
</html>
