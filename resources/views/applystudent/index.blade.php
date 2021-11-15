@extends('admin.master')
@section('title')
    AJKMC Admission Test | Apply
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Apply Here</em></h1>
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <!-- /.card-header -->
                                @if(date('Y-m-d') > $admission[0]->close_date)
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4><em>Admission is Closed Now</em></h4>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($apply_status == 1)
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4><em>You have already applied for admission</em></h4>
                                                <a href="{{route('applicationstatus')}}"><span class="text-danger"><u>Click here to check the status</u></span></a>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    <div class="card-body">
                                        <div class="row"><span style="font-weight: bold; color: red"><em>Once applied you will not be able to update anything</em></span></div>
                                        <div class="row"><hr width="100%"></div>
                                        <form method="POST" id="applied" action="{{route('applystudent.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label >Select Admission</label>
                                                    <select class="form-control" name="admission_title">
                                                        @foreach($admission as $adm)
                                                            <option disabled>--selecct an admission--</option>
                                                            <option value="{{$adm->id}}">{{$adm->admission_title.' '.$adm->session}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label >Upload Challan Image</label>
                                                    <input type="file" class="form-control" name="challan1" />
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label>Close Date:</label>
                                                    <input class="form-control" type="text" value="{{$admission[0]->close_date}}" disabled placeholder="{{$admission[0]->close_date}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button class="btn btn-primary"  type="submit" onclick="$(this).attr('disabled', true); $('#applied').submit();">APPLY</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif

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
