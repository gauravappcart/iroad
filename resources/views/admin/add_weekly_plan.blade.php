@include('admin/header')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.5.0/nouislider.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.5.0/nouislider.min.js"></script>
<style>
    .hidden {
        display: none;
    }

    .section {
        margin-bottom: 20px;
    }

    .row {
        margin-bottom: 10px;
    }

    /* input[type=range] {
    width: 100%;
    margin: 20px 0;
}

.range-info {
    display: flex;
    justify-content: space-between;
    width: 100%;
    max-width: 300px;
    margin: 0 auto;
} */

    /* .range-slider-container {
        width: 80%;
        max-width: 500px;
        text-align: center;
    }

    .slider {
        position: relative;
        width: 100%;
        height: 6px;
        background: #ddd;
        border-radius: 3px;
        margin: 20px 0;
    }

    .slider .thumb {
        position: absolute;
        width: 20px;
        height: 20px;
        background: #007bff;
        border-radius: 50%;
        cursor: pointer;
        top: -7px;
        z-index: 2;
    }

    .slider .range {
        position: absolute;
        height: 100%;
        background: #007bff;
        z-index: 1;
    }

    .values {
        display: flex;
        justify-content: space-between;
    }
    .slider-container {
    max-width: 500px;
    margin: 50px auto;
  } */

  .slider-container {
    width: 80%;
    margin: 20px auto;
}

.row {
    display: flex;
    justify-content: space-between;
}

