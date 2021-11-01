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
                                <th>S.#</th>
                                <th>Roll#</th>
                                <th>Name</th>
                                <th>Father/Guardian</th>
                                <th>CNIC</th>
                                <th>Postal Address</th>
                                <th>Categories</th>
                                <th>Preferences</th>
                                <th>Domicile</th>
                                <th>MCAT/SATMarks</th>
                                <th>Hafiz</th>
                                <th>Matric</th>
                                <th>FSc</th>
                                <th>Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($users as $user)
                                <tr>
                                    <?php
                                        $matric = 0;
                                        $fsc = 0;
                                        $fresh_chem= 0;
                                        $fresh_phy= 0;
                                        $fresh_bio= 0;
                                    ?>
                                    @foreach($user->qualification as $qual)
                                        @if($qual->qual_type == 'matric')
                                            <?php
                                                $matric = $qual->obtained_marks;

                                            ?>
                                        @elseif($qual->qual_type == 'fsc')
                                            @if($qual->fresh_candidate ==1)
                                                    <?php
                                                    $fresh_chem= $qual->chem;
                                                    $fresh_phy= $qual->phy;
                                                    $fresh_bio= $qual->bio;
                                                    ?>
                                            @else
                                                <?php
                                                $fsc = $qual->obtained_marks;
                                                ?>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>{{$i+=1}}</td>
                                    <td>{{$user->roll_no}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->guardian_name}}</td>
                                    <td>{{$user->cnic}}</td>
                                    <td>{{$user->address}}</td>
                                    @php
                                        $cat_array = json_decode($user->category);
                                    @endphp
                                    <td>
                                        <?php
                                            $cats_array=array();
                                            foreach($cat_array as $cat)
                                            {
                                                if($cat == 'open_merit')
                                                {
                                                    $cats_array[] = 'District Quota / Open Merit';
                                                }
                                                if($cat == 'overseas')
                                                {
                                                    $cats_array[] = 'Overseas';
                                                }
                                                if($cat == 'disability')
                                                {
                                                    $cats_array[] = 'Student with Disabilities';
                                                }
                                                if($cat == 'doctor')
                                                {
                                                    $cats_array[] = 'Doctor\'s Children';
                                                }
                                                if($cat == 'special_quota')
                                                {
                                                    $cats_array[] = 'Special Quota for Neelam & Leepa';
                                                }
                                                if($cat == 'self')
                                                {
                                                     $cats_array[] = 'Self Finance';
                                                }
                                                if($cat == 'bds')
                                                {
                                                     $cats_array[] = 'BDS';
                                                }
                                            }
                                            echo implode(', ',$cats_array);
                                        ?>
                                    </td>
                                    @php
                                        $pref_arr = json_decode($user->preference);
                                        $college_names =  \App\Models\User::CollegeNames($pref_arr);

                                        $names= implode(', ',$college_names);
                                    @endphp
                                    <td>
                                        {{$names}}
                                    </td>
                                    <td>{{$user->domicile}}</td>
                                    <td>
                                        @if($user->test_type=='mcat')
                                            {{$user->entry_marks}}
                                        @elseif($user->test_type=='sat')
                                            Chem: {{$user->chem}} | Bio: {{$user->bio}} | Physics: {{$user->physics}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->hafiz_quran == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>{{$matric}}</td>
                                    <td>{{($fsc != 0)? $fsc : 'Chem: '.$fresh_chem. ', Phy: ' . $fresh_phy. ', Bio: ' . $fresh_bio; }}
                                    </td>
                                    <td>{{$user->mobile}}</td>
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
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ]
            } );
        } );
    </script>
@endsection
