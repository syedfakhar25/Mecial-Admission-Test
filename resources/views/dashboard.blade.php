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

                            <p>Total Applicants</p>
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
            <div class="row">
                <br>
                <br>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3 class="m-0 text-dark"><em style="font-weight: bold">{{$latest_admission->admission_title.' '.$latest_admission->session }} Stats</em></h3>
                </div><!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{route('allStudents')}}" class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Applicants</span>
                            <span class="info-box-number">{{$total_users}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <a href="{{route('allStudents')}}?status=accepted" class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></a>

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
                        <a href="{{route('allStudents')}}?status=rejected" class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></a>

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
                        <a href="{{route('allStudents')}}?status=pending" class="info-box-icon bg-warning elevation-1"><i class="fas fa-sync-alt"></i></a>

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
            <div class="row">
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-6 bg-gradient-white">
                    <h3> <b><em>Total Applicants each Day</em></b></h3>
                    <hr width="100%">
                    <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>

                <div class="col-md-6 bg-gradient-gray-white "  >
                    <h3> <b><em>Applicants per Day</em></b></h3>
                    <hr width="100%">
                    <canvas class="chart" id="line2-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();

            // Sales graph chart
            var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
            //$('#revenue-chart').get(0).getContext('2d');

            var salesGraphChartData = {
                labels  :

                    [@foreach($applied_per_day as $ad)"{{date('m-d',strtotime($ad->apply_date))}}",@endforeach],
                datasets: [
                    {
                        label               : 'Total Applicants',
                        fill                : false,
                        borderWidth         : 2,
                        lineTension         : 0,
                        spanGaps : true,
                        borderColor         : "green",
                        pointRadius         : 3,
                        pointHoverRadius    : 7,
                        pointColor          : '#efefef',
                        pointBackgroundColor: '#efefef',
                        data                : [@php $sum=0; @endphp @foreach($applied_per_day as $ad) @php $sum+=$ad->total;  @endphp "{{$sum}}",@endforeach]
                    }
                ]
            }

            var salesGraphChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks : {
                            fontColor: 'green',
                        },
                        gridLines : {
                            display : false,
                            color: 'green',
                            drawBorder: false,
                        }
                    }],
                    yAxes: [{
                        ticks : {
                            stepSize: 500,
                            fontColor: 'green',
                        },
                        gridLines : {
                            display : true,
                            color: 'green',
                            drawBorder: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var salesGraphChart = new Chart(salesGraphChartCanvas, {
                    type: 'line',
                    data: salesGraphChartData,
                    options: salesGraphChartOptions
                }
            )

            ///// 2nd graph for applicants per Day #line2-chart
            var salesGraphChartCanvas = $('#line2-chart').get(0).getContext('2d');
            //$('#revenue-chart').get(0).getContext('2d');

            var salesGraphChartData= {
                labels  :

                    [@foreach($applied_per_day as $ad)"{{date('m-d',strtotime($ad->apply_date))}}",@endforeach],
                datasets: [
                    {
                        label               : 'No. of Applicants',
                        fill                : false,
                        borderWidth         : 2,
                        lineTension         : 0,
                        spanGaps : true,
                        borderColor         : 'blue',
                        pointRadius         : 3,
                        pointHoverRadius    : 7,
                        pointColor          : '#efefef',
                        pointBackgroundColor: '#efefef',
                        data                : [@php $sum=0; @endphp @foreach($applied_per_day as $ad) @php $sum+=$ad->total;  @endphp "{{$ad->total}}",@endforeach]
                    }
                ]
            }

            var salesGraphChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks : {
                            fontColor: 'blue',
                        },
                        gridLines : {
                            display : false,
                            color: 'blue',
                            drawBorder: false,
                        }
                    }],
                    yAxes: [{
                        ticks : {
                            stepSize: 100,
                            fontColor: 'blue',
                        },
                        gridLines : {
                            display : true,
                            color: 'blue',
                            drawBorder: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var salesGraphChart1 = new Chart(salesGraphChartCanvas, {
                    type: 'line',
                    data: salesGraphChartData,
                    options: salesGraphChartOptions
                }
            )
        } );
    </script>
@endsection
