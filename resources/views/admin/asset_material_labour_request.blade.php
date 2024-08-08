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
                        <h1>Request List</h1>
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
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="true">Material</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="machine-tab" data-toggle="tab" href="#machine" role="tab" aria-controls="machine" aria-selected="false">Machine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="labour-tab" data-toggle="tab" href="#labour" role="tab" aria-controls="labour" aria-selected="false">Labour</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Material Tab -->
            <div class="tab-pane fade show active" id="material" role="tabpanel" aria-labelledby="material-tab">
                <div class="card mt-3">
                    <div class="card-header">
                        Material Records
                    </div>
                    <div class="card-body">
                        <table id="material-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Request ID</th>
                                    <th>Site Name</th>
                                    <th>Material Type</th>
                                    <th>Material Name</th>
                                    <th>Request Quantity</th>
                                    <th>Available Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example rows, replace with dynamic data -->
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Site Name</td>
                                    <td>Sample Material Type Name</td>
                                    <td>Material A</td>
                                    <td>90</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>2022-02-13</td>
                                    <td>
                                        <div class="btn-group m-1">
                                            <button type="button" data-toggle="modal" data-target="#assignMaterialModal" onClick="get_material_data({{ 1,1,1 }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                        </div>
                                        <div class="btn-group m-1">
                                            <button type="button" onclick="delete_activity({{ 1 }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->

                                @foreach($material_request_data as $request)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $request['material_request_id'] }}</td>
                                    <td>{{ $request['site']['site_name'] }}</td>
                                    <td>{{ $request['material_type']['material_type'] }}</td>
                                    <td>{{ $request['material']['material_name'] }}</td>
                                    <td>{{ $request['request_quantity'] }}</td>
                                    <td>{{ $request['site_plan_material']['quantity'] }}</td>
                                    <td>{{ $request['site_plan_material']['rate'] }}</td>
                                    <td>{{ date('Y-m-d',strtotime($request['created_at'])) }}</td>

                                    <td class="text-center">
                                        <div>
                                            <div class="btn-group m-1" role="group" aria-label="Basic example">
                                            <button type="button" data-toggle="modal" data-target="#assignMaterialModal" onClick="get_material_data({{ $request['material_request_id'] }},{{$request['request_quantity']}},{{ $request['site_plan_material']['quantity'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="btn-group m-1" role="group" aria-label="Basic example">
                                            <button type="button" onclick="delete_activity({{ $request['material_request_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
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

            <!-- Machine Tab -->
            <div class="tab-pane fade" id="machine" role="tabpanel" aria-labelledby="machine-tab">
                <div class="card mt-3">
                    <div class="card-header">
                        Machine Records
                    </div>
                    <div class="card-body">
                        <table id="machine-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Request ID</th>
                                    <th>Site Name</th>
                                    <th>Vehical Type</th>
                                    <th>Required Quantity</th>
                                    <th>Available Quantity</th>
                                    <th>Cost Per Hour</th>
                                    <th>Required From</th>
                                    <th>Required To</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example rows, replace with dynamic data -->
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>SAmple Test Site</td>
                                    <td>Machine X</td>
                                    <td>10</td>
                                    <td>100</td>
                                    <td>900</td>
                                    <td>2022-09-01</td>
                                    <td>2022-09-31</td>
                                    <td>2022-09-18</td>
                                    <td>
                                        <div class="btn-group m-1">
                                            <button type="button" data-toggle="modal" data-target="#assignVehicleModal" onClick="get_data({{ 1 }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                        </div>
                                        <div class="btn-group m-1">
                                            <button type="button" onclick="delete_activity({{ 1 }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->

                                @foreach($asset_request_data as $vehical_types_request)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $vehical_types_request['vehicle_types_request_id'] }}</td>
                                    <td>{{ $vehical_types_request['site']['site_name'] }}</td>
                                    <td>{{ $vehical_types_request['vehical_type']['name'] }}</td>
                                    <td>{{ $vehical_types_request['request_quantity'] }}</td>
                                    <td>{{ $vehical_types_request['site_plan_asset']['vehical_quantity'] }}</td>
                                    <td>{{ $vehical_types_request['site_plan_asset']['cost_per_hour'] }}</td>
                                    <td>{{ date('Y-m-d',strtotime($vehical_types_request['required_from_date'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($vehical_types_request['required_to_date'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($vehical_types_request['created_at'])) }}</td>

                                    <td class="text-center">
                                        <div >
                                            <div class="btn-group m-1" role="group" aria-label="Basic example">
                                            <button type="button" data-toggle="modal" data-target="#assignVehicleModal" onClick="get_vehicle_data({{$vehical_types_request['vehicle_types_request_id'] }},{{ $vehical_types_request['request_quantity'] }},{{ $vehical_types_request['site_plan_asset']['vehical_quantity'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                            </div>
                                        </div>
                                        <div >
                                            <div class="btn-group m-1" role="group" aria-label="Basic example">
                                            <button type="button" onclick="delete_activity({{ $vehical_types_request['vehicle_types_request_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
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

            <!-- Labour Tab -->
            <div class="tab-pane fade" id="labour" role="tabpanel" aria-labelledby="labour-tab">
                <div class="card mt-3">
                    <div class="card-header">
                        Labour Records
                    </div>
                    <div class="card-body">
                        <table id="labour-table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Request ID</th>
                                    <th>Site Name</th>
                                    <th>Labour Type</th>
                                    <th>Required Quantity</th>
                                    <th>Available Quantity</th>
                                    <th>Cost Per Day</th>
                                    <th>Required From</th>
                                    <th>Required To</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example rows, replace with dynamic data -->
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Sample Site Name</td>
                                    <td>Labourer Type 1</td>
                                    <td>40</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>2022-09-01</td>
                                    <td>2022-09-31</td>
                                    <td>2022-09-18</td>
                                    <td>
                                        <div class="btn-group m-1">
                                            <button type="button" data-toggle="modal" data-target="#assignLabourModal" onClick="get_labour_data({{ 1 }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                        </div>
                                        <div class="btn-group m-1">
                                            <button type="button" onclick="delete_activity({{ 1 }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->

                                @foreach($labour_request_data as $labour_request)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $labour_request['labour_request_id'] }}</td>
                                    <td>{{ $labour_request['site']['site_name'] }}</td>
                                    <td>{{ $labour_request['labour_type']['labour_type'] }}</td>
                                    <td>{{ $labour_request['labour_request_quantity'] }}</td>
                                    <td>{{ $labour_request['site_plan_labour']['no_of_worker'] }}</td>
                                    <td>{{ $labour_request['site_plan_labour']['cost_per_day'] }}</td>
                                    <td>{{ date('Y-m-d',strtotime($labour_request['required_from'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($labour_request['required_to'])) }}</td>
                                    <td>{{ date('Y-m-d',strtotime($labour_request['created_at'])) }}</td>

                                    <td class="text-center">
                                        <div>
                                            <div class="btn-group m-1" role="group" aria-label="Basic example">
                                            <button type="button" data-toggle="modal" data-target="#assignLabourModal" onClick="get_labour_data({{ $labour_request['labour_request_id'] }},{{$labour_request['labour_request_quantity']}},{{ $labour_request['site_plan_labour']['no_of_worker'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-pencil " ></i></button>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="btn-group m-1" role="group" aria-label="Basic example">
                                            <button type="button" onclick="delete_activity({{ $labour_request['labour_request_id'] }})" class="btn btn-sm btn-secondary"><i class="fa fa-trash" ></i></button>
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
    </div>
</div>
{{-- End content --}}


<!-- Material Modal -->
<div class="modal fade" id="assignMaterialModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Assign Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="assign-material-form" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="material_request_id" name="material_request_id">
                    <input type="hidden" id="material_required_quantity" name="material_required_quantity">
                    <input type="hidden" id="material_available_quantity" name="material_available_quantity">
                    <div class="form-group">
                        <label for="assign_quantity">Assign Quantity</label>
                        <input type="number" id="assign_quantity" name="assign_quantity" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Material Modal --}}



<!-- Labour Modal -->
<div class="modal fade" id="assignLabourModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Assign Labour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="assign-labour-form" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="labour_request_id" name="labour_request_id">
                    <input type="hidden" id="labour_required_quantity" name="labour_required_quantity">
                    <input type="hidden" id="labour_available_quantity" name="labour_available_quantity">
                    <div class="form-group">
                        <label for="assign_quantity">Assign Quantity</label>
                        <input type="number" id="assign_labour_quantity" name="assign_labour_quantity" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Labour Modal --}}

