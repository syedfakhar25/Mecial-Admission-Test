@extends('admin.master')
@section('title')
    AJKMC Admission Test | Applied Admissions
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Applied Admissions</em></h1>
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
                                <div class="row">
                                <div class="row"><hr width="100%"></div>
                                    <div class="col-md-12">
                                        <h5 style="font-weight: bold">Applied Admissions with Status</h5>
                                    </div>

                                    <?php $count=0;?>
                                    <div class="table-responsive">
                                        <table  class="display" style="width:100%" id="myTable">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                               {{-- <th scope="col">Admission Title </th>--}}
                                                <th scope="col">Applied Date</th>
                                                <th scope="col">Admission Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @foreach($applied_admission as $adm)
                                                    <th scope="row"><? $count++?></th>
                                                   {{-- <th scope="row">{{$adm->admission->admission_title}}</th>--}}
                                                    <th scope="row">{{$adm->apply_date}}</th>
                                                    @if($adm->status == NULL)
                                                        <th scope="row" class="text-primary"><em>Pending</em></th>
                                                    @elseif($adm->status == 'accepted')
                                                        <th scope="row" class="text-success"><em>Accepted</em></th>
                                                    @else
                                                        <th scope="row" class="text-danger"><em>Rejected</em></th>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
