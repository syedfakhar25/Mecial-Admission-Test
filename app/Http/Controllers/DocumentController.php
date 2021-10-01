<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $documents = Document::where('user_id' , '=', $user_id)->get();

        if(empty($documents[0])){
            return view('document.index');
        }
        else{
            return view('document.edit', compact('documents'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matric1' => ['required','mimes:jpg,bmp,png'],
            'fsc1' => ['required','mimes:jpg,bmp,png'],
            'cnic1' => ['required','mimes:jpg,bmp,png'],
            'state_subject1' => ['required','mimes:jpg,bmp,png'],
            'domicile1' => ['required','mimes:jpg,bmp,png'],
            'prc1' => ['required','mimes:jpg,bmp,png'],
            'signature1' => ['required','mimes:jpg,bmp,png'],
        ]);


        if ($request->has('matric1')) {
            $path = $request->file('matric1')->store('', 'public');
            $request->merge(['matric' => $path]);
        }
        if ($request->has('fsc1')) {
            $path = $request->file('fsc1')->store('', 'public');
            $request->merge(['fsc' => $path]);
        }
        if ($request->has('cnic1')) {
            $path = $request->file('cnic1')->store('', 'public');
            $request->merge(['cnic' => $path]);
        }
        if ($request->has('state_subject1')) {
            $path = $request->file('state_subject1')->store('', 'public');
            $request->merge(['state_subject' => $path]);
        }
        if ($request->has('domicile1')) {
            $path = $request->file('domicile1')->store('', 'public');
            $request->merge(['domicile' => $path]);
        }
        if ($request->has('prc1')) {
            $path = $request->file('prc1')->store('', 'public');
            $request->merge(['prc' => $path]);
        }
        if ($request->has('signature1')) {
            $path = $request->file('signature1')->store('', 'public');
            $request->merge(['signature' => $path]);
        }
        $request->merge(['user_id' => auth()->user()->id]);
        $document1 = Document::create($request->all());
        return redirect()->route('profile', auth()->user()->id)->with('success', 'Documents Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matric1' => ['required','mimes:jpg,bmp,png'],
            'fsc1' => ['required','mimes:jpg,bmp,png'],
            'cnic1' => ['required','mimes:jpg,bmp,png'],
            'state_subject1' => ['required','mimes:jpg,bmp,png'],
            'domicile1' => ['required','mimes:jpg,bmp,png'],
            'prc1' => ['required','mimes:jpg,bmp,png'],
            'signature1' => ['required','mimes:jpg,bmp,png'],
        ]);

        $document = Document::find($id);

        if ($request->has('matric1')) {
            $path = $request->file('matric1')->store('', 'public');
            $request->merge(['matric' => $path]);
        }
        if ($request->has('fsc1')) {
            $path = $request->file('fsc1')->store('', 'public');
            $request->merge(['fsc' => $path]);
        }
        if ($request->has('cnic1')) {
            $path = $request->file('cnic1')->store('', 'public');
            $request->merge(['cnic' => $path]);
        }
        if ($request->has('state_subject1')) {
            $path = $request->file('state_subject1')->store('', 'public');
            $request->merge(['state_subject' => $path]);
        }
        if ($request->has('domicile1')) {
            $path = $request->file('domicile1')->store('', 'public');
            $request->merge(['domicile' => $path]);
        }
        if ($request->has('prc1')) {
            $path = $request->file('prc1')->store('', 'public');
            $request->merge(['prc' => $path]);
        }
        if ($request->has('signature1')) {
            $path = $request->file('signature1')->store('', 'public');
            $request->merge(['signature' => $path]);
        }


        $document->update($request->all());
        return redirect()->route('profile', auth()->user()->id)->with('success', 'Documents Updates Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