<!-- Vehicle Modal -->
<div class="modal fade" id="assignVehicleModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Assign Machines</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="assign-vehicle-form" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="vehicle_request_id" name="vehicle_request_id">
                    <input type="hidden" id="vehicle_required_quantity" name="vehicle_required_quantity">
                    <input type="hidden" id="vehicle_available_quantity" name="vehicle_available_quantity">
                    <div class="form-group">
                        <label for="assign_quantity">Assign Quantity</label>
                        <input type="number" id="assign_vehicle_quantity" name="assign_vehicle_quantity" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Labour Modal --}}

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
<script>
    function get_material_data(materialRequestId,requestQuantity,availableQuantity) {
        // Set values in the modal

        document.getElementById('material_request_id').value = materialRequestId;
        document.getElementById('material_required_quantity').value = requestQuantity;
        document.getElementById('material_available_quantity').value = availableQuantity;
        var assignQuantityInput = document.getElementById('assign_quantity');
        assignQuantityInput.max = requestQuantity;
        assignQuantityInput.value = ''; // Reset the value
    }
    function get_labour_data(labourRequestId,requestQuantity,availableQuantity) {
        // Set values in the modal

        document.getElementById('labour_request_id').value = materialRequestId;
        document.getElementById('labour_required_quantity').value = requestQuantity;
        document.getElementById('labour_available_quantity').value = availableQuantity;
        var assignQuantityInput = document.getElementById('assign_labour_quantity');
        assignQuantityInput.max = requestQuantity;
        assignQuantityInput.value = ''; // Reset the value
    }
    function get_vehicle_data(labourRequestId,requestQuantity,availableQuantity) {
        // Set values in the modal

        document.getElementById('vehicle_request_id').value = materialRequestId;
        document.getElementById('vehicle_required_quantity').value = requestQuantity;
        document.getElementById('vehicle_available_quantity').value = availableQuantity;
        var assignQuantityInput = document.getElementById('assign_vehicle_quantity');
        assignQuantityInput.max = requestQuantity;
        assignQuantityInput.value = ''; // Reset the value
    }
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








    // $("#add_units").validate({
    //     errorPlacement: function (error, e) {
    //                 e.parents('.form-group').append(error);
    //             },
    //     rules: {
    //         unit_name: {
    //             required: true
    //         }
    //        ,
    //         is_active:{
    //             required:true
    //         },
    //         unit_for:{
    //             required:true
    //         }

    //     }
    //     , messages: {
    //         unit_name: {
    //             required: "Please Enter Unit Name"
    //         }
    //        ,
    //         is_active:{
    //             required:"Please Select Option"
    //         },
    //         unit_for:{
    //             required:"Please Select Option"
    //         }
    //     }
    //     , submitHandler: function(form, message) {
    //         redUrl = base_url + '/add-units';
    //         $.ajax({
    //             url: redUrl
    //             , type: 'post'
    //             , data: new FormData(form)
    //             , dataType: 'json',
    //             headers: {'X-CSRF-TOKEN': csrfToken},
    //             contentType: false, // The content type used when sending data to the server.
    //             cache: false, // To unable request pages to be cached
    //             processData: false, // To send DOMDocument or non processed data file it is set to false
    //             success: function(res) {
    //                 if (res.status) {
    //                     $(".material-err").css("color", "#28a745");
    //                     $(".material-err").html(res.msg);
    //                     setTimeout(function() {
    //                         location.reload();
    //                     }, 500);

    //                 } else {
    //                     // fp1.close();
    //                     $(".material-err").css("color", "red");
    //                     $(".material-err").html(res.msg);
    //                     setTimeout(function() {
    //                         // location.reload();
    //                     }, 3000);
    //                 }
    //             }
    //             , error: function(xhr, textStatus, errorThrown) {

    //             }
    //         });

    //     }
    // });


    // function delete_unit(unit_id) {
    //     if (confirm("Do you want to delete unit ?")) {
    //         redUrl = base_url + '/add-units';
    //         $.ajax({
    //             url: redUrl
    //             , type: 'post'
    //             , data: {
    //                 _token: "{{ csrf_token() }}"
    //                 , delete: 1
    //                 , unit_id: unit_id
    //             }
    //             , dataType: 'json',
    //             headers: {'X-CSRF-TOKEN': csrfToken}
    //             , success: function(res) {
    //                 if (res.status) {
    //                     $(".material-err").css("color", "#28a745");
    //                     $(".material-err").html(res.msg);
    //                     setTimeout(function() {
    //                         location.reload();
    //                     }, 500);
    //                 } else {
    //                     // fp1.close();
    //                     $(".material-err").css("color", "red");
    //                     $(".material-err").html(res.msg);
    //                     setTimeout(function() {
    //                         // location.reload();
    //                     }, 3000);
    //                 }


    //             }
    //             , error: function(xhr, textStatus, errorThrown) {

    //             }
    //         });
    //     }
    // }

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

