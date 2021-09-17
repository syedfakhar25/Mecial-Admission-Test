@extends('admin.master')

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            @if(Auth::user()->user_type == 'admin')
            {{--Dashboard cards--}}
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Students</span>
                            <span class="info-box-number">{{$total_users}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Approved</span>
                            <span class="info-box-number">{{$approved}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-times"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Not Approved</span>
                            <span class="info-box-number">{{$not_approved}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-fire"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pending</span>
                            <span class="info-box-number">000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            {{--Dashboard Users--}}
            <div class="card">
                <div class="card-header border-transparent">
                    <div class="row"><h3 class="card-title">All Users</h3></div>
                    <div class="row">
                        <br>
                    </div>
                    <form action="{{route('dashboard.index')}}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" name="filter[name]" class="form-control" placeholder="Search by Name"/>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="filter[cnic]" class="form-control" placeholder="Search by CNIC"/>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control"  name="filter[category]">
                                    <option  >Search by Category</option>
                                    <option value="open_merit">District Quota / Open Merit</option>
                                    <option value="overseas">Overseas</option>
                                    <option value="disability">Student with Disabilities</option>
                                    <option value="doctor">Doctor's Children</option>
                                    <option value="special_quota">Special Quota for Neelam & Leepa</option>
                                    <option value="self">Self Finance</option>
                                    <option value="bds">BDS</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="filter[domicile]">
                                    <option >Search by Qouta</option>
                                    <option value="muzaffarabad" >Muzaffarabad</option>
                                    <option value="neelum">Neelum</option>
                                    <option value="hattian" >Hattian</option>
                                    <option value="bagh" >Bagh</option>
                                    <option value="haveli" >Haveli</option>
                                    <option value="poonch" >Poonch</option>
                                    <option value="sudhnuti" >Sudhnuti</option>
                                    <option value="kotli" >Kotli</option>
                                    <option value="mirpur" >Mirpur</option>
                                    <option value="bhimber" >Bhimber</option>
                                    <option value="1947" >Refugee 1947</option>
                                    <option value="1989" >Refugee 1989</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" name="search" class="btn btn-danger">Search</button>
                            </div>
                        </div>
                    </form>

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

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>CNIC</th>
                                <th>Domicile</th>
                                <th>Profile</th>
                                <th>Approved</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0;?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$i+=1}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->guardian_name}}</td>
                               <td>{{$user->cnic}}</td>
                               <td>{{$user->domicile}}</td>
                               <td><a href="{{route('profile' , $user->id)}}"class="btn btn-primary">Check</a></td>
                               @if($user->approved != 1)
                                    <td><a href="{{route('approve' , $user->id)}}" class="btn btn-warning">Approve</a></td>
                               @else
                                    <td><span class="text-danger">Approved <i class="fa fa-check"></i></span></td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @else
                <div class="col-md-12" >
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user" >
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white">
                            <h2 class="widget-user-username text-center text-black-50">
                                <em style=" border: 2px solid red; border-radius: 25px;
                                text-shadow: 1px 1px 1px black; font-size: 40px;
                                ">
                                    Welcome to AJKMC Admission Test Registration Portal
                                </em>
                            </h2>
                        </div>
                        <div class="row m-auto" >
                            <a href="" class="btn btn-warning">
                                <em style=" color: white;
                                text-shadow: 1px 1px 1px black; font-size: 20px;
                                ">
                                 @if(Auth::user()->approved!=1)
                                        Profile Not Verified Yet
                                 @else
                                     Approved
                                 @endif

                                </em>
                            </a>
                        </div>
                        <div>
                            <br>
                        </div>
                        <div class="row m-auto" >
                            <a href="/personalInfo" class="btn btn-danger">
                                <em style=" color: white;
                                text-shadow: 1px 1px 1px black; font-size: 40px;
                                ">
                                    Click to Proceed
                                </em>
                            </a>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            @endif

        </div>

    </div>
@endsection
