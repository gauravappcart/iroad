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
                                <h1>Import Materials</h1>
                            </div>
                        </div>
                        {{-- <button type="button" onclick="add_data()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#scrollmodal"> Add Tender Item </button>
                        <a href="{{ $prefix.'/import-tender-items'.'?site_id='.$site_id) }}" class="btn btn-danger m-2">Import Tender Item</a> &nbsp; --}}
                        {{-- <button type="button" onclick="history.back()" class="btn btn-success btn-sm pull-right">Back</button> --}}
                        <a href="{{ $prefix.'/materials' }}" class="btn btn-success btn-sm pull-right">Back</a> &nbsp;


                    </div>
                    <div class="card-body">


                        <form action="{{ $prefix.'/material-import' }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-4 col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <label for="file" class="form-control-label">Select Excel File<span style="color:red">*</span></label>
                                    <input type="file" name="file" id="file" accept=".xls,.xlsx,.xlsm" data-placeholder="Upload File" class="form-control" required>
                                </div>
                            </div>



                            <div>
                                <button class="btn btn-success m-2" type="submit">Import</button>
                                <a href="{{ $prefix.'/export-material' }}" class="btn btn-danger m-2 float-right">Download Sample Template</a>
                            </div>
                        </form>

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


</script>



</body>
</html>
