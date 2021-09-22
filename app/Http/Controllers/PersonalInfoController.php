<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Jetstream;
use function GuzzleHttp\Promise\all;

class PersonalInfoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('users.personalInfo', compact('user'));
    }

    public function edit(Request $request, User $personalInfo)
    {
        $user = $personalInfo;
        return view('users.personalInfo', compact('user'));
    }

    public function update(Request $request, User $personalInfo)
    {
        $user_id = $personalInfo->id;
        $request->validate([
        'guardian_name' => ['required'],
        'dob' => ['required'],
        'domicile' => ['required'],
        'cnic' => ['required', 'max:13'],
        'image1' => [''],
        ]);
        $request->merge([
            'category' => json_encode($request->category_options),
        ]);
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
        $user->approved = 1;
        $user->save();

        return redirect()->back()->with('success', 'Approved Successfully!');
    }

    public function profile(Request $request,$user_id){
       $user = User::find($user_id);
       $category_options = json_decode($user->category);
       return view('users.profile', compact('user', 'category_options'));
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
