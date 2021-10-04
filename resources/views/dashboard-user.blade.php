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
                <div class="col-md-12" >
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user" >
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white">
                            <h2 class="widget-user-username text-center text-black-50" style="border: 2px solid red; border-radius: 45px">
                                <em style="text-shadow: 1px 1px 1px black; font-size: 35px;">
                                    Welcome to Joint Admission Committee GoAJK Nomination 2021
                                </em>
                            </h2>
                        </div>
                        <div class="row" style="margin-top: -40px" >
                            <ul>
                                <li style="font-weight: bold">Read the instructions carefully, <em style="font-weight: bold; color: red">Follow these Steps</em></li>
                                <li>Update your profile first, fill personal information, qualification, entry test & documents section</li>
                                <li>After filling all the information, come to second step and apply on admission in "Apply Now" section</li>
                                <li>You will not be able to change any information after applying on admission</li>
                                <li>So, fill the information carefully and double check it before applying</li>
                                <li>After applying, print profile and challan submit fee in bank and send document</li>
                            </ul>
                        </div>
                        <div>
                            <br>
                        </div>

                        <div class="row m-3" >
                            @if(Auth::user()->user_type != 'admin' && count(Auth::user()->appliedStudent)==0)
                                <div class="info-box col-md-3">
                                    <a href="{{route('personalInfo.index')}}" class="info-box-icon bg-info elevation-1"><i class="fas fa-angle-double-right"></i></a>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Step 1</span>
                                        <a href="{{route('personalInfo.index')}}" class="info-box-number">
                                          Update Profile
                                        </a>
                                    </div>
                                </div>
                                <div class="info-box col-md-3">
                                    <a href="{{route('applystudent.index')}}" class="info-box-icon bg-success elevation-1"><i class="fas fa-angle-double-right"></i></a>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Step 2</span>
                                        <a href="{{route('applystudent.index')}}" class="info-box-number">Apply Now</a>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                @elseif(Auth::user()->user_type != 'admin' && count(Auth::user()->appliedStudent)>0)
                                    <div class="info-box col-md-3">
                                        <a href="{{route('profile', Auth::user()->id)}}" class="info-box-icon bg-info elevation-1"><i class="fas fa-angle-double-right"></i></a>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Step 1</span>
                                            <a href="{{route('profile', Auth::user()->id)}}" class="info-box-number">
                                                Check Profile
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-box col-md-3">
                                        <a href="" class="info-box-icon bg-success elevation-1"><i class="fas fa-angle-double-right"></i></a>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Step 2</span>
                                            <a href="{{route('applystudent.index')}}" class="info-box-number">Applied</a>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                @endif
                                <!-- /.info-box-content -->

                            <div  class="info-box col-md-3">
                                <a href="{{route('print', Auth::user()->id)}}" class="info-box-icon bg-warning elevation-1"><i class="fas fa-angle-double-right"></i></a>

                                <div class="info-box-content">
                                    <span class="info-box-text">Step 3</span>
                                    <a href="{{route('print', Auth::user()->id)}}" class="info-box-number">Print Profile</a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div  class="info-box col-md-3">
                                <a href="{{route('applicationstatus')}}" class="info-box-icon bg-danger elevation-1"><i class="fas fa-angle-double-right"></i></a>

                                <div class="info-box-content">
                                    <span class="info-box-text">Step 4</span>
                                    <a href="{{route('applicationstatus')}}" class="info-box-number">Application Status</a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
