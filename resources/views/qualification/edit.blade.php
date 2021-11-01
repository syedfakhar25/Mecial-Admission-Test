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
                        <h1><em class="text-primary">Qualification</em></h1><span style="font-weight: bold">Aggregate Marks in HSSC/ equivalent must not be less than 65% i.e 715/1100</span>
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
                                <form method="PUT" action="{{ route('update_qualifications') }}"  enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12"> <b><em style="color: red">For Matric/O Levels</em></b></div>
                                        <div class="col-md-3 form-group">
                                            <label>Examination Passed</label>
                                            <input type="text" class="form-control" name="exam[]" value="{{$matric->exam}}" placeholder="e.g; SSC/ O level">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Science Subject</label>
                                            <input type="text" class="form-control" name="subject[]" value="{{$matric->subject}}"placeholder="e.g; Science / Pre Medical">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Institution Type</label>
                                            <input type="text" class="form-control" name="institute[]" value="{{$matric->institute}}" placeholder="public / private sector">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Board University</label>
                                            <input type="text" class="form-control" name="board[]" value="{{$matric->board}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Year of Passing</label>
                                            <input type="text" class="form-control" name="year[]" value="{{$matric->year}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Marks Obtained</label>
                                            <input type="text" class="form-control" name="obtained_marks[]" value="{{$matric->obtained_marks}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Total Marks</label>
                                            <input type="text" class="form-control" name="total_marks[]" value="{{$matric->total_marks}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <input type="text" class="form-control" name="qual_type[]" value="matric" hidden>
                                            <input type="text" class="form-control" name="qual_id[]" value="{{$matric->id}}" hidden>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr width="100%">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"> <b><em style="color: red">For FSc/A Levels</em></b> <span style="font-weight: bold; color: darkblue">(Candidates will enter total of subject marks e.g; 555/600)</span></div>
                                        <div class="col-md-3 form-group">
                                            <label>Examination Passed</label>
                                            <input type="text" class="form-control" name="exam[]" value="{{$fsc->exam}}" placeholder="e.g; HSSC/ A level">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Science Subject</label>
                                            <input type="text" class="form-control" name="subject[]" value="{{$fsc->subject}}"placeholder="e.g; Science / Pre Medical">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Institution Type</label>
                                            <input type="text" class="form-control" name="institute[]" value="{{$fsc->institute}}" placeholder="public / private sector">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Board University</label>
                                            <input type="text" class="form-control" name="board[]" value="{{$fsc->board}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Year of Passing</label>
                                            <input type="text" class="form-control" name="year[]" value="{{$fsc->year}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Marks Obtained</label>
                                            <input type="text" class="form-control" name="obtained_marks[]" value="{{$fsc->obtained_marks}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Total Marks</label>
                                            <input type="text" class="form-control" name="total_marks[]" value="{{$fsc->total_marks}}">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <input type="text" class="form-control" name="qual_type[]" value="fsc" hidden>
                                            <input type="text" class="form-control" name="qual_id[]" value="{{$fsc->id}}" hidden>
                                        </div>

                                    </div>

                                    {{--@if($fsc->fresh_candidate == 1)
                                    <div class="row">
                                        <div class="form-check col-md-12 ">
                                            <input class="form-check-input"  name="fresh_candidate" value="1" type="checkbox" checked>
                                            <label class="form-check-label"><em style="font-weight: bold; color: green">Click here if you are fresh candidate</em></label>
                                        </div>
                                    </div>
                                    <div class="row"  id="text">
                                        <div class="col-md-3 form-group">
                                            <label>Physics</label>
                                            <input type="text" class="form-control" name="phy" value="{{$fsc->phy}}">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Chemistry</label>
                                            <input type="text" class="form-control" name="chem" value="{{$fsc->chem}}">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Biology</label>
                                            <input type="text" class="form-control" name="bio" value="{{$fsc->bio}}">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Total Marks </label>
                                            <input type="text" class="form-control" name="total_science" value="{{$fsc->total_science}}">
                                        </div>

                                    </div>
                                    @endif--}}
                                    <div class="row">
                                        <br>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary">Update & Next</button>
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
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                text.style.display = "inline";
            } else {
                text.style.display = "none";
            }
        }
    </script>

@endsection
