@extends('admin.master')
@section('title')
    AJKMC Admission Test | Entry Test
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">MCAT/SAT Score</em></h1>
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
                                @if(Auth::user()->test_type=='mcat')
                                <form method="POST" action="{{route('entrytest' , Auth::user()->id)}}">
                                    @method('PUT')
                                    @csrf
                                        <div class="row"><h4>MDCAT</h4><span style="font-weight: bold; color: red"> &nbsp Marks must not be less than 60% i.e. 137/210</span></div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label >Roll No:</label>
                                                <input class="form-control" type="text" value="{{Auth::user()->roll_no}}" name="rollno" placeholder="e.g; 12345">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Center:</label>
                                                <input class="form-control" type="text" name="test_center" value="{{Auth::user()->test_center}} placeholder="center name">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Marks Obtained:</label>
                                                <input class="form-control" type="text" value="{{Auth::user()->entry_marks}}" placeholder=" e.g; 120">
                                            </div>
                                        </div>
                                    <div class="row">
                                        <button class="btn btn-primary">Save & Next</button>
                                    </div>

                                </form>
                                @else
                                <form method="POST" action="{{route('entrytest' , Auth::user()->id)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="row"><h4>SAT II</h4></div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Chemistry:</label>
                                                <input class="form-control" type="text" name="chem" value="{{Auth::user()->chem}}" placeholder="0/800">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Biology:</label>
                                                <input class="form-control" type="text" name="bio" value="{{Auth::user()->bio}}" placeholder="0/800">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Physics:</label>
                                                <input class="form-control" type="text" name="physics" value="{{Auth::user()->physics}}" placeholder="0/800">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Test Date:</label>
                                                <input class="form-control" type="date" name="test_date" value="{{Auth::user()->test_date}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-primary">Save & Next</button>
                                        </div>

                                    </form>
                                @endif
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


@endsection