{{-- <script>
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
</script> --}}

{{-- Start Add Material Form --}}
<script>
    // $('#assignMaterialModal').on('hidden.bs.modal', function(e) {
    //     // $('#machine_type').val(null).trigger('change'); // specific select2  in the modal
    //     $('.select2').val(null).trigger('change'); // all select2  in the modal
    //     document.getElementById("assign-material-form").reset();
    //     $(this)
    //         .find("textarea,select,select2")
    //         .val('')
    //         .end()
    //         .find("input[type=checkbox], input[type=radio]")
    //         .prop("checked", "")
    //         .end()
    //         .find("img")
    //         .prop("src", "")
    //         .end();

    //     var $add_machines = $('#assign-material-form');
    //     $add_machines.validate().resetForm();
    //     $add_machines.find('.error').removeClass('error');
    //     $add_machines.find('.invalid-feedback').remove();
    //     $add_machines.find('.is-invalid').removeClass('is-invalid');
    //     // $("#assign-material-form").reset();
    // })

    $("#assign-material-form").validate({
    errorPlacement: function (error, e) {
        e.parents('.form-group').append(error);
    },
    rules: {
        assign_quantity: {
            required: true,
            number: true,
            min: 1, // Ensure a minimum value
            max: function() {
                return Math.min($('#material_required_quantity').val(), $('#material_available_quantity').val());
            }
        }
    },
    messages: {
        assign_quantity: {
            required: "Please enter quantity",
            number: "Please enter a valid number",
            min: "Quantity must be at least 1",
            max: "Quantity must be less than or equal to both required and available quantities."
        }
    },
    submitHandler: function(form) {
        $.ajax({
            url: base_url + '/assign-required-material',
            type: 'POST',
            data: new FormData(form),
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': csrfToken},
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status) {
                    $(".material-err").css("color", "#28a745").html(res.msg);
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else {
                    $(".material-err").css("color", "red").html(res.msg);
                    setTimeout(function() {
                        // Optionally handle error case
                    }, 3000);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            }
        });
    }
});

