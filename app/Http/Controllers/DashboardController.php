<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\AppliedStudent;
use App\Models\College;
use App\Models\Qualification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class   DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $users = User::all();

        $registered_users = User::where('user_type', 'user')->get();
        $count_registered_user = count($registered_users);
        //users who have applied on admission
        if(Auth::user()->user_type == 'admin'){
            $users = User::join('applied_students', 'users.id' ,'=', 'applied_students.user_id')->get();
            // dd($userA);
            $colleges = College::all();
            $admissions = Admission::all();
            $total_admissions = count($admissions);
            $college_count = $colleges->count();

            $total_users = count($users);

             $accepted = 0;
            $rejected = 0;
            $pending = 0;

            $status = DB::table('applied_students')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->groupBy('status')
                     ->get();
            foreach($status as $st){
                if($st->status == 'accepted')
                    $accepted = $st->user_count;
                elseif($st->status == 'rejected')
                    $rejected = $st->user_count;
                elseif($st->status == 'pending')
                    $pending = $st->user_count;
            }

            //to get student applied per day
            $latest_admission = Admission::where('start_date', '<', Date('Y-m-d'))->orderBy('created_at', 'desc')->first();
            /*$applied_per_day = DB::table('applied_students')
                ->select(DB::raw('count(*) as total, apply_date'))
                ->groupBy('apply_date')
                ->where('admission_id', $latest_admission->id)
                ->orderBy('apply_date', 'asc')
                ->get();*/

            return view('dashboard', compact(
                'users',
                'count_registered_user',
                'total_users',
                'college_count',
                'total_admissions',
                'accepted',
                'rejected',
                'pending',
               /* 'applied_per_day',*/
                'latest_admission'
       ));
        }
        else{
            return  view('dashboard-user');
        }

    }

    //manage all students
    public function allStudents(Request $request){
        if(Auth::user()->user_type!='admin'){
            return redirect()->route('dashboard');
        }
        $users = User::select('users.*')->join('applied_students', 'users.id' ,'=', 'applied_students.user_id');
        if(isset($request->status) && !empty($request->status)){
            $users = $users->where('status' , $request->status);
        }
        $users = $users->get();
       // dd($users);
        return view('all-students', compact(
            'users'
        ));
    }

    //all students report
    public function allStudentsReport(Request $request){
        if(Auth::user()->user_type!='admin'){
            return redirect()->route('dashboard');
        }
        $users = User::select('users.*')->join('applied_students', 'users.id' ,'=', 'applied_students.user_id')->get();

        return view('all-students-report', compact(
            'users'
        ));
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
        //
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
