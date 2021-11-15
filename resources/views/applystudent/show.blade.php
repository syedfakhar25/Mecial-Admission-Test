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
                                    <div class="col-md-12 mb-4">
                                        <h6 class="text-danger"><em style="font-weight: bold">Note: You will not be able to update your profile information untill the decision has been taken.</em></h6>
                                    </div>

                                    <?php $count=0;?>
                                    <div class="table-responsive">
                                        <table  class="display table" style="width:100%" id="">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Admission Title </th>
                                                <th scope="col">Applied Date</th>
                                                <th scope="col">Admission Status</th>
                                                <!--<th scope="col">Action</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                 $adms = \App\Models\Admission::first(); 
                                                 $close_date = $adms->close_date;
                                                @endphp
                                            <tr>
                                                @foreach($applied_admission as $adm)
                                                    <th scope="row"><?echo ++$count?></th>
                                                    <th scope="row">{{$adm->admission->admission_title}}</th>
                                                    <th scope="row">{{$adm->apply_date}}</th>
                                                    @if($adm->status == 'pending')
                                                        <th scope="row" class="text-primary"><em>Pending</em></th>
                                                    @elseif($adm->status == 'accepted')
                                                        <th scope="row" class="text-success"><em>Accepted</em></th>
                                                    @elseif($adm->status == 'rejected')
                                                        <th scope="row" class="text-danger"><em>Rejected</em></th>
                                                    @endif
                                                    <!--<th scope="row">
                                                         @if($adm->status == 'pending' && date('Y-m-d')< $close_date)
                                                            <a href="{{route('withdraw_admission', $adm->id)}}" onclick="return confirm('Are you sure, you want to Withdraw?')" class="btn btn-danger"><i class="fa  fa-reply"></i> Withdraw</a>
                                                         @endif
                                                    </th>-->
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
