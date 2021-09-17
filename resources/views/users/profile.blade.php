@extends('admin.master')
@section('title')
   User Profile
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">User Profile</em></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                @if($user->image == NULL)
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="https://www.pngrepo.com/png/108329/512/man.png"
                                         alt="User profile picture">
                                </div>
                                @else
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{\Illuminate\Support\Facades\Storage::url($user->image)}}"
                                             alt="User profile picture">
                                    </div>
                                @endif

                                <h3 class="profile-username text-center"><em><b>{{$user->name}}</b></em></h3>
                                <h2 class="profile-username text-center">
                                    <em><b>Aggregate %: </b> 71.0000</em>
                                </h2>
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

                               {{-- <p class="text-muted text-center">Software Engineer</p>--}}

                                {{--<ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- Personal Information-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Personal Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"> <strong>Category Selected: </strong> {{$user->category}}</div>
                                    <div class="col-md-4"> <strong>Hafiz e Quran: </strong> Yes/No</div>
                                </div>
                                <div class="row"><hr width="100%"></div>
                                <div class="row">
                                    <div class="col-md-4"> <strong>Father/Guardian's Name: </strong> {{$user->guardian_name}}</div>
                                    <div class="col-md-4"> <strong>Mother's Name: </strong> {{$user->mother_name}}</div>
                                    <div class="col-md-4"> <strong>Gender: </strong>{{$user->gender}} </div>
                                </div>
                                <div class="row"><hr width="100%"></div>
                                <div class="row">
                                    <div class="col-md-4"> <strong>Nationality: </strong> {{$user->nationality}}</div>
                                    <div class="col-md-4"> <strong>Date of Birth: </strong> {{$user->dob}}</div>
                                    <div class="col-md-4"> <strong>District of Domicile: </strong> {{$user->domicile}}</div>
                                </div>
                                <div class="row"><hr width="100%"></div>
                                <div class="row">
                                    <div class="col-md-4"> <strong>Area of Residence: </strong> {{$user->area}}</div>
                                    <div class="col-md-4"> <strong>CNIC/ Smart Card/NICOP/POC: </strong> {{$user->cnic}}</div>
                                </div>
                                <div class="row"><hr width="100%"></div>
                                <div class="row">
                                    <div class="col-md-12"> <strong>Address: </strong> {{$user->address}}</div>
                                </div>
                                <div class="row"><hr width="100%"></div>
                                <div class="row">
                                    <div class="col-md-4"> <strong>Tel(Landline): </strong> {{$user->landline}}</div>
                                    <div class="col-md-4"> <strong>Cell: </strong> {{$user->mobile}}</div>
                                    <div class="col-md-4"> <strong>E-mail: </strong>{{$user->email}}</div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- Qualifications-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Qualifications</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Exam Passed</th>
                                        <th scope="col">Science Subjects</th>
                                        <th scope="col">Institute</th>
                                        <th scope="col">Board</th>
                                        <th scope="col">Year of Passing</th>
                                        <th scope="col">Obtained Marks</th>
                                        <th scope="col">Total Marks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->qualification as $qual)
                                        <tr>
                                            <td>{{$qual->exam}}</td>
                                            <td>{{$qual->subject}}</td>
                                            <td>{{$qual->institute}}</td>
                                            <td>{{$qual->board}}</td>
                                            <td>{{$qual->year}}</td>
                                            <td>{{$qual->obtained_marks}}</td>
                                            <td>{{$qual->total_marks}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- Admission Test-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Admission Test</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($user->test_type == 'mcat')
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Roll No.</th>
                                            <th scope="col">Center from where Appeared</th>
                                            <th scope="col">Marks Obtained</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$user->roll_no}}</td>
                                            <td>{{$user->test_center}}</td>
                                            <td>{{$user->entry_marks}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Chemistry</th>
                                            <th scope="col">Biology</th>
                                            <th scope="col">Physics</th>
                                            <th scope="col">Test Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$user->chem}}/800</td>
                                            <td>{{$user->bio}}/800</td>
                                            <td>{{$user->physics}}/800</td>
                                            <td>{{$user->test_date}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
