<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\College;
use App\Models\Document;
use App\Models\Qualification;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Jetstream\Jetstream;
use phpDocumentor\Reflection\Types\Null_;
use function GuzzleHttp\Promise\all;

class PersonalInfoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Auth::user()->user_type != 'user' || count($user->appliedStudent)>0){
            return redirect()->route('dashboard.index');
        }
        if(!empty($user->category)){
            $categories = json_decode($user->category);
        }
        else{
            $categories=[];
        }

        $colleges = College::all();
        return view('users.personalInfo', compact('user', 'colleges', 'categories'));
    }

    public function edit(Request $request, User $personalInfo)
    {
        $user = $personalInfo;
        return view('users.personalInfo', compact('user'));
    }

    public function update(Request $request, User $personalInfo)
    {
        $user = Auth::user();
        if(Auth::user()->user_type != 'user' || count($user->appliedStudent)>0){
            return redirect()->route('dashboard.index');
        }
        $user_id = $personalInfo->id;
        $cate = json_encode($request->category_options);
        $pref = json_encode($request->preference_select);
        if($user->image == Null){
            $request->validate([
                'image1' => 'mimes:jpeg,jpg,png|required',
            ]);
        }

        if(!empty($cate) && $cate!='null')
        {
            $request->merge(['category' => $cate]);
        }
        if(!empty($cate) && $cate!='null') {
            $request->merge(['preference' => $pref]);
        }

        if ($request->has('image1')) {
            $path = $request->file('image1')->store('', 'public');
            $request->merge(['image' => $path]);
        }

        $personalInfo->update($request->all());
        return redirect()->route('qualification.index', [
            'user_id' => $user_id,
        ])->with('success', 'Personal Info Added Successfully');
    }

    public function approve(Request $request,$user_id){
        $user = User::find($user_id);
        $email = $user->email;
        //dd($user_id);
        $user->notify(new \App\Notifications\Approved());
        $user->approved = 1;
        $user->save();

        return redirect()->back()->with('success', 'Approved Successfully!');
    }

    public function profile(Request $request,$user_id){

       $user = User::find($user_id);
       //dd($user);
        /*if($user->user_type != 'user'|| $user->id!=Auth::user()->id){
            return redirect()->route('dashboard.index');
        }*/
        if(!empty($user->category)  && strtolower($user->category) != 'null'){
            $category_options = json_decode($user->category);
        }
        else{
            $category_options=[];
        }

        //Aggregate Calculations
        $matric = Qualification::where('user_id', $user_id)->where('qual_type','matric')->get();
        $fsc = Qualification::where('user_id', $user_id)->where('qual_type','fsc')->get();
        $entry_test_marks = 0;

        //first check entry test is SAT or MCAT
        if($user->test_type == 'mcat'){
            $entry_test_marks = $user->entry_marks;
            $entry_percentage = ($entry_test_marks/210)*100;
        }
        elseif($user->test_type == 'sat'){
            $entry_test_marks = $user->chem + $user->bio +$user->physics;
            $entry_percentage = ($entry_test_marks/2400)*100;
        }
        if(count($matric)>0){
            $matric_percentage = ($matric[0]->obtained_marks/1100)*100;
        }else{
            $matric_percentage =0;
        }

        $fsc_percentage = 0;

        //if fsc marks are null calculate from subject marks
        if(count($fsc)>0){
            if($fsc[0]->obtained_marks == NULL || $fsc[0]->obtained_marks == 0  || $fsc[0]->obtained_marks == "null"  || $fsc[0]->obtained_marks == Null){
                $fsc_percentage = ((($fsc[0]->phy + $fsc[0]->chem + $fsc[0]->bio )/$fsc[0]->total_science)*100);
            }
            else{
                $fsc_percentage = ($fsc[0]->obtained_marks/1100)*100;
            }
        }

        $aggregate =(($matric_percentage/100)*10)+(($fsc_percentage/100)*40)+(($entry_percentage/100)*50);

        if(!empty($user->preference) && strtolower($user->preference) != 'null'){
            $preference_select = json_decode($user->preference);
            $college_names = DB::table('colleges')->select('colleges')->whereIn('id', $preference_select)->get();
        }
        else{
            $preference_select=[];
            $college_names = [];
        }

        //user's documents
        $documents = Document::where('user_id', $user->id)->get();
       //dd($documents->matirc);
     //$college_names = College::select('colleges')->where('id', 'in' , $preference_select)->get();

      $c_names = '';
      $count = 1;
       foreach($college_names as $cn){
           if(!empty($c_names)){
               $c_names.=' ';
           }
          $c_names.=$count++ . ': ' . $cn->colleges;
      }

       return view('users.profile', compact(
           'user',
           'category_options',
           'c_names',
            'matric',
           'fsc',
           'documents',
           'aggregate'
       ));
    }

    //print user profile
    public function printProfile(Request $request,$user_id){
       $user = User::find($user_id);
        /*if($user->user_type != 'user' || $user->id!=Auth::user()->id){
            return redirect()->route('dashboard.index');
        }*/
        if(!empty($user->category)  && strtolower($user->category) != 'null'){
            $category_options = json_decode($user->category);
        }
        else{
            $category_options=[];
        }
        //Aggregate Calculations
        $matric = Qualification::where('user_id', $user_id)->where('qual_type','matric')->get();
        $fsc = Qualification::where('user_id', $user_id)->where('qual_type','fsc')->get();
        $entry_test_marks = $user->entry_marks;
        $entry_percentage = ($entry_test_marks/210)*100;
        if(count($matric)>0){
            $matric_percentage = ($matric[0]->obtained_marks/1100)*100;
        }else{
            $matric_percentage =0;
        }

        $fsc_percentage = 0;

        //if fsc marks are null calculate from subject marks
        if(count($fsc)>0){
            if($fsc[0]->obtained_marks == NULL || $fsc[0]->obtained_marks == 0  || $fsc[0]->obtained_marks == "null"  || $fsc[0]->obtained_marks == Null){
                $fsc_percentage = ((($fsc[0]->phy + $fsc[0]->chem + $fsc[0]->bio )/$fsc[0]->total_science)*100);
            }
            else{
                $fsc_percentage = ($fsc[0]->obtained_marks/1100)*100;
            }
        }
        $aggregate =(($matric_percentage/100)*10)+(($fsc_percentage/100)*40)+(($entry_percentage/100)*50);

        if(!empty($user->preference) && strtolower($user->preference) != 'null'){
            $preference_select = json_decode($user->preference);
            $college_names = DB::table('colleges')->select('colleges')->whereIn('id', $preference_select)->get();
        }
        else{
            $preference_select=[];
            $college_names = [];
        }


     //$college_names = College::select('colleges')->where('id', 'in' , $preference_select)->get();

      $c_names = '';
      $count = 1;
       foreach($college_names as $cn){
           if(!empty($c_names)){
               $c_names.=' ';
           }
          $c_names.=$count++ . ': ' . $cn->colleges;
      }

       return view('users.profile-print', compact('user', 'category_options', 'c_names', 'aggregate'));
    }

    public function saveEntryTest(Request $request,$user_id){
     $user = User::find($user_id);
     if($user->user_type != 'user' || count($user->appliedStudent)>0 || $user->id!=Auth::user()->id){
            return redirect()->route('dashboard.index');
     }
     //for SAT
     $user->chem = $request->chem;
     $user->physics = $request->physics;
     $user->bio = $request->bio;
     $user->test_date = $request->test_date;

     //for MCAT
      $user->test_center = $request->test_center;

      $user->save();


      return view('document.index', compact('user'))->with('success', 'Data Added Successfully!');
    }

    public function ChangePassword(Request $request){
        $user_id = Auth::user()->id;
        return view('change-password');

    }

    public function PasswordChanged(Request $request){
        /*$request->validate([
            'password' => $this->passwordRules(),
        ]);*/
        $user_id = Auth::user()->id;
        $pass = $request->password;
        $password = Hash::make($pass);
        $user = User::find($user_id);
        $user->password = $password;
        $user->save();

        return redirect()->back()->with('success', 'Approved Successfully!');

    }

}
