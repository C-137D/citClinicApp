<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Patient;
use \Carbon\Carbon; 
use Validator;
use Response;
use File;
use Storage;
use Session;
use Illuminate\Support\Facades\input;
use App\http\Requests;


class PrescriptionsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::all();
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        $prescriptionsTrashed = Prescription::onlyTrashed()->get();
        return view('prescriptions.index',compact('prescriptions','currenttime','today','prescriptionsTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        return view('prescriptions.create',compact('patients','currenttime','today'));
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
            'patient_id' => 'required|integer',
        ]);

        $prescription = new Prescription;
        $prescription->note = $request->input('note');
        $prescription->drug = $request->input('drug');
        $prescription->quantity = $request->input('quantity');
        $prescription->refill = $request->input('refill');
        $prescription->patient_id = $request->input('patient_id');
        $prescription->save();

        Session::flash('success', 'The Prescription was succesfully save');

        return redirect('/prescriptions')->with('success', 'Patient Created');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prescription = Prescription::findorFail($id);
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        return view('prescriptions.show',compact('prescription','currenttime','today'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $prescription = Prescription::findorFail($id);
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        $patients = Patient::all();

        return view('prescriptions.edit',compact( 'patients','prescription','currenttime','today'));
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
            'patient_id' => 'required|integer',
        ]);

        $prescription = Prescription::find($id);
        $prescription->note = $request->input('note');
        $prescription->drug = $request->input('drug');
        $prescription->quantity = $request->input('quantity');
        $prescription->refill = $request->input('refill');
        $prescription->patient_id = $request->input('patient_id');
        $prescription->save();
        
        Session::flash('success', 'The Prescription was succesfully updated');

        return redirect('/prescriptions')->with('success', 'Patient Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        $prescription = Prescription::findOrFail($request->id);
        $prescription->delete();

        return redirect()->back()->with('prescription', 'Prescription Removed');
    }

    public function deleteforever($id)
    {
        $prescription = Prescription::withTrashed()->find($id);
        $prescription->forceDelete();

        return redirect('prescriptions/trashed')->with('Prescription', 'Prescription Removed Permanently');
    }

    public function restore($id) 
    {
        $prescription = Prescription::withTrashed()->find($id)->restore();
        return redirect ('prescriptions/trashed')->with('prescription', 'Prescription has been Restored');
    }

    public function trashed()
    {
        $prescriptionsTrashed = Prescription::onlyTrashed()->get();
        return view('prescriptions.trashed')->with('prescriptionsTrashed', $prescriptionsTrashed);
    }

    public function destroy($id)
    {
        $prescription = Prescription::find($id);
        $prescription->delete();

        Session::flash('success', 'Prescription  was successfully deleted!');
        return back()->with('success', ' Removed');
    }
}

