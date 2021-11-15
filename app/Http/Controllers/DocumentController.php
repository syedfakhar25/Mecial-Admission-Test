<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

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
        if(Auth::user()->user_type != 'user' || count(Auth::user()->appliedStudent)>0){
            return redirect()->route('dashboard.index');
        }
        
        
        


        
        $documents = Document::where('user_id' , '=', $user_id)->first();
        return view('document.myDocs', compact('documents'));
      
        /*$documents = Document::where('user_id' , '=', $user_id)->get();
        if(empty($documents[0])){
            return view('document.index');
        }
        else{
            return view('document.edit', compact('documents'));
        }*/
        

    }

    public function upload_user_images_func(Request $request)
    {
        $output = array('status'=>false);
        if(Auth::user()->user_type != 'user' || count(Auth::user()->appliedStudent)>0){
            $output['msg'] = 'Not Allowed';
        }
        else
        {
            $validator = Validator::make($request->all(), [
        
                'certificate_image' => 'required|image|mimes:png,PNG,jpg,JPG|max:1024',
        
              ]);
        
        
              if ($validator->passes()) {
        
                if ($request->has('type')) {
            
                    $path = $request->file('certificate_image')->store('', 'public');//user-'.Auth::user()->id
                    
                    $documents = Document::where('user_id' , '=', auth()->user()->id)->first();
                    if($documents)
                    {
                        //update
                        $documents->update([$request->type =>$path]);
                    }
                    else
                    {
                        //add
                        Document::create([$request->type =>$path,'user_id'=>Auth::user()->id]);
                    }
                    $output['image_path'] =  Storage::url($path);// https://domainpublic/xyz.jpg
                    $output['msg'] =  'File Saved.';
                    $output['status'] = true;
                }
                else
                {
                    $output['msg'] =  'Invalid file for certificate.';
                }
               
        
              }
              else
              {
                return response()->json(['error'=>$validator->errors()->all()]);  
              }
              
        }
        
        return json_encode($output);
        
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
        if(Auth::user()->user_type != 'user' || count(Auth::user()->appliedStudent)>0){
            return redirect()->route('dashboard.index');
        }
        $request->validate([
            'matric1' => ['required','mimes:jpg,bmp,png'],
            'fsc1' => ['required','mimes:jpg,bmp,png'],
            'cnic1' => ['required','mimes:jpg,bmp,png'],
            'state_subject1' => ['required','mimes:jpg,bmp,png'],
            'domicile1' => ['required','mimes:jpg,bmp,png'],
            /*'prc1' => ['required','mimes:jpg,bmp,png'],*/
            'mcat_result1' => ['required','mimes:jpg,bmp,png'],
            'signature1' => ['required','mimes:jpg,bmp,png'],
            'overseas1' => ['mimes:jpg,bmp,png'],
            'disable1' => ['mimes:jpg,bmp,png'],
            'doctor1' => ['mimes:jpg,bmp,png'],
            'hafiz1' => ['mimes:jpg,bmp,png']
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
        if ($request->has('mcat_result1')) {
            $path = $request->file('mcat_result1')->store('', 'public');
            $request->merge(['mcat_result' => $path]);
        }
        if ($request->has('signature1')) {
            $path = $request->file('signature1')->store('', 'public');
            $request->merge(['signature' => $path]);
        }
        if ($request->has('overseas1')) {
            $path = $request->file('overseas1')->store('', 'public');
            $request->merge(['overseas' => $path]);
        }
        if ($request->has('disable1')) {
            $path = $request->file('disable1')->store('', 'public');
            $request->merge(['disable' => $path]);
        }
        if ($request->has('doctor1')) {
            $path = $request->file('doctor1')->store('', 'public');
            $request->merge(['doctor' => $path]);
        }
        if ($request->has('hafiz1')) {
            $path = $request->file('hafiz1')->store('', 'public');
            $request->merge(['hafiz' => $path]);
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
        if(Auth::user()->user_type != 'user' || count(Auth::user()->appliedStudent)>0){
            return redirect()->route('dashboard.index');
        }

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
        if ($request->has('mcat_result1')) {
            $path = $request->file('mcat_result1')->store('', 'public');
            $request->merge(['mcat_result' => $path]);
        }
        if ($request->has('signature1')) {
            $path = $request->file('signature1')->store('', 'public');
            $request->merge(['signature' => $path]);
        }
        if ($request->has('overseas1')) {
            $path = $request->file('overseas1')->store('', 'public');
            $request->merge(['overseas' => $path]);
        }
        if ($request->has('disable1')) {
            $path = $request->file('disable1')->store('', 'public');
            $request->merge(['disable' => $path]);
        }
        if ($request->has('doctor1')) {
            $path = $request->file('doctor1')->store('', 'public');
            $request->merge(['doctor' => $path]);
        }
        if ($request->has('hafiz1')) {
            $path = $request->file('hafiz1')->store('', 'public');
            $request->merge(['hafiz' => $path]);
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
