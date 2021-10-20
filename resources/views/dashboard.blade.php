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
                        <h1 class="m-0 text-dark"><em style="font-weight: bold">Dashboard</em></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            {{--Dashboard cards--}}
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$total_users}}</h3>

                            <p>Total Students</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{route('allStudents')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$total_admissions}}</h3>

                            <p>Total Admissions</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-address-book"></i>
                        </div>
                        <a href="{{route('admissions.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$college_count}}</h3>

                            <p>Institutions</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <a href="{{route('colleges.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark"><em style="font-weight: bold">{{$current_admission_title}} Stats</em></h3>
                </div><!-- /.col -->
            </div>
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
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Accepted</span>
                            <span class="info-box-number">{{$accepted}}</span>
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
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rejected</span>
                            <span class="info-box-number">{{$rejected}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <a hre></a>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <a href="/colleges" class="info-box-icon bg-warning elevation-1"><i class="fas fa-sync-alt"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text">Pending</span>
                            <span class="info-box-number">{{$pending}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            {{--Dashboard Users--}}
            {{--<div class="card">
                <div class="card-header border-transparent">
                    <div class="row"><h3 class="card-title">All Users</h3></div>
                    <div class="row">
                        <br>
                    </div>
                    --}}{{--<form action="{{route('dashboard.index')}}" method="get">
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
                    </form>--}}{{--

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
                        <table class="table m-0" id="myTable">
                            <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Domicile</th>
                                --}}{{--<th>Profile</th>--}}{{--
                                <th>Approved</th>
                                <th>Change Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0;?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$i+=1}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->cnic}}</td>
                               <td>{{$user->domicile}}</td>
                              --}}{{-- <td><a href="{{route('profile' , $user->id)}}"class="btn btn-primary">Check</a></td>--}}{{--
                               @if($user->approved != 1)
                                    <td><a href="{{route('approve' , $user->id)}}" class="btn btn-warning">Approve</a></td>
                               @else
                                    <td><span class="text-danger">Approved <i class="fa fa-check"></i></span></td>
                                @endif
                                --}}{{--@if($user->appliedstudent[0]->status == 'accepted')
                                <td class="text-primary">Accepted</td>
                                @elseif($user->appliedstudent[0]->status == 'rejected')
                                <td class="text-danger">Rejected</td>
                                @else
                                <td><a href="{{route('accept' , $user->id)}}" class="btn btn-success">Accept</a>
                                    <a href="{{route('reject' , $user->id)}}" class="btn btn-danger">Reject</a>
                                </td>
                                @endif--}}{{--
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
