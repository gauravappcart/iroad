@include('admin/header')


    <link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link href="https://oliveindesign.com/client/khalatkar-iroad/application/css/hint.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        .modal-backdrop {
    background-color: rgba(255, 255, 255, 0.5); /* Change the background color and opacity as needed */
}
        .page-title span{
            color: #44b749;
            line-height: 30px;
            font-size: 20px;
            /* color: #2d3037; */
            padding-left: 18px;
            border-left: 6px solid #44b749
        }

        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: inherit;
        background-color: transparent;
    }

    .nav-link {
        display: block;
        padding: none;
    }
        /* *************************************** */

        .nav-link .active>h5 {
            background: #4caf50;
            }

        .nav-link .components-img>h5:hover {
            background-color: #212529;
        }

    .site-details h4, .users-details h4 {
        font-size: 20px;
        padding: 15px 0px 40px 15px;
        color: #000;
        font-weight: bold;
    }

    .components-img h5 .icon.plain_road {
            background: url('../assets/images/components/plain_road_active.png') no-repeat center center;
        }

    .components-img h5 .icon.flyover {
            background: url('../assets/images/components/flyover_active.png') no-repeat center center;
        }

    .components-img h5 .icon.underpass {
            background: url('../assets/images/components/underpass_active.png') no-repeat center center;
        }

    .components-img h5 {
        padding: 10px;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        display: block;
        transition: 0.3s;
        text-align: left;
        border: 1px solid #aaaaaa;
        /* margin: 10px 0px; */
        padding: 22px 0px;
        cursor: pointer;
        background: #005497;
    }

    .components-img h5 .icon {
        width: 55px;
        height: 45px;
        display: block;
        float: left;
        margin-top: -14px;
        margin-left: 10px;
        margin-right: 20px;
    }

    .road-components-img {
        /* height: 787px; */
        /* padding: 10px; */
        border: 1px solid #aaaaaa;
        margin: 0px 0px 15px 0px;
    }

    #div1 {
    /* height: 786px; */
            /* padding: 10px 0px 80px 0px; */
            border: 1px solid #aaaaaa;
            margin: 0px 0px 15px 0px;
            overflow-y: scroll;
        }

        </style>

