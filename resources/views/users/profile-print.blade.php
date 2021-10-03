@extends('admin.master')
@section('title')
    User Profile
@endsection
@section('content')
    <body onload="window.print()">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content" onload="window.print();">
            <div class="container-fluid">
                <style>
                    h6{
                        font-size: 30px;
                    }
                </style>
                <center>
                    <h4 style="border:black; border-width:1px; border-style:solid;">Final Copy</h4>
                    <h3 style="font-weight: bold"> Government Medical & Dental Institutions of the AJ&K</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="https://www.ajk.gov.pk/logo/480px-AzadKashmirSeal.png" alt="img1" height="100px">
                        </div>
                        <div class="col-md-6">
                            <center>
                                <h3 style="font-weight: bold"> Admission Form</h3>
                                <h5 style="font-weight: bold"> For Admission to First Year MBBS/BDS Programme</h5>
                                <h3 style="font-weight: bold"> Session 2020-21</h3>
                            </center>
                        </div>
                        <div class="col-md-3">
                            <img src="https://upload.wikimedia.org/wikipedia/en/5/59/UHS_Lahore_logo.jpg" alt="img2" height="100px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <h6 style=""> Aggregate % with MDCAT </h6>
                                <h6 style="font-weight: bold"> ___________________ </h6>
                            </center>
                        </div>
                    </div>
                </center>
                <div class="row">
                    <br><br>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <h6 style="font-weight: bold"> Part 1 &nbsp &nbsp Selected Categories </h6>
                        <h6 style="font-weight: bold">
                            @if(in_array('open_merit',$category_options))
                                <span style="color: orangered"><em>District Quota / Open Merit <i class="fa fa-check"></i></em></span><br>
                            @endif
                            @if(in_array('overseas',$category_options))
                                <span style="color: orangered"><em> Overseas <i class="fa fa-check"></i></em></span><br>
                            @endif
                            @if(in_array('disability',$category_options))
                                <span style="color: orangered"><em> Student with Disabilities <i class="fa fa-check"></i></em></span><br>
                            @endif
                            @if(in_array('doctor',$category_options))
                                <span style="color: orangered"><em> Doctor's Children <i class="fa fa-check"></i></em></span><br>
                            @endif
                            @if(in_array('special_quota',$category_options))
                                <span style="color: orangered"><em>Special Quota for Neelam & Leepa <i class="fa fa-check"></i></em></span><br>
                            @endif
                            @if(in_array('self',$category_options))
                                <span style="color: orangered"><em> Self Finance <i class="fa fa-check"></i></em></span><br>
                            @endif
                            @if(in_array('bds',$category_options))
                                <span style="color: orangered"><em> BDS <i class="fa fa-check"></i></em></span><br>
                            @endif
                        </h6>
                    </div>
                    <div class="col-md-3">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($user->image)}}    " alt="img" height="100px">
                    </div>
                </div>
                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="font-weight: bold"> Part 2 Personal Information</h6>
                        <h6 style="">
                            1. Hafiz-e-Quran
                        </h6>
                    </div>

                    <div class="col-md-12">
                        <h6>2. Name of Applicant</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->name}}</h6>
                    </div>

                    <div class="col-md-12">
                        <h6>3. Father/Guardian's Name</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->guardian_name}}</h6>
                    </div>

                    <div class="col-md-12">
                        <h6>4. Mother Name</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->mother_name}}</h6>
                    </div>

                    <div class="col-md-4">
                        <h6>5. Gender</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->gender}}</h6>
                    </div>

                    <div class="col-md-8">
                        <h6>6. Nationality</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->nationality}}</h6>
                    </div>

                    <div class="col-md-6">
                        <h6>7. Date of Birth</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->dob}}</h6>
                    </div>

                    <div class="col-md-6">
                        <h6>8. Nationality</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->domicile}}</h6>
                    </div>

                    <div class="col-md-12">
                        <h6>9. Area</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->area}}</h6>
                    </div>

                    <div class="col-md-12">
                        <h6>10. CNIC/ Smart Card/NICOP/POC:</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->cnic}}</h6>
                    </div>

                    <div class="col-md-12">
                        <h6>11. Mailing Address(Res):</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->address}}</h6>
                    </div>

                    <div class="col-md-4">
                        <h6>12. Tel(Landline):</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->landline}}</h6>
                    </div>

                    <div class="col-md-4">
                        <h6>13. Cell:</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->mobile}}</h6>
                    </div>

                    <div class="col-md-4">
                        <h6>14. E-mail:</h6>
                        <h6 style="border:black; border-width:1px; border-style:solid;">{{$user->email}}</h6>
                    </div>
                </div>
                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="font-weight: bold"> Part 3 Qualifications</h6>
                    </div>
                    <div class="col-md-12">
                        <style>
                            table, th, td {
                                border: 1px solid black;
                            }
                        </style>
                        <table class="table" style="width: 100%">
                            <thead>
                            <tr>
                                <th >Exam Passed</th>
                                <th >Science Subjects</th>
                                <th >Institute</th>
                                <th >Board</th>
                                <th >Year of Passing</th>
                                <th >Obtained Marks</th>
                                <th >Total Marks</th>
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
                </div>

                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="font-weight: bold"> Part 4 Admission Test</h6>
                    </div>
                    <div class="col-md-12">
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
                </div>

                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="font-weight: bold"> Part 5 Solemn Affirmation by the Appicant</h6>
                    </div>
                    <div class="col-md-12">
                        <p>
                            I _______________________ S/D/O __________________________________ solemnly affirm that the information contained in this Admission Form, and the documents attached witht this form , are
                            complete and accurate. <br>
                            I understand that if any information in this apllication, or in the documents and the certificates that are attached with this application, is not complete
                            or accurate, I shall not be considered for admission, and if somehow admitted University shall cancel my admission as per provision Prospectus.
                            <br>
                            I have gon ethrough the rules  and regulations contained in the prospectus, and I undertake to abide by all conditions.
                            <br>
                            I agree that submission of this Application Form does not confer any right on me in respect of selection for admission, which shall only
                            be granted on merit.

                            <br>
                            <br>
                            <br>
                        </p>
                    </div>
                    <div class="col-md-6" align="left">
                        ______________________ <br>
                        <b>Name of Applicant</b>
                    </div>
                    <div class="col-md-6" align="right">
                        <b>Date: __________________</b>
                    </div>
                </div>

                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="font-weight: bold"> Prefrences</h5>
                        <span style="font-weight: bold; color: red"><em class="text-danger">{{$c_names}}</em></span>
                    </div>
                </div>

            </div>
        </section>


    </div>
    </body>

@endsection
