@include('admin/header')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
    .fixed-width {
        width: 150px;
        /* Fixed width for the first column */
        word-wrap: break-word;
        /* Ensure long words are broken and wrapped */
    }

    .nav-tabs .nav-link.active {
        background-color: blue;
        color: white;
    }

    .select2-container .select2-selection--single {
        height: 38px;
        /* Make Select2 dropdown height consistent with Bootstrap */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
        /* Vertically center the text */
    }

    .select2-container {
        width: 201px;
    }

</style>
<?php $prefix= $profile_data['prefix'];?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Plan Project</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <a href="{{ $prefix.'/add-project-details'.'?site_id='.($site_id)}}" class="btn m-3 btn-success btn-sm pull-right">Back</a> &nbsp;
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

                    <div class="card-body">

                        <div class="container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active font-weight-bold" style="font-size:15px" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size:15px" id="labours-tab" data-toggle="tab" href="#labours" role="tab" aria-controls="labours" aria-selected="false">Labour</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size:15px" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="false">Material</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size:15px" id="machine-tab" data-toggle="tab" href="#machine" role="tab" aria-controls="machine" aria-selected="false">Machine</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size:15px" id="vehicles-tab" data-toggle="tab" href="#vehicles" role="tab" aria-controls="vehicles" aria-selected="false">Machines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size:15px" id="finance-tab" data-toggle="tab" href="#finance" role="tab" aria-controls="finance" aria-selected="false">Finance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size:15px" id="department-tab" data-toggle="tab" href="#department" role="tab" aria-controls="department" aria-selected="false">Department</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                                    {{-- <form id="project_plan_activity_save" action="{{ route('form.submit') }}" method="POST"> --}}
                                    <form id="project_plan_activity_save" method="POST">
                                        @csrf
                                        @foreach($activity_tender_list as $key=>$value)
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <tbody>

                                                <tr>

                                                    <td class="col-7">{{$value['activity_name']}} (Chainage From: {{$value['from_length']}} M - Chainage To: {{$value['to_length']}} M)</td>
                                                    <td class="col-3">Total Estimated Days:</td>
                                                    <td class="col-2">

                                                        <input type="hidden" name="component_id" id="component_id" value="{{ $component_id }}">
                                                        <input type="hidden" name="site_id" id="site_id" value="{{ $site_id }}">
                                                        <input type="hidden" name="chainage_id" id="chainage_id" value="{{ $chainage_id }}">
                                                        <input type="hidden" name="monitor_activity_id[]" id="monitor_activity_id_{{ $value['monitor_activity_id'] }}" value="{{ $value['monitor_activity_id'] }}">
                                                        <input type="hidden" name="ass_chainage_id[]" id="ass_chainage_id{{ $value['chainage_id'] }}" value="{{ $value['chainage_id'] }}">
                                                        <div class="form-group">
                                                            {{-- <input type="number" name="numbers_of_days[]" id="number_{{ $value['monitor_activity_id'] }}" value="" required class="form-control form-control-sm" placeholder="Enter days"> --}}
                                                            <input type="number" name="numbers_of_days[]" id="number_{{ $value['monitor_activity_id'] }}" value="{{$value['numbers_of_days']?$value['numbers_of_days']:""}}" required class="form-control form-control-sm" placeholder="Enter days">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                        @endforeach
                                        {{-- <button class="btn btn-success" type="button">Save</button> --}}
                                        <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                                        <div class="w-100 text-center"><span class="material-err"></span></div>
                                    </form>
                                </div>
                                {{-- Labours tab start --}}
                                <div class="tab-pane fade" id="labours" role="tabpanel" aria-labelledby="labours-tab">
                                    <form id="labour-form" method="POST">
                                        @csrf
                                        <input type="hidden" name="component_id" id="component_id" value="{{ $component_id }}">
                                        <input type="hidden" name="site_id" id="site_id" value="{{ $site_id }}">
                                        <input type="hidden" name="chainage_id" id="chainage_id" value="{{ $chainage_id }}">
                                        <div id="form-rows">
                                            @if(count($site_plan_labour)<=0) <div class="form-row mb-3 align-items-end dynamic-row">
                                                <div class="col form-group">
                                                    <label for="select-0">Labour Category</label>
                                                    <select name="labour_type[]" id="select-0" class="form-control select2 labour_type" style="width: 200px;" required>
                                                        <option value="">Choose...</option>
                                                        @foreach ($labour as $row)
                                                        <option value="{{$row->labour_id}}">{{$row->labour_type}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type=hidden name="site_plan_labour_id[]" value="">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="number1-0">No. of Person</label>
                                                    <input type="number" name="no_of_worker[]" id="number1-0" class="form-control no_of_worker">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="number2-0">Work Days / Person</label>
                                                    <input type="number" name="work_days[]" id="number2-0" class="form-control work_days">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="number2-0">Cost / Day</label>
                                                    <input type="number" name="cost_days[]" id="number3-0" class="form-control cost_days">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="text-0">Total Amount</label>
                                                    <input type="text" name="total[]" id="text-0" class="form-control total" disabled>
                                                </div>
                                                <div class="col-auto form-group">
                                                    <button type="button" class="btn btn-primary add-row">Add</button>
                                                </div>
                                        </div>
                                        @else

                                        @foreach ( $site_plan_labour as $data)

                                        {{-- {{$data}} --}}
                                        <div class="form-row mb-3 align-items-end dynamic-row">
                                            <div class="col form-group">
                                                <label for="select-0">Labour Category</label>
                                                <select name="labour_type[]" id="select-0" class="form-control select2 labour_type" style="width: 200px;" required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($labour as $row)
                                                    <option value="{{$row->labour_id}}" {{$data->labour_id==$row->labour_id?'selected':''}}>{{$row->labour_type}}</option>
                                                    @endforeach
                                                </select>
                                                <input type=hidden name="site_plan_labour_id[]" value="{{$data->site_plan_labour_id}}">
                                            </div>
                                            <div class="col form-group">
                                                <label for="number1-0">No. of Person</label>
                                                <input type="number" name="no_of_worker[]" id="number1-{{$loop->iteration-1}}" value="{{$data->no_of_worker}}" class="form-control no_of_worker">
                                            </div>
                                            <div class="col form-group">
                                                <label for="number2-0">Work Days / Person</label>
                                                <input type="number" name="work_days[]" id="number2-{{$loop->iteration-1}}" value="{{$data->no_of_work_days}}" class="form-control work_days">
                                            </div>
                                            <div class="col form-group">
                                                <label for="number2-0">Cost / Day</label>
                                                <input type="number" name="cost_days[]" id="number3-{{$loop->iteration-1}}" value="{{$data->cost_per_day}}" class="form-control cost_days">
                                            </div>
                                            <div class="col form-group">
                                                <label for="text-0">Total Amount</label>
                                                <input type="text" name="total[]" id="text-{{$loop->iteration-1}}" class="form-control total" value="{{$data->cost_per_day*$data->no_of_work_days*$data->no_of_worker}}" disabled>
                                            </div>
                                            @if(($loop->iteration-1)==0)
                                            <div class="col-auto form-group">
                                                <button type="button" class="btn btn-primary add-row">Add</button>
                                            </div>
                                            @else
                                            <div class="col-auto form-group">
                                                <button type="button" class="btn btn-danger" onclick="delete_labour({{$data->site_plan_labour_id}})">Remove</button>
                                                {{-- <button type="button" class="btn btn-danger remove-row" onclick="delete_labour($data->site_plan_labour_id)">Remove</button> --}}
                                            </div>
                                            @endif
                                        </div>
                                        {{-- {{$loop->iteration-1}} --}}

                                        @endforeach

                                        @endif



                                </div>
                                {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                                <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                                <div class="w-100 text-center"><span class="success-labour"></span></div>
                                </form>
                            </div>
                            {{-- Labours tab end --}}

                            {{-- Material tab start --}}
                            <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">
                                <form id="material-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="component_id" id="component_id" value="{{ $component_id }}">
                                    <input type="hidden" name="site_id" id="site_id" value="{{ $site_id }}">
                                    <input type="hidden" name="chainage_id" id="chainage_id" value="{{ $chainage_id }}">
                                    <div id="form-rows2">
                                        @if(count($site_plan_material)<=0)

                            <div class="form-row mb-3 dynamic-row2">
                                <div class="col form-group">
                                    <label for="material_type-0">Material Type</label>
                                    <select class="form-control select2 material_type" id="material_type-0" name="material_type[]">
                                        <option value="">Select an option</option>
                                        @foreach ($material_type as $row)
                                        <option value="{{ $row->mtype_id  }}">{{ $row->material_type }}</option>
                                        @endforeach
                                    </select>
                                    <input type=hidden name="site_plan_material_id[]" value="">
                                </div>
                                <div class="col form-group">
                                    <label for="material-0">Material</label>
                                    <select class="form-control select2 select2-dependent" id="material-0" name="material[]" disabled>
                                        <option value="">Select an option</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="quantity-0">Quantity</label>
                                    <input type="number" min="0" class="form-control" id="quantity-0" name="quantity[]" required>
                                    {{-- <input type="hidden" id="material_unit-0" name="material_unit[]">
                                                    <span id="material_unit_span-0" name="material_unit_span[]"></span> --}}
                                </div>
                                <div class="col form-group">
                                    <label for="rate-0">Rate/unit</label>
                                    <input type="number" min="0" class="form-control" id="rate-0" name="rate[]" required>
                                    {{-- <input type="hidden" id="material_unit-0" name="material_unit[]">
                                                    <span id="material_unit_span-0" name="material_unit_span[]"></span> --}}
                                </div>
                                <div class="col-auto form-group">
                                    <button type="button" class="btn btn-primary add-row mt-4">Add</button>
                                    {{-- <button type="button" class="btn btn-danger remove-row mt-4">Remove</button> --}}
                                </div>
                            </div>
                            @else

                            @foreach ( $site_plan_material as $data)

                            {{-- {{$data}} --}}
                            <div class="form-row mb-3 align-items-end dynamic-row2">
                                <div class="col form-group">
                                    <label for="select-0">Material Type</label>
                                    <select name="material_type[]" id="select-{{$loop->iteration-1}}" class="form-control select2 material_type" style="width: 200px;" required>
                                        <option value="">Choose...</option>
                                        @foreach ($material_type as $row)
                                        <option value="{{$row->mtype_id}}" {{$data->material_type_id==$row->mtype_id?'selected':''}}>{{$row->material_type}}</option>
                                        @endforeach
                                    </select>
                                    <input type=hidden name="site_plan_material_id[]" value="{{$data->site_plan_material_id}}">
                                </div>
                                <div class="col form-group">
                                    <label for="material-0">Material</label>
                                    <select class="form-control select2 select2-dependent" id="material-{{$loop->iteration-1}}" name="material[]" disabled>
                                        <option value="">Choose...</option>
                                        @foreach ($materials as $row)
                                        @php $unit_name=$row->unit_name @endphp
                                        <option value="{{$row->material_id}}" {{$data->material_id==$row->material_id?'selected':''}}>{{$row->material_name}} ({{$row->unit_name}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="quantity-0">Quantity</label>
                                    <input type="number" min="0" class="form-control" id="quantity-{{$loop->iteration-1}}" name="quantity[]" value="{{$data->quantity}}" required>
                                    {{-- <input type="hidden" id="material_unit-0" name="material_unit[]">
                                                    <span id="material_unit_span-0" name="material_unit_span[]"></span> --}}
                                </div>
                                <div class="col form-group">
                                    {{-- <label for="quantity-0">Rate/{{$unit_name}}</label> --}}
                                    <label for="rate-0">Rate/unit</label>
                                    <input type="number" min="0" class="form-control" id="rate-{{$loop->iteration-1}}" name="rate[]" value="{{$data->rate}}" required>
                                    {{-- <input type="hidden" id="material_unit-0" name="material_unit[]">
                                                    <span id="material_unit_span-0" name="material_unit_span[]"></span> --}}
                                </div>
                                @if(($loop->iteration-1)==0)
                                <div class="col-auto form-group">
                                    <button type="button" class="btn btn-primary add-row">Add</button>
                                </div>
                                @else
                                <div class="col-auto form-group">
                                    <button type="button" class="btn btn-danger" onclick="delete_material({{$data->site_plan_material_id}})">Remove</button>

                                </div>
                                @endif


                                {{-- <div class="col form-group">
                                    <label for="number1-0">No. of Person</label>
                                    <input type="number" name="no_of_worker[]" id="number1-{{$loop->iteration-1}}" value="{{$data->no_of_worker}}" class="form-control no_of_worker">
                                </div>
                                <div class="col form-group">
                                    <label for="number2-0">Work Days / Person</label>
                                    <input type="number" name="work_days[]" id="number2-{{$loop->iteration-1}}" value="{{$data->no_of_work_days}}" class="form-control work_days">
                                </div>
                                <div class="col form-group">
                                    <label for="number2-0">Cost / Day</label>
                                    <input type="number" name="cost_days[]" id="number3-{{$loop->iteration-1}}" value="{{$data->cost_per_day}}" class="form-control cost_days">
                                </div>
                                <div class="col form-group">
                                    <label for="text-0">Total Amount</label>
                                    <input type="text" name="total[]" id="text-{{$loop->iteration-1}}" class="form-control total" value="{{$data->cost_per_day*$data->no_of_work_days*$data->no_of_worker}}" disabled>
                                </div>
                                @if(($loop->iteration-1)==0)
                                <div class="col-auto form-group">
                                    <button type="button" class="btn btn-primary add-row">Add</button>
                                </div>
                                @else
                                <div class="col-auto form-group">
                                    <button type="button" class="btn btn-danger" onclick="delete_labour({{$data->site_plan_labour_id}})">Remove</button>

                                </div>
                                @endif --}}
                            </div>
                            {{-- {{$loop->iteration-1}} --}}

                            @endforeach

                            @endif



                        </div>
                        {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                        <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                        <div class="w-100 text-center"><span class="success-material"></span></div>
                        </form>
                    </div>
                    {{-- Material tab end --}}

                    {{-- Machine tab start --}}
                        <div class="tab-pane fade" id="machine" role="tabpanel" aria-labelledby="machine-tab">
                            <form id="machine-form" method="POST">
                                @csrf
                                <input type="hidden" name="component_id" id="component_id" value="{{ $component_id }}">
                                <input type="hidden" name="site_id" id="site_id" value="{{ $site_id }}">
                                <input type="hidden" name="chainage_id" id="chainage_id" value="{{ $chainage_id }}">
                                <div id="form-rows3">
                                    @if(count($site_plan_machines)<=0)
                                    <div class="form-row mb-3 dynamic-row3">
                                        <div class="col form-group">
                                            <label for="machine_type-0">Machine Type</label>
                                            <select class="form-control select2 machine_type" id="machine_type-0" name="machine_type[]">
                                                <option value="">Select an option</option>
                                                @foreach ($machine_type as $row)
                                                <option value="{{ $row->mach_type_id  }}">{{ $row->machine_type }}</option>
                                                @endforeach
                                            </select>
                                            <input type=hidden name="site_plan_machine_id[]" value="">
                                        </div>
                                        <div class="col form-group">
                                            <label for="machine-0">Machine</label>
                                            <select class="form-control select2 select2-dependent" id="machine-0" name="machine[]" disabled>
                                                <option value="">Select an option</option>
                                            </select>
                                        </div>
                                        <div class="col form-group">
                                            <label for="quantity-0">Quantity</label>
                                            <input type="number" min="0" class="form-control machine_quantity" id="quantity-0" name="quantity[]" required>
                                            {{-- <input type="hidden" id="machine_unit-0" name="machine_unit[]">
                                                <span id="machine_unit_span-0" name="machine_unit_span[]"></span> --}}
                                        </div>
                                        <div class="col form-group">
                                            <label for="rate-0">Estimated Time</label>
                                            <input type="number" min="0" class="form-control machine_estimated_time" id="estimated_time-0" name="estimated_time[]" required>
                                            {{-- <input type="hidden" id="machine_unit-0" name="machine_unit[]">
                                                <span id="machine_unit_span-0" name="machine_unit_span[]"></span> --}}
                                        </div>
                                        <div class="col form-group">
                                            <label for="rate-0">Total Cost</label>
                                            <input type="number" min="0" class="form-control" id="machine_total_cost-0" name="machine_total_cost[]" disabled>
                                            <input type="hidden"  class="form-control" id="machine_cost_pr_hrs-0" name="machine_cost_pr_hrs[]">
                                            {{-- <input type="hidden" id="machine_unit-0" name="machine_unit[]">
                                                <span id="machine_unit_span-0" name="machine_unit_span[]"></span> --}}
                                        </div>
                                        <div class="col-auto form-group">
                                            <button type="button" class="btn btn-primary add-row mt-4">Add</button>
                                            {{-- <button type="button" class="btn btn-danger remove-row mt-4">Remove</button> --}}
                                        </div>
                                </div>
                                @else

                                @foreach ( $site_plan_machines as $data)
                                <div class="form-row mb-3 align-items-end dynamic-row3">
                                    <div class="col form-group">
                                        <label for="select-0">Machine Type</label>
                                        <select name="machine_type[]" id="select-{{$loop->iteration-1}}" class="form-control select2 machine_type" style="width: 200px;" required>
                                            <option value="">Choose...</option>
                                            @foreach ($machine_type as $row)
                                            <option value="{{$row->mach_type_id}}" {{$data->machine_type_id==$row->mach_type_id?'selected':''}}>{{$row->machine_type}}</option>
                                            @endforeach
                                        </select>
                                        <input type=hidden name="site_plan_machine_id[]" value="{{$data->site_plan_machine_id}}">
                                    </div>
                                    <div class="col form-group">
                                        <label for="machine-0">Machine</label>
                                        <select class="form-control select2 select2-dependent" id="machine-{{$loop->iteration-1}}" name="machine[]" disabled>
                                            <option value="">Choose...</option>
                                            @foreach ($machines as $row)
                                            <option value="{{$row->machine_id}}" {{$data->machine_id==$row->machine_id?'selected':''}}>{{$row->machine_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col form-group">
                                        <label for="quantity-0">Quantity</label>
                                        <input type="number" min="0" class="form-control machine_quantity" id="quantity-{{$loop->iteration-1}}" name="quantity[]" value="{{$data->no_of_machines}}" required>
                                        {{-- <input type="hidden" id="machine_unit-0" name="machine_unit[]">
                                                <span id="machine_unit_span-0" name="machine_unit_span[]"></span> --}}
                                    </div>
                                    <div class="col form-group">
                                        <label for="rate-0">Estimated Time</label>
                                        <input type="number" min="0" class="form-control machine_estimated_time" id="estimated_time-{{$loop->iteration-1}}" name="estimated_time[]" value="{{$data->no_of_hours}}" required>
                                        {{-- <input type="hidden" id="machine_unit-0" name="machine_unit[]">
                                                <span id="machine_unit_span-0" name="machine_unit_span[]"></span> --}}
                                    </div>
                                    <div class="col form-group">
                                        <label for="rate-0">Total Cost</label>
                                        <input type="number" min="0" class="form-control" id="machine_total_cost-{{$loop->iteration-1}}" name="machine_total_cost[]" value="{{$data->estimated_total}}" disabled>
                                        <input type="hidden"  class="form-control" id="machine_cost_pr_hrs-{{$loop->iteration-1}}" name="machine_cost_pr_hrs[]" value="{{$data->machine_cost_pr_hrs}}">
                                        {{-- <input type="hidden" id="machine_unit-0" name="machine_unit[]">
                                                <span id="machine_unit_span-0" name="machine_unit_span[]"></span> --}}
                                    </div>
                                    @if(($loop->iteration-1)==0)
                                    <div class="col-auto form-group">
                                        <button type="button" class="btn btn-primary add-row">Add</button>
                                    </div>
                                    @else
                                    <div class="col-auto form-group">
                                        <button type="button" class="btn btn-danger" onclick="delete_machine({{$data->site_plan_machine_id}})">Remove</button>

                                    </div>
                                    @endif
                                   </div>

                                @endforeach
                                @endif
                            </div>
                                <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                                <div class="w-100 text-center"><span class="success-machine"></span></div>
                            </form>
                        </div>
                    {{-- Machine tab end --}}





  {{-- Vehicles tab start --}}
        <div class="tab-pane fade" id="vehicles" role="tabpanel" aria-labelledby="vehicles-tab">
            <form id="vehicles-form" method="POST">
                @csrf
                <input type="hidden" name="component_id" id="component_id" value="{{ $component_id }}">
                <input type="hidden" name="site_id" id="site_id" value="{{ $site_id }}">
                <input type="hidden" name="chainage_id" id="chainage_id" value="{{ $chainage_id }}">
                <div id="form-rows8">
                    @if(count($site_plan_assets)<=0) <div class="form-row mb-3 align-items-end dynamic-row8">
                        <div class="col form-group">
                            <label for="vehicle_type-0">Vehicle Types</label>
                            <select name="vehicle_type[]" id="vehicle_type-0" class="form-control select2 vehicle_type" style="width: 200px;" required>
                                <option value="">Choose...</option>
                                @foreach ($vehicle_types as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                            <input type=hidden name="site_plan_vehical_type_id[]" value="">
                        </div>
                        <div class="col form-group">
                            <label for="vehical_quantity-0">Quantity</label>
                            <input type="number" name="vehical_quantity[]" id="vehical_quantity-0" class="form-control vehical_quantity">
                        </div>
                        <div class="col form-group">
                            <label for="time_hours-0">Estimated Time(hours)</label>
                            <input type="number" name="time_hours[]" id="time_hours-0" class="form-control time_hours">
                        </div>
                        <div class="col form-group">
                            <label for="cost_per_hour-0">Cost/Hour</label>
                            <input type="number" name="cost_per_hour[]" id="cost_per_hour-0" class="form-control cost_per_hour">
                        </div>
                        <div class="col form-group">
                            <label for="total_vehical_types_cost-0">Total Amount</label>
                            <input type="text" name="total_vehical_types_cost[]" id="text-0" class="form-control total_vehical_types_cost" disabled>
                        </div>
                        <div class="col-auto form-group">
                            <button type="button" class="btn btn-primary add-row">Add</button>
                        </div>
                </div>
                @else

                @foreach ( $site_plan_assets as $data)

                {{-- {{$data}} --}}
                <div class="form-row mb-3 align-items-end dynamic-row8">
                    <div class="col form-group">
                        <label for="vehicle_type-0">Vehicle Types</label>
                        <select name="vehicle_type[]" id="select-0" class="form-control select2 vehicle_type" style="width: 200px;" required>
                            <option value="">Choose...</option>
                            @foreach ($vehicle_types as $row)
                            <option value="{{$row->id}}" {{$data->vehicle_type_id==$row->id?'selected':''}}>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <input type=hidden name="site_plan_vehical_type_id[]" value="{{$data->site_plan_vehical_type_id}}">
                    </div>
                    <div class="col form-group">
                        <label for="vehical_quantity-0">Quantity</label>
                        <input type="number" name="vehical_quantity[]" id="vehical_quantity-{{$loop->iteration-1}}" value="{{$data->vehical_quantity}}" class="form-control vehical_quantity">
                    </div>
                    <div class="col form-group">
                        <label for="time_hours-0">Estimated Time(hours)</label>
                        <input type="number" name="time_hours[]" id="time_hours-{{$loop->iteration-1}}" value="{{$data->time_hours}}" class="form-control time_hours">
                    </div>
                    <div class="col form-group">
                        <label for="cost_per_hour-0">Cost/Hour</label>
                        <input type="number" name="cost_per_hour[]" id="cost_per_hour-{{$loop->iteration-1}}" value="{{$data->cost_per_hour}}" class="form-control cost_per_hour">
                    </div>
                    <div class="col form-group">
                        <label for="total_vehical_types_cost-0">Total Amount</label>
                        <input type="text" name="total_vehical_types_cost[]" id="total_vehical_types_cost-{{$loop->iteration-1}}" class="form-control total_vehical_types_cost" value="{{$data->vehical_quantity*$data->cost_per_hour*$data->cost_per_hour}}" disabled>
                    </div>
                    @if(($loop->iteration-1)==0)
                    <div class="col-auto form-group">
                        <button type="button" class="btn btn-primary add-row">Add</button>
                    </div>
                    @else
                    <div class="col-auto form-group">
                        <button type="button" class="btn btn-danger" onclick="delete_vehical_type({{$data->site_plan_vehical_type_id}})">Remove</button>
                        {{-- <button type="button" class="btn btn-danger remove-row" onclick="delete_labour($data->site_plan_labour_id)">Remove</button> --}}
                    </div>
                    @endif
                </div>
                {{-- {{$loop->iteration-1}} --}}

                @endforeach

                @endif



        </div>
        {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
        <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
        <div class="w-100 text-center"><span class="success-vehical-types"></span></div>
        </form>
        </div>
{{-- Vehicles tab end --}}



  {{-- finance tab start --}}
  <div class="tab-pane fade" id="finance" role="tabpanel" aria-labelledby="finance-tab">
    <div class="row">
    <div class= "col-lg-4 col-md-4 col-sm-4">
        <div class="finance-budget">
            <p>Tender Budget</p>
            <div class="sites-logo mb-2">
                <img src="{{asset('assets/images/icons/finance-budget.png')}}" class="img-responsive">
              </div>
            <h4 id="estimate">INR {{$site['tender_budget']}}
        </div>

  </div>
  <div class= "col-lg-4 col-md-4 col-sm-4">
    <div class="finance-budget">
        <p>Estimated Budget</p>
        <div class="sites-logo mb-2">
            <img src="{{asset('assets/images/icons/finance-budget1.png')}}" class="img-responsive">
          </div>

        <h4 id="estimate">INR {{$site_total_estimated_budget}}</h4>
    </div>

</div>
<div class= "col-lg-4 col-md-4 col-sm-4">
    <div class="finance-budget">
        <p>Utilized Budget</p>
        <div class="sites-logo mb-2">
            <img src="{{asset('assets/images/icons/finance-budget2.png')}}" class="img-responsive">
          </div>
        <h4 id="estimate">INR 0</h4>
    </div>

</div>
</div>
</div>

{{-- finance tab end --}}



              {{-- Department tab start --}}
              <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="department-tab">
                <form id="department-form" method="POST">
                    @csrf
                    <input type="hidden" name="component_id" id="component_id" value="{{ $component_id }}">
                    <input type="hidden" name="site_id" id="site_id" value="{{ $site_id }}">
                    <input type="hidden" name="chainage_id" id="chainage_id" value="{{ $chainage_id }}">
                    <div id="form-rows4">
                        @if(count($site_plan_departments)<=0)
                        <div class="form-row mb-3 dynamic-row4 ">
                            <div class="col-3 form-group">
                                <label for="department-0">Department</label>
                                <select class="form-control select2 department" id="department-0" name="department[]">
                                    <option value="">Select an option</option>
                                    @foreach ($departments as $row)
                                    <option value="{{ $row->role_id  }}">{{ $row->role_name }}</option>
                                    @endforeach
                                </select>
                                <input type=hidden name="site_plan_department_id[]" value="">
                            </div>
                            <div class="col-3 form-group">
                                <label for="user-0">User/Employee</label>
                                <select class="form-control select2 select2-dependent" id="user-0" name="user[]" disabled>
                                    <option value="">Select an option</option>
                                </select>
                            </div>

                            <div class="col-auto form-group">
                                <button type="button" class="btn btn-primary add-row mt-4">Add</button>
                                {{-- <button type="button" class="btn btn-danger remove-row mt-4">Remove</button> --}}
                            </div>
                    </div>
                    @else

                    @foreach ( $site_plan_departments as $data)
                    <div class="form-row mb-3 align-items-end dynamic-row4">
                        <div class="col-3 form-group">
                            <label for="select-0">Department</label>
                            <select name="department[]" id="select-{{$loop->iteration-1}}" class="form-control select2 department" style="width: 200px;" required>
                                <option value="">Choose...</option>
                                @foreach ($departments as $row)
                                <option value="{{$row->role_id}}" {{$data->department_id==$row->role_id?'selected':''}}>{{$row->role_name}}</option>
                                @endforeach
                            </select>
                            <input type=hidden name="site_plan_department_id[]" value="{{$data->site_plan_department_id}}">
                        </div>
                        <div class="col-3 form-group">
                            <label for="user-0">User/Employee</label>
                            <select class="form-control select2 select2-dependent" id="user-{{$loop->iteration-1}}" name="user[]" disabled>
                                <option value="">Choose...</option>
                                @foreach ($users as $row)
                                <option value="{{$row->user_id}}" {{$data->user_id==$row->user_id?'selected':''}}>{{$row->first_name}} {{$row->last_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if(($loop->iteration-1)==0)
                        <div class="col-auto form-group ">
                            <button type="button" class="btn btn-primary add-row">Add</button>
                        </div>
                        @else
                        <div class="col-auto form-group">
                            <button type="button" class="btn btn-danger" onclick="delete_department({{$data->site_plan_department_id}})">Remove</button>
                        </div>
                        @endif
                       </div>

                    @endforeach
                    @endif
                </div>
                    <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                    <div class="w-100 text-center"><span class="success-department"></span></div>
                </form>
            </div>

        {{-- Department tab end --}}





                </div>
            </div>

        </div>
    </div>
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
            , allowClear: true
            , maximumSelectionLength: 1
        , });

        //form_validation
        //   if ($("#project_plan_activity_save").length > 0) {
        //         $("#project_plan_activity_save").validate({

        //             rules: {
        //                 title_en: {
        //                     required: true,
        //                     maxlength: '{{config('constants.TITLE_SIZE')}}'
        //                 },
        //                 title_hi: {
        //                     maxlength: '{{config('constants.TITLE_SIZE')}}'
        //                 }


        //             }
        //             , messages: {

        //                 title_en: {
        //                     maxlength:'{{config('constants.TITLE_SIZE_MSG')}}'
        //             },
        //             title_hi: {
        //                 maxlength:'{{config('constants.TITLE_SIZE_MSG')}}'
        //         }
        //              }
        //         , })
        //     }

    });



    function add_data() {
        $('#add_units')[0].reset();
        $('#unit_id').val('');
        $('#tender_item_unit').val(null).trigger('change');
        $('#monitering_activity').val(null).trigger('change');
        $('#btn_title').html('Submit');
    }

    var app_base_url = {!!json_encode(url('/')) !!}

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
    $("#project_plan_activity_save").validate({
        errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);
        }
        , rules: {
            "numbers_of_days[]": {
                required: true
            }


        }
        , messages: {

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-project-plan-activity';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
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




    $('#scrollmodal').on('hidden.bs.modal', function(e) {
        document.getElementById("add_units").reset();
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

        var $add_units = $('#add_units');
        $add_units.validate().resetForm();
        $add_units.find('.error').removeClass('error');
    })

</script>

{{-- Activity Tab End --}}

{{-- Labour Tab Start --}}
<script>
    $('.labour_type').select2();

    var labour = JSON.parse('<?php echo json_encode($labour) ?>');

    // Function to get all selected values in Select2
    function getSelectedValues() {

        let selectedValues = [];
        $('.labour_type').each(function() {
            let value = $(this).val();
            if (value) {
                selectedValues.push(value);
            }
        });
        return selectedValues;
    }

    // Function to replicate a new row
    function addRow() {
        let index = $('.dynamic-row').length;
        let newRow = `
        <div class="form-row mb-3 align-items-end dynamic-row">
            <div class="col form-group">
                <label for="select-${index}">Labour Category</label>
                <select name="labour_type[]" id="select-${index}" class="form-control select2 labour_type" style="width: 200px;" required>
                    <option value="">Choose...</option>
                    `
        $.each(labour, function(key, value) {
            newRow += `  <option value="` + value.labour_id + `">` + value.labour_type + `</option>`

        });
        newRow += `</select>
                </select>
            </div>
            <div class="col form-group">
                <label for="number1-${index}">No. of Person</label>
                <input type="number" name="no_of_worker[]" id="number1-${index}" class="form-control no_of_worker">
            </div>
            <div class="col form-group">
                <label for="number2-${index}">Work Days / Person</label>
                <input type="number" name="work_days[]" id="number2-${index}" class="form-control work_days">
            </div>
            <div class="col form-group">
                <label for="number2-${index}">Cost / Day</label>
                <input type="number" name="cost_days[]" id="number3-${index}" class="form-control cost_days">
            </div>
            <div class="col form-group">
                    <label for="text-0">Total Amount</label>
                   <input type="text" name="total[]" id="text-${index}" class="form-control total" disabled>
             </div>
            <div class="col-auto form-group">
                <button type="button" class="btn btn-danger remove-row">Remove</button>
            </div>

        </div>
    `;
        $('#form-rows').append(newRow);
        $('.labour_type').select2();

        // Disable already selected options
        let selectedValues = getSelectedValues();
        console.log(selectedValues)

        $('.labour_type').each(function() {

            let currentSelect = $(this);
            console.log(selectedValues)
            console.log(currentSelect)
            currentSelect.find('option').each(function() {
                if (selectedValues.includes($(this).val()) && $(this).val() !== currentSelect.val()) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }
            });
        });
    }

    // Add initial event listener for adding rows
    $('#labour-form').on('click', '.add-row', function() {
        addRow();
    });

    // Add event listener for removing rows
    $('#labour-form').on('click', '.remove-row', function() {
        $(this).closest('.dynamic-row').remove();

        // Re-enable options in remaining select2 dropdowns
        let selectedValues = getSelectedValues();
        $('.labour_type').each(function() {
            let currentSelect = $(this);
            currentSelect.find('option').each(function() {
                console.log(currentSelect.val())
                if (selectedValues.includes($(this).val()) && $(this).val() !== currentSelect.val()) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }
            });
        });
        console.log(selectedValues);
    });

    // Disable options already selected in the first row
    $('#form-rows').on('change', '.labour_type', function() {

        let selectedValues = getSelectedValues();
        $('.labour_type').each(function() {
            let currentSelect = $(this);
            $(this).closest('.error').remove();
            currentSelect.find('option').each(function() {
                if (selectedValues.includes($(this).val()) && $(this).val() !== currentSelect.val()) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }
            });
        });
    });

    function calculateSum(no_of_worker, work_days, cost_days, total) {
        let value1 = parseFloat(no_of_worker.val()) || 0;
        let value2 = parseFloat(work_days.val()) || 0;
        let value3 = parseFloat(cost_days.val()) || 0;
        total.val(value1 * value2 * value3);
    }
    $('#labour-form').on('input', '.no_of_worker, .work_days, .cost_days', function() {
        let row = $(this).closest('.dynamic-row');
        let no_of_worker = row.find('.no_of_worker');
        let work_days = row.find('.work_days');
        let cost_days = row.find('.cost_days');
        let total = row.find('.total');
        calculateSum(no_of_worker, work_days, cost_days, total);
    });


    $("#labour-form").validate({
        errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);
        }
        , rules: {
            "no_of_worker[]": {
                required: true
            }
            , "work_days[]": {
                required: true
            }
            , "cost_days[]": {
                required: true
            }
            , "cost_days[]": {
                required: true
            }
            , "labour_type[]": {
                required: true
            },


        }
        , messages: {

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-project-plan-labour';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {
                    if (res.status) {
                        $(".success-labour").css("color", "#28a745");
                        $(".success-labour").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".success-labour").css("color", "red");
                        $(".success-labour").html(res.msg);
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





    function delete_labour(site_plan_labour_id) {
        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/add-project-plan-labour';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , site_plan_labour_id: site_plan_labour_id
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
{{-- Labour Tab End --}}

{{-- Material Tab Start --}}
<script>
    // $('.select2').select2();
    let selectedOptions = [];
    let selectedIndex = [];
    // Function to handle dependent dropdowns
    function handleDependentDropdowns(material_type, material) {
        // alert(selectedOptions)
        // console.log(selectedOptions);
        // alert(material_type)
        // alert(material)
        let SelectedMaterial=[];
        $('select[name="material[]"]').each(function() {
                    // Get the selected values using the val() method
                  var selectedValues = $(this).val();
                    // Push the selected values to the array
                    if(selectedValues){
                        SelectedMaterial.push(selectedValues);
                    }
                });
                SelectedMaterial = jQuery.unique( SelectedMaterial );
                console.log('selected Values-> '+ SelectedMaterial)
                material_type.on('change', function() {
            const value = $(this).val();
            // alert(value)
            site_id={!! json_encode($site_id)!!}
            material.empty().append('<option value="">Select an option</option>');
            if (value) {
                $.ajax({
                    url: base_url + `/get-material-options/${value}`
                    , method: 'GET'
                    ,
                 data: {
                    selectedOptions: SelectedMaterial,
                    site_id:site_id
                }
                    , headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                    , success: function(data) {

                        material.prop('disabled', false);
                        data.forEach(option => {
                            material.append(new Option(option.material_name + " (" + option.unit_name + ")", option.material_id));
                             // let newOption = new Option(option.material_name + " (" + option.unit_name + ")", option.material_id,);
                            //          // Setting custom attribute

                            // if(selectedOptions.includes(option.material_id.toString())){
                            //     $(newOption).attr('disabled',true);
                            // }
                            // material.append(newOption);
                        });
                    }
                });
            } else {
                // alert('asdasdasdadasda')
                material.prop('disabled', true);
            }
            material.trigger('change');
        });
    }

    // Initial binding
    handleDependentDropdowns($('#material_type-0'), $('#material-0'));
    var material_type = JSON.parse('<?php echo json_encode($material_type) ?>');
    console.log(material_type);
    // Function to add a new row

    let index='';
    function addRowMaterial() {

        index = $('.dynamic-row2').length;
        if(selectedIndex.includes(index)){
            max_index=Math.max.apply(Math,selectedIndex)
            index=max_index+1;
            selectedIndex.push(index)

        }else{

            selectedIndex.push(index)
        }
        let newRow2 = `
        <div class="form-row mb-3 dynamic-row2">
            <div class="col form-group">
                <label for="material_type-${index}">Material Type</label>
                <select class="form-control select2 material_type" id="material_type-${index}" name="material_type[]">
                    <option value="">Select an option</option>
                    `
        $.each(material_type, function(key, value) {
            newRow2 += `  <option value="` + value.mtype_id + `">` + value.material_type + `</option>`

        });
        newRow2 += `</select>
                </select>
            </div>
            <div class="col form-group">
                <label for="material-${index}">Material</label>
                <select class="form-control select2 select2-dependent" id="material-${index}" name="material[]" disabled>
                    <option value="">Select an option</option>
                </select>
            </div>
            <div class="col form-group">
                <label for="quantity-${index}">Quantity</label>
                <input type="number" min="0" class="form-control" id="quantity-${index}" name="quantity[]" required>
            </div>
            <div class="col form-group">

                                    <label for="rate-${index}">Rate/unit</label>
                                    <input type="number" min="0" class="form-control" id="rate-${index}" name="rate[]"  required>
                                </div>
            <div class="col-auto form-group">
                <button type="button" class="btn btn-danger remove-row mt-4">Remove</button>
            </div>
        </div>
    `;
        $('#form-rows2').append(newRow2);

        // Initialize Select2 for the new dropdowns
        $(`#material_type-${index}`).select2();
        $(`#material-${index}`).select2();

        // Bind dependent dropdowns
        handleDependentDropdowns($(`#material_type-${index}`), $(`#material-${index}`));
    }

    // Event listener for adding rows
    $('#material-form').on('click', '.add-row', function() {
        addRowMaterial();
    });
    // Event listener for adding rows
    $('#material-form').on('change', '.select2-dependent', function() {
        $(this).attr('disabled',true)
    });

    // Event listener for removing rows
    $('#material-form').on('click', '.remove-row', function() {
        const row = $(this).closest('.dynamic-row2');
        const select2Value = row.find('.select2-dependent').val();
       if($.inArray(select2Value.toString(), selectedOptions)){
        console.log("selected Options before "+ selectedOptions);
        selectedOptions.splice($.inArray(select2Value.toString(), selectedOptions), 1);
        console.log("selected Options after "+ selectedOptions);

       }

        $(this).closest('.dynamic-row2').remove();
    });



    function disableSelectedOptions() {
                $('.select2-dependent').each(function() {
                    const value = $(this).val();
                    if (value && !(selectedOptions.includes(value.toString()))) {
                    // if (value) {
                        selectedOptions.push(value);
                    }
                });
            }

             // Handle option removal on change
             $('#material-form').on('click', '.select2-dependent', function() {
                disableSelectedOptions();

                const splitArray = $(this).attr('id').split('-');
                // alert(splitArray)

                handleDependentDropdowns($(`#material_type-${splitArray[1]}`), $(`#material-${splitArray[1]}`));
                // console.log("selected Options onchange  "+ selectedOptions);
            });


    $("#material-form").validate({
        errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);
        }
        , rules: {
            "material_type[]": {
                required: true
            }
            , "material[]": {
                required: true
            }
            , "quantity[]": {
                required: true
            }

        }
        , messages: {

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-project-plan-material';
            $('#material-form').find(':disabled').each(function() {
                    $(this).removeAttr('disabled');
                });
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {
                    if (res.status) {
                        $(".success-material").css("color", "#28a745");
                        $(".success-material").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".success-material").css("color", "red");
                        $(".success-material").html(res.msg);
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



    function delete_material(site_plan_material_id) {
        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/add-project-plan-material';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , site_plan_material_id: site_plan_material_id
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
{{-- Material Tab Ends --}}




{{-- Machine Tab Start --}}
<script>
    // $('.select2').select2();
    let selectedOptionsMachine= [];
    let selectedIndexMachine = [];
    // Function to handle dependent dropdowns
    // function handleDependentMachineDropdowns(machine_type, machine,machine_cost_pr_hrs) {
    function handleDependentMachineDropdowns(machine_type, machine) {

        let Selectedmachine=[];
        $('select[name="machine[]"]').each(function() {
                    // Get the selected values using the val() method
                  var selectedValues = $(this).val();
                    // Push the selected values to the array
                    if(selectedValues){
                        Selectedmachine.push(selectedValues);
                    }
                });
                Selectedmachine = jQuery.unique( Selectedmachine );
                console.log('selected Values -> '+ Selectedmachine)
                machine_type.on('change', function() {
            const value = $(this).val();
            // alert(value)
            machine.empty().append('<option value="">Select an option</option>');
            if (value) {
                $.ajax({
                    url: base_url + `/get-machine-options/${value}`
                    , method: 'GET'
                    ,
                 data: {
                    selectedOptions: Selectedmachine
                }
                    , headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                    , success: function(data) {
                        console.log(machine);
                    // alert(machine)
                        machine.prop('disabled', false);
                        data.forEach(option => {
                            // machine_cost_pr_hrs
                            machine.append(new Option(option.machine_name , option.machine_id));
                             // let newOption = new Option(option.machine_name + " (" + option.unit_name + ")", option.machine_id,);
                            //          // Setting custom attribute

                            // if(selectedOptions.includes(option.machine_id.toString())){
                            //     $(newOption).attr('disabled',true);
                            // }
                            // machine.append(newOption);

                        });
                    }
                });
            } else {
                // alert('asdasdasdadasda')
                machine.prop('disabled', true);
            }
            machine.trigger('change');
        });
    }

    // Initial binding
    // handleDependentMachineDropdowns($('#machine_type-0'), $('#machine-0'),$('#machine_cost_pr_hrs-0'));
    handleDependentMachineDropdowns($('#machine_type-0'), $('#machine-0'));
    var machine_type = JSON.parse('<?php echo json_encode($machine_type) ?>');
    console.log(machine_type);
    // Function to add a new row

    let indexMachine='';
    function addMachineRow() {
        indexMachine = $('.dynamic-row3').length;
        if(selectedIndexMachine.includes(indexMachine)){
            max_indexMachine=Math.max.apply(Math,selectedIndexMachine)
            indexMachine=max_indexMachine+1;
            selectedIndexMachine.push(indexMachine)

        }else{
            selectedIndexMachine.push(indexMachine)
        }
        let newRow3 = `
        <div class="form-row mb-3 dynamic-row3">
            <div class="col form-group">
                <label for="machine_type-${indexMachine}">machine Type</label>
                <select class="form-control select2 machine_type" id="machine_type-${indexMachine}" name="machine_type[]">
                    <option value="">Select an option</option>
                    `
        $.each(machine_type, function(key, value) {
            newRow3 += `  <option value="` + value.mach_type_id + `">` + value.machine_type + `</option>`

        });
        newRow3 += `</select>
                </select>
            </div>
            <div class="col form-group">
                <label for="machine-${indexMachine}">Machine</label>
                <select class="form-control select2 select2-dependent" id="machine-${indexMachine}" name="machine[]" disabled>
                    <option value="">Select an option</option>
                </select>
            </div>
            <div class="col form-group">
                <label for="quantity-${indexMachine}">Quantity</label>
                <input type="number" min="0" class="form-control machine_quantity" id="quantity-${indexMachine}" name="quantity[]" required>
            </div>
            <div class="col form-group">
                                    <label for="estimated_time-${indexMachine}">Estimated Time</label>
                                    <input type="number" min="0" class="form-control machine_estimated_time" id="estimated_time-${indexMachine}" name="estimated_time[]"  required>
                                </div>

            <div class="col form-group">
                                    <label for="machine_total_cost-${indexMachine}">Total Cost</label>
                                    <input type="number" min="0" class="form-control" id="machine_total_cost-${indexMachine}" name="machine_total_cost[]"  disabled>
                                    <input type="hidden"  class="form-control" id="machine_cost_pr_hrs-${indexMachine}" name="machine_cost_pr_hrs[]">
                                    </div>
            <div class="col-auto form-group">
                <button type="button" class="btn btn-danger remove-row mt-4">Remove</button>
            </div>

    `;
        $('#form-rows3').append(newRow3);

        // Initialize Select2 for the new dropdowns
        $(`#machine_type-${indexMachine}`).select2();
        $(`#machine-${indexMachine}`).select2();

        // Bind dependent dropdowns
        // handleDependentMachineDropdowns($(`#machine_type-${indexMachine}`), $(`#machine-${indexMachine}`),$(`#machine_cost_pr_hrs-${indexMachine}`));
        handleDependentMachineDropdowns($(`#machine_type-${indexMachine}`), $(`#machine-${indexMachine}`));
    }

    // Event listener for adding rows
    $('#machine-form').on('click', '.add-row', function() {
        addMachineRow();
    });
    // Event listener for adding rows
    $('#machine-form').on('change', '.select2-dependent', function() {
        $(this).attr('disabled',true)

        const selected_id = $(this).attr('id').split('-');

        if($(this).val()){

            $.ajax({
                    url: base_url + `/get-machine-cost`
                    , method: 'GET'
                    ,
                 data: {
                    machine_id: $(this).val()
                }
                    , headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                    , success: function(data) {
                        $(`#machine_cost_pr_hrs-${selected_id[1]}`).val(data[0].machine_cost_per_hrs)
                        var ma_total_cost=$(`#machine_cost_pr_hrs-${selected_id[1]}`).val()* $(`#quantity-${selected_id[1]}`).val()*$(`#estimated_time-${selected_id[1]}`).val()
                        // alert(ma_total_cost)
                        $(`#machine_total_cost-${selected_id[1]}`).val(ma_total_cost)
                    }
                });

        }
    });

    // Event listener for removing rows
    $('#machine-form').on('click', '.remove-row', function() {
        const row = $(this).closest('.dynamic-row3');
        const select2Value = row.find('.select2-dependent').val();
       if($.inArray(select2Value.toString(), selectedOptions)){
        selectedOptions.splice($.inArray(select2Value.toString(), selectedOptions), 1);
       }

        $(this).closest('.dynamic-row3').remove();
    });

    function disableSelectedOptions() {
                $('.select2-dependent').each(function() {
                    const value = $(this).val();
                    if (value && !(selectedOptions.includes(value.toString()))) {
                    // if (value) {
                        selectedOptions.push(value);
                    }
                });
            }
             // Handle option removal on change
             $('#machine-form').on('click', '.select2-dependent', function() {
                disableSelectedOptions();
                const splitArray = $(this).attr('id').split('-');
                handleDependentMachineDropdowns($(`#machine_type-${splitArray[1]}`), $(`#machine-${splitArray[1]}`));

            });


    $("#machine-form").validate({
        errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);
        }
        , rules: {
            "machine_type[]": {
                required: true
            }
            , "machine[]": {
                required: true
            }
            , "quantity[]": {
                required: true
            }
        }
        , messages: {
        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-project-plan-machine';
            $('#machine-form').find(':disabled').each(function() {
                    $(this).removeAttr('disabled');
                });
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {
                    if (res.status) {
                        $(".success-machine").css("color", "#28a745");
                        $(".success-machine").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".success-machine").css("color", "red");
                        $(".success-machine").html(res.msg);
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



    function delete_machine(site_plan_machine_id) {
        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/add-project-plan-machine';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , site_plan_machine_id: site_plan_machine_id
                }
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , success: function(res) {
                    if (res.status) {
                        $(".machine-err").css("color", "#28a745");
                        $(".machine-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        // fp1.close();
                        $(".machine-err").css("color", "red");
                        $(".machine-err").html(res.msg);
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



    // $('machine_quantity.').on('change',function() {
        $('#machine-form').on('change', '.machine_quantity', function() {
         selected_id = $(this).attr('id').split('-');
         ma_total_cost=$(`#machine_cost_pr_hrs-${selected_id[1]}`).val()* $(this).val()*$(`#estimated_time-${selected_id[1]}`).val()
        $(`#machine_total_cost-${selected_id[1]}`).val(ma_total_cost)
            });

    // $('.machine_estimated_time').on('change',function() {
        $('#machine-form').on('change', '.machine_estimated_time', function() {
        selected_idd = $(this).attr('id').split('-');
        ma_total_cost=$(`#machine_cost_pr_hrs-${selected_idd[1]}`).val()* $(`#quantity-${selected_idd[1]}`).val()*$(this).val()
        $(`#machine_total_cost-${selected_idd[1]}`).val(ma_total_cost)
            });

</script>
{{-- machine Tab Ends --}}



{{-- Vehicle Types Tab Start --}}
<script>
    $('.vehicle_type').select2();

    var vehicle_types = JSON.parse('<?php echo json_encode($vehicle_types) ?>');

    // Function to get all selected values in Select2
    function getSelectedValuesVehicle() {
        let selectedValuesVechical = [];
        $('.vehicle_type').each(function() {
            let value = $(this).val();
            if (value) {
                selectedValuesVechical.push(value);
            }
        });
        return selectedValuesVechical;
    }

    // Function to replicate a new row
    function addRowVehicalTypes() {
        let index = $('.dynamic-row8').length;
        let newRow8 = `
        <div class="form-row mb-3 align-items-end dynamic-row8">
            <div class="col form-group">
                <label for="select-${index}">Vehicle Types</label>
                <select name="vehicle_type[]" id="vehicle_type-${index}" class="form-control select2 vehicle_type" style="width: 200px;" required>
                    <option value="">Choose...</option>
                    `
        $.each(vehicle_types, function(key, value) {
            newRow8 += `  <option value="` + value.id + `">` + value.name + `</option>`

        });
        newRow8 += `</select>
                </select>
            </div>
            <div class="col form-group">
                <label for="vehical_quantity-${index}">Quantity</label>
                <input type="number" name="vehical_quantity[]" id="vehical_quantity-${index}" class="form-control vehical_quantity">
            </div>
            <div class="col form-group">
                <label for="time_hours-${index}">Estimated Time(hours)</label>
                <input type="number" name="time_hours[]" id="time_hours-${index}" class="form-control time_hours">
            </div>
            <div class="col form-group">
                <label for="cost_per_hour-${index}">Cost/Hour</label>
                <input type="number" name="cost_per_hour[]" id="cost_per_hour-${index}" class="form-control cost_per_hour">
            </div>
            <div class="col form-group">
                    <label for="total_vehical_types_cost">Total Amount</label>
                   <input type="text" name="total_vehical_types_cost[]" id="total_vehical_types_cost-${index}" class="form-control total_vehical_types_cost" disabled>
             </div>
            <div class="col-auto form-group">
                <button type="button" class="btn btn-danger remove-row">Remove</button>
            </div>

        </div>
    `;
        $('#form-rows8').append(newRow8);
        $('.vehicle_type').select2();

        // Disable already selected options
        let selectedValuesVechical = getSelectedValuesVehicle();
        console.log("Selectd Vehical Types1 "+selectedValuesVechical)

        $('.vehicle_type').each(function() {
            let currentSelect = $(this);
            console.log("Selectd Vehical Types2 "+selectedValuesVechical)
            console.log("current Selected "+currentSelect)
            currentSelect.find('option').each(function() {
                if (selectedValuesVechical.includes($(this).val()) && $(this).val() !== currentSelect.val()) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }
            });
        });
    }

    // Add initial event listener for adding rows
    $('#vehicles-form').on('click', '.add-row', function() {
        addRowVehicalTypes();
    });

    // Add event listener for removing rows
    $('#vehicles-form').on('click', '.remove-row', function() {
        $(this).closest('.dynamic-row8').remove();

        // Re-enable options in remaining select2 dropdowns
        let selectedValuesVechical = getSelectedValuesVehicle();
        $('.vehicle_type').each(function() {
            let currentSelect = $(this);
            currentSelect.find('option').each(function() {
                console.log(currentSelect.val())
                if (selectedValuesVechical.includes($(this).val()) && $(this).val() !== currentSelect.val()) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }
            });
        });
        console.log(selectedValuesVechical);
    });

    // Disable options already selected in the first row
    $('#form-rows8').on('change', '.vehicle_type', function() {

        let selectedValuesVechical = getSelectedValuesVehicle();
        $('.vehicle_type').each(function() {
            let currentSelect = $(this);
            $(this).closest('.error').remove();
            currentSelect.find('option').each(function() {
                if (selectedValuesVechical.includes($(this).val()) && $(this).val() !== currentSelect.val()) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }
            });
        });
    });

    function calculateSumVehicle(vehical_quantity, time_hours, cost_per_hour, total_vehical_types_cost) {
        let value1 = parseFloat(vehical_quantity.val()) || 0;
        let value2 = parseFloat(time_hours.val()) || 0;
        let value3 = parseFloat(cost_per_hour.val()) || 0;
        total_vehical_types_cost.val(value1 * value2 * value3);
    }
    $('#vehicles-form').on('input', '.vehical_quantity, .time_hours, .cost_per_hour', function() {
        let row = $(this).closest('.dynamic-row8');
        let vehical_quantity = row.find('.vehical_quantity');
        let time_hours = row.find('.time_hours');
        let cost_per_hour = row.find('.cost_per_hour');
        let total_vehical_types_cost = row.find('.total_vehical_types_cost');
        calculateSumVehicle(vehical_quantity, time_hours, cost_per_hour, total_vehical_types_cost);
    });


    $("#vehicles-form").validate({
        errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);
        }
        , rules: {
            "vehical_quantity[]": {
                required: true
            }
            , "time_hours[]": {
                required: true
            }
            , "cost_per_hour[]": {
                required: true
            }
            , "vehicle_type[]": {
                required: true
            },


        }
        , messages: {

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-project-plan-vehicle-type';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {
                    if (res.status) {
                        $(".success-vehical-types").css("color", "#28a745");
                        $(".success-vehical-types").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".success-vehical-types").css("color", "red");
                        $(".success-vehical-types").html(res.msg);
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





    function delete_vehicle_type(site_plan_vehical_type_id) {
        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/add-project-plan-vehicle-type';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , site_plan_vehical_type_id: site_plan_vehical_type_id
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
{{-- Vehicle Types Tab End --}}







{{-- Department Tab Start --}}
<script>
    // $('.select2').select2();
    let selectedOptionsdepartment= [];
    let selectedIndexdepartment = [];
    // Function to handle dependent dropdowns
    // function handleDependentdepartmentDropdowns(department_type, department,department_cost_pr_hrs) {
    function handleDependentdepartmentDropdowns(department,user) {

        let Selecteduser=[];
        $('select[name="user[]"]').each(function() {
                    // Get the selected values using the val() method
                  var selectedValues = $(this).val();
                    // Push the selected values to the array
                    if(selectedValues){
                        Selecteduser.push(selectedValues);
                    }
                });
                Selecteduser = jQuery.unique( Selecteduser );
                console.log('selected Values -> '+ Selecteduser)
                department.on('change', function() {
            const value = $(this).val();
            // alert(value)
            user.empty().append('<option value="">Select an option</option>');
            if (value) {
                $.ajax({
                    url: base_url + `/get-user-options/${value}`
                    , method: 'GET'
                    ,
                 data: {
                    selectedOptions: Selecteduser
                }
                    , headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                    , success: function(data) {
                        console.log(department);
                    // alert(department)
                        user.prop('disabled', false);
                        data.forEach(option => {
                            // department_cost_pr_hrs
                            username=''
                            if(option.first_name){
                                username +=option.first_name
                            }
                            if(option.last_name){
                                username +=" "+option.last_name
                            }
                            user.append(new Option(username, option.user_id));
                             // let newOption = new Option(option.department_name + " (" + option.unit_name + ")", option.department_id,);
                            //          // Setting custom attribute

                            // if(selectedOptions.includes(option.department_id.toString())){
                            //     $(newOption).attr('disabled',true);
                            // }
                            // department.append(newOption);

                        });
                    }
                });
            } else {
                // alert('asdasdasdadasda')
                user.prop('disabled', true);
            }
            user.trigger('change');
        });
    }

    // Initial binding
    // handleDependentdepartmentDropdowns($('#department_type-0'), $('#department-0'),$('#department_cost_pr_hrs-0'));
    handleDependentdepartmentDropdowns($('#department-0'), $('#user-0'));
    var departments = JSON.parse('<?php echo json_encode($departments) ?>');
    console.log(departments);
    // Function to add a new row

    let indexdepartment='';
    function adddepartmentRow() {

        // return false;
        indexdepartment = $('.dynamic-row4').length;
        if($(`#user-${indexdepartment-1}`).val()){

        }else{
            alert('Please select the user/employee')
            return false;
        }


        if(selectedIndexdepartment.includes(indexdepartment)){
            max_indexdepartment=Math.max.apply(Math,selectedIndexdepartment)
            indexdepartment=max_indexdepartment+1;
            selectedIndexdepartment.push(indexdepartment)

        }else{
            selectedIndexdepartment.push(indexdepartment)
        }
        console.log(selectedIndexdepartment)
        // alert(selectedIndexdepartment)
        let newRow4 = `
        <div class="form-row mb-3 dynamic-row4">
            <div class="col-3 form-group">
                <label for="department-${indexdepartment}">Department</label>
                <select class="form-control select2 department" id="department-${indexdepartment}" name="department[]">
                    <option value="">Select an option</option>
                    `
        $.each(departments, function(key, value) {
            newRow4 += `  <option value="` + value.role_id + `">` + value.role_name + `</option>`

        });
        newRow4 += `</select>
                </select>
            </div>
            <div class="col-3 form-group">
                <label for="user-${indexdepartment}">User/Employees</label>
                <select class="form-control select2 select2-dependent" id="user-${indexdepartment}" name="user[]" disabled>
                    <option value="">Select an option</option>
                </select>
            </div>
            <div class="col-auto form-group">
                <button type="button" class="btn btn-danger remove-row mt-4">Remove</button>
            </div>

    `;
        $('#form-rows4').append(newRow4);

        // Initialize Select2 for the new dropdowns
        $(`#department-${indexdepartment}`).select2();
        $(`#user-${indexdepartment}`).select2();

        // Bind dependent dropdowns
        // handleDependentdepartmentDropdowns($(`#department_type-${indexdepartment}`), $(`#department-${indexdepartment}`),$(`#department_cost_pr_hrs-${indexdepartment}`));
        handleDependentdepartmentDropdowns($(`#department-${indexdepartment}`), $(`#user-${indexdepartment}`));
    }

    // Event listener for adding rows
    $('#department-form').on('click', '.add-row', function() {
        adddepartmentRow();
    });
    // Event listener for adding rows
    $('#department-form').on('change', '.select2-dependent', function() {
        $(this).attr('disabled',true)

        const selected_id = $(this).attr('id').split('-');

        // if($(this).val()){

        //     $.ajax({
        //             url: base_url + `/get-department-cost`
        //             , method: 'GET'
        //             ,
        //          data: {
        //             department_id: $(this).val()
        //         }
        //             , headers: {
        //                 'X-CSRF-TOKEN': csrfToken
        //             }
        //             , success: function(data) {
        //                 $(`#department_cost_pr_hrs-${selected_id[1]}`).val(data[0].department_cost_per_hrs)
        //                 var ma_total_cost=$(`#department_cost_pr_hrs-${selected_id[1]}`).val()* $(`#quantity-${selected_id[1]}`).val()*$(`#estimated_time-${selected_id[1]}`).val()
        //                 // alert(ma_total_cost)
        //                 $(`#department_total_cost-${selected_id[1]}`).val(ma_total_cost)
        //             }
        //         });

        // }
    });

    // Event listener for removing rows
    $('#department-form').on('click', '.remove-row', function() {
        const row = $(this).closest('.dynamic-row4');
        const select2Value = row.find('.select2-dependent').val();
       if($.inArray(select2Value.toString(), selectedOptions)){
        selectedOptions.splice($.inArray(select2Value.toString(), selectedOptions), 1);
       }

        $(this).closest('.dynamic-row4').remove();
    });

    function disableSelectedOptions() {
                $('.select2-dependent').each(function() {
                    const value = $(this).val();
                    if (value && !(selectedOptions.includes(value.toString()))) {
                    // if (value) {
                        selectedOptions.push(value);
                    }
                });
            }
             // Handle option removal on change
             $('#department-form').on('click', '.select2-dependent', function() {
                disableSelectedOptions();
                const splitArray = $(this).attr('id').split('-');
                handleDependentdepartmentDropdowns($(`#department-${splitArray[1]}`), $(`#user-${splitArray[1]}`));

            });


    $("#department-form").validate({
        errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);
        }
        , rules: {
             "department[]": {
                required: true
            }
            , "user[]": {
                required: true
            }
        }
        , messages: {
        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/add-project-plan-department';
            $('#department-form').find(':disabled').each(function() {
                    $(this).removeAttr('disabled');
                });
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: new FormData(form)
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(res) {
                    if (res.status) {
                        $(".success-department").css("color", "#28a745");
                        $(".success-department").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".success-department").css("color", "red");
                        $(".success-department").html(res.msg);
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



    function delete_department(site_plan_department_id) {
        if (confirm("Do you want to delete record ?")) {
            redUrl = base_url + '/add-project-plan-department';
            $.ajax({
                url: redUrl
                , type: 'post'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , delete: 1
                    , site_plan_department_id: site_plan_department_id
                }
                , dataType: 'json'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
                , success: function(res) {
                    if (res.status) {
                        $(".department-err").css("color", "#28a745");
                        $(".department-err").html(res.msg);
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        // fp1.close();
                        $(".department-err").css("color", "red");
                        $(".department-err").html(res.msg);
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



    // $('department_quantity.').on('change',function() {
        $('#department-form').on('change', '.department_quantity', function() {
         selected_id = $(this).attr('id').split('-');
         ma_total_cost=$(`#department_cost_pr_hrs-${selected_id[1]}`).val()* $(this).val()*$(`#estimated_time-${selected_id[1]}`).val()
        $(`#department_total_cost-${selected_id[1]}`).val(ma_total_cost)
            });

    // $('.department_estimated_time').on('change',function() {
        $('#department-form').on('change', '.department_estimated_time', function() {
        selected_idd = $(this).attr('id').split('-');
        ma_total_cost=$(`#department_cost_pr_hrs-${selected_idd[1]}`).val()* $(`#quantity-${selected_idd[1]}`).val()*$(this).val()
        $(`#department_total_cost-${selected_idd[1]}`).val(ma_total_cost)
            });

</script>
{{-- Department Tab Ends --}}




</body>
</html>
