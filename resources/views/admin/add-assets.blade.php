@include('admin/header')

<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/assetstyle.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />



{{-- <link rel="stylesheet" href="http://192.168.1.54/anshinfra/public/assets/scss/admin_style.css" /> --}}

<link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<?php $prefix= $profile_data['prefix'];?>
<main>
    <section class="section-wrapper container-fluid">
        <form id="add_asset" action="">
            @csrf
            <input name="asset_id" id="asset_id" type="hidden" value="{{ $assets['id'] ?? '' }}">
            <div class="mb-3">
                {{-- <a href="#" onclick="history.back()" class="text-decoration-none"><button class="btn btn-sm btn-icon"> <i class="ri-arrow-left-line"></i> Back</button></a> --}}
                <a href="{{ $prefix.'/assets' }}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;
            </div>
            <div class="card">
                <div class="custom-form">
                    <p class="form-title">Asset Details</p>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Asset Name<span class="asteric">*</span></label>
                                <input type="text" value="{{ $assets['asset_name'] ?? '' }}" class="form-control" name="asset_name" placeholder="Eg. Computer">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Asset Group<span class="asteric">*</span></label> <br>
                                <select class="js-example-basic-single select2 selectDrop asset_group" name="asset_group" id="asset_group">
                                    <option value=""></option>
                                    @if(!empty($asset_groups))
                                    @foreach($asset_groups as $agkey=>$group)
                                    <option {{ !empty($assets) ? ( $assets['asset_group']==$group['id'] ? 'selected' : '' ) : '' }} value="{{ $group['id'] }}">{{ $group['group_name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Asset Sub-Group</label> <br>
                                <select class="js-example-basic-single selectDrop asset_sub_group select2" name="asset_sub_group" id="asset_sub_group">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Put To Use<span class="asteric">*</span></label> <br>
                                <div class="group flatpickr-group">
                                    <input type="text" value="{{ $assets['put_to_use'] ?? '' }}" autocomplete="off" class="put_to_use" id="put_to_use" name="put_to_use" placeholder="Select Date">
                                    <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                    <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Asset Location<span class="asteric">*</span></label> <br>
                                <select class="js-example-basic-single selectDrop assetLocation select2" name="assetLocation" id="assetLocation">
                                    <option value=""></option>
                                    @if(!empty($profit_centers))
                                    @foreach($profit_centers as $pckey=>$center)
                                    <option {{ !empty($assets) ? ( $assets['assetLocation']==$center['id'] ? 'selected' : '' ) : '' }} value="{{ $center['id'] }}">{{ $center['location'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Asset Life Years<span class="asteric">*</span></label> <br>
                                <select class="js-example-basic-single selectDrop asset_life_years select2" name="asset_life_years" id="asset_life_years">
                                    <option value=""></option>
                                    @foreach([1,2,3,4,5,6,7,8,9,10,
                                    11,12,13,14,15,16,17,18,19,20,
                                    21,22,23,24,25,26,27,28,29,30] as $ykey=>$year)
                                    <option {{ !empty($assets) ? ( $assets['asset_life_years']==$year ? 'selected' : '' ) : '' }} value='{{ $year }}'>{{ $year }} Year</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                {{-- <label class="form-label">End Life Date<span class="asteric">*</span></label> <br> --}}
                                <label class="form-label">End Life Date</label> <br>
                                <div class="group flatpickr-group">
                                    <input value="{{ $assets['end_life_date'] ?? '' }}" type="date" id="end_life_date" name="end_life_date" class="end_life_date" placeholder="Select Date" readonly>
                                    <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Asset Quantity <span class="asteric">*</span></label></label>
                                <input value="{{ $assets['asset_quantity'] ?? '' }}" type="text" name="asset_quantity" name="asset_quantity" class="form-control" placeholder="Enter Asset Quantity">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <div class="form-label">Upload Photo</div>
                                <div class="custom-file-upload">
                                    {{-- <input name="vehicle_photo" type="file" class="form-control" id="real-file" hidden="hidden" /> --}}
                                    <input name="vehicle_photo" type="file" class="form-control" id="real-file" />
                                    <div class="custom-file-input">
                                        <span id="custom-text">No File Choosen</span>
                                        <button type="button" class="brn btn-sm" id="custom-button"><i class="ri-folder-open-line icon"></i> Choose File</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Upcoming Maintenance</label> <br>
                                <div class="group flatpickr-group">
                                    <input type="date" autocomplete="off" class="upcoming_maintenance" name="upcoming_maintenance" value="{{ !empty($assets['upcoming_maintenance']) ? (date('Y-m-d',strtotime($assets['upcoming_maintenance'])) ?? '' ) : '' }}" id="upcoming_maintenance" placeholder="Select Date">
                                    <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                    <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Maintenance Frequency</label> <br>
                                <select class="js-example-basic-single selectDrop maintenance_frequency select2" name="maintenance_frequency" id="maintenance_frequency">
                                    <option value=""></option>
                                    <option {{ !empty($assets) ? ( $assets['maintenance_frequency']=='Monthly' ? 'selected' : '' ) : '' }} value="Monthly">Monthly</option>
                                    <option {{ !empty($assets) ? ( $assets['maintenance_frequency']=='Quarterly' ? 'selected' : '' ) : '' }} value="Quarterly">Quarterly</option>
                                    <option {{ !empty($assets) ? ( $assets['maintenance_frequency']=='Half Yearly' ? 'selected' : '' ) : '' }} value="Half Yearly">Half Yearly</option>
                                    <option {{ !empty($assets) ? ( $assets['maintenance_frequency']=='Yearly' ? 'selected' : '' ) : '' }} value="Yearly">Yearly</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Insurance End Date</label> <br>
                                <div class="group flatpickr-group">
                                    <input type="date" class="insurance_end" name="insurance_end" autocomplete="off" value="{{ !empty($assets['insurance_end']) ? (date('Y-m-d',strtotime($assets['insurance_end'])) ?? '' ) : '' }}" id="insurance_end" placeholder="Select Date">
                                    <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                    <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <div class="form-label">Insurance Certificate</div>
                                <div class="custom-file-upload">
                                    <input type="file" name="insurance_cert" class="form-control" id="insurance_cert" />
                                    {{-- <input type="file" name="insurance_cert" class="form-control" id="insurance_cert" hidden="hidden" /> --}}
                                    <div class="custom-file-input">
                                        <span class="custom-text-class" id="insurance-custom-text">No File Choosen</span>
                                        <button type="button" class="brn btn-sm custom-button-class" id="insurance-custom-button"><i class="ri-folder-open-line icon"></i> Choose File</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="row vehicle-details" style="display:none">

                        <p class="form-title">Add Vehicle Details</p>

                        <input name="vehicle_id" id="vehicle_id" type="hidden" value="{{ $assets['vehicle_details']['id'] ?? '' }}">

                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Type<span class="asteric">*</span></label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="type" value="Owned" {{ !empty($assets['vehicle_details']['type']) ? ($assets['vehicle_details']['type'] == 'Owned' ? 'checked' : '') : '' }} type="radio" id="inlineRadio1">
                                        <label class="form-check-label" for="inlineRadio1">Owned</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="type" value="Leased" type="radio" {{ !empty($assets['vehicle_details']['type']) ? ($assets['vehicle_details']['type'] == 'Leased' ? 'checked' : '') : '' }} id="inlineRadio2">
                                        <label class="form-check-label" for="inlineRadio2">Leased</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-12 profit-center-field" {{ !empty($assets['vehicle_details']['type']) ? ($assets['vehicle_details']['type'] == 'Leased' ? 'style=display:none' : '') : '' }}>
                            <div class="form-group">
                                <label class="form-label">Assign Profit Center<span class="asteric">*</span></label> <br>
                                <select class="js-example-basic-single selectDrop" name="profit_center" value="" id="profit_center" >
                                    <option value=""></option>
                                    <option value="1" {{ !empty($assets['vehicle_details']['profit_center']) ? ($assets['vehicle_details']['profit_center'] == '1' ? 'selected' : '') : '' }}>Mulund</option>
                                    <option value="2" {{ !empty($assets['vehicle_details']['profit_center']) ? ($assets['vehicle_details']['profit_center'] == '2' ? 'selected' : '') : '' }}>Aurangabad</option>
                                  </select>
                            </div>
                        </div> -->

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12 owner-field" {{ !empty($assets['vehicle_details']['type']) ? ($assets['vehicle_details']['type'] == 'Owned' ? 'style=display:none' : '') : '' }}>
                                <div class="form-group">
                                    <label class="form-label">Owner<span class="asteric">*</span></label> <br>
                                    <select name="owner" value="" class="js-example-basic-single selectDrop select2" id="owner">

                                        <option value="1">Appcart</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Make Type<span class="asteric">*</span></label> <br>

                                    <input type="text" name="make_type" value="{{ $assets['vehicle_details']['make_type'] ?? '' }}" class="form-control" placeholder="Enter here">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Model Name<span class="asteric">*</span></label> <br>
                                    <input type="text" class="form-control" name="model_name" value="{{ $assets['vehicle_details']['model_name'] ?? '' }}" placeholder="Enter here">
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Vehicle No<span class="asteric">*</span></label>
                                    <input type="text" name="vehicle_no" value="{{ $assets['vehicle_details']['vehicle_no'] ?? '' }}" class="form-control" placeholder="Enter here">
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Registration End Date<span class="asteric">*</span></label> <br>
                                    <div class="group flatpickr-group">
                                        <input type="date" autocomplete="off" class="registration_end" name="registration_end" value="{{ !empty($assets['vehicle_details']['registration_end']) ? (date('Y-m-d',strtotime($assets['vehicle_details']['registration_end'])) ?? '' ) : '' }}" id="registration_end" placeholder="Select Date">
                                        <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Vehicle Type<span class="asteric">*</span></label> <br>
                                    <select name="vehicle_type" class="js-example-basic-single selectDrop select2" id="vehicleType">
                                        <option value="">Select Vehicle Type</option>
                                        @foreach(array_combine(array_column($vehicles_types ?? [],'id'),array_column($vehicles_types ?? [],'name')) as $key=>$vtype)
                                        <option value="{{ $key }}" {{ !empty($assets['vehicle_details']['vehicle_type']) ? ($assets['vehicle_details']['vehicle_type']==$key ? 'selected' : '') : 'false' }}>{{ $vtype }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label">Fitness Certificate<span class="asteric">*</span></div>
                                    <div class="custom-file-upload">
                                        {{-- <input type="file" name="fitness_certificate" class="form-control" id="fitness_cert" hidden="hidden" /> --}}
                                        <input type="file" name="fitness_certificate" class="form-control" id="fitness_cert" />
                                        <div class="custom-file-input">
                                            <span id="fitness-custom-text">No File Choosen</span>
                                            <button type="button" class="brn btn-sm" id="fitness-custom-button"><i class="ri-folder-open-line icon"></i> Choose File</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Fitness End Date<span class="asteric">*</span></label> <br>
                                    <div class="group flatpickr-group">
                                        <input type="date" class="fitness_end" name="fitness_end" value="{{ !empty($assets['vehicle_details']['fitness_end']) ? (date('Y-m-d',strtotime($assets['vehicle_details']['fitness_end'])) ?? '' ) : '' }}" id="fitness_end" placeholder="Select Date">
                                        <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Book Value<span class="asteric">*</span></label>
                                    <input type="text" name="book_value" value="{{ $assets['vehicle_details']['book_value'] ?? '' }}" class="form-control" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Depreciation Value<span class="asteric">*</span></label>
                                    <input type="text" name="depreciation_value" value="{{ $assets['vehicle_details']['depreciation_value'] ?? '' }}" class="form-control" placeholder="Enter here">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Reading In<span class="asteric">*</span></label> <br>
                                    <select name="reading_in" value="{{ $assets['vehicle_details']['reading_in'] ?? '' }}" class="js-example-basic-single selectDrop select2" id="reading_in">
                                        <option value="Km" {{ !empty($assets['vehicle_details']['reading_in']) ? ($assets['vehicle_details']['reading_in'] == 'Km' ? 'selected' : '') : '' }}>Km</option>
                                        <option value="Litre" {{ !empty($assets['vehicle_details']['reading_in']) ? ($assets['vehicle_details']['reading_in'] == 'Litre' ? 'selected' : '') : '' }}>Liter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label kmperltrlabel">Expected Km/ltr (In KM)<span class="asteric">*</span></label>
                                    <label class="form-label ltrperhrlabel" style="display:none">Expected Ltr/Hr (In Ltr)<span class="asteric">*</span></label>
                                    <input name="expected_reading" value="{{ $assets['vehicle_details']['expected_reading'] ?? '' }}" type="text" class="form-control" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Min Urea Limit Alert<span class="asteric">*</span></label> <br>
                                    <input type="text" name="min_urea_alert" value="{{ $assets['vehicle_details']['min_urea_alert'] ?? '' }}" class="form-control" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Notes</label> <br>
                                    <textarea name="notes" class="form-control" placeholder="Enter here">{{ $assets['vehicle_details']['notes'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Description<span class="asteric">*</span></label> <br>
                                    <textarea name="description" class="form-control" placeholder="Enter here">{{ $assets['vehicle_details']['description'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Service/Repairs</label>
                                    <input type="text" name="serv_repair" value="{{ $assets['vehicle_details']['serv_repair'] ?? '' }}" class="form-control" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Status<span class="asteric">*</span></label> <br>
                                    <select name="status" value="{{ $assets['vehicle_details']['status'] ?? '' }}" class="js-example-basic-single selectDrop select2" id="status">
                                        <option value="">Select Status</option>
                                        <option value="In Working" {{ !empty($assets['vehicle_details']['status']) ? ($assets['vehicle_details']['status'] == 'In Working' ? 'selected' : '') : '' }}>In Working</option>
                                        <option value="In Use" {{ !empty($assets['vehicle_details']['status']) ? ($assets['vehicle_details']['status'] == 'In Use' ? 'selected' : '') : '' }}>In Use</option>
                                        <option value="Awaiting Maintenance" {{ !empty($assets['vehicle_details']['status']) ? ($assets['vehicle_details']['status'] == 'Awaiting Maintenance' ? 'selected' : '') : '' }}>Awaiting Maintenance</option>
                                        <option value="Idle" {{ !empty($assets['vehicle_details']['status']) ? ($assets['vehicle_details']['status'] == 'Idle' ? 'selected' : '') : '' }}>Idle</option>
                                        <option value="Sold" {{ !empty($assets['vehicle_details']['status']) ? ($assets['vehicle_details']['status'] == 'Sold' ? 'selected' : '') : '' }}>Sold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12" hidden>
                                <div class="form-group">
                                    <label class="form-label">Operator</label> <br>
                                    <select name="operator" value="" class="js-example-basic-single selectDrop select2" id="operator">
                                        <option value=""></option>
                                        <option value="1">Operator 1</option>
                                        <option value="2">Operator 2</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>



                {{-- <div class="row">
                    <p class="form-title">Sale Details</p>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Sale Date</label> <br>
                            <div class="group flatpickr-group">
                                <input type="date" value="{{ $assets['sale_date'] ?? '' }}" autocomplete="off" id="sale_date" name="sale_date" class="sale_date" placeholder="Select Date">
                                <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Sale Value</label>
                            <input type="text" value="{{ $assets['sale_value'] ?? '' }}" name="sale_value" class="form-control" placeholder="Enter Sale Value">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label class="form-label">Sale Description</label> <br>
                            <textarea name="sale_description" class="form-control" placeholder="Enter here">{{ $assets['sale_description'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <p class="form-title">Invoice Details</p>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Supplier Name</label>
                            <input type="text" value="{{ $assets['supplier']['supplier_name'] ?? '' }}" name="supplier" class="form-control" placeholder="Enter Supplier Name">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Invoice Number</label>
                            <input type="text" value="{{ $assets['invoice_number'] ?? '' }}" name="invoice_number" class="form-control" placeholder="Enter Invoice Number">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Purchase Value</label></label>
                            <input type="text" value="{{ $assets['purchase_value'] ?? '' }}" name="purchase_value" class="form-control" placeholder="Enter Purchase Value">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Invoice Date</label> <br>
                            <div class="group flatpickr-group">
                                <input type="date" value="{{ $assets['invoice_date'] ?? '' }}" id="invoice_date" autocomplete="off" name="invoice_date" class="invoice_date" placeholder="Select Date">
                                <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label class="form-label">Purchase Description</label> <br>
                            <textarea name="purchase_description" class="form-control" placeholder="Enter here">{{ $assets['purchase_description'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <div class="form-label">Upload Invoice</div>
                            <div class="custom-file-upload">

                                <input type="file" name="invoice_file" class="form-control" id="real-file"  />
                                <div class="custom-file-input">
                                    <span class="custom-text-class" id="custom-text">No File Choosen</span>
                                    <button type="button" class="brn btn-sm custom-button-class" id="custom-button"><i class="ri-folder-open-line icon"></i> Choose File</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="form-title">Finance Details</p>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Finance Bank name</label>
                            <input type="text" value="{{ $assets['finance_bank_name'] ?? '' }}" name="finance_bank_name" class="form-control" placeholder="Enter Bank Name">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Loan Account Number</label>
                            <input type="text" name="account_no" value="{{ $assets['account_no'] ?? '' }}" class="form-control" placeholder="Enter Loan Account Number">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Loan Amount</label>
                            <input type="text" name="loan_amount" value="{{ $assets['loan_amount'] ?? '' }}" class="form-control" placeholder="Enter Loan Amount">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Loan Start Date</label> <br>
                            <div class="group flatpickr-group">
                                <input type="date" value="{{ $assets['loan_start_date'] ?? '' }}" autocomplete="off" name="loan_start_date" id="loan_start_date" class="loan_start_date" placeholder="Select Date">
                                <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Loan End Date</label> <br>
                            <div class="group flatpickr-group">
                                <input type="date" value="{{ $assets['loan_end_date'] ?? '' }}" autocomplete="off" name="loan_end_date" id="loan_end_date" class="loan_end_date" placeholder="Select Date">
                                <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Rate Of Interest</label> <br>
                            <input type="text" value="{{ $assets['roi'] ?? '' }}" name="roi" class="form-control" placeholder="Enter Rate Of Interest">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">EMI Amount</label>
                            <input type="text" value="{{ $assets['emi_amount'] ?? '' }}" name="emi_amount" class="form-control" placeholder="Enter EMI Amount">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">EMI Date</label> <br>
                            <div class="group flatpickr-group">
                                <input type="date" value="{{ $assets['emi_date'] ?? '' }}" autocomplete="off" name="emi_date" id="emi_date" class="emi_date" placeholder="Select Date">
                                <span class="calendar-icon"><i class="ri-calendar-2-line"></i></span>
                                <span class="calendar-icon clear-date" style="margin-right:18px"><i class="ri-close-fill"></i></span>
                            </div>
                        </div>
                    </div>

                    <p class="form-title">Balance Sheet</p>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Gross value On ({{date("d-m-Y", strtotime($aprilStartDate) ) }})</label>
                            <input type="text" name="first_gross_value" value="{{ $assets['first_gross_value'] ?? '' }}" class="form-control" placeholder="Enter Gross Value">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Addition During The Period</label>
                            <input type="text" disabled name="addition_during_period" value="{{ $assets['addition_during_period'] ?? '' }}" class="form-control" placeholder="">
                        </div>
                    </div>

                    <!-- var first_gross_value=$('input[name="first_gross_value"]').val();
                        var purchase_value=$('input[name="purchase_value"]').val();
                        var addition_during_period=$('input[name="addition_during_period"]').val(purchase_value);
                        var deduction=$('input[name="deduction"]').val(first_gross_value.val());
                        var second_gross_value=$('input[name="second_gross_value"]').val(purchase_value.val());
                        var acc_dep=$('input[name="acc_dep"]').val();
                        var dep_deduction=$('input[name="dep_deduction"]').val(); -->

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Deduction / Adjustment</label>
                            <input type="text" disabled name="deduction" value="{{ $assets['deduction'] ?? '' }}" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Gross Value On ({{date("d-m-Y", strtotime($marchEndDate) ) }})</label>
                            <input type="text" disabled name="second_gross_value" value="{{ $assets['second_gross_value'] ?? '' }}" class="form-control" placeholder="Enter here">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Acc. Dep .as on  ({{date("d-m-Y", strtotime($aprilStartDate) ) }})</label>
                            <input type="text" name="acc_dep" value="{{ $assets['acc_dep'] ?? '' }}" class="form-control" placeholder="Acc. Dep .as on (01-04-2023)">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Dep Deduction / Adjustment</label>
                            <input type="text" name="dep_deduction" value="{{ $assets['dep_deduction'] ?? '' }}" class="form-control" placeholder="Enter Dep Duction / Adjustment">
                        </div>
                    </div>

                </div> --}}
                <div class="float-end my-4">
                    @if(!empty($assets['id']))
                    <a href="{{ $prefix.'/assets' }}"  class="btn btn-secondary me-3">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                    @endif
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 offset-md-12 col-12 text-center">
                <p class="form-err"></p>
            </div>

            </div>

            {{-- <div class="float-end my-4">
                <button class="btn btn-secondary me-3">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div> --}}
        </form>
    </section>

</main>

{{-- <div class="clearfix"></div>--}}

@include('admin/footer')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/script.js')}}"></script>



<script>
    $(".fixed-assets").addClass("selected");
    $(".page-title").html("Add Asset");
    // $('input[type=date]').each(function() {


    // flatpickr('.put_to_use ,.end_life_date ,.sale_date ,.invoice_date ,.loan_start_date ,.loan_end_date ,.emi_date,.registration_end', {

    //     // mode: "range",
    //     dateFormat: "Y-m-d",
    //     allowClear: true,
    //     disable: [
    //         function(date) {
    //             // disable every multiple of 8
    //             // return !(date.getDate() % 8);
    //         }
    //     ]
    // });

    var dynamicFlatpicker = ["#put_to_use", "#end_life_date", "#sale_date", "#invoice_date", "#loan_start_date", "#loan_end_date", "#emi_date", "#registration_end", "#insurance_end", "#fitness_end", "#upcoming_maintenance"];

    $.each(dynamicFlatpicker, function(index, value) {
        flatpickr(value, {
            dateFormat: "Y-m-d"
            , allowInput: true
            , allowEmpty: true,
            // allowClear: true,
            disable: [
                function(date) {
                    // disable every multiple of 8
                    // return !(date.getDate() % 8);
                }
            ]
        });
    });


    $(document).ready(function() {
        // $(".js-example-basic-single selectDrop").select2({
        //         placeholder: "Select",
        //         allowClear: true,
        //         minimumResultsForSearch: Infinity,
        //         // Other select2 options...
        //     });

        var dynamicPlaceholders = ["Select Asset Group", "Select Asset Sub-Group", "Select Asset Location", "Select Asset Life Years", "Select Maintenance Frequency", "Select Profit Center", "Select Vehicle Type"];

        // Loop through each select element and set the placeholder
        $(".selectDrop").each(function(index) {
            var dynamicPlaceholder = dynamicPlaceholders[index];
            $(this).select2({
                placeholder: dynamicPlaceholder
                , allowClear: true
                , minimumResultsForSearch: 6,
                // Other select2 options...
            });
        });

        var asset_groups = JSON.parse('<?php echo json_encode($asset_groups) ?>');

        // console.log(asset_groups);
        $('.asset_group').change(function() {

            asset_group_id = $(this).val();

            asset_group_id == 7 ? $(".vehicle-details").css('display', 'block') : $(".vehicle-details").css('display', 'none');

            var group_result = asset_groups.find(item => item.id === parseInt(asset_group_id));

            sub_group_val = "<option value=''>Select Asset Group</option>";

            console.log(sub_group_val);
            console.log(group_result);

            if (group_result != undefined) {
                $.each(group_result.assets_sub_group, function(i, get_group) {
                    sub_group_val += "<option value='" + get_group.id + "'>" + get_group.sub_group_name + "</option>";
                });
            }





            $(".asset_sub_group").html(sub_group_val);
            $(".asset_sub_group").val("{{ $assets['asset_sub_group'] ?? '' }}").trigger('change');

        });

        $('.asset_group').trigger('change');

        $('.clear-date').click(function() {
            console.log($(this).parent().children().val(""));
        });

        $('.put_to_use').change(function() {
            var year = $(".asset_life_years").val();
            $(".end_life_date").val("");
            if (year != "" && $(this).val() != "") {
                var putToUseDate = new Date($(this).val());
                // Increase the date by the specified number of years
                putToUseDate.setFullYear(putToUseDate.getFullYear() + parseInt(year));

                var increasedDateStr = formatDate(putToUseDate);
                // console.log(increasedDateStr);
                $(".end_life_date").val(increasedDateStr);
            }

        });

        $('.asset_life_years').change(function() {
            var year = $(this).val();
            $(".end_life_date").val("");

            if ($(".put_to_use").val() != "" && $(this).val() != "") {
                var putToUseDate = new Date($(".put_to_use").val());
                // Increase the date by the specified number of years
                putToUseDate.setFullYear(putToUseDate.getFullYear() + parseInt(year));

                var increasedDateStr = formatDate(putToUseDate);
                // console.log(increasedDateStr);
                $(".end_life_date").val(increasedDateStr);
            }

        });

        function formatDate(date) {
            console.log(date);
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            return year + '-' + month + '-' + day;
        }


        $("#add_asset").validate({

            rules: {
                asset_name: {
                    required: true
                }
                , put_to_use: {
                    required: true
                }
                , asset_group: {
                    required: true
                }
                , assetLocation: {
                    required: true
                }
                , asset_life_years: {
                    required: true
                }
                , end_life_date: {
                    required: false
                }
                , asset_quantity: {
                    required: true
                    , number: true
                }
                , purchase_value: {
                    required: false
                    , number: true
                },
                //vehicle validation
                type: {
                    required: true
                }
                , model_name: {
                    required: true
                }
                , profit_center: {
                    required: true
                }
                , owner: {
                    required: true
                }
                , make_type: {
                    required: true
                }
                , model_name: {
                    required: true
                }
                , vehicle_no: {
                    required: true
                }
                , vehicle_type: {
                    required: true
                }
                , book_value: {
                    required: true
                    , number: true
                }
                , roi: {
                    number: true
                }
                , depreciation_value: {
                    required: true
                    , number: true
                }
                , reading_in: {
                    required: true
                }
                , expected_reading: {
                    required: true
                    , number: true
                }
                , min_urea_alert: {
                    required: true
                    , number: true
                }
                , description: {
                    required: true
                }
                , status: {
                    required: true
                }
                , acc_dep: {
                    number: true
                }
                , dep_deduction: {
                    number: true
                }
                , emi_amount: {
                    number: true
                }
                , loan_amount: {
                    number: true
                }
                , sale_value: {
                    number: true
                }


            }
            , messages: {

                asset_name: {
                    required: "Asset Name is required"
                }
                , put_to_use: {
                    required: "Use Date is required"
                }
                , asset_group: {
                    required: "Asset Group is required"
                }
                , assetLocation: {
                    required: "Select Asset location"
                }
                , asset_life_years: {
                    required: "Select Asset Life years"
                }
                , end_life_date: {
                    required: "End Life Date is required"
                }
                , asset_quantity: {
                    required: "Asset Quantity is required"
                    , number: "Please enter numbers only"
                }
                , purchase_value: {
                    required: "Purchase Value is required"
                    , number: "Please enter numbers only"
                },
                // vehvicle validation
                type: {
                    required: "Type is required"
                }
                , model_name: {
                    required: "Model Name is required"
                }
                , profit_center: {
                    required: "Profit Center is required"
                }
                , owner: {
                    required: "Owner is required"
                }
                , make_type: {
                    required: "Make Type is required"
                }
                , model_name: {
                    required: "Make Type is required"
                }
                , vehicle_no: {
                    required: "Vehicle No is required"
                }
                , vehicle_type: {
                    required: "Vehicle Type is required"
                }
                , book_value: {
                    required: "Book Value is required"
                }
                , depreciation_value: {
                    required: "Depreciation Value is required"
                }
                , reading_in: {
                    required: "Reading In is required"
                }
                , expected_reading: {
                    required: "Expected Reading is required"
                    , number: "Please enter numbers only"
                }
                , min_urea_alert: {
                    required: "Minimum Urea Limit is required"
                    , number: "Please enter numbers only"
                }
                , description: {
                    required: "Description is required"
                }
                , status: {
                    required: "Status is required"
                }
                //vehicle validation
            },
            // errorPlacement: function(error, element) {
            //     // select2-container
            //     console.log();
            //     if (element.is('select'))
            //         error.insertAfter($(element).siblings().eq(2));
            //     else if(element.is(':radio'))
            //         error.insertAfter($(element).parent().siblings().eq(2));
            //         // error.insertAfter(element);
            //     else
            //         error.insertAfter(element);
            // }   ,
            errorPlacement: function(error, e) {
                e.parents('.form-group').append(error);
            }
            , submitHandler: function(form, message) {

                redUrl = $("#asset_id").val() == '' ? base_url + '/add-asset-form' : base_url + '/update-asset';
                console.log(form);

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

                            $(".form-err").css("color", "#28a745");
                            $(".form-err").html(res.msg);
                            setTimeout(function() {
                                // window.location.href = base_url+'/fixed-assets';
                                history.go(-1);
                            }, 2000);

                        } else {
                            // fp1.close();
                            $(".form-err").css("color", "red");
                            $(".form-err").html(res.msg);

                            setTimeout(function() {
                                // location.reload();
                            }, 3000);
                        }

                    }
                    , error: function(xhr, textStatus, errorThrown) {

                    }
                });

                // postAjax({
                //       data: new FormData(form),
                //       url: $("#asset_id").val()=='' ? base_url + '/add-asset' : base_url + '/update-asset',
                //       type:'post',
                //       csrfToken: "",
                //     },function(res){
                //         //   console.log(res)
                //     });

            }
        });



    });

</script>

</body>

</html>
