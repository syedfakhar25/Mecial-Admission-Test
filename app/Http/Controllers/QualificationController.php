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
        $user_id = Auth::user()->id;
        return view('qualification.index', [
            'user_id' => $user_id,
        ]);
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
                        'total_marks' => $request->total_marks[$count],
                    ]);
                }
            }
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
        //
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
