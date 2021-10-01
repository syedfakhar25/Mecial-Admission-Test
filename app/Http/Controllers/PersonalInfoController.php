<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;
use function GuzzleHttp\Promise\all;

class PersonalInfoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
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
        $user_id = $personalInfo->id;
        $cate = json_encode($request->category_options);
        $pref = json_encode($request->preference_select);

        $request->validate([
            'image1' => 'mimes:jpeg,jpg,png|required',
        ]);
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
       // dd($email);
        $user->notify(new \App\Notifications\Approved());
        $user->approved = 1;
        $user->save();

        return redirect()->back()->with('success', 'Approved Successfully!');
    }

    public function profile(Request $request,$user_id){
       $user = User::find($user_id);

        if(!empty($user->category)  && strtolower($user->category) != 'null'){
            $category_options = json_decode($user->category);
        }
        else{
            $category_options=[];
        }

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

       return view('users.profile', compact('user', 'category_options', 'c_names'));
    }

    public function saveEntryTest(Request $request,$user_id){
     $user = User::find($user_id);
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

}
