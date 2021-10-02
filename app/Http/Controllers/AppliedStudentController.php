<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\AppliedStudent;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppliedStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admission = Admission::all();
        $user = Auth::user()->id;
        $applied = AppliedStudent::where('user_id',$user)->get(); // to check if the logged in user has applied or not
        $apply_status = 0;
        if(count($applied)>0){
            $apply_status=1;
        }else{
            $apply_status=0;
        }
        return view('applystudent.index', compact('admission','apply_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'admission_title' =>['required'],
        ]);
        $admission_id = $request->admission_title; //this admission title is basically ID coming from View
        $user_id = Auth::user()->id;
        $apply_date = Carbon::now(); //tp get current date

        $c = AppliedStudent::create([
            'admission_id' => $admission_id,
            'user_id' => $user_id,
            'apply_date' => $apply_date,
        ]);

        return redirect()->route('applicationstatus');
    }

    //to check status of applied admission
    public function ApplicationStatus(){
        $user = Auth::user();
        $user_id = $user->id;

        $applied_admission = AppliedStudent::where('user_id',$user_id)->get();

        return view('applystudent.show', compact('applied_admission'));
    }

    //accept student for admin
    public function accept(Request $request, $user_id){
        $applied_admission = AppliedStudent::where('user_id',$user_id)->get();
        $applied_admission[0]->status = 'accepted';
        $applied_admission[0]->status_update_date = Carbon::now();

        $applied_admission[0]->update();
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }

    //reject student for admin
    public function reject(Request $request, $user_id){
        $applied_admission = AppliedStudent::where('user_id',$user_id)->get();
        $applied_admission[0]->status = 'rejected';
        $applied_admission[0]->status_update_date = Carbon::now();

        $applied_admission[0]->update();
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
