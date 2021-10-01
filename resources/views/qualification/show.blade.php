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
                        <h1><em class="text-primary">Qualification</em></h1><span style="font-weight: bold">
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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Exam Passed</th>
                                        <th scope="col">Science Subjects</th>
                                        <th scope="col">Institute</th>
                                        <th scope="col">Board</th>
                                        <th scope="col">Year of Passing</th>
                                        <th scope="col">Obtained Marks</th>
                                        <th scope="col">Total Marks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($qualifications as $qual)
                                        <tr>
                                            <td>{{$qual->exam}}</td>
                                            <td>{{$qual->subject}}</td>
                                            <td>{{$qual->institute}}</td>
                                            <td>{{$qual->board}}</td>
                                            <td>{{$qual->year}}</td>
                                            <td>{{$qual->obtained_marks}}</td>
                                            <td>{{$qual->total_marks}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <hr width="100%">
                                @if($qualifications[0]->fresh_candidate == 1)
                                <b style="color: red"><em>Fresh Candidates Science Marks:</em></b>
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Physics</th>
                                                <th scope="col">Biology</th>
                                                <th scope="col">Chemistry</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <td>{{$qualifications[0]->phy}}</td>
                                                <td>{{$qualifications[0]->bio}}</td>
                                                <td>{{$qualifications[0]->chem}}</td>
                                                <td>{{$qualifications[0]->total_science}}</td>
                                            </tbody>
                                        </table>
                                    </div>
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
