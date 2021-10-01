@extends('admin.master')
@section('title')
    AJKMC Admission Test | Personal Information
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Personal Information</em></h1>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <span class="text-red"><x-jet-validation-errors class="mb-4" /></span>

                                <form method="POST" action="{{ route('personalInfo.update',$user->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Part 1 Category of Seats [Select the relevant]</label>
                                            <div class="form-check col-12">
                                                <input class="col-md-3" type="Checkbox" name="category_options[]" {{ in_array( 'open_merit', $categories) ? 'checked' : '' }} value="open_merit">District Quota / Open Merit
                                                <input class="col-md-3" type="Checkbox" name="category_options[]" {{ in_array( 'overseas', $categories) ? 'checked' : '' }} value="overseas">Overseas
                                                <input class="col-md-3"type="Checkbox" name="category_options[]" {{ in_array( 'disability', $categories) ? 'checked' : '' }} value="disability">Student with Disabilities
                                                <input class="col-md-3" type="Checkbox" name="category_options[]" {{ in_array( 'doctor', $categories) ? 'checked' : '' }} value="doctor">Doctor's Children
                                                <input class="col-md-3" type="Checkbox" name="category_options[]" {{ in_array( 'special_quota', $categories) ? 'checked' : '' }} value="special_quota">Special Quota for Neelam & Leepa
                                                <input class="col-md-3" type="Checkbox" name="category_options[]" {{ in_array( 'self', $categories) ? 'checked' : '' }} value="self">Self Finance
                                                <input class="col-md-3" type="Checkbox" name="category_options[]" {{ in_array( 'bds', $categories) ? 'checked' : '' }} value="bds">BDS
                                            </div>
                                        </div>
                                    </div>
                                    <hr width="100%">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Part 2 Personal Information</label>
                                            <div class="form-check ">
                                                <input class="form-check-input" {{ $user->hafiz_quran == 1 ? 'checked' : '' }} name="hafiz_quran" value="1" type="checkbox">
                                                <label class="form-check-label">Hafiz e Quran</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="form-group">
                                           <label class="form-label" for="customFile">Upload Image </label><span><em style="color: green">&nbsp Image must be type of jpg, png</em></span>
                                           <input type="file" class="form-control" name="image1" id="customFile" />
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Name of the Applicant</label>
                                                <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Enter your Name ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Father/Guardian's Name</label>
                                                <input type="text" name="guardian_name" value="{{old('guardian_name')}} {{$user->guardian_name}}" class="form-control" required placeholder="Enter Father's Name ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Mother's Name</label>
                                                <input type="text" name="mother_name" value="{{old('mother_name')}} {{$user->mother_name}}" class="form-control" placeholder="Enter Mother's Name ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option disabled value="">--Select Gender--</option>
                                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" name="nationality" value="{{old('nationality')}} {{$user->nationality}}" class="form-control" placeholder="e.g; Pakistani">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" value="{{ old('dob', date('Y-m-d')) }}" class="form-control" placeholder="Enter Mother's Name ...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>District of Domicile/Unit</label>
                                                <select class="form-control" name="domicile">
                                                    <option disabled>--Select District--</option>
                                                    <option value="muzaffarabad" {{ $user->domicile == 'muzaffarabad' ? 'selected' : '' }}>Muzaffarabad</option>
                                                    <option value="neelum" {{ $user->domicile == 'neelum' ? 'selected' : '' }}>Neelum</option>
                                                    <option value="hattian" {{ $user->domicile == 'hattian' ? 'selected' : '' }}>Hattian</option>
                                                    <option value="bagh" {{ $user->domicile == 'bagh' ? 'selected' : '' }}>Bagh</option>
                                                    <option value="haveli" {{ $user->domicile == 'haveli' ? 'selected' : '' }}>Haveli</option>
                                                    <option value="poonch" {{ $user->domicile == 'poonch' ? 'selected' : '' }}>Poonch</option>
                                                    <option value="sudhnuti" {{ $user->domicile == 'sudhnuti' ? 'selected' : '' }}>Sudhnuti</option>
                                                    <option value="kotli" {{ $user->domicile == 'kotli' ? 'selected' : '' }}>Kotli</option>
                                                    <option value="mirpur" {{ $user->domicile == 'mirpur' ? 'selected' : '' }}>Mirpur</option>
                                                    <option value="bhimber" {{ $user->domicile == 'bhimber' ? 'selected' : '' }}>Bhimber</option>
                                                    <option value="1947" {{ $user->domicile == '1947' ? 'selected' : '' }}>Refugee 1947</option>
                                                    <option value="1989" {{ $user->domicile == '1989' ? 'selected' : '' }}>Refugee 1989</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Area of Residence</label>
                                                <input type="text" name="area" value="{{old('area')}} {{$user->area}}" class="form-control" placeholder="Rural/Urban">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>CNIC</label><em>(without dashes)</em>
                                                <input type="text" name="cnic" value="{{$user->cnic}}" class="form-control" placeholder="e.g; 8220312345678" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Mailing Address</label>
                                                <textarea class="form-control" name="address" rows="3" placeholder="Enter Adrress ...">{{old('address') }} {{$user->address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tel (Landline)</label>
                                                <input type="text" name="landline" value="{{old('landline')}} {{$user->landline}}" class="form-control" placeholder="e.g; 0582212345">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Cell</label>
                                                <input type="text" name="mobile" value="{{old('mobile')}} {{$user->mobile}}" class="form-control" placeholder="e.g; 03001234567">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" value="{{$user->email}}" disabled class="form-control" placeholder="e.g; example@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr width="100%">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <h4 class=""> Choice of Institution</h4> <span style="font-weight: bold; color: red"><em>(Priority of institute is first if you select it first)</em></span>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-6">

                                            <style>
                                                .select2 {
                                                    width: 100% !important;
                                                }
                                            </style>
                                            <select class="form-control  multiple-select" name="preference_select[]" multiple>
                                                <option disabled>-- Select Institutes --</option>
                                                @foreach($colleges as $college)
                                                <option value="{{$college->id}}" {{ $user->prefrences == $college->id ? 'selected' : '' }}>{{$college->colleges}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary">Save & Next</button>
                                    </div>

                                </form>
                            </div>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.multiple-select').select2();
    });
</script>
