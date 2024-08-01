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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Conflict Details</h3>
                        <a href="{{ $prefix.'/conflicts' }}" class="btn btn-success btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <p class="text-success" id="success-message">{{ session('success') }}</p>
                        @endif

                        @if (session('error'))
                        <p class="text-danger">{{ session('error') }}</p>
                        @endif

                        @if (session('failures'))
                        <div class="text-danger">
                            <h3>Import Failures:</h3>
                            <ul>
                                @foreach (session('failures') as $failure)
                                <li>Row {{ $failure->row() }}: {{ $failure->errors()[0] }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="save_conflicts_information">
                            @csrf
                            <input type="hidden" value="{{$conflicts_details[0]['conflict_id']}}" id="conflict_id" name="conflict_id">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="site_name" class="form-control-label">Site Name <span class="text-danger">*</span></label>
                                            <input type="text" id="site_name" name="site_name" placeholder="Site Name" value="{{$conflicts_details[0]['sites']['site_name']}}" disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="created_date" class="form-control-label">Conflicts Created Date <span class="text-danger">*</span></label>
                                            <input type="text" id="created_date" name="created_date" class="form-control" disabled value="{{date('Y-m-d',strtotime($conflicts_details[0]['created_at']))}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="subject" class="form-control-label">Conflicts Title <span class="text-danger">*</span></label>
                                            <input type="text" id="subject" name="subject" placeholder="Conflicts subject" value="{{$conflicts_details[0]['subject']?$conflicts_details[0]['subject']:$conflicts_details[0]['other_reason_title']}}" disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="conflict_description" class="form-control-label">Conflicts Description <span class="text-danger">*</span></label>
                                            <textarea id="conflict_description" name="conflict_description" placeholder="Description" class="form-control" disabled>{{$conflicts_details[0]['conflict_description']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="resolved_comment" class="form-control-label">Write Your Comment <span class="text-danger">*</span></label>
                                            <textarea id="resolved_comment" name="resolved_comment" placeholder="Please Enter Your Comment" class="form-control" {{!empty($conflicts_details[0]['confirmed'])?'disabled':''}}></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-check">
                                            <input type="checkbox" name="resolved" value="1" id="resolved" class="form-check-input" {{!empty($conflicts_details[0]['confirmed'])?'disabled checked':''}}>
                                            <label for="resolved" class="form-check-label">Mark as Resolved</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span class="material-err"></span>
                                    {{-- <span class="text-danger material-err"></span> --}}

                                </div>
                            </div>
                            @if($conflicts_details[0]['confirmed']==0)
                            <div class="">
                                <button type="submit" class="btn btn-primary"><span id="btn_title">Submit</span></button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Previous Comments</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($conflicts_details[0]['conflicts_resolved_information'] as $data)
                                <tr>
                                    <td>{{ date('Y-m-d', strtotime($data['created_at'])) }}</td>
                                    <td>{{ $data['resolved_comment'] }}</td>
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
                        $(".material-err").css("color", "green");
                        $(".material-err").html(res.msg);
                        setTimeout(function() {
                            // location.reload();
                            var prefix = @json($profile_data['prefix']);

                             window.location = prefix+"/conflicts"
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