#value-min, #value-max {
    width: 50px;
    text-align: center;
}
</style>
<?php $prefix = $profile_data['prefix']; ?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="text-success">Site Name</span> - <a href="{{ $prefix . '/add-project-details?site_id=' . $site_id }}"><span class="text-primary">{{ $site['site_name'] }}</span> </a> -Weekly Plan List</h1>
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
                        <strong class="card-title">Weekly Plan</strong>
                        <a href="{{ $prefix . '/add-project-details' . '?site_id=' . $site_id }}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;



                                {{-- <div class="slider-container">
                                    <label for="rangeSlider">Chainage Range: </label>
                                        <div id="slider"></div>
                                    <div class="row">
                                        <div id="value-min"></div>
                                        <div id="value-max" class="justify-content"></div>
                                    </div>
                                </div> --}}


            </div>
            <div class="card p-3 m-2">
                        <form id="filter_form">
                            <div class="form-row align-items-end">
                                <div class="form-group col-md-3 ml-md-3">
                                    <label for="number1">From:</label>
                                    <input type="number" class="form-control" id="min_range" name="min_range" value={{request('minValue')}}>

                                </div>
                                <div class="form-group col-md-3 ml-md-3">
                                    <label for="number2">To:</label>
                                    <input type="number" class="form-control"  id="max_range" name="max_range" value={{request('maxValue')}}>
                                </div>
                                <div class="form-group col-md-2 ml-md-3">
                                    <button type="button" onclick="min_max_chainage()" class="btn  btn-primary ">Submit</button>
                                    <button type="button" onclick="rest_chainage()" class="btn  btn-danger ">Reset</button>
                                </div>
                            </div>
                        </form>
            </div>
            <form id="weekly_form">
                @csrf
                <input type="hidden"  name="site_id" value={{request('site_id')}}>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage-list">Chainage List:<span style="color:red">*</span></label>
                                <select class="form-control select2 " id="chainage-list" name="chainage_list" style="width: 100%;">
                                    @foreach ($site_chainages as $site_chainages_row)

                                    @if($site_chainages_row['from_length']=='0' || !empty($site_chainages_row['from_length']))
                                    <option value="{{ base64_encode($site_chainages_row['chainage_id']) }}" {{ $site_chainages_row['chainage_id']==$chainage_id_decoded?'selected=true':'' }}>
                                        {{$site_chainages_row['component_name']}} <span>(CH </span> {{ $site_chainages_row['from_length'] }} -
                                        @endif

                                        @if($site_chainages_row['to_length'])
                                        {{ $site_chainages_row['to_length'] }}
                                        @endif


                                        @if($site_chainages_row['chainage_foundation_height'])
                                    <option value="{{ base64_encode($site_chainages_row['chainage_id']) }}" {{ $site_chainages_row['chainage_id']==$chainage_id_decoded?'selected=true':'' }}>
                                        {{$site_chainages_row['component_name']}} <span>(CH </span> {{ $site_chainages_row['chainage_foundation_height'] }} -
                                        @endif


                                        @if($site_chainages_row['chainage_pier_height'])
                                        {{ $site_chainages_row['chainage_pier_height'] }} -
                                        @endif


                                        @if($site_chainages_row['chainage_pier_cap_height'])
                                        {{ $site_chainages_row['chainage_pier_cap_height'] }}
                                        @endif


                                        @if($site_chainages_row['chainage_max_elevation_height'])
                                        {{ $site_chainages_row['chainage_max_elevation_height'] }} -
                                        @endif


                                        @if($site_chainages_row['chainage_max_depth_at_center'])
                                        - {{ $site_chainages_row['chainage_max_depth_at_center'] }}
                                        @endif


                                        @if($site_chainages_row['chainage_width'])

                                        {{ $site_chainages_row['chainage_width'] }} -
                                        @endif


                                        @if($site_chainages_row['chainage_thickness'])

                                        {{ $site_chainages_row['chainage_thickness'] }}
                                        @endif
                                        <span> ) </span>
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="plan-start">Plan Start Date:<span style="color:red">*</span></label>
                                {{-- <input class="form-control" min="{{date('Y-m-d')}}" type="date" id="plan-start" name="plan-start" onchange="updateEndDate()"> --}}
                                <input class="form-control d_err" min="{{date('Y-m-d')}}" type="date" id="plan-start" name="plan_start">

                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="plan-end">Plan End Date:<span style="color:red">*</span></label>
                                {{-- <input class="form-control" min="{{date('Y-m-d')}}" type="date" id="plan-end" name="plan-end" disabled> --}}
                                <input class="form-control d_err" min="{{date('Y-m-d')}}" type="date" id="plan-end" name="plan_end">
                            </div>
                        </div>
                        {{-- <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="section form-group">
                                    <label for="chainage-from">Chainage From:</label>
                                    <input class="form-control" type="number" id="chainage-from" name="chainage-from">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="section form-group">
                                    <label for="chainage-to">Chainage To:</label>
                                    <input class="form-control" type="number" id="chainage-to" name="chainage-to">
                                </div>
                            </div> --}}

                        {{-- <h1>{{json_encode($site['associated_project_components'])}}</h1> --}}
                        @if(!empty($site['associated_project_components']))

                        @foreach ( $site['associated_project_components'] as $data)
                        {{-- {{print_r($data['from_length'])}} --}}
                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['from_length']=='0' || !empty($data['from_length']))
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage-from">Chainage From (Min {{$data['from_length']}} in METERS):<span style="color:red">*</span></label>
                                <input class="form-control" type="number" id="chainage-from" name="chainage_from" onkeyup="checkchainage({{$data['from_length']}},{{$data['to_length']}})">
                                <span id="chainage_from_err" class="chainage_from_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif

                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['to_length'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage-to">Chainage To (Max {{$data['to_length']}} in METERS):<span style="color:red">*</span></label>
                                <input class="form-control" type="number" id="chainage-to" name="chainage_to" onkeyup="checkchainage({{$data['from_length']}},{{$data['to_length']}})">
                                <span id="chainage_to_err" class="chainage_to_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif


                        {{-- --------------------------------}}
                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_height'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage-to">Height (Max {{$data['chainage_height']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_height" name="chainage_height" onkeyup="checkvalid(event,0,{{$data['chainage_height']}})">
                                <span id="chainage_height_err" class="chainage_height_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif

                        {{-- --------------------------------}}
                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_foundation_height'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage-to">Foundation Height (Max {{$data['chainage_foundation_height']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_foundation_height" name="chainage_foundation_height" onkeyup="checkvalid(event,0,{{$data['chainage_foundation_height']}})">
                                <span id="chainage_foundation_height_err" class="chainage_foundation_height_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif

                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_pier_height'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage_pier_height">Pier Height (Max {{$data['chainage_pier_height']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_pier_height" name="chainage_pier_height" onkeyup="checkvalid(event,0,{{$data['chainage_pier_height']}})">
                                <span id="chainage_pier_height_err" class="chainage_pier_height_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif

                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_pier_cap_height'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage_pier_cap_height">Pier Cap Height (Max {{$data['chainage_pier_cap_height']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_pier_cap_height" name="chainage_pier_cap_height" onkeyup="checkvalid(event,0,{{$data['chainage_pier_cap_height']}})">
                                <span id="chainage_pier_cap_height_err" class="chainage_pier_cap_height_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif

                        {{-- --------------------------------}}
                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_max_elevation_height'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage_max_elevation_height">Max Elevation Height (Max {{$data['chainage_max_elevation_height']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_max_elevation_height" name="chainage_max_elevation_height" onkeyup="checkvalid(event,0,{{$data['chainage_max_elevation_height']}})">
                                <span id="chainage_max_elevation_height_err" class="chainage_max_elevation_height_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif
                        {{-- --------------------------------}}
                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_max_depth_at_center'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage_max_depth_at_center">Max Depth At Center (Max {{$data['chainage_max_depth_at_center']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_max_depth_at_center" name="chainage_max_depth_at_center" onkeyup="checkvalid(event,0,{{$data['chainage_max_depth_at_center']}})">
                                <span id="chainage_max_depth_at_center_err" class="chainage_max_depth_at_center_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif


                        {{-- --------------------------------}}
                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_width'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage_width">Width (Max {{$data['chainage_width']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_width" name="chainage_width" onkeyup="checkvalid(event,0,{{$data['chainage_width']}})">
                                <span id="chainage_width_err" class="chainage_width_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif

                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if($data['chainage_thickness'])
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="chainage_thickness">Thickness (Max {{$data['chainage_thickness']}} in METERS) :<span style="color:red">*</span> </label>
                                <input class="form-control" type="number" id="chainage_thickness" name="chainage_thickness" onkeyup="checkvalid(event,0,{{$data['chainage_thickness']}})">
                                <span id="chainage_thickness_err" class="chainage_thickness_err error"></span>
                            </div>
                        </div>
                        @endif
                        @endif
                        {{-- --------------------------------}}

                        @if($chainage_id_decoded==$data['chainage_id'])
                        @if(count($data['extra_fields'])>0)
                        @foreach ( $data['extra_fields'] as $extra)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            {{-- <p>{{$extra['extra_fname']}}: {{$extra['quantity']}} {{$extra['extra_unit']}}</p> --}}
                            <div class="section form-group">
                                <label for="chainage_thickness">{{$extra['extra_fname']}} (Max {{$extra['quantity']}} in {{$extra['extra_unit']}}):<span style="color:red">*</span> </label>
                                {{-- <input class="form-control" type="number" id="{{$extra['component_chainage_extra_field_id']}}" name="{{$extra['component_chainage_extra_field_id']}}_extra" onkeyup="checkvalid(event,0,{{$extra['quantity']}})" required> --}}
                                <input class="form-control" type="number" id="{{$extra['component_chainage_extra_field_id']}}" name="extra[]" onkeyup="checkvalid(event,0,{{$extra['quantity']}})" required>
                                <input class="form-control" type="hidden" id="extra_field_id_{{$extra['component_chainage_extra_field_id']}}" name="extra_field_id[]" value="{{$extra['component_chainage_extra_field_id']}}">
                                <span id="{{$extra['component_chainage_extra_field_id']}}_err" class="{{$extra['component_chainage_extra_field_id']}}_err error"></span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endif

                        @endforeach
                        @endif





                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <label for="activity-list">Activity List:<span style="color:red">*</span></label>
                                {{-- <select id="activity-list" class="select2 form-control"> --}}
                                <select class="form-control select2" id="activity-list" name="activity_list" style="width: 100%;">
                                    {{-- <option value="activity1">Activity 1</option>
                                        <option value="activity2">Activity 2</option>
                                        <option value="activity3">Activity 3</option>  --}}

                                    @foreach ($monitering_activity_attached_to_chainage as $activity_row)
                                    <option value="{{ $activity_row['monitor_activity_id'] }}">
                                        {{ $activity_row['activity_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="section form-group">
                                <div class="">
                                <label>Details :<span style="color:red">*</span></label><br>
                                <label><input class="" type="radio" name="options" id="all" value="1"> Regular</label>
                                <label><input class="" type="radio" name="options" id="lhs_rhs" value="2"> LHS and RHS</label>
                            </div>
                            </div>
                        </div>
                    </div>

                    {{-- All DIV Start --}}
                    <div class="card m-2" style="">
                        <div class="container">
                            <div id="all-div" class="hidden">
                                <h4 class="card-title my-3 text-center font-weight-bold">Regular</h4>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(238, 226, 162);">
                                    <div id="material-rows">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="material-name">Material Name:<span style="color:red">*</span></label><br>
                                                    {{-- <select class="select2 material-name form-control"> --}}
                                                    <select class="form-control select2 material-name" id="material-name" name="material_name[]" style="width: 100%;">
                                                        {{-- <option value="material1">Material 1</option>
                                                        <option value="material2">Material 2</option>
                                                        <option value="material3">Material 3</option>  --}}
                                                        @foreach ($materials as $material_row)
                                                        <option value="{{ $material_row['material_id'] }}">
                                                            {{ $material_row['material_name'] }}(Unit-{{$material_row['unit_name']}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="material-quantity">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="material-quantity form-control" name="material_quantity[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-material btn btn-primary">Add</button>
                                                <button type="button" class="remove-material btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(213, 243, 180);">
                                    <div id="machine-rows">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="machine-name">Machine Name:<span style="color:red">*</span></label><br>
                                                    {{-- <select class="select2 machine-name form-control"> --}}
                                                    <select class="form-control select2 machine-name" id="machine-name" name="machine_name[]" style="width: 100%;">
                                                        {{-- <option value="machine1">Machine 1</option>
                                                        <option value="machine2">Machine 2</option>
                                                        <option value="machine3">Machine 3</option>  --}}
                                                        @foreach ($assets as $asset_row)
                                                        <option value="{{ $asset_row['id'] }}">
                                                            {{ $asset_row['asset_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="machine-quantity">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="machine-quantity form-control" name="machine_quantity[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-machine btn btn-primary">Add</button>
                                                <button type="button" class="remove-machine btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(223, 242, 243);">
                                    <div id="labours-rows">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="labours-name">Labours Type:<span style="color:red">*</span></label><br>
                                                    {{-- <select class="select2 labours-name form-control"> --}}
                                                    <select class="form-control select2 labours-name" id="labours-name" name="labours_name[]" style="width: 100%;">
                                                        {{-- <option value="labours1">Labours 1</option>
                                                        <option value="labours2">Labours 2</option>
                                                        <option value="labours3">Labours 3</option>  --}}

                                                        @foreach ($labours as $labours_row)
                                                        <option value="{{ $labours_row['labour_id'] }}">
                                                            {{ $labours_row['labour_type'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="labours-quantity">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="labours-quantity form-control" name="labours_quantity[]">
                                                </div>
                                            </div>

                                            <div class="float-end my-4">
                                                <button type="button" class="add-labours btn btn-primary">Add</button>
                                                <button type="button" class="remove-labours btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- All DIV Ends --}}


                    <div id="lhs_rhs-div" class="hidden">
                        <div class="section form-group">
                        <div class="">
                            <label>Check Road LHS/RHS:<span style="color:red">*</span> </label><br>
                            {{-- <label><input type="checkbox" id="lhs"  name="lhs_and_rhs[]" value="1"> LHS</label>
                            <label><input type="checkbox" id="rhs" name="lhs_and_rhs[]" value="2"> RHS</label> --}}

                            <input class="" type="radio" name="lhs_and_rhs" id="lhs" value="1"> <label>LHS</label>
                            <input class="" type="radio" name="lhs_and_rhs" id="rhs" value="2"> <label>RHS</label>
                            <input class="" type="radio" name="lhs_and_rhs" id="both" value="3"><label> Both</label>
                        </div>
                        </div>
                    </div>

                    {{-- LHS DIV Start --}}
                    <div class="card m-2" style="">
                        <div class="container">
                            <div id="lhs-div" class="hidden">
                                <h4 class="card-title my-3 text-center font-weight-bold">LHS</h4>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                        <div class="section form-group">
                                            <label for="lhs-start">LHS Start Date:<span style="color:red">*</span></label>
                                            <input class="form-control" min="{{date('Y-m-d')}}" type="date" id="lhs-start" name="lhs_start2">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                        <div class="section form-group">
                                            <label for="lhs-end">LHS End Date:<span style="color:red">*</span></label>
                                            <input class="form-control" min="{{date('Y-m-d')}}" type="date" id="lhs-end" name="lhs_end2">
                                        </div>
                                    </div>
                                </div>
                                <!-- Replicate the material, machine, labours rows for LHS here -->
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(238, 226, 162);">
                                    <div id="material-rows2">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="material-name2">Material Name:<span style="color:red">*</span></label>
                                                    {{-- <select class="select2 material-name2 form-control"> --}}
                                                    <select class="form-control select2 material-name2" id="material-name2" name="material_name2[]" style="width: 100%;">
                                                        {{-- <option value="material1">Material 1</option>
                                                        <option value="material2">Material 2</option>
                                                        <option value="material3">Material 3</option>  --}}
                                                        @foreach ($materials as $material_row)
                                                        <option value="{{ $material_row['material_id'] }}">
                                                            {{ $material_row['material_name'] }} (Unit-{{$material_row['unit_name']}})</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="material-quantity2">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="material-quantity2 form-control" name="material_quantity2[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-material2 btn btn-primary">Add</button>
                                                <button type="button" class="remove-material2 btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(213, 243, 180);">
                                    <div id="machine-rows2">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="machine-name2">Machine Name:<span style="color:red">*</span></label>
                                                    {{-- <select class="select2 machine-name2 form-control"> --}}
                                                    <select class="form-control select2 machine-name2" id="machine-name2" name="machine_name2[]" style="width: 100%;">
                                                        {{-- <option value="machine1">Machine 1</option>
                                                        <option value="machine2">Machine 2</option>
                                                        <option value="machine3">Machine 3</option>  --}}
                                                        @foreach ($assets as $asset_row)
                                                        <option value="{{ $asset_row['id'] }}">
                                                            {{ $asset_row['asset_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="machine-quantity2">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="machine-quantity2 form-control" name="machine_quantity2[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-machine2 btn btn-primary">Add</button>
                                                <button type="button" class="remove-machine2 btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(223, 242, 243);">
                                    <div id="labours-rows2">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="labours-name2">Labours Type:<span style="color:red">*</span></label>
                                                    {{-- <select class="select2 labours-name2 form-control"> --}}
                                                    <select class="form-control select2 labours-name2" id="labours-name2" name="labours_name2[]" style="width: 100%;">
                                                        {{-- <option value="labours1">Labours 1</option>
                                                        <option value="labours2">Labours 2</option>
                                                        <option value="labours3">Labours 3</option>  --}}
                                                        @foreach ($labours as $labours_row)
                                                        <option value="{{ $labours_row['labour_id'] }}">
                                                            {{ $labours_row['labour_type'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="labours-quantity2">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="labours-quantity2 form-control" name="labours_quantity2[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-labours2 btn btn-primary">Add</button>
                                                <button type="button" class="remove-labours2 btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- LHS DIV End --}}

                    {{-- RHS DIV Start --}}
                    <div class="card m-2" style="">
                        <div class="container">
                            <div id="rhs-div" class="hidden">
                                <h4 class="card-title my-3 text-center font-weight-bold">RHS</h4>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                        <div class="section form-group">
                                            <label for="rhs-start">RHS Start Date:<span style="color:red">*</span></label>
                                            <input class="form-control" min="{{date('Y-m-d')}}" type="date" id="rhs-start" name="rhs_start3">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                        <div class="section form-group">
                                            <label for="rhs-end">RHS End Date:<span style="color:red">*</span></label>
                                            <input class="form-control" min="{{date('Y-m-d')}}" type="date" id="rhs-end" name="rhs_end3">
                                        </div>
                                    </div>
                                </div>
                                <!-- Replicate the material, machine, labours rows for RHS here -->
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(238, 226, 162);">
                                    <div id="material-rows3">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="material-name3">Material Name:<span style="color:red">*</span></label>
                                                    {{-- <select class="select2 material-name3 form-control"> --}}
                                                    <select class="form-control select2 material-name3" id="material-name3" name="material_name3[]" style="width: 100%;">
                                                        {{-- <option value="material1">Material 1</option>
                                                        <option value="material2">Material 2</option>
                                                        <option value="material3">Material 3</option>  --}}
                                                        @foreach ($materials as $material_row)
                                                        <option value="{{ $material_row['material_id'] }}">
                                                            {{ $material_row['material_name'] }} (Unit-{{$material_row['unit_name']}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="material-quantity3">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="material-quantity3 form-control" name="material_quantity3[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-material3 btn btn-primary">Add</button>
                                                <button type="button" class="remove-material3 btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(213, 243, 180);">
                                    <div id="machine-rows3">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="machine-name3">Machine Name:<span style="color:red">*</span></label>
                                                    {{-- <select class="select2 machine-name3 form-control"> --}}
                                                    <select class="form-control select2 machine-name3" id="machine-name3" name="machine_name3[]" style="width: 100%;">
                                                        {{-- <option value="machine1">Machine 1</option>
                                                        <option value="machine2">Machine 2</option>
                                                        <option value="machine3">Machine 3</option>  --}}

                                                        @foreach ($assets as $asset_row)
                                                        <option value="{{ $asset_row['id'] }}">
                                                            {{ $asset_row['asset_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="machine-quantity3">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="machine-quantity3 form-control" name="machine_quantity3[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-machine3 btn btn-primary">Add</button>
                                                <button type="button" class="remove-machine3 btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2" style="width: 100%; border-radius: 5px; background-color: rgb(223, 242, 243);">
                                    <div id="labours-rows3">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="labours-name3">Labours Type:<span style="color:red">*</span></label>
                                                    {{-- <select class="select2 labours-name3 form-control"> --}}
                                                    <select class="form-control select2 labours-name3" id="labours-name3" name="labours_name3[]" style="width: 100%;">
                                                        {{-- <option value="labours1">Labours 1</option>
                                                        <option value="labours2">Labours 2</option>
                                                        <option value="labours3">Labours 3</option>  --}}
                                                        @foreach ($labours as $labours_row)
                                                        <option value="{{ $labours_row['labour_id'] }}">
                                                            {{ $labours_row['labour_type'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                                <div class="section form-group">
                                                    <label for="labours-quantity3">Quantity:<span style="color:red">*</span></label>
                                                    <input type="number" class="labours-quantity3 form-control" name="labours_quantity3[]">
                                                </div>
                                            </div>
                                            <div class="float-end my-4">
                                                <button type="button" class="add-labours3 btn btn-primary">Add</button>
                                                <button type="button" class="remove-labours3 btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- RHS DIV End --}}

                    <div class="modal-footer">
                        {{-- <button type="button" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
                        <button type="submit" id="btnsubmit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/common.js') }}"></script>
<script>
    $(document).ready(function() {
        // $('.select2').select2({
        //     tags: true
        //     , maximumSelectionLength: 1
        //     , tokenSeparators: [',', ' ']
        //     , placeholder: "Select option"
        // });
        $(".select2").select2({
            placeholder: "Select option"
            , allowClear: true,
            // maximumSelectionLength: 1,
        });
        var appurl = {!!json_encode(url('/')) !!}
    var site_id = {!!json_encode($site_id) !!}
    var chainage_id = {!!json_encode($chainage_id) !!}

        $('#chainage-list').on('select2:select', function(e) {
            // Unselect the previously selected option
            $(this).find('option').prop('selected', false);
            // Select the currently selected option
            var appurl = {!!json_encode(url('/')) !!}
            var site_id = {!!json_encode($site_id) !!}
            var chainage_id = e.params.data.id
            // window.location = appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + ""

            var minValue = document.getElementById('min_range').value;
            var maxValue = document.getElementById('max_range').value;
            window.location = appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + "&minValue=" + minValue + "&maxValue=" + maxValue +""
        });

        $('input[name="options"]').change(function() {

            if ($('#all').is(':checked')) {

                $('#all-div').removeClass('hidden');
                $('#lhs_rhs-div').addClass('hidden');
            } else if ($('#lhs_rhs').is(':checked')) {

                $('#lhs_rhs-div').removeClass('hidden');
                $('#all-div').addClass('hidden');
            }
        });

        $('#lhs').change(function() {
            if (this.checked) {
                $('#lhs-div').removeClass('hidden');
                $('#rhs-div').addClass('hidden');
            } else {
                $('#lhs-div').addClass('hidden');
            }
        });

        $('#rhs').change(function() {
            if (this.checked) {
                $('#rhs-div').removeClass('hidden');
                $('#lhs-div').addClass('hidden');
            } else {
                $('#rhs-div').addClass('hidden');
            }
        });


        $('#both').change(function() {
            if (this.checked) {
                $('#rhs-div').removeClass('hidden');
                $('#lhs-div').removeClass('hidden');
            } else {
                $('#rhs-div').addClass('hidden');
                $('#lhs-div').addClass('hidden');
            }
        });

        var materials = JSON.parse('<?php echo json_encode($materials); ?>');
        var assets = JSON.parse('<?php echo json_encode($assets); ?>');
        var labours = JSON.parse('<?php echo json_encode($labours); ?>');

        function addRow(container, className) {
            if (className == 'material') {
                loopArray = materials
            } else if (className == 'machine') {
                loopArray = assets
            } else if (className == 'labours') {
                loopArray = labours
            }
            console.log(loopArray)
            // $(container).append(
            //     `<div class="row">
            //     <label for="${className}-name">${className.charAt(0).toUpperCase() + className.slice(1)} Name:</label>
            //     <select class="select2 ${className}-name">
            //         <option value="${className}1">${className.charAt(0).toUpperCase() + className.slice(1)} 1</option>
            //         <option value="${className}2">${className.charAt(0).toUpperCase() + className.slice(1)} 2</option>
            //         <option value="${className}3">${className.charAt(0).toUpperCase() + className.slice(1)} 3</option>
            //     </select>
            //     <label for="${className}-quantity">Quantity:</label>
            //     <input type="number" class="${className}-quantity" name="${className}-quantity">
            //     <button type="button" class="add-${className}">Add</button>
            //     <button type="button" class="remove-${className}">Remove</button>
            // </div>`
            // );


            // $(container).append(
            //         `<div class="row">
            //     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            //         <div class="section form-group">
            //                 <label for="${className}-name">${className.charAt(0).toUpperCase() + className.slice(1)} Name:</label>

            //                       <select class="form-control select2 ${className}-name"  name="${className}-name[]"     style="width: 100%;">
            //                          <option value="${className}1">${className.charAt(0).toUpperCase() + className.slice(1)} 1</option>
            //                          <option value="${className}2">${className.charAt(0).toUpperCase() + className.slice(1)} 2</option>
            //                          <option value="${className}3">${className.charAt(0).toUpperCase() + className.slice(1)} 3</option>
            //                        </select>
            //         </div>
            //     </div>
            //     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            //         <div class="section form-group">
            //                             <label for="${className}-quantity">Quantity:</label>
            //                             <input type="number" class="${className}-quantity form-control" name="${className}-quantity[]">
            //         </div>
            //     </div>
            //     <div class="float-end my-4">
            //                         <button type="button" class="add-${className}">Add</button>
            //                         <button type="button" class="remove-${className}">Remove</button>
            //     </div>
            // </div>`
            //     );




            // Start building the HTML string for the row
            let html =
                `<div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            <div class="section form-group">
                <label for="${className}-name">${className.charAt(0).toUpperCase() + className.slice(1)} Name:<span style="color:red">*</span></label>
                <select class="form-control select2 ${className}-name" name="${className}_name[]"     style="width: 100%;">`;

            // Loop through loopArray to generate options
            if (className == 'material') {
                for (let i = 0; i < loopArray.length; i++) {
                    html +=
                        `<option value="${loopArray[i].material_id}">${loopArray[i].material_name} (Unit- ${loopArray[i].unit_name})</option>`;
                }
            } else if (className == 'machine') {
                for (let i = 0; i < loopArray.length; i++) {
                    html += `<option value="${loopArray[i].id}">${loopArray[i].asset_name}</option>`;
                }
            } else if (className == 'labours') {
                for (let i = 0; i < loopArray.length; i++) {
                    html += `<option value="${loopArray[i].labour_id}">${loopArray[i].labour_type}</option>`;
                }
            }


            // Complete the HTML string for the quantity input and buttons
            html += `               </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            <div class="section form-group">
                <label for="${className}-quantity">Quantity:<span style="color:red">*</span></label>
                <input type="number" class="${className}-quantity form-control" name="${className}_quantity[]">
            </div>
        </div>
        <div class="float-end my-4">
            <button type="button" class="add-${className} btn btn-primary">Add</button>
            <button type="button" class="remove-${className} btn btn-danger">Remove</button>
        </div>
    </div>`;

            // Append the generated HTML to the container
            $(container).append(html);

            $('.select2').select2();
        }

        function addRow2(container, className) {

            //     $(container).append(
            //         `<div class="row">
            //     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            //         <div class="section form-group">
            //                 <label for="${className}-name2">${className.charAt(0).toUpperCase() + className.slice(1)} Name:</label>

            //                       <select class="form-control select2 ${className}-name2"  name="${className}-name2[]"     style="width: 100%;">
            //                          <option value="${className}1">${className.charAt(0).toUpperCase() + className.slice(1)} 1</option>
            //                          <option value="${className}2">${className.charAt(0).toUpperCase() + className.slice(1)} 2</option>
            //                          <option value="${className}3">${className.charAt(0).toUpperCase() + className.slice(1)} 3</option>
            //                        </select>
            //         </div>
            //     </div>
            //     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            //         <div class="section form-group">
            //                             <label for="${className}-quantity2">Quantity:</label>
            //                             <input type="number" class="${className}-quantity2 form-control" name="${className}-quantity2[]">
            //         </div>
            //     </div>
            //     <div class="float-end my-4">
            //                         <button type="button" class="add-${className}2">Add</button>
            //                         <button type="button" class="remove-${className}2 ">Remove</button>
            //     </div>
            // </div>`
            //     );


            if (className == 'material') {
                loopArray = materials
            } else if (className == 'machine') {
                loopArray = assets
            } else if (className == 'labours') {
                loopArray = labours
            }
            console.log(loopArray)
            // Start building the HTML string for the row
            let html =
                `<div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="section form-group">
                            <label for="${className}-name2">${className.charAt(0).toUpperCase() + className.slice(1)} Name:<span style="color:red">*</span></label>
                            <select class="form-control select2 ${className}-name2" name="${className}_name2[]"     style="width: 100%;">`;

            // Loop through loopArray to generate options
            if (className == 'material') {
                for (let i = 0; i < loopArray.length; i++) {
                    html +=
                        `<option value="${loopArray[i].material_id}">${loopArray[i].material_name} (Unit- ${loopArray[i].unit_name})</option>`;
                }
            } else if (className == 'machine') {
                for (let i = 0; i < loopArray.length; i++) {
                    html += `<option value="${loopArray[i].id}">${loopArray[i].asset_name}</option>`;
                }
            } else if (className == 'labours') {
                for (let i = 0; i < loopArray.length; i++) {
                    html += `<option value="${loopArray[i].labour_id}">${loopArray[i].labour_type}</option>`;
                }
            }


            // Complete the HTML string for the quantity input and buttons
            html += `               </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="section form-group">
                            <label for="${className}-quantity2">Quantity:<span style="color:red">*</span></label>
                            <input type="number" class="${className}-quantity2 form-control" name="${className}_quantity2[]">
                        </div>
                    </div>
                    <div class="float-end my-4">
                        <button type="button" class="add-${className}2 btn btn-primary">Add</button>
                        <button type="button" class="remove-${className}2 btn btn-danger">Remove</button>
                    </div>
                </div>`;

            // Append the generated HTML to the container
            $(container).append(html);

            $('.select2').select2();
        }



        function addRow3(container, className) {

            // $(container).append(
            //         `<div class="row">
            //     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            //         <div class="section form-group">
            //                 <label for="${className}-name3">${className.charAt(0).toUpperCase() + className.slice(1)} Name:</label>

            //                       <select class="form-control select2 ${className}-name3"  name="${className}-name3[]"     style="width: 100%;">
            //                          <option value="${className}1">${className.charAt(0).toUpperCase() + className.slice(1)} 1</option>
            //                          <option value="${className}2">${className.charAt(0).toUpperCase() + className.slice(1)} 2</option>
            //                          <option value="${className}3">${className.charAt(0).toUpperCase() + className.slice(1)} 3</option>
            //                        </select>
            //         </div>
            //     </div>
            //     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            //         <div class="section form-group">
            //                             <label for="${className}-quantity3">Quantity:</label>
            //                             <input type="number" class="${className}-quantity3 form-control" name="${className}-quantity3[]">
            //         </div>
            //     </div>
            //     <div class="float-end my-4">
            //                         <button type="button" class="add-${className}3">Add</button>
            //                         <button type="button" class="remove-${className}3 ">Remove</button>
            //     </div>
            // </div>`
            //     );


            if (className == 'material') {
                loopArray = materials
            } else if (className == 'machine') {
                loopArray = assets
            } else if (className == 'labours') {
                loopArray = labours
            }
            console.log(loopArray)

            // Start building the HTML string for the row
            let html =
                `<div class="row">
     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
         <div class="section form-group">
             <label for="${className}-name3">${className.charAt(0).toUpperCase() + className.slice(1)} Name:<span style="color:red">*</span></label>
             <select class="form-control select2 ${className}-name3" name="${className}_name3[]"     style="width: 100%;">`;

            // Loop through loopArray to generate options
            if (className == 'material') {
                for (let i = 0; i < loopArray.length; i++) {
                    html +=
                        `<option value="${loopArray[i].material_id}">${loopArray[i].material_name} (Unit- ${loopArray[i].unit_name})</option>`;
                }
            } else if (className == 'machine') {
                for (let i = 0; i < loopArray.length; i++) {
                    html += `<option value="${loopArray[i].id}">${loopArray[i].asset_name}</option>`;
                }
            } else if (className == 'labours') {
                for (let i = 0; i < loopArray.length; i++) {
                    html += `<option value="${loopArray[i].labour_id}">${loopArray[i].labour_type}</option>`;
                }
            }


            // Complete the HTML string for the quantity input and buttons
            html += `</select>
         </div>
     </div>
     <div class="col-xl-4 col-lg-4 col-md-6 col-12">
         <div class="section form-group">
             <label for="${className}-quantity3">Quantity:<span style="color:red">*</span></label>
             <input type="number" class="${className}-quantity3 form-control" name="${className}_quantity3[]">
         </div>
     </div>
     <div class="float-end my-4">
         <button type="button" class="add-${className}3 btn btn-primary">Add</button>
         <button type="button" class="remove-${className}3 btn btn-danger">Remove</button>
     </div>
 </div>`;

            // Append the generated HTML to the container
            $(container).append(html);

            $('.select2').select2();
        }


        $(document).on('click', '.add-material', function() {
            addRow('#material-rows', 'material');
        });

        $(document).on('click', '.add-machine', function() {
            addRow('#machine-rows', 'machine');
        });

        $(document).on('click', '.add-labours', function() {
            addRow('#labours-rows', 'labours');
        });

        $(document).on('click', '.remove-material', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.remove-machine', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.remove-labours', function() {
            $(this).closest('.row').remove();
        });





        $(document).on('click', '.add-material2', function() {
            addRow2('#material-rows2', 'material');
        });

        $(document).on('click', '.add-machine2', function() {
            addRow2('#machine-rows2', 'machine');
        });

        $(document).on('click', '.add-labours2', function() {
            addRow2('#labours-rows2', 'labours');
        });

        $(document).on('click', '.remove-material2', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.remove-machine2', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.remove-labours2', function() {
            $(this).closest('.row').remove();
        });



        $(document).on('click', '.add-material3', function() {
            addRow3('#material-rows3', 'material');
        });

        $(document).on('click', '.add-machine3', function() {
            addRow3('#machine-rows3', 'machine');
        });

        $(document).on('click', '.add-labours3', function() {
            addRow3('#labours-rows3', 'labours');
        });

        $(document).on('click', '.remove-material3', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.remove-machine3', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.remove-labours3', function() {
            $(this).closest('.row').remove();
        });



    });

</script>
<script>
    var newval_c_from;
    var newval_c_to;
    var new_c_from = 0;
    var new_c_to = 0;

    function checkchainage(ramp_from, ramp_to) {

        newval_c_from = parseInt($("#chainage-from").val());
        newval_c_to = parseInt($("#chainage-to").val());


        var result = parseInt(ramp_from);

        if ((newval_c_from < result || newval_c_from > parseInt(ramp_to)) || (newval_c_from > newval_c_to)) {
            $(".chainage_from_err").show();
            $(".chainage_from_err").html("Please check chainage from value");
            new_c_from = 1;
        } else {
            new_c_from = 0;
            $(".chainage_from_err").hide();
        }

        if ((newval_c_to > parseInt(ramp_to) || newval_c_to < result) || (newval_c_to < newval_c_from)) {

            new_c_to = 1;
            $(".chainage_to_err").show();
            $(".chainage_to_err").html("Please check chainage to value")
        } else {
            new_c_to = 0;

            $(".chainage_to_err").hide();
        }

    }



    function checkvalid(event, defaultValue, dataValue) {

        var inputElement = event.target;

        var inputId = inputElement.id;
        var inputValue = inputElement.value;

        if ((inputValue < defaultValue) || (inputValue > dataValue)) {
            $("#" + inputId + "_err").show();
            $("#" + inputId + "_err").html("Please enter right value between " + defaultValue + " and " + dataValue)
        } else {
            $("#" + inputId + "_err").hide();
        }
    }

</script>

{{-- <script>
    function updateEndDate() {
      var startDateInput = document.getElementById('plan-start');
      var endDateInput = document.getElementById('plan-end');

      if (startDateInput.value) {
        var startDate = new Date(startDateInput.value);
        startDate.setDate(startDate.getDate() + 7);

        var year = startDate.getFullYear();
        var month = ('0' + (startDate.getMonth() + 1)).slice(-2); // Months are zero-based, so +1
        var day = ('0' + startDate.getDate()).slice(-2);

        var endDateString = `${year}-${month}-${day}`;

        endDateInput.value = endDateString;
        endDateInput.disabled = true;
      } else {
        endDateInput.value = '';
        endDateInput.disabled = false;
      }
    }
  </script> --}}
<script>
    $("#weekly_form").validate({
        rules: {
            "chainage_list": {
                required: true
            }
            , "activity_list": {
                required: true
            }
            , "plan_start": {
                required: true
            }
            , "plan_end": {
                required: true
            }
            , "chainage_from": {
                required: true
            }
            , "chainage_to": {
                required: true
            }
            , "chainage_foundation_height": {
                required: true
            }
            , "chainage_pier_height": {
                required: true
            }
            , "chainage_pier_cap_height": {
                required: true
            }
            , "chainage_max_elevation_height": {
                required: true
            }
            , "chainage_max_depth_at_center": {
                required: true
            }
            , "chainage_width": {
                required: true
            }
            , "chainage_thickness": {
                required: true
            },
            "chainage_height": {
                required: true
            },

            "material_name[]": {
                required: true
            }
            , "material_quantity[]": {
                required: true
            }
            , "machine_name[]": {
                required: true
            }
            , "machine_quantity[]": {
                required: true
            }
            , "labours_name[]": {
                required: true
            }
            , "labours_quantity[]": {
                required: true
            },


            "material_name2[]": {
                required: true
            }
            , "material_quantity2[]": {
                required: true
            }
            , "machine_name2[]": {
                required: true
            }
            , "machine_quantity2[]": {
                required: true
            }
            , "labours_name2[]": {
                required: true
            }
            , "labours_quantity2[]": {
                required: true
            },


            "material_name3[]": {
                required: true
            }
            , "material_quantity3[]": {
                required: true
            }
            , "machine_name3[]": {
                required: true
            }
            , "machine_quantity3[]": {
                required: true
            }
            , "labours_name3[]": {
                required: true
            }
            , "labours_quantity3[]": {
                required: true
            },

            "lhs_start2": {
                required: true
            }
            , "lhs_end2": {
                required: true
            }
            , "rhs_start3": {
                required: true
            }
            , "rhs_end3": {
                required: true
            },

            "lhs_and_rhs": {
                // required: function(element) {
                // return $('#options').val() == 2;
                // }
                required: true
            },
            // lhs_and_rhs2:{
            //     // required: function(element) {
            //     // return $('#options').val() == 2;
            //     // }
            //     required:true
            // },
            // rhs:{
            //     // required: function(element) {
            //     // return $('#options').val() == 2;
            //     // }
            //     required:true
            // },
            options: {
                required: true
            }


        }
        , messages: {
            "chainage_list": {
                required: "Please Select Component"
            }
            , "activity_list": {
                required: "Please Select Activity"
            }
            , "plan_start": {
                required: "Please Select Plan Start Date"
            }
            , "plan_end": {
                required: "Please Select Plan End Date"
            }
            , "chainage_from": {
                required: "Please Enter Chainage From"
            }
            , "chainage_to": {
                required: "Please Enter Chainage To"
            }
            , "chainage_foundation_height": {
                required: "Please Enter Chainage Foundation Height"
            }
            , "chainage_pier_height": {
                required: "Please Enter Chainage Pier Height"
            }
            , "chainage_pier_cap_height": {
                required: "Please Enter Chainage Pier Cap Height"
            }
            , "chainage_max_elevation_height": {
                required: "Please Enter Chainage Max Elevation Height"
            }
            , "chainage_max_depth_at_center": {
                required: "Please Enter Chainage Max Depth Center"
            }
            , "chainage_width": {
                required: "Please Enter Width"
            }
            , "chainage_thickness": {
                required: "Please Enter Thickness"
            },
            "chainage_height": {
                required: "Please Enter Height"
            },

            "material_name[]": {
                required: "Please Select Material"
            }
            , "material_quantity[]": {
                required: "Please Enter Material Quantity"
            }
            , "machine_name[]": {
                required: "Please Select Machine"
            }
            , "machine_quantity[]": {
                required: "Please Enter Machine Quantity"
            }
            , "labours_name[]": {
                required: "Please Select Labour Type"
            }
            , "labours_quantity[]": {
                required: "Please Enter Labours Quantity"
            },


            "material_name2[]": {
                required: "Please Select Material"
            }
            , "material_quantity2[]": {
                required: "Please Enter Material Quantity"
            }
            , "machine_name2[]": {
                required: "Please Select Machine"
            }
            , "machine_quantity2[]": {
                required: "Please Enter Machine Quantity"
            }
            , "labours_name2[]": {
                required: "Please Select Labour Type"
            }
            , "labours_quantity2[]": {
                required: "Please Enter Labours Quantity"
            },


            "material_name3[]": {
                required: "Please Select Material"
            }
            , "material_quantity3[]": {
                required: "Please Enter Material Quantity"
            }
            , "machine_name3[]": {
                required: "Please Select Machine"
            }
            , "machine_quantity3[]": {
                required: "Please Enter Machine Quantity"
            }
            , "labours_name3[]": {
                required: "Please Select Labour Type"
            }
            , "labours_quantity3[]": {
                required: "Please Enter Labours Quantity"
            },

            "lhs_start2": {
                required: "Please Select Start Date"
            }
            , "lhs_end2": {
                required: "Please Select End Date"
            }
            , "rhs_start3": {
                required: "Please Select Start Date"
            }
            , "rhs_end3": {
                required: "Please Select End Date"
            },

            "lhs_and_rhs": {

                required: "Please Select Option"
            },
            options: {
                required: "Please Select Option"
            }

        }
        , errorPlacement: function(error, e) {
            e.parents('.form-group').append(error);

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/save-weekly-plan';
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

                        $(".activity-err").css("color", "#28a745");
                        $(".activity-err").html(res.msg);
                        setTimeout(function() {
                            // location.reload();
                            window.location = appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + ""
                        }, 500);

                    } else {
                        // fp1.close();
                        $(".activity-err").css("color", "red");
                        $(".activity-err").html(res.msg);

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



{{-- <script>
    // Create a new noUiSlider instance
    var slider = document.getElementById('slider');
    let min = {!!json_encode($min_from_max_to[0]->min_from_length) !!};
    let max = {!!json_encode($min_from_max_to[0]->max_to_length) !!};
    noUiSlider.create(slider, {
      start: [min, max], // Handle start positions
      connect: true, // Connect the handles with a line
      range: {
        'min': min,
        'max': max
      }
    });

    // Set the initial values
    var minValue = document.getElementById('value-min');
    var maxValue = document.getElementById('value-max');

    slider.noUiSlider.on('update', function(values, handle) {
      if (handle === 0) {
        minValue.innerHTML = parseInt(values[handle]);
      } else {
        maxValue.innerHTML = parseInt(values[handle]);
      }
      console.log(values[handle]);
    //    window.location = appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + ""
    });
</script> --}}

<script>
function min_max_chainage(){
    var appurl = {!!json_encode(url('/')) !!}
    var site_id = {!!json_encode($site_id) !!}
    var chainage_id = {!!json_encode($chainage_id) !!}
    var minValue = document.getElementById('min_range').value;
    var maxValue = document.getElementById('max_range').value;
// alert( appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + "&minValue=" + minValue + "&maxValue=" + maxValue +"")
    window.location = appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + "&minValue=" + minValue + "&maxValue=" + maxValue +""
}
function rest_chainage(){
    var appurl = {!!json_encode(url('/')) !!}
    var site_id = {!!json_encode($site_id) !!}
    var chainage_id = {!!json_encode($chainage_id) !!}
    window.location = appurl + "/admin/add-weekly-plan?site_id=" + site_id + "&chainage_id=" + chainage_id + "";
}
</script>
</body>

</html>
