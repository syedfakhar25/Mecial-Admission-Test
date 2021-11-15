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
                        <span><a href="{{route('print', $user->id)}}" class="btn btn-danger text-white">Print Profile</a></span>
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
                                   <!-- @if(Auth::user()->user_type=='admin')
                                        <div class="text-center" style="font-weight: bold"><em>Aggregate: <u>{{number_format($aggregate, 4)}}</u></em></div>
                                    @endif-->

                                    @if(Auth::user()->user_type == 'user')
                                        @if(count(Auth::user()->appliedStudent)>0)
                                            <div class="text-center" style="font-weight: bold; color: red"><em>Note: You will not be able to update your profile information untill the decision has been taken<!--In case of incomplete profile <a href="https://www.youtube.com/watch?v=fqkH93K7rG4">Click Here</a>--></em></div>
                                        @else
                                            <div class="text-center" style="font-weight: bold; color: red"><em>Note: Check your profile, if anything is missing update it then <a href="/applystudent">Apply Here</a></em></div>
                                        @endif
                                    @endif
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
                        @if(Auth::user()->user_type == 'admin')
                            <!-- Personal Information-->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Challan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($applied_student as $ap)
                                                    <img
                                                         src="{{\Illuminate\Support\Facades\Storage::url($ap->challan)}}"
                                                         alt="No challan added" width="100%">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                        @endif
                        <!-- Personal Information-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Personal Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8"> <strong>Category Selected: </strong>
                                        @if(in_array('open_merit',$category_options))
                                            <span style="color: orangered"><em>District Quota / Open Merit,</em></span>
                                        @endif
                                        @if(in_array('overseas',$category_options))
                                            <span style="color: orangered"><em> Overseas,</em></span>
                                        @endif
                                        @if(in_array('disability',$category_options))
                                            <span style="color: orangered"><em> Student with Disabilities,</em></span>
                                        @endif
                                        @if(in_array('doctor',$category_options))
                                            <span style="color: orangered"><em> Doctor's Children,</em></span>
                                        @endif
                                        @if(in_array('special_quota',$category_options))
                                            <span style="color: orangered"><em>Special Quota for Neelam & Leepa,</em></span>
                                        @endif
                                        @if(in_array('self',$category_options))
                                            <span style="color: orangered"><em> Self Finance,</em></span>
                                        @endif
                                        @if(in_array('bds',$category_options))
                                            <span style="color: orangered"><em> BDS</em></span>
                                        @endif
                                    </div>
                                    <div class="col-md-4"> <strong>Hafiz e Quran: </strong>
                                        @if($user->hafiz_quran ==1)
                                        Yes
                                        @else
                                        No
                                        @endif
                                    </div>
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
                        @if(count($user->qualification)==0)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Qualifications</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    No Qualification Added
                                </div>
                            </div>
                        @else
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
                                            @if($qual->qual_type == 'matric')

                                            @elseif($qual->qual_type == 'fsc')
                                            @else
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <hr width="100%">
                                {{--<b style="color: red"><em>Fresh Candidates Science Marks:</em></b>
                                <span>Physics: {{$user->qualification[0]->phy}} | Chemistry: {{$user->qualification[0]->chem}}
                                    | Biology: {{$user->qualification[0]->bio}} | Total Marks:{{$user->qualification[0]->total_science}} </span>--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        @endif

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

                        {{--prefrences--}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Preferences</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
      
                                    @foreach($college_names as $key=>$cn)
                                        <div class="col-md-4">
                                            <span style="font-weight: bold;">{{($key+1)}}. {{$cn->colleges}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{--prefrences--}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Documents</h3>
                            </div>
                            <!-- /.card-header -->
                            @if(count($documents)>0)
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight: bold;">
                                            Matric
                                            <img id="imageZoom" class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->matric)}}" alt="image" width="100%">
                                            </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            FSC/A levels
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->fsc)}}" alt="image" width="100%">
                                             </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            MCAT Result
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->mcat_result)}}" alt="image" width="100%">
                                            </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            CNIC
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->cnic)}}" alt="image" width="100%">
                                            </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            Domicile
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->domicile)}}" alt="image" width="100%">
                                            </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            PRC
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->prc)}}" alt="image" width="100%">
                                            </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            State Subject
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->state_subject)}}" alt="image" width="100%">
                                            </span>
                                            <br>
                                            <hr width="100%">
                                            <span style="font-weight: bold;">
                                            Signature
                                            <img class=""
                                                 src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->signature)}}" alt="image" width="100%">
                                            </span>
                                           <br>
                                            <hr width="100%">
                                            @if($documents[0]->overseas != NULL)
                                                <span style="font-weight: bold;">
                                                Proof of dual Nationality
                                                <img class=""
                                                     src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->overseas)}}" alt="image" width="100%">
                                                </span>
                                            @endif
                                            <br>
                                            <hr width="100%">
                                             @if($documents[0]->disable != NULL)
                                                <span style="font-weight: bold;">
                                                Proof of Disability 
                                                <img class=""
                                                     src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->disable)}}" alt="image" width="100%">
                                                </span>
                                             @endif
                                             <br>
                                                <hr width="100%">
                                             @if($documents[0]->doctor != NULL)
                                                <span style="font-weight: bold;">
                                                Proof of Service in AJK as Doctor
                                                <img class=""
                                                     src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->doctor)}}" alt="image" width="100%">
                                                </span>
                                             @endif
                                             <br>
                                                <hr width="100%">
                                             @if($documents[0]->hafiz != NULL)
                                                <span style="font-weight: bold;">
                                                Hafiz e Quran Certificate
                                                <img class=""
                                                     src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->hafiz)}}" alt="image" width="100%">
                                                </span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
                                    No document added
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>

    </script>
@endsection
