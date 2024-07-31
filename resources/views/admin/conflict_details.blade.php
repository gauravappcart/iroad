@include('admin/header')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<?php $prefix= $profile_data['prefix'];?>


<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Conflict Details</h1>
                            </div>
                        </div>
                        {{-- <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Tender Item </button>
                        <a href="{{ $prefix.'/import-tender-items'.'?site_id='.$site_id) }}" class="btn btn-danger m-2">Import Tender Item</a> &nbsp; --}}
                        {{-- <button type="button" onclick="history.back()" class="btn btn-success btn-sm pull-right">Back</button> --}}
                        <a href="{{ $prefix.'/conflicts' }}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;


                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <p style="color: green;" id="success-message">{{ session('success') }}</p>
                    @endif

                    @if (session('error'))
                        <p style="color: red;">{{ session('error') }}</p>
                    @endif
                        @if (session('failures'))
        <div style="color: red;">
            <h3>Import Failures:</h3>

            <ul>
                @foreach (session('failures') as $failure)
                    <li>
                        Row {{ $failure->row() }}: {{ $failure->errors()[0] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <form action="{{ $prefix.'/machines-import' }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="col-md-4 col-sm-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="file" name="file" id="file"  accept=".xls,.xlsx,.xlsm" data-placeholder="Upload File" class="form-control" required>
                </div>
            </div>



        <div>
            <button class="btn btn-success m-2" type="submit">Import</button>
            <a href="{{ $prefix.'/export-machine' }}" class="btn btn-danger m-2 float-right">Download Sample Template</a>
        </div>
    </form> --}}


    <form id="save_conflicts_information">

        @csrf
        <input type="hidden" value="{{$conflicts_details[0]['conflict_id']}}" id="conflict_id" name="conflict_id">

        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="material_type" class=" form-control-label">Site Name<span style="color:red">*</span></label>
                                <input type="text" id="site_name" name="site_name" placeholder="Site Name" value="{{$conflicts_details[0]['sites']['site_name']}}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="material_name" class=" form-control-label">Conflicts Created Date<span style="color:red">*</span></label>
                                <input type="text" id="created_date" name="created_date"  class="form-control" disabled value="{{date('Y-m-d',strtotime($conflicts_details[0]['created_at']))}}"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="material_type" class=" form-control-label">Conflicts Title<span style="color:red">*</span></label>
                                <input type="text" id="subject" name="subject" placeholder="Conflicts subject" value="{{$conflicts_details[0]['subject']}}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="material_name" class=" form-control-label">Conflicts Description<span style="color:red">*</span></label>
                                <textarea type="textarea" id="conflict_description" name="conflict_description" placeholder="Description" class="form-control" disabled>{{$conflicts_details[0]['conflict_description']}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="material_name" class=" form-control-label">Write Your Comment<span style="color:red">*</span></label>
                                <textarea type="textarea" id="resolved_comment" name="resolved_comment" placeholder="Please Enter Your Comment" class="form-control" {{!empty($conflicts_details[0]['confirmed'])?'disabled':''}}></textarea>
                            </div>
                        </div>


                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label for="material_cost" class="form-control-label">MATERIAL COST<span style="color:red">*</span></label>
                                <input type="number" id="material_cost" name="material_cost" placeholder="Ex.100,1000. etc" class="form-control">
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-lg-6 ">
                            <div class="col-lg-6 mark-resolved checkbox pull-left form-group">
                                <input type="checkbox" name="resolved" value="1" id="resolved" class="form-input-height-none" {{!empty($conflicts_details[0]['confirmed'])?'disabled':''}} >
                                {{-- <input type="checkbox" name="resolved" value="1" id="resolved" class="form-input-height-none" {{$conflicts_details[0]['conflicts_resolved_information']['resolved_comment']?'disabled':''}}> --}}
                                <label for="resolved">
                                    <span></span>Mark as Resolved
                                </label>

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


        </div>
    </div><!-- .animated -->
</div><!-- .content -->





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

    // Fade out success message after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        $('#success-message').fadeOut('slow');
    }, 3000);
</script>

<script type="text/javascript">
 $("#save_conflicts_information").validate({
        errorPlacement: function (error, e) {
                    e.parents('.form-group').append(error);
                },
        rules: {
            resolved_comment: {
                required: true
            }
           ,
            // resolved:{
            //     required:true
            // }


        }
        , messages: {
            resolved_comment: {
                required: "Please Enter Your Comment"
            }
           ,
            // resolved:{
            //     required:"Please Check The Checkbox"
            // },

        }
        , submitHandler: function(form, message) {
            redUrl = base_url + '/save-conflicts-information';
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

</script>



</body>
</html>