$('#assignMaterialModal').on('hidden.bs.modal', function() {
    $("#assign-material-form")[0].reset();
});

</script>
{{-- End Add Material Form --}}


{{-- Start Add Labour Form --}}
<script>
     $("#assign-labour-form").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
                rules: {
            assign_labour_quantity: {
                required: true,
                greaterThan: {
                    required: function() {
                        return $('#labour_required_quantity').val();
                    },
                    available: function() {
                        return $('#labour_available_quantity').val();
                    }
                }
            }
        },
        messages: {
            assign_labour_quantity: {
                required: "Please enter quantity",
                greaterThan: "Quantity must be less than or equal to the required and available quantity."
            }
        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/assign-required-labour';
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


    $('#assignLabourModal').on('hidden.bs.modal', function(e) {
        // $('#machine_type').val(null).trigger('change'); // specific select2  in the modal
        $('.select2').val(null).trigger('change'); // all select2  in the modal
        document.getElementById("assign-labour-form").reset();
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

        var $add_machines = $('#assign-labour-form');
        $add_machines.validate().resetForm();
        $add_machines.find('.error').removeClass('error');
        $add_machines.find('.invalid-feedback').remove();
        $add_machines.find('.is-invalid').removeClass('is-invalid');
        // $("#assign-labour-form").reset();
    })
    </script>
{{--End Add Labour Form --}}






{{-- Start Add vehicle Form --}}
<script>
    $("#assign-vehicle-form").validate({
       errorPlacement: function (error, e) {
                   e.parents('.form-group').append(error);
               },
               rules: {
           assign_vehicle_quantity: {
               required: true,
               greaterThan: {
                   required: function() {
                       return $('#vehicle_required_quantity').val();
                   },
                   available: function() {
                       return $('#vehicle_available_quantity').val();
                   }
               }
           }
       },
       messages: {
           assign_vehicle_quantity: {
               required: "Please enter quantity",
               greaterThan: "Quantity must be less than or equal to the required and available quantity."
           }
       }
       , submitHandler: function(form, message) {
           redUrl = base_url + '/assign-required-vehicle';
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


   $('#assignVehicleModal').on('hidden.bs.modal', function(e) {
       $('.select2').val(null).trigger('change'); // all select2  in the modal
       document.getElementById("assign-vehicle-form").reset();
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

       var $add_machines = $('#assign-vehicle-form');
       $add_machines.validate().resetForm();
       $add_machines.find('.error').removeClass('error');
       $add_machines.find('.invalid-feedback').remove();
       $add_machines.find('.is-invalid').removeClass('is-invalid');
    //    $("#assign-vehicle-form").reset();
   })
   </script>
{{--End Add vehicle Form --}}

</body>
</html>
