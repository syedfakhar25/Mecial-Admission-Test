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
                        <h1 class="m-0 text-dark"><em style="font-weight: bold">All Students</em></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            {{--Dashboard Users--}}
            <div class="card">
                <div class="card-header border-transparent">
                    <a href="/allStudents-report"><i class="fa fa-print"></i>Print in Excel</a>
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
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Domicile</th>
                                <th>MCAT/SATMarks</th>
                                <th>Profile</th>
                                <th>Change Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0;?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$user->roll_no}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->cnic}}</td>
                               <td>{{$user->domicile}}</td>
                               <td>
                                   @if($user->test_type=='mcat')
                                       {{$user->entry_marks}}
                                   @elseif($user->test_type=='sat')
                                        Chem: {{$user->chem}} | Bio: {{$user->bio}} | Physics: {{$user->physics}}
                                   @endif
                               </td>
                                <td><a href="{{route('profile' , $user->id)}}"class=""><i class="fa fa-eye"></i></a></td>
                                @foreach($user->appliedStudent as $app)
                                @if($app->status == 'accepted')
                                <td class="text-success"><em style="font-weight: bold">Accepted</em></td>
                                @elseif($app->status == 'rejected')
                                <td class="text-danger"><em style="font-weight: bold">Rejected</em></td>
                                @else
                                <td><a href="{{route('accept' , $user->id)}}" class="btn btn-primary">Accept</a>
                                    <a href="{{route('reject' , $user->id)}}" class="btn btn-danger">Reject</a>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                /*dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ]*/
            } );
        } );
    </script>
@endsection
