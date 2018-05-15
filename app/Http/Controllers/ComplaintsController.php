<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use App\Patient;
use App\Prescription;
use \Carbon\Carbon; 
use Validator;
use Response;
use File;
use Storage;
use Session;
use Illuminate\Support\Facades\input;
use App\http\Requests;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();        
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        $complaintsTrashed = Complaint::onlyTrashed()->get();
        return view('complaints.index',compact('complaints','currenttime','today','complaintsTrashed'));
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
        return view('complaints.create',compact('patients','currenttime','today'));
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
            'bP' => 'required',
            'pR' => 'required',
            'rR' => 'required',
            'temp' => 'required',
            's' => 'required',
            'o' => 'required',
            'a' => 'required',
            'p' => 'required',
            'patient_id'   => 'nullable|required|integer'
        ]);
        
        $complaint = new Complaint;
        $complaint->bP = $request->input('bP');
        $complaint->pR = $request->input('pR');
        $complaint->rR = $request->input('rR');
        $complaint->temp = $request->input('temp');
        $complaint->s = $request->input('s');
        $complaint->o = $request->input('o');
        $complaint->a = $request->input('a');
        $complaint->p = $request->input('p');
        $complaint->patient_id = $request->patient_id;
   
        $complaint->save();
        

        Session::flash('success', 'complaint  was successfully save!');
        return redirect('/complaints')->with('success', 'complaint Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::findorFail($id);
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        return view('complaints.show',compact('complaint','currenttime','today'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint = Complaint::findorFail($id);
        $currenttime = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatlocalized('%a %d %b %y');
        $patients = Patient::all();
        return view('complaints.edit',compact( 'patients','complaint','currenttime','today'));
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
            'bP' => 'required',
            'pR' => 'required',
            'rR' => 'required',
            'temp' => 'required',
            's' => 'required',
            'o' => 'required',
            'a' => 'required',
            'p' => 'required',
            'patient_id'   => 'nullable|required|integer'
        ]);
        
        $complaint = Complaint::find($id);
        $complaint->bP = $request->input('bP');
        $complaint->pR = $request->input('pR');
        $complaint->rR = $request->input('rR');
        $complaint->temp = $request->input('temp');
        $complaint->s = $request->input('s');
        $complaint->o = $request->input('o');
        $complaint->a = $request->input('a');
        $complaint->p = $request->input('p');
        $complaint->patient_id = $request->patient_id;
   
        $complaint->save();
        

        Session::flash('success', 'complaint  was successfully updated!');
        return redirect('/complaints')->with('success', 'complaint Updated');
    }


    public function delete(Request $request)
    {
        $complaint = Complaint::findOrFail($request->id);
        $complaint->delete();

        return redirect()->back()->with('complaint', 'Complaint Removed');
    }


    public function deleteforever($id)
    {
        $complaint = Complaint::withTrashed()->find($id);
        $complaint->forceDelete();

        return redirect('complaints/trashed')->with('complaint', 'Complaint Removed Permanently');
    }

    public function restoreall() 
    {
        $complaint = Complaint::onlyTrashed()->restore();
        return redirect ('complaints/trashed')->with('complaint', 'Complaint has been Restored All');
    }

    public function restore($id) 
    {
        $complaint = Complaint::withTrashed()->find($id)->restore();
        return redirect ('complaints/trashed')->with('complaint', 'Complaint has been Restored');
    }

    public function trashed()
    {
        $complaintsTrashed = Complaint::onlyTrashed()->get();
        return view('complaints.trashed')->with('complaintsTrashed', $complaintsTrashed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        $complaint->delete();


        Session::flash('success', 'Complaint  was successfully deleted!');
        return back();
    }
}
