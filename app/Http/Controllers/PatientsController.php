<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Strorage;
use App\Patient;
use App\Complaint;
use App\Prescription;
use Carbon\Carbon;
use Session;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $patients = Patient::all();
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        $patientsTrashed = Patient::onlyTrashed()->get();
        return view('patients.index',compact('patients','currenttime','today', 'patientsTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'studentId' => 'required',
            'pic' => 'image|nullable|max:1999'

        ]);

        if($request->hasFile('pic')){
            $filenameWithExt = $request->file('pic')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('pic')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('pic')->storeAs('public/pic', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.png';
        }

        $patient = new Patient;
        $patient->pic = $fileNameToStore;
        $patient->studentId = $request->input('studentId');
        $patient->lName = $request->input('lName');
        $patient->fName = $request->input('fName');
        $patient->mName = $request->input('mName');
        $patient->course = $request->input('course');
        $patient->year = $request->input('year');
        $patient->bod = $request->input('bod');
        $patient->sex = $request->input('sex');
        $patient->height = $request->input('height');
        $patient->status = $request->input('status');
        $patient->weight = $request->input('weight');
        $patient->age = $request->input('age');
        $patient->bloodType = $request->input('bloodType');
        // address
        $patient->address = $request->input('address');
        $patient->mobileNo = $request->input('mobileNo');
        // in case of emergency
        $patient->landLine = $request->input('landLine');
        $patient->contactPerson = $request->input('contactPerson');
        $patient->relation = $request->input('relation');
        $patient->addressEm = $request->input('addressEm');

        $patient->save();


        Session::flash('success', 'Patient  was successfully save!');

        return redirect('/patients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findorFail($id);
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        return view('patients.show',compact('patient','currenttime','today'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit')->with('patient',$patient);
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

        $this->validate($request,[
            'studentId' => 'required',
            'pic' => 'image|nullable|max:1999'

        ]);

        if($request->hasFile('pic')){
            $filenameWithExt = $request->file('pic')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('pic')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('pic')->storeAs('public/pic', $fileNameToStore);
        }

        
        $patient = Patient::find($id);
        if($request->hasFile('pic')){
            $patient->pic = $fileNameToStore;
        }
        $patient->studentId = $request->input('studentId');
        $patient->lName = $request->input('lName');
        $patient->fName = $request->input('fName');
        $patient->mName = $request->input('mName');
        $patient->course = $request->input('course');
        $patient->year = $request->input('year');
        $patient->bod = $request->input('bod');
        $patient->sex = $request->input('sex');
        $patient->height = $request->input('height');
        $patient->weight = $request->input('weight');
        $patient->status = $request->input('status');
        $patient->age = $request->input('age');
        $patient->bloodType = $request->input('bloodType');
        
        // address
        $patient->address = $request->input('address');
        $patient->mobileNo = $request->input('mobileNo');
        // in case of emergency
        $patient->landLine = $request->input('landLine');
        $patient->contactPerson = $request->input('contactPerson');
        $patient->relation = $request->input('relation');
        $patient->addressEm = $request->input('addressEm');

        $patient->save();
        

        Session::flash('success', 'Patient  was successfully updated!');
        return back();
    }

    public function delete(Request $request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->delete();

        return redirect()->back()->with('patient', 'Patient Removed');
    }


    public function deleteforever($id)
    {
        $patient = Patient::withTrashed()->find($id);
        $patient->forceDelete();

        return redirect('patients/trashed')->with('patient', 'Patient Removed Permanently');
    }

    public function restoreall() 
    {
        $patient = Patient::onlyTrashed()->restore();
        return redirect ('patients/trashed')->with('patient', 'Patient has been Restored All');
    }

    public function restore($id) 
    {
        $patient = Patient::withTrashed()->find($id)->restore();
        return redirect ('patients/trashed')->with('patient', 'Patient has been Restored');
    }

    public function trashed()
    {
        $patientsTrashed = Patient::onlyTrashed()->get();
        return view('patients.trashed')->with('patientsTrashed', $patientsTrashed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Complaint::find($id);
        $patient->delete();

        
        
        if($patient->pic != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/pic/',$patient->pic);
        }
        
        return redirect('/patients')->with('error', 'Wrong Id');
    }
}
