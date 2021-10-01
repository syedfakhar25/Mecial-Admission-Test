<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = Admission::all();
        return view('admissions.index', compact('admissions'));
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
            'admission_title' => ['required'],
            'close_date' => ['required'],
        ]);
        Admission::create([
            'admission_title' => $request['admission_title'],
            'close_date' => $request['close_date'],
        ]);

        return redirect()->back()->with('success', 'Admission Created Successfully');
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
        $admission = Admission::find($id);
        return view('admissions.edit', compact('admission'));
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
        dd('im here');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admission = Admission::find($id);
        $admission->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
}
