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
                        <h1><em class="text-primary">Add Admissions</em></h1>
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
                                <form method="POST" action="{{ route('admissions.store') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-3 form-group">
                                            <label>Admission Title</label>
                                            <input type="text" class="form-control" name="admission_title" value="{{old('admission_title')}}" placeholder="e.g; Admission-2021">
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Closed Date</label>
                                            <input type="date" class="form-control" name="close_date" value="{{old('close_date')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr width="100%">
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary">Add</button>
                                    </div>

                                </form>
                                <hr width="100%">

                                {{--List of Admissions to show--}}
                                <h5 style="font-weight: bold">Admission's List</h5>
                                <div class="row" >
                                    <?php $count=0;?>
                                    <div class="table-responsive">
                                        <table  class="display" style="width:100%" id="myTable">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Admission Title </th>
                                                <th scope="col">Close Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($admissions as $admission)
                                                <tr>
                                                    <th scope="row">{{$count+=1}}</th>
                                                    <th scope="row">{{$admission->admission_title}}</th>
                                                    <th scope="row">{{$admission->close_date}}</th>
                                                    <td colspan="2">
                                                        {{--<a href="{{url('admissions/'.$admission->id.'/edit')}}"><i class="text-blue fa fa-edit"></i></a>--}}
                                                        <form action="{{route('admissions.destroy', $admission->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="fa fa-trash text-danger" style="border-radius: 5px"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
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