<?php $prefix= $profile_data['prefix'];?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><span>Site Name</span> - {{ $site['site_name'] }}</h1>
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
                                <a href="{{ $prefix.'/sites' }}" class="btn m-3 btn-success btn-sm pull-right">Back</a> &nbsp;
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
                            <!-- <div class="card-header">
                                    <button type="button" class="btn btn-success btn-sm add-site-btn" data-toggle="modal" data-target="#scrollmodal"> Add New Site </button>
                                    <button type="button" onclick="history.back()" class="btn btn-success btn-sm pull-right">Back</button>
                                        <strong class="card-title">Data Table</strong>
                            </div> --><!-- .card Header-->
                            <div class="card-body">
                            <form id="component_chainage" name="component_chainage">
                        @csrf

                        <input type="hidden" value="{{ $site['site_id'] }}" id="site_id" name="site_id">
                        <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">

                            <div class="site-details add-nameh4 mrg2015">
                                <h4>Project Details</h4>
                            </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="site_name" class=" form-control-label">SITE NAME</label>
                                            <input type="text" value="{{ $site['site_name'] }}" readonly id="site_name" name="site_name" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="no_of_junction" class=" form-control-label">JUNCTIONS</label>
                                            <input type="text" value="{{ $site['no_of_junction'] }}" readonly id="no_of_junction" name="no_of_junction" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="road_length" class=" form-control-label">LENGTH OF ROAD</label>
                                            <label class="input-group">
                                                <input type="text" value="{{ $site['road_length'] }} M" readonly id="road_length" readonly name="road_length" placeholder="" class="form-control">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="tender_budget" class=" form-control-label">TENDER BUDGET</label>
                                            <label class="input-group">
                                                <input type="text" readonly value="{{ $site['tender_budget'] }}" id="tender_budget" name="tender_budget" placeholder="" class="form-control">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="project_start_date" class=" form-control-label">PROJECT START DATE</label>
                                            <input type="text" value="{{ $site['project_start_date'] }}"  readonly id="project_start_date" name="project_start_date" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="project_end_date" class=" form-control-label">PROJECT END DATE</label>
                                            <input type="text" value="{{ $site['project_end_date'] }}" readonly id="project_end_date" name="project_end_date" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="design_chainage" class=" form-control-label">DESIGN CHAINAGE</label>
                                            <input type="text" value="{{ $site['design_chainage'] }}" readonly id="design_chainage" name="design_chainage" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    @if(!empty($site['associated_project_components']))
                                    @foreach ( $site['associated_project_components'] as $data)
                                    <div class="col-lg-3 mt-4">

                                            <a href="{{ $prefix.'/plan-project'.'?site_id='.base64_encode($data['site_id']).'&chainage_id='.base64_encode($data['chainage_id']) }}" class="btn btn-success"><span class="text-white">Plan Project</span></a> &nbsp;

                                    </div>
                                    @break
                                    @endforeach
                                    @endif
                                </div>



                                {{-- <ul class="nav nav-pills nav-fill" style="text-align: left;">
                                    <li class="active nav-item active"><a href="#first" data-toggle="tab" id="first_tab" class="nav-link"><h4>Add Road Components</h4></a></li>
                                    @if($site['associated_project_components'])
                                    <li class="nav-item"><a href="#second" data-toggle="tab" id="second_tab"><h4>Edit Road Components</h4></a></li>
                                     @endif
                                </ul> --}}

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item ">
                                        <a class="nav-link active font-weight-bold" style="font-size:15px" id="first_tab" data-toggle="tab" href="#first"  aria-controls="first" aria-selected="true">Add Road Components</a>
                                    </li>
                                    @if($site['associated_project_components'])
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold" style="font-size:15px" id="second_tab" data-toggle="tab" href="#second"  aria-controls="second" aria-selected="false">Edit Road Components</a>
                                    </li>
                                    @endif
                                </ul>

                                <div class="tab-content">


                                    {{-- <div id="first" class="tab-pane fade in active"> --}}
                                        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="users-tab">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="road-components-img">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                    @foreach($road_components as $rc_key=>$component)
                                                    <a class="nav-link {{$component['component_id'] }}-item" id="v-pills-home-tab{{ $rc_key }}" data-toggle="pill" href="#v-pills-home{{ $rc_key }}" role="tab" aria-controls="v-pills-home{{ $rc_key }}" aria-selected="true">
                                                        <!-- Home -->
                                                        <div class="col-lg-12 col-md-12 col-sm-12 {{$rc_key}}" id="{{ $component['component_id'] }}">
                                                            <div class="components-img" id="drag{{ $component['component_id'] }}" draggable="true" ondragstart="drag(event)">
                                                                @if($component['component_class'])
                                                                <h5><span class="icon {{ $component['component_class'] }}"></span><span class="text">{{ $component['component_name'] }}</span></h5>
                                                                @else
                                                                <h5><img class="icon" src="{{url('/public').'/'.($component['component_icon_file']) }}"></img><span class="text">{{ $component['component_name'] }}</span></h5>
                                                                @endif
                                                                <input type="hidden" id="comp_id_{{ $component['component_id'] }}" name="comp_id[]" value="{{ $component['component_id'] }}">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endforeach


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-8" id="div1">
                                                <div class="tab-content" id="v-pills-tabContent">

                                                @foreach($road_components as $rc_key=>$component)
                                                <!-- <div class="tab-pane fade show active" id="v-pills-home{{ $rc_key }}" role="tabpanel" aria-labelledby="v-pills-home-tab{{ $rc_key }}"> -->
                                                <div class="tab-pane fade" id="v-pills-home{{ $rc_key }}" role="tabpanel" aria-labelledby="v-pills-home-tab{{ $rc_key }}">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="chainage_block" class=" form-control-label">Enter No Of {{ $component['component_name'] }} Components<span style="color:red">*</span></label>
                                                                            <input type="text" name="no_of_chainage"  placeholder="Enter No Of {{ $component['component_name'] }} Components" class="form-control no_of_chainage">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                </div>
                                                @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" id="btnsubmit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                                        </div>

                                        </form>
                                    </div>

                                    <div id="second" class="tab-pane fade in">

                                        <div class="road-componant-content " style="margin:15px 0">

                                            <div class="row ">
                                            @if(!empty($site['associated_project_components']))
                                                    @foreach ( $site['associated_project_components'] as $data)
                                                   {{-- <h1> {{gettype($data['dimentionstype'])}}</h1> --}}

                                                   <?php
                                                    $parts = explode(",", $data['dimentionstype']);

                                                   ?>


                                                        {{-- <h1>{{$parts[0]}}</h1><br>
                                                        <h1>{{$parts[1]}}</h1><br> --}}

                                                        <div class="col-lg-5 col-md-5 col-sm-5 border m-1">
                                                            <div class="components-main-content">
                                                                <div class="components-img pd15">
                                                                    <h5><img class="icon" src="{{url('/public').'/'.($data['component_icon_file']) }}"></img><span class="text">{{$data['component_name']}}</span></h5>
                                                                    <div class="row">
                                                                            {{-- <?php if ( ($parts[0] == 1) || ($parts[1] == 1)) { ?>

                                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                    <p>From</p>
                                                                                    <p>({{$data["from_lat"]}},{{$data["from_long"]}})</p>
                                                                                    <p>Foundation Height : {{$data['from_length']}} M</p>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                    <p>To</p>
                                                                                    <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p>
                                                                                    <p>Pier Height : {{$data['to_length']}} M</p>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <?php if ( ($parts[0] == 2) || ($parts[1] == 2)) { ?>

                                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                    <p>From</p>
                                                                                    <p>({{$data["from_lat"]}}, {{$data["from_long"]}})</p>
                                                                                    <p>Chainage : {{$data['from_length']}} M</p>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                    <p>To</p>
                                                                                    <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p>
                                                                                    <p>Chainage : {{$data['to_length']}} M</p>
                                                                                </div>
                                                                            <?php } ?> --}}


                                                                        {{-- --------------------------------}}
                                                                            @if($data['from_length']=='0' || !empty($data['from_length']))
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                <p>From</p>
                                                                                <p>({{$data["from_lat"]}}, {{$data["from_long"]}})</p>
                                                                                <p>Chainage From: {{$data['from_length']}} M</p>
                                                                            </div>
                                                                            @endif

                                                                            @if($data['to_length'])
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                <p>To</p>
                                                                                <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p>
                                                                                <p>Chainage To: {{$data['to_length']}} M</p>
                                                                            </div>
                                                                            @endif

                                                                                {{-- --------------------------------}}

                                                                                @if($data['chainage_height'])
                                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                    {{-- <p>To</p>
                                                                                    <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                    <p>Height : {{$data['chainage_height']}} M</p>
                                                                                </div>
                                                                                @endif
                                                                            {{-- --------------------------------}}

                                                                            @if($data['chainage_foundation_height'])
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                {{-- <p>To</p>
                                                                                <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                <p>Foundation Height : {{$data['chainage_foundation_height']}} M</p>
                                                                            </div>
                                                                            @endif

                                                                            @if($data['chainage_pier_height'])
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                {{-- <p>To</p>
                                                                                <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                <p>Pier Height : {{$data['chainage_pier_height']}} M</p>
                                                                            </div>
                                                                            @endif

                                                                            @if($data['chainage_pier_cap_height'])
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                {{-- <p>To</p>
                                                                                <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                <p>Pier Cap Height : {{$data['chainage_pier_cap_height']}} M</p>
                                                                            </div>
                                                                            @endif

                                                                            {{-- --------------------------------}}

                                                                            @if($data['chainage_max_elevation_height'])
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                {{-- <p>To</p>
                                                                                <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                <p>Max Elevation Height : {{$data['chainage_max_elevation_height']}} M</p>
                                                                            </div>
                                                                            @endif
                                                                            {{-- --------------------------------}}
                                                                            @if($data['chainage_max_depth_at_center'])
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                {{-- <p>To</p>
                                                                                <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                <p>Max Depth At Center : {{$data['chainage_max_depth_at_center']}} M</p>
                                                                            </div>
                                                                            @endif


                                                                             {{-- --------------------------------}}

                                                                             @if($data['chainage_width'])
                                                                             <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                 {{-- <p>To</p>
                                                                                 <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                 <p>Width: {{$data['chainage_width']}} M</p>
                                                                             </div>
                                                                             @endif

                                                                             @if($data['chainage_thickness'])
                                                                             <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                 {{-- <p>To</p>
                                                                                 <p>({{ $data["to_lat"]}}, {{$data["to_long"]}})</p> --}}
                                                                                 <p>Thickness: {{$data['chainage_thickness']}} M</p>
                                                                             </div>
                                                                             @endif
                                                                            {{-- --------------------------------}}

                                                                            @if(count($data['extra_fields'])>0)
                                                                              @foreach ( $data['extra_fields'] as $extra)
                                                                              <div class="col-lg-6 col-md-6 col-sm-6">

                                                                                <p>{{$extra['extra_fname']}}: {{$extra['quantity']}} {{$extra['extra_unit']}}</p>
                                                                            </div>
                                                                              @endforeach

                                                                            @endif



                                                                </div>


                                                                </div>
                                                                <div>
                                                                    @php
                                                                    //  $from_length=null;
                                                                    // if($data['from_length']==0){
                                                                    //     $from_length=0;
                                                                    // }else{

                                                                    //     $from_length=$data['from_length']?$data['from_length']:null;
                                                                    // }

                                                                       $from_length=$data['from_length'];
                                                                       $to_length=$data['to_length']?$data['to_length']:null;
                                                                       $chainage_height=$data['chainage_height']?$data['chainage_height']:null;
                                                                       $chainage_foundation_height=$data['chainage_foundation_height']?$data['chainage_foundation_height']:null;
                                                                       $chainage_pier_height=$data['chainage_pier_height']?$data['chainage_pier_height']:null;
                                                                       $chainage_pier_cap_height=$data['chainage_pier_cap_height']?$data['chainage_pier_cap_height']:null;
                                                                       $chainage_max_elevation_height=$data['chainage_max_elevation_height']?$data['chainage_max_elevation_height']:null;
                                                                       $chainage_max_depth_at_center=$data['chainage_max_depth_at_center']?$data['chainage_max_depth_at_center']:null;
                                                                       $chainage_width=$data['chainage_width']?$data['chainage_width']:null;
                                                                       $chainage_thickness=$data['chainage_thickness']?$data['chainage_thickness']:null;
                                                                       $component_name=$data['component_name']?$data['component_name']:null;
                                                                       $chainage_id=$data['chainage_id']?$data['chainage_id']:null;
                                                                       $site_id=$data['site_id']?$data['site_id']:null;

                                                                       $extra_fields=[];
                                                                       $component_chainage_extra_field_id=[];
                                                                       if(count($data['extra_fields'])>0){
                                                                        foreach ($data['extra_fields'] as $index => $item) {
                                                                                $key =  ($index + 1);
                                                                                $extra_fields[$key] = $item;
                                                                            }
                                                                       }
                                                                    @endphp
                                                                    {{-- <p>{{json_encode($extra_fields)}}</p> --}}
                                                                    <button type="button" class="btn btn-success " onclick='openEditModal(@json($site_id),@json($chainage_id),@json($component_name),@json($from_length),@json($to_length),@json($chainage_height),@json($chainage_foundation_height),@json($chainage_pier_height),@json($chainage_pier_cap_height),@json($chainage_max_elevation_height),@json($chainage_max_depth_at_center),@json($chainage_width),@json($chainage_thickness),@json($extra_fields))' > <i class="fa fa-pencil-square-o" aria-hidden="true"  ></i> Edit</button>
                                                                    <button type="button" class="btn btn-warning m-2" onclick="remove_road_compenet({{$data['chainage_id']}},{{$data['site_id']}})"> <i class="fa fa-trash" aria-hidden="true"></i> Remove </button>
                                                                </div>

                                                                <div class="row">

                                                                    <a href="{{ $prefix.'/tender-item-list'.'?site_id='.base64_encode($data['site_id']).'&chainage_id='.base64_encode($data['chainage_id']) }}" class="btn btn-danger m-2">Tender Item</a> &nbsp;
                                                                    <a href="{{ $prefix.'/monitor-activity-list'.'?site_id='.base64_encode($data['site_id']).'&chainage_id='.base64_encode($data['chainage_id']) }}" class="btn btn-danger m-2">Monitor Activity</a>&nbsp;
                                                                    {{-- <a href="{{ $prefix.'/plan-project'.'?site_id='.base64_encode($data['site_id']).'&chainage_id='.base64_encode($data['chainage_id']) }}" class="btn btn-danger m-2">Plan Project</a> &nbsp; --}}
                                                                    <a href="{{ $prefix.'/weekly-plan'.'?site_id='.base64_encode($data['site_id']).'&chainage_id='.base64_encode($data['chainage_id']) }}" class="btn btn-danger m-2">Weekly Plan</a>&nbsp;

                                                                </div>
                                                            </div>
                                                         </div>
                                                <br><hr>
                                                    @endforeach
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center"><div class="col-lg-12 chainage-msg"></div></div>
                        </div>

                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                        </div>

                        </form> --}}
                            </div><!-- .card body -->
                        </div><!-- .card -->
                    </div><!-- .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .animated fadeIn -->
        </div><!-- .content -->


 {{-- Edit Model Start --}}
 <div class="modal" id="showEditModal" tabindex="-1" role="dialog" aria-labelledby="quotationModalLabel" aria-hidden="false">
    <div class="modal-dialog custom-width">
        <div class="modal-content">
            <div class="modal-header" style="height: auto; background: #005497;">
                <h4>
                    Edit Road Component
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </h4>
            </div>
            <div class="modal-body " style="padding: 20px;" id="res_data">
                <div class="row ">
                    <div class="col-sm-12">
                        <div class="lable-holder">
                            <label class="caption" id="req">Road Component : </label>
                        </div>
                    </div>
                    <form id="update_component">
                        {{-- @csrf --}}
                        <div class="modal-body " style="padding: 20px;">
                            <div class="row ">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="form-group fromlength"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">FROM<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number" min=0 name="fromlength" id="from" class="form-control" placeholder="Enter data in meters" style="margin:0" required />
                                            </div>
                                        </div>
                                        <div class="form-group tolength"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">TO<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="tolength" id="to" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>
                                                    {{-- ------------------------------------ --}}

                                                    <div class="form-group chainage_height"  style="margin-bottom:15px;display:none">
                                                        <label class="control-label col-sm-2">Height<span style="color:red">*</span></label>
                                                        <div class="col-sm-10">
                                                        <input type="number"  min=0 name="chainage_height" id="chainage_height" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                                        </div>
                                                    </div>



                                        <div class="form-group chainage_foundation_height"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Foundation Height<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_foundation_height" id="chainage_foundation_height" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div class="form-group chainage_pier_height"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Pier Height<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_pier_height" id="chainage_pier_height" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div class="form-group chainage_pier_cap_height"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Pier Cap Height<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_pier_cap_height" id="chainage_pier_cap_height" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div class="form-group chainage_max_elevation_height"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Max Elevation Height<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_max_elevation_height" id="chainage_max_elevation_height" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div class="form-group chainage_max_depth_at_center"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Max Depth At Center<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_max_depth_at_center" id="chainage_max_depth_at_center" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div class="form-group chainage_width"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Width<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_width" id="chainage_width" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div class="form-group chainage_thickness"  style="margin-bottom:15px;display:none">
                                            <label class="control-label col-sm-2">Chainage Thickness<span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="number"  min=0 name="chainage_thickness" id="chainage_thickness" class="form-control" placeholder="Enter data in meters" style="margin:0" required/>
                                            </div>
                                        </div>

                                        <div id="extraFieldsContainer"></div>

                                        <input type="hidden" name="edit_chainage_id" class="form-control" id="edit_chainage_id" />
                                        <input type="hidden" name="site_id" class="form-control" id="site_id" value="{{request('site_id')}}" />
                                        <input type="hidden" name="chainage_id" class="form-control" id="site_id" value="" />
                                    </div>
                                    <br />
                                </div>
                            </div>
                            {{-- <div class="text-center" >
                                        <span class="error text-danger" style="display:block"></span>
                                        <span class="success text-success" style="display:block"></span>
                                    </div>
                                    <br> --}}
                            <ul class="list-inline text-center" style="margin-top: 10; float: none;">
                                <li><button type="submit" class="btn btn-primary" style="background: #005497;">Save</button></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Edit Model Ends --}}


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
     var csrfToken = $('input[name="_token"]').attr('value');
        $(document).ready(function() {


            // $('.labour-nav').addClass('active');



          $('#bootstrap-data-table-export').DataTable();

          $(".add-site-btn").click(function(){
                $("#component_chainage").trigger("reset");
                initAutocomplete();
                // $("#refresh").click();
          });

          $(".nav-link").click(function(){

//             var classes = $(this).attr('class').split(' ');

// // Find the class that ends with '-item'
// var targetClass = classes.find(cls => cls.endsWith('-item'));

// // Extract the string before '-item'
// if (targetClass) {
//     var extractedString = targetClass.split('-')[0];
//     console.log('Target class:', targetClass);
//     console.log('Extracted string:', extractedString);
//     $(this).on('focusout',function(){
//         var combinedString = "div_"+extractedString ;
//         alert(combinedString)
//         $('.'+combinedString).remove()
//     })
// }



// Get all classes of the clicked element
var classes = $(this).attr('class').split(' ');

// Find the class that ends with '-item'
var targetClass = classes.find(cls => cls.endsWith('-item'));

// Extract the string before '-item'
if (targetClass) {
    var extractedString = targetClass.split('-')[0];
    console.log('Target class:', targetClass);
    console.log('Extracted string:', extractedString);

    // Combine extractedString with another string
    // var combinedString = extractedString + '-combined';
    var combinedString = "div_"+extractedString ;
    // alert(combinedString)
    console.log('Combined string:', combinedString);

    // Find and remove all elements with classes containing '-combined' except for the one with combinedString
    $('.action').each(function() {
        var elementClasses = $(this).attr('class').split(' ');
        var hasCombinedClass = elementClasses.some(cls => cls.includes('div_'));

        if (hasCombinedClass && !elementClasses.includes(combinedString)) {
            $(this).remove();
        }
    });
}



                // Holds the product ID of the clicked element
                 $('.nav-link').find('.components-img').removeClass('active');
                 $(this).find('.components-img').addClass('active');
            });

            // $('.tab-pane').on('focusout', '.chainage_from', function() {
            //     var inputElements = $('.'+$(this).attr('parentClass')).find("input[name='chainage_from[]']").not(this);
            //     var currentVal=$(this).val();
            //     inputElements.each(function(index) {
            //             // var compId = $(this).val();
            //             alert($(this).val());
            //             if(currentVal<=5 && $(this).val()>=10)
            //             {
            //             }
            //      });
            // });
            // $('.tab-pane').on('focusout', '.chainage_to', function() {
            //     alert($(this).val());
            // });

        //     function get_extrafields_details(comp_id){
        //         if (confirm("Do you want to delete record ?")) {
        //     redUrl = base_url + '/get-component-extra-field-details';
        //     $.ajax({
        //         url: redUrl
        //         , type: 'post'
        //         , data: {
        //             _token: "{{ csrf_token() }}"
        //             // , delete: 1
        //             , component_extra_field_id: component_extra_field_id
        //         }
        //         , dataType: 'json'
        //         , headers: {
        //             'X-CSRF-TOKEN': csrfToken
        //         }
        //         , success: function(res) {
        //             if (res.status) {
        //                 $(".material-err").css("color", "#28a745");
        //                 $(".material-err").html(res.msg);
        //                 setTimeout(function() {
        //                     location.reload();
        //                 }, 2000);


        //                 } else {
        //                 // fp1.close();
        //                 $(".material-err").css("color", "red");
        //                 $(".material-err").html(res.msg);

        //                 setTimeout(function() {
        //                     // location.reload();
        //                 }, 3000);
        //                 }
        //         }
        //         , error: function(xhr, textStatus, errorThrown) {

        //         }
        //     });
        // }
        //             }
        // Gaurav
        road_components_d=JSON.parse('<?php echo json_encode($road_components) ?>');
        console.log(road_components_d[12]['associated_extra_fields']);
        console.log(road_components_d[0]['component_id']);
        console.log(road_components_d);
            $('.no_of_chainage').focusout(function(){
                // alert(this.value);

                var comp_id = $(".active").children("input[name='comp_id[]']").val();
            //    extra_fields_info= get_extrafields_details(comp_id);
            //    alert(extra_fields_info);

                if(this.value>20){
                    alert('Please add maximum 20 or less component at a time');
                    return false;
                }


                for(i=1; i<=this.value; i++)
                {


                    var prev_chainage_count=$(this).parent().parent().parent().siblings().length;
                    // alert(prev_chainage_count)
                    var activity='';
                    activity+='<div class="action div_'+comp_id+' border border-primary mb-1 row comp-id' + comp_id + '" >';


                        if(comp_id==6 ){
                        // if(comp_id==6 && (road_components_d[i]['component_id']==comp_id)){

                    activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_from'+comp_id+prev_chainage_count+'" class=" form-control-label">FOUNDATION HEIGHT<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_foundation_height[]" parentClass="comp-id' + comp_id + '" id="chainage_foundation_height'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_from" >';
                    activity+='</div>';
                    activity+='</div>';

                    activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">PIER HEIGHT<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_pier_height[]" parentClass="comp-id' + comp_id + '" id="chainage_pier_height'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';

                    activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">PIER CAP HEIGHT<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_pier_cap_height[]" parentClass="comp-id' + comp_id + '" id="chainage_pier_cap_height'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';

                    }
                    if(comp_id!=6)
                    {
                    activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_from'+comp_id+prev_chainage_count+'" class=" form-control-label">FROM<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_from[]" parentClass="comp-id' + comp_id + '" id="chainage_from'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_from" >';
                    activity+='</div>';
                    activity+='</div>';
                    activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">TO<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_to[]" parentClass="comp-id' + comp_id + '" id="chainage_to'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';
                    }


                    for(j=0;j<road_components_d.length;j++){
                        // if(comp_id==51){

                        //     console.log(road_components_d[i]['associated_extra_fields'])
                        // }

                        for(k=0;k<road_components_d[j]['associated_extra_fields'].length;k++){
                        if(comp_id==6 && (road_components_d[j]['associated_extra_fields'][k]['component_id']==comp_id)){
                        // if(comp_id==6 ){

                            activity+='<div class="col-lg-5">';
                            activity+='<div class="form-group">';
                            activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">'+road_components_d[j]['associated_extra_fields'][k]['field_name']+'<span style="color:red">*</span></label>';
                            // activity+='<input type="text" name="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+'[]" parentClass="comp-id' + comp_id + '" id="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+''+comp_id+prev_chainage_count+'" placeholder="Enter chainage in '+road_components_d[j]['associated_extra_fields'][k]['unit']+'" class="form-control chainage_to" >';
                            activity+='<input type="text" name="associated_extra_fields[]" extras_dynamic="'+road_components_d[j]['associated_extra_fields'][k]['component_extra_field_id']+'"   extras_dynamic_field_name="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+'"  extras_dynamic_unit="'+road_components_d[j]['associated_extra_fields'][k]['unit']+'"     parentClass="comp-id' + comp_id + '" id="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+''+comp_id+prev_chainage_count+'" placeholder="Enter data in '+road_components_d[j]['associated_extra_fields'][k]['extra_unit']+'" class="form-control chainage_to extras" >';
                            activity+='</div>';
                            activity+='</div>';
                        }


                        if(comp_id!=6 && (road_components_d[j]['associated_extra_fields'][k]['component_id']==comp_id)){

                        activity+='<div class="col-lg-5">';
                        activity+='<div class="form-group">';
                        activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">'+road_components_d[j]['associated_extra_fields'][k]['field_name']+'<span style="color:red">*</span></label>';
                        // activity+='<input type="text" name="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+'[]" parentClass="comp-id' + comp_id + '" id="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+''+comp_id+prev_chainage_count+'" placeholder="Enter chainage in '+road_components_d[j]['associated_extra_fields'][k]['unit']+'" class="form-control chainage_to" >';
                        activity+='<input type="text" name="associated_extra_fields[]" extras_dynamic="'+road_components_d[j]['associated_extra_fields'][k]['component_extra_field_id']+'"  extras_dynamic_field_name="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+'"  extras_dynamic_unit="'+road_components_d[j]['associated_extra_fields'][k]['unit']+'"  parentClass="comp-id' + comp_id + '" id="'+road_components_d[j]['associated_extra_fields'][k]['field_name']+''+comp_id+prev_chainage_count+'" placeholder="Enter data in '+road_components_d[j]['associated_extra_fields'][k]['extra_unit']+'" class="form-control chainage_to extras" >';
                        activity+='</div>';
                        activity+='</div>';
                        }

                    }
                    // for(l=0;l<road_components_d[j]['associated_extra_fields'].length;l++){
                    //     if(comp_id!=6 && (road_components_d[j]['associated_extra_fields'][l]['component_id']==comp_id)){

                    //         activity+='<div class="col-lg-5">';
                    // activity+='<div class="form-group">';
                    // activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">'+road_components_d[j]['associated_extra_fields'][l]['field_name']+'</label>';
                    // activity+='<input type="text" name="'+road_components_d[j]['associated_extra_fields'][l]['field_name']+'[]" parentClass="comp-id' + comp_id + '" id="'+road_components_d[j]['associated_extra_fields'][l]['field_name']+''+comp_id+prev_chainage_count+'" placeholder="Enter chainage in'+road_components_d[j]['associated_extra_fields'][l]['unit']+'" class="form-control chainage_to" >';
                    // activity+='</div>';
                    // activity+='</div>';
                    //     }
                    // }
                }

                if(comp_id==3){
                        activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">HEIGHT<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_height[]" parentClass="comp-id' + comp_id + '" id="chainage_height'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';
                    }

                    if(comp_id==2){
                        activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">MAX ELEVATION HEIGHT<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_max_elevation_height[]" parentClass="comp-id' + comp_id + '" id="chainage_max_elevation_height'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';
                    }
                    if(comp_id==4){
                        activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">MAX DEPTH AT CENTER<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_max_depth_at_center[]" parentClass="comp-id' + comp_id + '" id="chainage_max_depth_at_center'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';
                    }
                    if(comp_id==7){
                        activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">WIDTH<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_width[]" parentClass="comp-id' + comp_id + '" id="chainage_width'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';

                    activity+='<div class="col-lg-5">';
                    activity+='<div class="form-group">';
                    activity+='<label for="chainage_to'+comp_id+prev_chainage_count+'" class=" form-control-label">THICKNESS<span style="color:red">*</span></label>';
                    activity+='<input type="text" name="chainage_thickness[]" parentClass="comp-id' + comp_id + '" id="chainage_thickness'+comp_id+prev_chainage_count+'" placeholder="Enter data in meters" class="form-control chainage_to" >';
                    activity+='</div>';
                    activity+='</div>';
                    }


                    activity+='<div class="col-lg-2">';
                    activity+='<a href="javascript:void(0)" class="closeBtn removemore"><i class="fa fa-trash" style="color: #dc3545; font-size:20px"></i></a>';
                    activity+='</div>';
                    activity+='</div>';

                    if($(this).parent().parent().parent().siblings().length > 0)
                    {
                        $( activity ).insertAfter( $(this).parent().parent().parent().siblings().last() );
                    } else {
                        $( activity ).insertAfter( $(this).parent().parent().parent());
                    }

                }
            });

            $(document).on('click', '.removemore', function () {
                $(this).parent().parent().remove();
                // reset_properteis();
            });

      } );

      function reset_properteis() {
            $(".activity_row").each(function(index,val) {
                var cnt = index + 1;
                console.log(val);
                $(val).find('label:first-child').text("New Activity "+cnt);
                // $(this).find('label:first-child').text("New Activity "+cnt);  //or we can using a "this" keyword
            });
        }


    var form=$("#component_chainage");
    form.validate({
        rules: {
            'no_of_chainage': {
                // required: true,
                // number: true,
            },
            'chainage_from[]': {
                number: true,
                required: true,
            },
            'chainage_to[]': {
                number: true,
                required: true,
            },
              'chainage_thickness[]': {
                number: true,
                required:true
            },
            'chainage_width[]': {
                number: true,
                required:true
            },
            'chainage_max_depth_at_center[]': {
                number: true,
                required:true
            },
            'chainage_max_elevation_height[]': {
                number: true,
                required:true
            },
            'chainage_pier_cap_height[]': {
                number: true,
                required:true
            },
            'chainage_pier_height[]': {
                number: true,
                required:true
            },
            'chainage_foundation_height[]': {
                number: true,
                required:true
            },
        },
        messages: {
            'no_of': {
                required: "Enter Only Number.",
            },
            'chainage_from[]': {
                number: "Enter Only Number.",
                required:"Enter Chainage From"
            },
            'chainage_to[]': {
                number: "Enter Only Number.",
                required:"Enter Chainage To"
            },
              'chainage_thickness[]': {
                number: "Enter Only Number.",
                required:"Enter Thickness"
            },
            'chainage_width[]': {
                number: "Enter Only Number.",
                required:"Enter Width"
            },
            'chainage_max_depth_at_center[]': {
                number: "Enter Only Number.",
                 required:"Enter Max Depth At Center"
            },
            'chainage_max_elevation_height[]': {
                number: "Enter Only Number.",
                 required:"Enter Max Elevation Height"
            },
            'chainage_pier_cap_height[]': {
                number: "Enter Only Number.",
                required:"Enter Pier Cap Height"
            },
            'chainage_pier_height[]': {
                number: "Enter Only Number.",
                required:"Enter Pier Height"
            },
            'chainage_foundation_height[]': {
                number: "Enter Only Number.",
                required:"Enter Foundation Height"
            },
        },
        submitHandler: function (form, message) {
            console.log("submit form");
            var chainage_data = [];
            $("input[name='comp_id[]']").each(function(index1) {
                var compId = $(this).val();
                var obj=[];

                var i=0;
                $('.comp-id'+$(this).val()).each(function(index, value) {
                  var chainage_from = $(this).find("input[name='chainage_from[]']");
                  var chainage_to = $(this).find("input[name='chainage_to[]']");
                  var chainage_pier_height = $(this).find("input[name='chainage_pier_height[]']");
                  var chainage_height = $(this).find("input[name='chainage_height[]']");
                  var chainage_foundation_height = $(this).find("input[name='chainage_foundation_height[]']");
                  var chainage_pier_cap_height = $(this).find("input[name='chainage_pier_cap_height[]']");
                  var chainage_max_elevation_height = $(this).find("input[name='chainage_max_elevation_height[]']");
                  var chainage_max_depth_at_center = $(this).find("input[name='chainage_max_depth_at_center[]']");
                  var chainage_width = $(this).find("input[name='chainage_width[]']");
                  var chainage_thickness = $(this).find("input[name='chainage_thickness[]']");
                //   var associated_extra_fields = $(this).find("input[name='associated_extra_fields[]']");
                //   var associated_extra_fields = $(this).find("input[name='associated_extra_fields[]']");
                //   if(chainage_from.val()!='' && chainage_to.val()!='')
                //   {
                  //   obj[i]={component:compId,chainage_from:chainage_from.val(),chainage_to:chainage_to.val()};
                    //   i++;
                //   }
                var parentGroup = $(this).find('.extras');
                // alert(parentGroup)
                var extras=[]
                // var extras={}
                console.log(parentGroup);
                parentGroup.each(function() {
                    var key= $(this).attr('extras_dynamic')
                    var field_name= $(this).attr('extras_dynamic_field_name')
                    var unit= $(this).attr('extras_dynamic_unit')
                 extras.push({ 'key': key, 'value': $(this).val(),'field_name': field_name,'unit':unit});
                //   extras[key]=$(this).val()
                  console.log($(this).val());

        });
                      obj[i]={
                        component:compId,chainage_from:(chainage_from.val()?chainage_from.val():null),
                        chainage_to:(chainage_to.val()?chainage_to.val():null),
                        chainage_pier_height:chainage_pier_height.val()?chainage_pier_height.val():null,
                        chainage_pier_cap_height:chainage_pier_cap_height.val()?chainage_pier_cap_height.val():null,
                        chainage_max_elevation_height:chainage_max_elevation_height.val()?chainage_max_elevation_height.val():null,
                        chainage_max_depth_at_center:chainage_max_depth_at_center.val()?chainage_max_depth_at_center.val():null,
                        chainage_width:chainage_width.val()?chainage_width.val():null,
                        chainage_thickness:chainage_thickness.val()?chainage_thickness.val():null,
                        chainage_foundation_height:chainage_foundation_height.val()?chainage_foundation_height.val():null,
                        chainage_height:chainage_height.val()?chainage_height.val():null,
                        // associated_extra_fields:associated_extra_fields.val()?associated_extra_fields.val():null,
                        extras:extras
                    };
                      i++;

                });

                obj.length>0 ? chainage_data[index1]=obj : '';
            });
            console.log(chainage_data);
            // return false;
            redUrl = base_url+'/add-component-chainage';

            var fd=new FormData(form);

            fd.append('chainage_data', JSON.stringify(chainage_data));
            // console.log(fd)
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
                        $(".chainage-msg").css("color", "#28a745");
                        $(".chainage-msg").html(res.message);
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    } else {
                        $(".chainage-msg").css("color", "red");
                        $(".chainage-msg").html(res.message);
                        // alert('error')
                        setTimeout(function () {
                            // location.reload();
                        }, 3000);
                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                    // alert('error')
                }
            });
        }
    });

    // $("#btnsubmit").click(function(){
    //   if (form.valid() == true){
    //   }
    // });

  </script>
<script>

              function openEditModal(site_id,chainage_id,component_name,from,to,chainage_height,chainage_foundation_height,chainage_pier_height,chainage_pier_cap_height,chainage_max_elevation_height,chainage_max_depth_at_center,chainage_width,chainage_thickness,extra_fields){
                // $('.modal').removeClass('fade')
                console.log(site_id);
                console.log(chainage_id,component_name,form,to,chainage_foundation_height,chainage_pier_height,chainage_pier_cap_height,chainage_max_elevation_height,chainage_max_depth_at_center,chainage_width,chainage_thickness);
                $("#edit_chainage_id").val(chainage_id);
                $('#req').text('Road Component : '+component_name);

                if(from!=null){
                    $('#from').val(from);
                    $(".fromlength").show();
                }else{
                    $(".fromlength").hide();
                }
                 if(to!=null){
                     $('#to').val(to);
                     $('.tolength').show();
                 }else{
                    $('.tolength').hide();
                 }
                 if( chainage_height!=null){
                    $('#chainage_height').val(chainage_height);
                    $('.chainage_height').show();
                 }else{
                    $('.chainage_height').hide();
                 }
                 if( chainage_foundation_height!=null){
                    $('#chainage_foundation_height').val(chainage_foundation_height);
                    $('.chainage_foundation_height').show();
                 }else{
                    $('.chainage_foundation_height').hide();
                 }
                 if(chainage_pier_height!=null){
                    $('#chainage_pier_height').val(chainage_pier_height);
                    $('.chainage_pier_height').show();
                 }else{
                    $('.chainage_pier_height').hide();
                 }

                 if(chainage_pier_cap_height!=null){

                    $('#chainage_pier_cap_height').val(chainage_pier_cap_height);
                    $('.chainage_pier_cap_height').show();
                 }else{
                    $('.chainage_pier_cap_height').hide();
                 }
                 if(chainage_max_elevation_height!=null){
                    $('#chainage_max_elevation_height').val(chainage_max_elevation_height);
                    $('.chainage_max_elevation_height').show();
                 }else{
                    $('.chainage_max_elevation_height').hide();
                 }
                 if(chainage_max_depth_at_center!=null){
                    $('#chainage_max_depth_at_center').val(chainage_max_depth_at_center);
                    $('.chainage_max_depth_at_center').show();
                 }else{
                    $('.chainage_max_depth_at_center').hide();
                 }
                 if(chainage_width!=null){
                    $('#chainage_width').val(chainage_width);
                    $('.chainage_width').show();
                 }else{
                    $('.chainage_width').hide();
                 }
                 if(chainage_thickness!=null){
                    $('#chainage_thickness').val(chainage_thickness);
                    $('.chainage_thickness').show();
                 }else{
                    $('.chainage_thickness').hide();
                 }


                 var modal = $('#showEditModal');
    var extraFieldsContainer = modal.find('#extraFieldsContainer');
    // Clear previous content
    extraFieldsContainer.empty();
    // Append new content
                    $.each(extra_fields, function(index, field) {
                        console.log(extra_fields);
                               var fieldHtml ='<div class="form-group tolength"  style="margin-bottom:15px;">'+
                                            '<label class="control-label col">'+ field.field_name+ '<span style="color:red">*</span></label>'+
                                            '<div class="col-sm-">'+
                                            '<input type="text" name="edit_extra_field_name[]"   edit_extrafield_id="'+field.component_chainage_extra_field_id+'"   id="'+field.field_name+'_'+index+'" class="form-control" placeholder="Enter Chainage in '+field.extra_unit+'"  value="' + field.quantity + '" style="margin:0" required/>'+
                                            '<input type="hidden" name="component_chainage_extra_field_id[]" id="component_chainage_extra_field_id_'+index+'" class="form-control"  value="' + field.component_chainage_extra_field_id + '" style="margin:0" required/>'+
                                            '</div>'+
                                        '</div>';
                    extraFieldsContainer.append(fieldHtml);
                    });
                    //            var fieldHtml ='<div class="form-group tolength"  style="margin-bottom:15px;">'+
                    //                         '<label class="control-label col">'+ field.field_name+ '</label>'+
                    //                         '<div class="col-sm-">'+
                    //                         '<input type="text" name="'+field.field_name+'[]" id="'+field.field_name+'_'+index+'" class="form-control" placeholder="Enter Chainage in '+field.extra_unit+'"  value="' + field.quantity + '" style="margin:0" required/>'+
                    //                         '<input type="hidden" name="component_chainage_extra_field_id[]" id="component_chainage_extra_field_id_'+index+'" class="form-control"  value="' + field.component_chainage_extra_field_id + '" style="margin:0" required/>'+
                    //                         '</div>'+
                    //                     '</div>';
                    // extraFieldsContainer.append(fieldHtml);
                    // });

                // $('#to').val(to);
                $('#showEditModal').modal('show');

                // $('#scrollmodal').modal('show');

        }



        $('#update_component').validate({
        rules: {
            fromlength: {
                required: true
            },
            tolength: {
                required: true
            }
        },
        messages: {
            fromlength: {
                required: "Please Enter From Data"
            },
            tolength: {
                required: "Please Enter To Data"
            }
        }

    });
    $('#update_component').submit(function(evt) {
        evt.preventDefault();
        //CHECK FORM IS VALID OR NOT
        if (!$("#update_component").valid()) {
            return false;
        }
        // $("#submitBtn").attr("disabled", true);
        // $("#submitBtn").html('Wait....');

         $.ajax({
            type: 'POST',
            url: base_url + "/update-road-compenet",
            data: $('#update_component').serialize(),
            dataType: 'JSON',
            success: function(res) {
                console.log(res);

                if (res.status == 1) {

                    $(".success").html(res.msg);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    $(".error").html(res.msg);
                }
            },headers: {
        'X-CSRF-TOKEN': csrfToken
    },
            error: function(data) {
                if (data.status === 422) {

                    //REMOVE DISABLE BUTTON CHANGE ITS VALUE
                    $("#submitBtn").attr("disabled", false);
                    $("#submitBtn").html('Submit');

                    $("#UserForm label").each(function() {
                        if ($(this).hasClass('error')) {
                            $(this).remove()
                        }
                    });

                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function(key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function(key, value) {
                                $("[name=" + key + "]").after(`<label class="error">${value}</label>`);
                            });
                        } else {
                            console.log(key + " " + value);
                        }
                    });
                } else {

                    $('#message').html('Something went wrong');
                    $('#message').css('color', 'red');
                }
            },
        });

    });




    function remove_road_compenet(chainage_id,site_id) {
        console.log(site_id, chainage_id);

        swal({
            title: "Are you sure",
            text: "Do you really want to remove this item ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: base_url + "/remove-road-compenet",
                    type: "POST",
                    data: {
                        "site_id": site_id,
                        "chainage_id": chainage_id
                    }, headers: {
        'X-CSRF-TOKEN': csrfToken
    },
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        if (res.status == 1) {
                            swal(res.msg, {
                                icon: "success",
                            });
                            location.reload();
                        }
                    }
                });

            } else {
                // swal("Your user is safe!");
            }
        });
    }
    </script>

</body>
</html>

