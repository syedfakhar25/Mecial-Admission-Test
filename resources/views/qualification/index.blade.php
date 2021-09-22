@extends('admin.master')
@section('title')
    AJKMC Admission Test | Qualification
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Qualification</em></h1><span style="font-weight: bold">Aggregate Marks in HSSC/ equivalent must not be less than 65% i.e 715/100</span>
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
                                <form method="POST" action="{{ route('qualification.store', $user_id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12"> <b><em style="color: red">For Matric/O Levels</em></b></div>
                                        <div class="col-md-3 form-group">
                                            <label>Examination Passed</label>
                                            <input type="text" class="form-control" name="exam[]" value="{{old('exam')}}" placeholder="e.g; SSC/ O level">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Science Subject</label>
                                            <input type="text" class="form-control" name="subject[]" value="{{old('subject')}}"placeholder="e.g; Science / Pre Medical">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Institution Type</label>
                                            <input type="text" class="form-control" name="institute[]" value="{{old('institute')}}" placeholder="public / private sector">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Board University</label>
                                            <input type="text" class="form-control" name="board[]" value="{{old('board')}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Year of Passing</label>
                                            <input type="text" class="form-control" name="year[]" value="{{old('year')}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Marks Obtained</label>
                                            <input type="text" class="form-control" name="obtained_marks[]" value="{{old('obtained_marks')}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Total Marks</label>
                                            <input type="text" class="form-control" name="total_marks[]" value="{{old('total_marks')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr width="100%">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"> <b><em style="color: red">For FSc/A Levels</em></b> <span style="font-weight: bold; color: darkblue">(Fresh Candidates will enter only subject marks e.g; Physics, Chemistry, Biology)</span></div>
                                        <div class="col-md-3 form-group">
                                            <label>Examination Passed</label>
                                            <input type="text" class="form-control" name="exam[]" value="{{old('exam')}}" placeholder="e.g; HSSC/ A level">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Science Subject</label>
                                            <input type="text" class="form-control" name="subject[]" value="{{old('subject')}}"placeholder="e.g; Science / Pre Medical">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Institution Type</label>
                                            <input type="text" class="form-control" name="institute[]" value="{{old('institute')}}" placeholder="public / private sector">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Board University</label>
                                            <input type="text" class="form-control" name="board[]" value="{{old('board')}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Year of Passing</label>
                                            <input type="text" class="form-control" name="year[]" value="{{old('year')}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Marks Obtained</label>
                                            <input type="text" class="form-control" name="obtained_marks[]" value="{{old('obtained_marks')}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Total Marks</label>
                                            <input type="text" class="form-control" name="total_marks[]" value="{{old('total_marks')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group"><span style="font-weight: bold"><em>Only for Fresh Candidates</em></span></div>
                                        <div class="col-md-3 form-group">
                                            <label>Physics</label>
                                            <input type="text" class="form-control" name="phy" value="{{old('phy')}}">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Chemistry</label>
                                            <input type="text" class="form-control" name="chem" value="{{old('chem')}}">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Biology</label>
                                            <input type="text" class="form-control" name="bio" value="{{old('bio')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <br>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary">Save & Next</button>
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


@endsection
