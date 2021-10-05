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
                   {{-- <form action="{{route('dashboard.index')}}" method="get">
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
                    </form>--}}

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
                                <th>Profile</th>
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
                               <td><a href="{{route('profile' , $user->id)}}"class="btn btn-primary">Check</a></td>
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
            $('#myTable').DataTable();
        } );
    </script>
@endsection
