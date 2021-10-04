<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->user_type != 'user' || count(Auth::user()->appliedStudent)>0){
            return redirect()->route('dashboard.index');
        }
        $user_id = Auth::user()->id;
        $qualifications = Qualification::where('user_id' , '=', $user_id)->get();

        if(count($qualifications)<1){
            return view('qualification.index', [
                'user_id' => $user_id,
            ]);
        }
        else{
            $matric = $qualifications[0];
            $fsc = $qualifications[1];

            return view('qualification.edit', [
                'fsc' => $fsc,
                'matric' => $matric,
            ]);
        }

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
        $user_id = Auth::user()->id;

        if (isset($request->exam)) {
            for ($count = 0; $count < count($request->exam); $count++) {
                if (!empty($request->exam[$count])) {
                    Qualification::create([
                        'user_id' => $user_id,
                        'exam' => $request->exam[$count],
                        'subject' => $request->subject[$count],
                        'institute' => $request->institute[$count],
                        'board' => $request->board[$count],
                        'year' => $request->year[$count],
                        'obtained_marks' => $request->obtained_marks[$count],
                        'phy' => $request->phy,
                        'chem' => $request->chem,
                        'bio' => $request->bio,
                        'fresh_candidate' => $request->fresh_candidate,
                        'qual_type' => $request->qual_type[$count],
                        'total_science' => $request->total_science,
                        'total_marks' => $request->total_marks[$count],
                    ]);
                }
            }
        }

        return view('users.entrytest')->with('success', 'Qualification Added Successfully');

    }

    public function updateQualifications(Request $request){
        for($count=0; $count< count($request->qual_id); $count++){
            $values = [
                'exam' => $request->exam[$count],
                'subject' => $request->subject[$count],
                'institute' => $request->institute[$count],
                'board' => $request->board[$count],
                'year' => $request->year[$count],
                'obtained_marks' => $request->obtained_marks[$count],
                'fresh_candidate' => $request->fresh_candidate,
                'total_marks' => $request->total_marks[$count],
            ];
            if($request->qual_type[$count] == 'fsc' && $request->fresh_candidate == 1 ){
                $values['phy'] = $request->phy;
                $values['chem'] = $request->chem;
                $values['bio'] = $request->bio;
                $values['total_science'] = $request->total_science;
            }

            $qualification = Qualification::find($request->qual_id[$count]);
            $qualification->update($values);
        }

        return view('users.entrytest')->with('success', 'Qualification Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualification $qualification)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        //
    }
}
