@extends('admin.master')
@section('title')
    GoAJK JAC | Manage Admissions
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Edit Admission</em></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- general form elements disabled -->
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert " role="alert">
                                    {{ session('error') }}
                                </div>
                        @endif
                        <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('admissions.update', $admission->id) }}">
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label>Admission Title</label>
                                            <input type="text" class="form-control" name="admission_title" value="{{$admission->admission_title}}" placeholder="e.g; Admission-2021">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Closed Date</label>
                                            <input type="date" class="form-control" name="close_date" value="{{$admission->close_date}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr width="100%">
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary">Update</button>
                                    </div>

                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection
